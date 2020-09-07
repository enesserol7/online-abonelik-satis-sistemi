<?php
class Sample_box_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "sample_box";
	}
}