<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "homepage";
        $this->load->model("product_category_model");
        $this->load->model("product_model");
        $this->load->model("application_email_model");
        $this->load->model("product_image_model");
        $this->load->model("page_model");
        $this->load->model("brand_model");
        $this->load->model("information_page_model");
        $this->load->model("slide_model");
        $this->load->model("news_model");
        $this->load->model("speed_model");
        $this->load->model("akn_model");
        $this->load->helper("text");
    }
    public function index(){
      $viewData = new stdClass();
      $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
      $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
      $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
      $products = $this->product_model->get_all(
        array(
            "isActive" => 1,
            "featured" => 1
        ), "rand()",array("start" => 0, "count" => 6)
    );
      $viewData->slides = $this->slide_model->get_all(
        array(
            "isActive" => 1
        ),"rank ASC"
    );
      $viewData->news = $this->news_model->get_all(
        array(
            "isActive" => 1
        ),"rand()",array("start" => 0, "count" => 3)
    );
      $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->products = $products;
      $viewData->categories = $categories;
      $viewData->navpages = $navpages;
      $viewData->page = "";
      $viewData->pagetitle = "Ana Sayfa";
      $viewData->pagekeyw = "";
      $viewData->pagedesc = "";
      $viewData->viewFolder = "home_v";
      $this->load->view($viewData->viewFolder,$viewData);
  }
  public function about_us(){
      $viewData = new stdClass();
      $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
      $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
      $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
      $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->categories = $categories;
      $viewData->navpages = $navpages;
      $viewData->page = "";
      $viewData->pagetitle = "Hakkımızda";
      $viewData->pagekeyw = "";
      $viewData->pagedesc = "";
      $viewData->viewFolder = "about_v";
      $this->load->view($viewData->viewFolder,$viewData);
  }
  public function contact_us(){
      $viewData = new stdClass();
      $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
      $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
      $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
      $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->categories = $categories;
      $viewData->navpages = $navpages;
      $viewData->page = "";
      $viewData->pagetitle = "İletişim";
      $viewData->pagekeyw = "";
      $viewData->pagedesc = "";
      $viewData->viewFolder = "contact_v";
      $this->load->view($viewData->viewFolder,$viewData);
  }
  public function products($url){
      $viewData = new stdClass();
      $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
      $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
      $viewData->speeds = $this->speed_model->get_all(
        array(),"rank ASC",array()
    );
      $viewData->akn = $this->akn_model->get_all(
        array(),"rank ASC",array()
    );
      $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
      $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
      $brand = $this->input->post("brand");
      $speed = $this->input->post("speed");
      $akn = $this->input->post("akn");
      if ($brand == "" && $speed == "" && $akn == "") {
        $products = $this->product_model->get_all(
            array(
                "isActive" => 1,
                "category_url" => $url
            ), "rank ASC",array()
        );
    }
    if(!empty($speed) && !empty($brand) && !empty($akn)){
        $speeddata =implode(",",$speed); 
        $branddata =implode(",",$brand); 
        $akndata =implode(",",$akn); 
        //$products = $this->db->or_where_in("brand_url",$brand)->or_where_in("hiz",$speed)->get("products")->result();
        $products = $this->product_model->filter(
            array("hiz" => $speeddata,"brand_url" => $branddata,"AKN" => $akndata), "rank ASC"
        );
    }else if(!empty($brand) && !empty($akn)){
        $branddata =implode(",",$brand);
        $akndata =implode(",",$akn);
        $products = $this->product_model->filter(
            array("brand_url" => $branddata,"AKN" => $akndata), "rank ASC"
        );
    }else if(!empty($brand) && !empty($speed)){
        $speeddata =implode(",",$speed);
        $branddata =implode(",",$brand); 
        $products = $this->product_model->filter(
            array("hiz" => $speeddata,"brand_url" => $branddata), "rank ASC"
        );
    }else if(!empty($akn) && !empty($speed)){
        $speeddata =implode(",",$speed);
        $akndata =implode(",",$akn); 
        $products = $this->product_model->filter(
            array("hiz" => $speeddata,"AKN" => $akndata), "rank ASC"
        );
    }else if(!empty($akn)){
        $akndata =implode(",",$akn); 
        $products = $this->product_model->filterakn($akn);
    }else if(!empty($speed)){
        $speeddata =implode(",",$speed);
        $products = $this->product_model->filterspeed($speed);
    }else if(!empty($brand)){
        $branddata =implode(",",$brand); 
        $products = $this->product_model->filterbrand($brand);
    }
    $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $category = $this->product_category_model->get(
        array(
            "isActive" => 1,
            "url" => $url
        )
    );
    $viewData->products = $products;
    $viewData->page = "";
    $viewData->pagetitle = $category->title;
    $viewData->pagekeyw = $category->category_keyw;
    $viewData->pagedesc = $category->category_desc;
    $viewData->categories = $categories;
    $viewData->navpages = $navpages;
    $viewData->viewFolder = "products_v";
    $this->load->view($viewData->viewFolder,$viewData);
}
public function brands($url){
    $viewData = new stdClass();
    $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
    $viewData->speeds = $this->speed_model->get_all(
        array(),"rank ASC",array()
    );
    $viewData->akn = $this->akn_model->get_all(
        array(),"rank ASC",array()
    );
    $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
    $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
    $brand = $this->input->post("brand");
    $speed = $this->input->post("speed");
    $akn = $this->input->post("akn");
    if ($brand == "" && $speed == "" && $akn == "") {
        $products = $this->product_model->get_all(
            array(
                "isActive" => 1,
                "brand_url" => $url
            ), "rank ASC",array()
        );
    }
    if(!empty($speed) && !empty($brand) && !empty($akn)){
        $speeddata =implode(",",$speed); 
        $branddata =implode(",",$brand); 
        $akndata =implode(",",$akn); 
        //$products = $this->db->or_where_in("brand_url",$brand)->or_where_in("hiz",$speed)->get("products")->result();
        $products = $this->product_model->filter(
            array("hiz" => $speeddata,"brand_url" => $branddata,"AKN" => $akndata), "rank ASC"
        );
    }else if(!empty($brand) && !empty($akn)){
        $branddata =implode(",",$brand);
        $akndata =implode(",",$akn);
        $products = $this->product_model->filter(
            array("brand_url" => $branddata,"AKN" => $akndata), "rank ASC"
        );
    }else if(!empty($brand) && !empty($speed)){
        $speeddata =implode(",",$speed);
        $branddata =implode(",",$brand); 
        $products = $this->product_model->filter(
            array("hiz" => $speeddata,"brand_url" => $branddata), "rank ASC"
        );
    }else if(!empty($akn) && !empty($speed)){
        $speeddata =implode(",",$speed);
        $akndata =implode(",",$akn); 
        $products = $this->product_model->filter(
            array("hiz" => $speeddata,"AKN" => $akndata), "rank ASC"
        );
    }else if(!empty($akn)){
        $akndata =implode(",",$akn); 
        $products = $this->product_model->filterakn($akn);
    }else if(!empty($speed)){
        $speeddata =implode(",",$speed);
        $products = $this->product_model->filterspeed(
            array(
                "brand_url" => $url
            ), $speed
        );
    }else if(!empty($brand)){
        $branddata =implode(",",$brand); 
        $products = $this->product_model->filterbrand($brand);
    }
    $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $brand = $this->brand_model->get(
        array(
            "isActive" => 1,
            "url" => $url
        )
    );
    $viewData->products = $products;
    $viewData->page = "";
    $viewData->pagetitle = $brand->title;
    $viewData->pagekeyw = $brand->keyw;
    $viewData->pagedesc = $brand->desc;
    $viewData->categories = $categories;
    $viewData->navpages = $navpages;
    $viewData->viewFolder = "brands_v";
    $this->load->view($viewData->viewFolder,$viewData);
}
public function productDetail($category,$url){
  $viewData = new stdClass();
  $categories = $this->product_category_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $navpages = $this->page_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->brands = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array()
);
  $viewData->brands1 = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array("start" => 0, "count" => 6)
);
  $viewData->brands2 = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array("start" => 6, "count" => 6)
);
  $page = $this->product_model->get(
    array(
        "isActive" => 1,
        "url" => $url
    )
);
  $viewData->page = $page;
  $viewData->product_images = $this->product_image_model->get_all(
    array(
        "isActive" => 1,
        "product_id" => $viewData->page->id
    ),"rank ASC"
);
  $viewData->other_products = $this->product_model->get_all(
    array(
        "isActive" => 1,
        "id !=" => $viewData->page->id,
        "category_id" => $viewData->page->category_id
    ),"rand()", array("start" => 0, "count" => 3)
);
  $viewData->informationPages = $this->information_page_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->pagetitle = "";
  $viewData->pagekeyw = "";
  $viewData->pagedesc = "";
  $viewData->categories = $categories;
  $viewData->navpages = $navpages;
  $viewData->viewFolder = "productDetail_v";
  $this->load->view($viewData->viewFolder,$viewData);
}
public function informationPages($url){
    $viewData = new stdClass();
    $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
    $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
    $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
    $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $viewData->informationPage = $this->information_page_model->get(
        array(
            "isActive" => 1,
            "url" => $url
        )
    );
    $viewData->categories = $categories;
    $viewData->navpages = $navpages;
    $viewData->page = "";
    $viewData->pagetitle = $viewData->informationPage->title;
    $viewData->pagekeyw = "";
    $viewData->pagedesc = "";
    $viewData->viewFolder = "informationPage_v";
    $this->load->view($viewData->viewFolder,$viewData);
}
public function pages($url){
    $viewData = new stdClass();
    $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
    $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
    $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
    $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $viewData->page = $this->page_model->get(
        array(
            "isActive" => 1,
            "url" => $url
        )
    );
    $viewData->categories = $categories;
    $viewData->navpages = $navpages;
    $viewData->pagetitle = "";
    $viewData->pagekeyw = "";
    $viewData->pagedesc = "";
    $viewData->viewFolder = "page_v";
    $this->load->view($viewData->viewFolder,$viewData);
}
public function applyImmediately($url){
    $viewData = new stdClass();
    $categories = $this->product_category_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $navpages = $this->page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $page = $this->product_model->get(
        array(
            "isActive" => 1,
            "url" => $url
        )
    );
    $viewData->brands = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array()
    );
    $viewData->brands1 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 0, "count" => 6)
    );
    $viewData->brands2 = $this->brand_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC",array("start" => 6, "count" => 6)
    );
    $viewData->page = $page;
    $viewData->product_images = $this->product_image_model->get_all(
        array(
            "isActive" => 1,
            "product_id" => $viewData->page->id
        ),"rank ASC"
    );
    $viewData->informationPages = $this->information_page_model->get_all(
        array(
            "isActive" => 1
        ), "rank ASC"
    );
    $viewData->categories = $categories;
    $viewData->navpages = $navpages;
    $viewData->viewFolder = "applyImmediately_v";
    $this->load->view($viewData->viewFolder,$viewData);
}
public function blog(){
  $viewData = new stdClass();
  $categories = $this->product_category_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $navpages = $this->page_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->brands = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array()
);
  $viewData->brands1 = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array("start" => 0, "count" => 6)
);
  $viewData->brands2 = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array("start" => 6, "count" => 6)
);
  $viewData->informationPages = $this->information_page_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->news = $this->news_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->categories = $categories;
  $viewData->navpages = $navpages;
  $viewData->page = "";
  $viewData->pagetitle = "Blog";
  $viewData->pagekeyw = "";
  $viewData->pagedesc = "";
  $viewData->viewFolder = "blog_v";
  $this->load->view($viewData->viewFolder,$viewData);
}
public function blogDetail($url){
  $viewData = new stdClass();
  $categories = $this->product_category_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $navpages = $this->page_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->brands = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array()
);
  $viewData->brands1 = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array("start" => 0, "count" => 6)
);
  $viewData->brands2 = $this->brand_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC",array("start" => 6, "count" => 6)
);
  $viewData->informationPages = $this->information_page_model->get_all(
    array(
        "isActive" => 1
    ), "rank ASC"
);
  $viewData->page = $this->news_model->get(
    array(
        "isActive" => 1,
        "url" => $url
    )
);
  $viewData->other_news = $this->news_model->get_all(
    array(
        "isActive" => 1,
        "id !=" => $viewData->page->id
    ),"rand()", array("start" => 0, "count" => 4)
);
  $viewData->categories = $categories;
  $viewData->navpages = $navpages;
  $viewData->pagetitle = "";
  $viewData->pagekeyw = "";
  $viewData->pagedesc = "";
  $viewData->viewFolder = "blogDetail_v";
  $this->load->view($viewData->viewFolder,$viewData);
}
public function sendMail(){
    $this->load->model("email_model");
    $this->load->library("form_validation");
    $this->form_validation->set_rules("name","İsim","trim|required");
    $this->form_validation->set_rules("email","E-Posta","trim|required|valid_email");
    $this->form_validation->set_rules("subject","Konu","trim|required");
    $this->form_validation->set_rules("message","Mesaj","trim|required");
    if ($this->form_validation->run() === FALSE) {
        redirect($_SERVER['HTTP_REFERER']);
    }else{
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $subject = $this->input->post("subject");
        $message = $this->input->post("message");
        $brand = $this->input->post("brand");
        $email_message = "{$name} isimli ziyaretçi. Mesaj Bıraktı \n<br><b> Konu : </b> {$subject} \n<br><b><b> Mesaj : </b> {$message} \n<br><b> E-Posta : </b> {$email} \n<br><b> Telefon : </b> {$phone} \n<br>";
        if (send_email("","Site İletişim Mesajı | $subject",$email_message,$brand)){
            $insert = $this->email_model->add(
                array(
                    "subject"         => $subject,
                    "message"   => $message,
                    "email"       => $email,
                    "phone"       => $phone,
                    "full_name"     => $name,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            $alert = '<div class="quote">
            <blockquote>
            <div class="quote-inner">
            <div class="post-inner-content">
            <p>Teşekkürler</p>
            <p>Mesajınız alındı en kısa sürede tarafınıza dönüş yapılacaktır...</p>
            </div>
            </div>
            </blockquote>
            </div>';
        }else{
            $alert = '<div class="quote">
            <blockquote>
            <div class="quote-inner">
            <div class="post-inner-content">
            <p>Üzgünüz</p>
            <p>Mesajınız İletilemedi!! Daha Sonra Tekrar Deneyiniz...</p>
            </div>
            </div>
            </blockquote>
            </div>';
        }
    }
    $this->session->set_flashdata("alert",$alert);
    redirect($_SERVER['HTTP_REFERER']);
}
public function submitApplication(){
    $this->load->model("email_model");
    $this->load->library("form_validation");
    $this->form_validation->set_rules("name","İsim","trim|required");
    $this->form_validation->set_rules("email","E-Posta","trim|required|valid_email");
    $this->form_validation->set_rules("phone","Telefon","trim|required");
    if ($this->form_validation->run() === FALSE) {
        redirect($_SERVER['HTTP_REFERER']);
    }else{
        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $product_id = $this->input->post("product_id");
        $product_title = $this->input->post("product_title");
        $product_price = $this->input->post("product_price");
        $brand = $this->input->post("brand");
        $customer_city = $this->input->post("il");
        $customer_district = $this->input->post("ilce");
        $customer_address = $this->input->post("address");
        if ($this->input->post("AKN")) {
            $AKN = "<b> AKN : </b> {$this->input->post("AKN")}<br>";
        }else{
            $AKN = "";
        }
        if ($this->input->post("altyapi")) {
            $altyapi = "<b> Alt Yapı : </b> {$this->input->post("altyapi")}<br>";
        }else{
            $altyapi = "";
        }
        if ($this->input->post("hiz")) {
            $hiz = "<b> Hız : </b> {$this->input->post("hiz")}<br>";
        }else{
            $hiz = "";
        }
        if ($this->input->post("dakika")) {
            $dakika = "<b> Dakika : </b> {$this->input->post("dakika")}<br>";
        }else{
            $dakika = "";
        }
        if ($this->input->post("SMS")) {
            $SMS = "<b> SMS : </b> {$this->input->post("SMS")}<br>";
        }else{
            $SMS = "";
        }
        if ($this->input->post("internet")) {
            $internet = "<b> İnternet : </b> {$this->input->post("internet")}<br>";
        }else{
            $internet = "";
        }
        $email_message = "<b>{$name}</b> isimli ziyaretçi. Başvuru gönderdi \n<br><b> E-Posta : </b> {$email} \n<br><b> Telefon : </b> {$phone} \n<br><b> Başvurulan Ürün : </b> {$product_title} \n<br><b> Fiyat : </b> {$product_price} \n<br><b> İl : </b> {$customer_city} \n<br><b> İlçe : </b> {$customer_district} \n<br><b> Adres : </b> {$customer_address} \n<br> {$AKN} \n {$altyapi} \n {$hiz} \n {$dakika} \n {$SMS} \n {$internet}";
        if (send_email("","$brand | Başvuru Mesajı",$email_message,$brand)){
            $insert = $this->application_email_model->add(
                array(
                    "customer_email"  => $email,
                    "customer_phone"  => $phone,
                    "customer_name" => $name,
                    "product_id" => $product_id,
                    "product_title" => $product_title,
                    "product_price" => $product_price,
                    "brand" => $brand,
                    "customer_city" => $customer_city,
                    "customer_district" => $customer_district,
                    "customer_address" => $customer_address,
                    "AKN" => $AKN,
                    "altyapi" => $altyapi,
                    "hiz" => $hiz,
                    "dakika" => $dakika,
                    "SMS" => $SMS,
                    "internet" => $internet,
                    "isActive" => 1,
                    "status" => 0,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );
            $alert = '<div class="quote">
            <blockquote>
            <div class="quote-inner">
            <div class="post-inner-content">
            <p>Teşekkürler</p>
            <p>Başvurunuz alındı en kısa sürede tarafınıza dönüş yapılacaktır...</p>
            </div>
            </div>
            </blockquote>
            </div>';
        }else{
            $alert = '<div class="quote">
            <blockquote>
            <div class="quote-inner">
            <div class="post-inner-content">
            <p>Üzgünüz</p>
            <p>Başvuru İletilemedi!! Daha Sonra Tekrar Deneyiniz...</p>
            </div>
            </div>
            </blockquote>
            </div>';
        }
    }
    $this->session->set_flashdata("alert",$alert);
    redirect($_SERVER['HTTP_REFERER']);
}
}