<?php
class Information_page_model extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->tableName = "information_pages";
    }
}