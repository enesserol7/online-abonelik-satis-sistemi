<?php
class Product_model extends CI_Model{
	public $tableName = "products";
	public function __construct(){
		parent::__construct();
	}
	public function get_all($where = array(), $order = "id ASC",$limit = array("count" => 0,"start" => 0)){

        $this->db->where($where)->order_by($order);
        if (!empty($limit)) {
            $this->db->limit($limit["count"],$limit["start"]);
        }
        return $this->db->get($this->tableName)->result();
    }
	public function add($data = array()){
		return $this->db->insert($this->tableName,$data);
	}
	public function get($where = array()){
		return $this->db->where($where)->get($this->tableName)->row();
	}
	public function update($where = array(),$data = array()){
		return $this->db->where($where)->update($this->tableName,$data);
	}
	public function delete($where = array()){
		return $this->db->where($where)->delete($this->tableName);
	}
	public function filter($where = array(), $order = "id ASC"){
		$this->db->where($where)->order_by($order);
		return $this->db->get($this->tableName)->result();
	}
	public function filterspeed($speed){
		$this->db->or_where_in('hiz', $speed);
		return $this->db->get($this->tableName)->result();
	}
	public function filterbrand($brand){
		$this->db->or_where_in('brand_url', $brand);
		return $this->db->get($this->tableName)->result();
	}
	public function filterakn($akn){
		$this->db->or_where_in('AKN', $akn);
		return $this->db->get($this->tableName)->result();
	}
	public function filter2($or_where_in = array()){
		$this->db->or_where_in($or_where_in);
		return $this->db->get($this->tableName)->result();
	}
}