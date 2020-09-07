<?php
class Job_application_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->tableName = "job_application";
	}
}