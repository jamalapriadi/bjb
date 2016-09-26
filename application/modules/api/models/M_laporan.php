<?php
class M_laporan extends CI_Model{
	private $table="daftar_laporan";
	private $primary="id";
	private $select="id,nama,start_date,end_date";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}

	function daftar(){
		return $this->db->get($this->table)->result();
	}

	function saveDaftar($data){
		$this->db->insert($this->table,$data);
	}

	function daftar_by_id($id){
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->row_array();
	}

	function updateDaftar($id,$data){
		$this->db->where($this->primary,$id);
		$this->db->update($data);
	}

	function deleteDaftar($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);	
	}
}