<?php 
class M_mcoa extends CI_Model{
	private $table="mcoa_kategori";
	private $primary="id_kategori";

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

	/*
	function get_by_posisi($id){
		$this->db->where('mcoa_kategori.id_posisi',$id);
		$this->db->join('posisi','posisi.id_posisi=mcoa_kategori.id_posisi');
		return $this->db->get($this->table)->result();
	}
	*/
}