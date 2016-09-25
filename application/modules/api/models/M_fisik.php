<?php
class M_fisik extends CI_Model{
	private $table="fisik";
	private $primary="id_fisik";
	private $select="id_fisik,nama_fisik";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}
}