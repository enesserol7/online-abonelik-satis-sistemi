<?php
class Product_file_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "product_file";
	}
}