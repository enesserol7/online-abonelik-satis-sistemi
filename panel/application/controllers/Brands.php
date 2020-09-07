<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brands extends MY_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "brands_v";
        $this->load->model("brand_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->brand_model->get_all(
			array(),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("brands"));
        }
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("brands"));
        }
        $this->load->library("form_validation");
            if ($_FILES["img_url"]["name"] == "") {
                $alert = array(
                    "title" => "İşlem Başarısız!",
                    "text" => "Lütfen bir görsel seçiniz..",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("brands/new_form"));
            }
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
                $image_271x200 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",271,200, $file_name);
                if($image_271x200){
                    $insert = $this->brand_model->add(
                        array(
                        "title" => $this->input->post("title"),
                        "url" => convertToSEO($this->input->post("title")),
                        "img_url" => $file_name,
                        "keyw" => $this->input->post("keyw"),
                        "desc" => $this->input->post("desc"),
                        "rank" => 0,
                        "isActive" => 1,
                        "createdAt" => date("Y-m-d H:i:s")
                        )
                    );
                    if($insert){
                        $alert = array(
                            "title" => "İşlem Başarılıyla Gerçekleşti.",
                            "text" => "Kayıt başarılı bir şekilde eklendi",
                            "type" => "success"
                        );
                    } else {
                        $alert = array(
                            "title" => "İşlem Başarısız Oldu!",
                            "text" => "Kayıt ekleme sırasında bir problem oluştu!",
                            "type" => "error"
                        );
                    }
                }else{
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("brands/new_form"));
                }
            
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("brands"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("brands"));
        }
    	$viewData = new stdClass();
    	$item = $this->brand_model->get(
    		array(
    			"id"=>$id
    		)
    	);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("brands"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
                if($_FILES["img_url"]["name"] !== ""){
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
                $image_271x200 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",271,200, $file_name);

                if($image_271x200){
                    $data = array(
                        "title" => $this->input->post("title"),
                        "url" => convertToSEO($this->input->post("title")),
                        "keyw" => $this->input->post("keyw"),
                        "desc" => $this->input->post("desc"),
                        "img_url" => $file_name
                    );
                }else{
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("brands/update_form/$id"));
                }
            }else {
                $data = array(
                    "title" => $this->input->post("title"),
                    "url"   => convertToSEO($this->input->post("title")),
                    "keyw" => $this->input->post("keyw"),
                    "desc" => $this->input->post("desc"),
                );
            }
            $update = $this->brand_model->update(array("id"=>$id),$data);
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("brands"));
        } else {
            $viewData = new stdClass();
            $item = $this->brand_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("brands"));
        }
    	$delete = $this->brand_model->delete(
    		array(
    			"id" => $id
    		)
    	);
    	if ($delete) {
    		$alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi başarılı bir şekilde silindi.",
                "type" => "success"
            );
    	}else{
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                "type" => "error"
            );
    	}
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("brands"));
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("brands"));
        }
    	if ($id) {
    		$isActive = ($this->input->post("data") === "true") ? 1 : 0;
    		$this->brand_model->update(
    			array(
    				"id" => $id
    			),
    			array(
    				"isActive" => $isActive
    			)
    		);
    	}
    }
    public function rankSetter(){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("brands"));
        }
    	$data = $this->input->post("data");
    	parse_str($data,$order);
    	$items = $order["ord"];
    	foreach ($items as $rank => $id) {
    		$this->brand_model->update(
    			array(
    				"id" => $id,
    				"rank !=" => $rank
    			),
    			array(
    				"rank" => $rank
    			)
    		);
    	}
    }
}
