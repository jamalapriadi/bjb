<?php
class M_parameter extends CI_Model{
	private $table="mcoa_kategori";
	private $primary="id_kategori";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}

	function get_by_posisi($id){
		$this->db->where('mcoa_kategori.id_posisi',$id);
		$this->db->where('mcoa_kategori.jenis','Mcoa');
		$this->db->join('posisi','posisi.id_posisi=mcoa_kategori.id_posisi');
		return $this->db->get($this->table)->result();
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
}