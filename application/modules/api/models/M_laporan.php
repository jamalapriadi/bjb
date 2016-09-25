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
}