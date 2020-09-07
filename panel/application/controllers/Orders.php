<?php
class Orders extends MY_Controller{
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "orders_v";
        $this->load->model("orders_model");
        $this->load->model("product_model");
        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $viewData = new stdClass();
        $items = $this->orders_model->get_all(
            array()
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function view_form($id){
        $viewData = new stdClass();
        $order = $this->orders_model->get(
            array(
                "id"    => $id,
            )
        );
        $product = $this->product_model->get(
            array(
                "id"    => $order->product_id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "view";
        $viewData->order = $order;
        $viewData->product = $product;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    /*public function save(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri", "required|trim");
        $this->form_validation->set_rules("finishedAt", "Bitiş Tarihi", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->offer_requets->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "client" => $this->input->post("client"),
                    "finishedAt" => $this->input->post("finishedAt"),
                    "category_id" => $this->input->post("category_id"),
                    "place" => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("customers"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        $viewData = new stdClass();
        $viewData->categories = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $item = $this->offer_requets->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri", "required|trim");
        $this->form_validation->set_rules("finishedAt", "Bitiş Tarihi", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->offer_requets->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "client" => $this->input->post("client"),
                    "finishedAt" => $this->input->post("finishedAt"),
                    "category_id" => $this->input->post("category_id"),
                    "place" => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url")
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("customers"));
        } else {
            $viewData = new stdClass();
            $item = $this->offer_requets->get(
                array(
                    "id"    => $id,
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $viewData->categories = $this->portfolio_category_model->get_all(
                array(
                    "isActive" => 1
                )
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }*/
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("orders"));
        }
        $delete = $this->orders_model->delete(
            array(
                "id"    => $id
            )
        );
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("orders"));
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("orders"));
        }
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->orders_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function statusSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("orders"));
        }
        if($id){
            $status = ($this->input->post("data") === "true") ? 1 : 0;
            $this->orders_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "status"  => $status
                )
            );
        }
    }
}