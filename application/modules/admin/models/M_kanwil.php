<?php
class M_kanwil extends CI_Model{
	private $table="kanwil";
	private $primary="id_kanwil";
	private $relasi="kanpus";
	private $key="kanpus.id_kanpus=kanwil.id_kanpus";

	function get(){
		$this->db->select('id_kanwil,nama_kanwil,kanwil.id_kanpus,nama_kanpus');
		$this->db->from($this->table);
		$this->db->join($this->relasi,$this->key);

		return $this->db->get()->result();
	}
}