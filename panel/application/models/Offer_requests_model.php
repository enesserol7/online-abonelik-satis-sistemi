<?php
class Offer_requests_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "offer_requests";
	}
}