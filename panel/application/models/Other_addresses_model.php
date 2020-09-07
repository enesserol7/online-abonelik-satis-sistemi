<?php
class Other_adresses_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "other_adresses";
	}
}