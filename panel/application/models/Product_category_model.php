<?php
class Product_category_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "product_categories";
	}
}