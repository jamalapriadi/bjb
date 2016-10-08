<?php
class M_posisi extends CI_Model{
	private $table="posisi";
	private $primary="id_posisi";
	private $select="id_posisi,nama_posisi";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}

	function save($data){
		$this->db->insert($this->table,$data);
	}

	function get_by_id($id){
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->row_array();
	}

	function update($id,$data){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$data);
	}

	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}

	function get_fisik_by_id($id){
		$this->db->where('id_fisik',$id);
		return $this->db->get('fisik')->row_array();
	}
}