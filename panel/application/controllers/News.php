<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends MY_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "news_v";
        $this->load->model("news_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->news_model->get_all(
			array(),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("news"));
        }
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("news"));
        }
        $this->load->library("form_validation");
        $news_type = $this->input->post("news_type");
        if ($news_type == "image") {
            if ($_FILES["img_url"]["name"] == "") {
                $alert = array(
                    "title" => "İşlem Başarısız!",
                    "text" => "Lütfen bir görsel seçiniz..",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("news/new_form"));
            }
        }else if ($news_type == "video"){
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        }
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            if ($news_type == "image") {
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
                $image_570x480 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",570,480, $file_name);
                $image_1200x800 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1200,800, $file_name);
                $image_85x85 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",85,85, $file_name);
                if($image_570x480 && $image_1200x800 && $image_85x85){
                    $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "news_type"     => $news_type,
                        "img_url"       => $file_name,
                        "page_keyw"     => $this->input->post("news_keyw"),
                        "page_desc"     => $this->input->post("news_desc"),
                        "video_url"     => "#",
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s")
                    );
                }else{
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("news/new_form"));
                }
            } else if ($news_type == "video"){
                $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "news_type"     => $news_type,
                        "img_url"     => "#",
                        "video_url"     => $this->input->post("video_url"),
                        "page_keyw"     => $this->input->post("news_keyw"),
                        "page_desc"     => $this->input->post("news_desc"),
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s")
                );
            }
            $insert = $this->news_model->add($data);
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
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("news"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("news"));
        }
    	$viewData = new stdClass();
    	$item = $this->news_model->get(
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
            redirect(base_url("news"));
        }
        $this->load->library("form_validation");
        $news_type = $this->input->post("news_type");
        if ($news_type == "video"){
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        }
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            if ($news_type == "image") {
                if($_FILES["img_url"]["name"] !== ""){
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
                $image_570x480 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",570,480, $file_name);
                $image_1200x800 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1200,800, $file_name);
                $image_85x85 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",85,85, $file_name);
                if($image_570x480 && $image_1200x800 && $image_85x85){
                    $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "news_type"     => $news_type,
                        "img_url"     => $file_name,
                        "page_keyw"     => $this->input->post("news_keyw"),
                        "page_desc"     => $this->input->post("news_desc"),
                        "video_url"     => "#"
                    );
                }else{
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("news/update_form/$id"));
                }
            }else {
                $data = array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "page_keyw"     => $this->input->post("news_keyw"),
                    "page_desc"     => $this->input->post("news_desc"),
                );
            }
            } else if ($news_type == "video"){
                $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "news_type"     => $news_type,
                        "img_url"     => "#",
                        "video_url"     => $this->input->post("video_url"),
                        "page_keyw"     => $this->input->post("news_keyw"),
                        "page_desc"     => $this->input->post("news_desc")
                );
            }
            $update = $this->news_model->update(array("id"=>$id),$data);
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
            redirect(base_url("news"));
        } else {
            $viewData = new stdClass();
            $item = $this->news_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("news"));
        }
    	$delete = $this->news_model->delete(
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
        redirect(base_url("news"));
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("news"));
        }
    	if ($id) {
    		$isActive = ($this->input->post("data") === "true") ? 1 : 0;
    		$this->news_model->update(
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
            redirect(base_url("news"));
        }
    	$data = $this->input->post("data");
    	parse_str($data,$order);
    	$items = $order["ord"];
    	foreach ($items as $rank => $id) {
    		$this->news_model->update(
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
