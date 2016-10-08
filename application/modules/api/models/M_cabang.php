<?php
class M_cabang extends CI_Model{
	private $table="cabang";
	private $primary="id_cabang";
	private $relasi="kanwil";
	private $key="kanwil.id_kanwil=cabang.id_kanwil";
	private $select='id_cabang,nama_cabang,kanwil.id_kanwil,nama_kanwil';

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);
		$this->db->join($this->relasi,$this->key);

		return $this->db->get()->result();
	}

	function save($data){
		$this->db->insert($this->table,$data);
	}

	function get_by_id($id){
		$this->db->select($this->select);
		$this->db->where($this->primary,$id);
		$this->db->join($this->relasi,$this->key);
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