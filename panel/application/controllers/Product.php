<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MY_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "product_v";
        $this->load->model("product_model");
        $this->load->model("product_category_model");
        $this->load->model("product_image_model");
        $this->load->model("product_file_model");
        $this->load->model("product_price_model");
        $this->load->model("brand_model");
        $this->load->model("infrastructure_model");
        $this->load->model("speed_model");
        $this->load->model("akn_model");
        $this->load->model("sms_model");
        $this->load->model("internet_model");
        $this->load->model("minute_model");
        $this->load->model("taahhut_model");
        $this->load->helper("text");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->product_model->get_all(
			array(),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("product"));
        }
		$viewData = new stdClass();
        $categories = $this->product_category_model->get_all(
            array()
        );
        $brands = $this->brand_model->get_all(
            array(
            	"isActive" => 1
            ),"rank ASC"
        );
        $speed = $this->speed_model->get_all(
            array(),"rank ASC"
        );
        $akn = $this->akn_model->get_all(
            array(),"rank ASC"
        );
        $infrastructure = $this->infrastructure_model->get_all(
            array(),"rank ASC"
        );
        $sms = $this->sms_model->get_all(
            array(),"rank ASC"
        );
        $internet = $this->internet_model->get_all(
            array(),"rank ASC"
        );
        $minute = $this->minute_model->get_all(
            array(),"rank ASC"
        );
        $taahhut = $this->taahhut_model->get_all(
            array(),"rank ASC"
        );
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
        $viewData->categories = $categories;
        $viewData->brands = $brands;
        $viewData->akn = $akn;
        $viewData->speed = $speed;
        $viewData->infrastructure = $infrastructure;
        $viewData->sms = $sms;
        $viewData->internet = $internet;
        $viewData->minute = $minute;
        $viewData->taahhut = $taahhut;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("product"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $category = $this->product_category_model->get(
            array(
                "isActive" => 1,
                "id" => $this->input->post("category_id")
            )
        );
        $brand = $this->brand_model->get(
            array(
                "isActive" => 1,
                "url" => $this->input->post("brand_url")
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->product_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "category_id" => $this->input->post("category_id"),
                    "category_title" => $category->title,
                    "category_url" => $category->url,
                    "brand_title"   => $brand->title,
                    "brand_url"   => $this->input->post("brand_url"),
                    "terms_of_use" => $this->input->post("terms_of_use"),
                    "user_agreement" => $this->input->post("user_agreement"),
                    "price" => $this->input->post("price"),
                    "price_2" => $this->input->post("price_2"),
                    "AKN" => $this->input->post("akn"),
                    "altyapi" => $this->input->post("infrastructure"),
                    "hiz" => $this->input->post("speed"),
                    "SMS" => $this->input->post("SMS"),
                    "dakika" => $this->input->post("dakika"),
                    "internet" => $this->input->post("internet"),
                    "taahhut" => $this->input->post("taahhut"),
                    "page_keyw" => $this->input->post("product_keyw"),
                    "page_desc" => $this->input->post("product_desc"),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "featured"      => 0,
                    "createdAt"     => date("Y-m-d H:i:s")
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
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("product"));
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
            redirect(base_url("product"));
        }
    	$viewData = new stdClass();
        $viewData->categories = $this->product_category_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $viewData->brands = $this->brand_model->get_all(
            array(
                "isActive" => 1
            ),"rank ASC"
        );
        $viewData->speed = $this->speed_model->get_all(
            array(),"rank ASC"
        );
        $viewData->akn = $this->akn_model->get_all(
            array(),"rank ASC"
        );
        $viewData->infrastructure = $this->infrastructure_model->get_all(
            array(),"rank ASC"
        );
        $viewData->sms = $this->sms_model->get_all(
            array(),"rank ASC"
        );
        $viewData->internet = $this->internet_model->get_all(
            array(),"rank ASC"
        );
        $viewData->minute = $this->minute_model->get_all(
            array(),"rank ASC"
        );
        $viewData->taahhut = $this->taahhut_model->get_all(
            array(),"rank ASC"
        );
    	$item = $this->product_model->get(
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
            redirect(base_url("product"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $category = $this->product_category_model->get(
            array(
                "isActive" => 1,
                "id" => $this->input->post("category_id")
            )
        );
        $brand = $this->brand_model->get(
            array(
                "isActive" => 1,
                "url" => $this->input->post("brand_url")
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->product_model->update(
            	array(
            		"id" => $id
            	),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "category_id" => $this->input->post("category_id"),
                    "category_title" => $category->title,
                    "category_url" => $category->url,
                    "brand_title"   => $brand->title,
                    "brand_url"   => $this->input->post("brand_url"),
                    "terms_of_use" => $this->input->post("terms_of_use"),
                    "user_agreement" => $this->input->post("user_agreement"),
                    "price" => $this->input->post("price"),
                    "price_2" => $this->input->post("price_2"),
                    "AKN" => $this->input->post("akn"),
                    "altyapi" => $this->input->post("infrastructure"),
                    "hiz" => $this->input->post("speed"),
                    "SMS" => $this->input->post("SMS"),
                    "dakika" => $this->input->post("dakika"),
                    "internet" => $this->input->post("internet"),
                    "taahhut" => $this->input->post("taahhut"),
                    "page_keyw" => $this->input->post("product_keyw"),
                    "page_desc" => $this->input->post("product_desc"),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "featured"      => 0,
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu.",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("product"));
        } else {
        	$item = $this->product_model->get(
    			array(
    				"id"=>$id
    			)
    		);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
    		$viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("product"));
        }
    	$delete = $this->product_model->delete(
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
        redirect(base_url("product"));
    }
    public function imageDelete($id,$parent_id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("product"));
        }
        $delete = $this->product_image_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $rsil = getFileName($id);
            unlink("uploads/{$this->viewFolder}/$rsil");
            redirect(base_url("product/image_form/$parent_id"));
        }else{
            redirect(base_url("product/image_form/$parent_id"));
        }
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("product"));
        }
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->product_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }
    public function featuredSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("product"));
        }
    	if ($id) {
    		$featured = ($this->input->post("data") === "true") ? 1 : 0;
    		$this->product_model->update(
    			array(
    				"id" => $id
    			),
    			array(
    				"featured" => $featured
    			)
    		);
    	}
    }
    public function imageIsActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("product"));
        }
        if ($id) {
            $imageIsActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->product_image_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $imageIsActive
                )
            );
        }
    }
    public function rankSetter(){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("product"));
        }
    	$data = $this->input->post("data");
    	parse_str($data,$order);
    	$items = $order["ord"];
    	foreach ($items as $rank => $id) {
    		$this->product_model->update(
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
    public function imageRankSetter(){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("product"));
        }
        $data = $this->input->post("data");
        parse_str($data,$order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->product_image_model->update(
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
    public function image_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            ),"rank ASC"
        );
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

    }
    public function image_upload($id){
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
        $image_103x119 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",103,119, $file_name);
        $image_200x170 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",200,170, $file_name);
        $image_170x60 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder",170,60, $file_name);
        if($image_200x170 && $image_103x119 && $image_170x60){
            $this->product_image_model->add(
                array(
                    "img_url" => $file_name,
                    "rank" => 0,
                    "isActive" => 1,
                    "isCover" => 0,
                    "createdAt" => date("Y-m-d H:i:s"),
                    "product_id" => $id
                )
            );
        }else{
            echo "basarısız";
        }
    }
    public function refresh_image_list($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            )
        );
        $render_html = $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v",$viewData,true);
        echo $render_html;
    }
    public function isCoverSetter($id,$parent_id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("product"));
        }
        if ($id && $parent_id) {
            $isCover = ($this->input->post("data") === "true") ? 1 : 0;
            $this->product_image_model->update(
                array(
                    "id" => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );

            $this->product_image_model->update(
                array(
                    "id !=" => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";
            $viewData->item_images = $this->product_image_model->get_all(
                array(
                    "product_id" => $parent_id
                ),"rank ASC"
            );
            $render_html = $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v",$viewData,true);
            echo $render_html;
        }
    }
    public function upload_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "file";
        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->item_files = $this->product_file_model->get_all(
            array(
                "product_id" => $id
            ),"rank ASC"
        );
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function file_upload($id, $url){
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "*";
        $config["upload_path"]   = "uploads/$this->viewFolder/files/$url/";
        $config["file_name"]     = $file_name;
        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("file");
        if($upload){
            $uploaded_file = $this->upload->data("file_name");
            $this->product_file_model->add(
                array(
                    "url"           => $uploaded_file,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "product_id"    => $id
                )
            );
        }
        else{
            echo $this->upload->display_errors();
        }
    }
    public function refresh_file_list($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "file";
        $viewData->item_files = $this->product_files_model->get_all(
            array(
                "product_id" => $id
            )
        );
        $render_html = $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list_v",$viewData,true);
        echo $render_html;
    }
    public function fileRankSetter(){
        $data = $this->input->post("data");
        parse_str($data,$order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->product_file_model->update(
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
    public function fileIsActiveSetter($id){
        if ($id) {
            $fileIsActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->product_file_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $fileIsActive
                )
            );
        }
    }
    public function price_list($id){
        $viewData = new stdClass();
        $items = $this->product_price_model->get_all(
            array(
                "product_id" => $id
            ),"rank ASC"
        );
        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "price_list";
        $viewData->items = $items;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function price_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "price";
        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            )
        );
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function price_save($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("price_title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->product_price_model->add(
                array(
                    "price_title" => $this->input->post("price_title"),
                    "price" => $this->input->post("price"),
                    "product_id" => $id
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
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("product/price_list/$id"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "price";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function price_update_form($id,$product_id){
        $viewData = new stdClass();
        $item = $this->product_price_model->get(
            array(
                "id"=>$id
            )
        );
        $viewData->item2 = $this->product_model->get(
            array(
                "id" => $product_id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "price_update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function price_update($id,$product_id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("price_title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->product_price_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "price_title" => $this->input->post("price_title"),
                    "price"   => $this->input->post("price"),
                    "product_id" => $product_id,
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu.",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("product/price_list/$product_id"));
        } else {
            $item = $this->product_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function price_delete($id,$product_id){
        $delete = $this->product_price_model->delete(
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
        redirect(base_url("product/price_list/$product_id"));
    }
    public function priceIsActiveSetter($id){
        if ($id) {
            $priceIsActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->product_price_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $priceIsActive
                )
            );
        }
    }
    public function priceRankSetter(){
        $data = $this->input->post("data");
        parse_str($data,$order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->product_price_model->update(
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