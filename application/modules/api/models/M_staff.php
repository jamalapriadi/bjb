<?php
class M_posisi extends CI_Model{
	private $table="staff";
	private $primary="id_posisi";
	private $select="id_posisi,nama_posisi";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}
}