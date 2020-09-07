<?php
class Product_price_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "product_prices";
	}
}