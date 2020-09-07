<?php
function convertToSEO($text){
    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"","/", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}", "&");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}
function getFileName($id){
	$ci =& get_instance();
	$ci->load->model("product_image_model");
	$fileName = $ci->product_image_model->get(
        array(
            "id" => $id
        )
    );
    return $fileName->img_url;
}
function get_product_cover_image($product_id){
    $t = &get_instance();
    $t->load->model("product_image_model");
    $cover_image = $t->product_image_model->get(
        array(
            "isCover"       => 1,
            "product_id"    => $product_id
        )
    );
    if(empty($cover_image)){
        $cover_image = $t->product_image_model->get(
            array(
                "product_id"    => $product_id
            )
        );
    }
    return !empty($cover_image) ? $cover_image->img_url : "";
}
function get_readable_date($date){
    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}
function get_active_user(){
    $t = &get_instance();
    $customer = $t->session->userdata("customer");
    if ($customer) {
        return $customer;
    }else{
        return false;
    }
}
function send_email($toEmail = "",$subject = "",$message = "",$brand = ""){
    $t = &get_instance();
    $t->load->model("emailsettings_model");
    if (empty($toEmail)) {
        $email_settings = $t->emailsettings_model->get(
        array(
            "isActive" => 1,
            "brand_name" => $brand
            )
        );
        $toEmail = $email_settings->to;
    }
    $config = array(
        "protocol" => $email_settings->protocol,
        "smtp_host" => $email_settings->host,
        "smtp_port" => $email_settings->port,
        "smtp_user" => $email_settings->user,
        "smtp_pass" => $email_settings->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );
    $t->load->library("email",$config);
    $t->email->from($email_settings->from,$email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}
function get_settings(){
    $t = &get_instance();
    $t->load->model("settings_model");
    if ($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    }else{
        $settings = $t->settings_model->get();
        if (!$settings) {
            $settings = new stdClass();
            $settings->company_name = "CMS";
            $settings->logo = "default";
        }
        $t->session->set_userdata("settings",$settings);
    }
    return $settings;
}
function get_category_title($category_id = 0){
    $t = &get_instance();
    $t->load->model("portfolio_category_model");
    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category) {
        return $category->title;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_product_category_title($id){
    $t = &get_instance();
    $t->load->model("product_category_model");
    $product = $t->product_category_model->get(
        array(
            "id" => $id
        )
    );
    return (empty($product)) ? false : $product->title;
}
function getProductName($id){
    $ci =& get_instance();
    $ci->load->model("product_model");
    $productName = $ci->product_model->get(
        array(
            "id" => $id
        )
    );
    return $productName->title;
}
//$_FILES["img_url"]["tmp_name"]
//100,200
//uploads/$t->viewFolder/deneme.png
function upload_picture($file,$uploadPath,$width,$height,$name){
    $t = &get_instance();
    $t->load->library("simpleimagelib");
    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }
    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();
        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);
    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }
    if ($upload_error) {
        echo $error;
    }else{
        return true;
    }
}
function get_picture($path = "", $picture = "", $resolution = "50x50"){
    if($picture != ""){
        if(file_exists(FCPATH . "panel/uploads/$path/$resolution/$picture")){
            $picture = base_url("panel/uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("assets/images/default_image_$resolution.png");
        }
    } else {
        $picture = base_url("assets/images/default_image_$resolution.png");
    }
    return $picture;
}
function get_page_list($page){
    $page_list = array(
        "home_v"                => "Anasayfa",
        "about_v"               => "Hakkımızda Sayfası",
        "news_list_v"           => "Haberler Sayfası",
        "galleries"             => "Galeri Sayfası",
        "portfolio_list_v"      => "Portfolyo Sayfası",
        "reference_list_v"      => "Referanslar Sayfası",
        "service_list_v"        => "Hizmetler Sayfası",
        "course_list_v"         => "Eğitimler Sayfası",
        "brand_list_v"          => "Markalar Sayfası",
        "contact_v"             => "İletişim Sayfası",
    );
    return (empty($page)) ? $page_list : $page_list[$page];
}