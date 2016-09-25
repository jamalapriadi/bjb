<?php
class M_report extends CI_Model{
	private $table="report_kcp";
	private $primary="id";
	private $join="kcp";
	private $key="kcp.id_kcp=report_kcp.id_kcp";
	private $select="id,kcp.nama_kcp,index_nilai";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);
		$this->db->join($this->join,$this->key);

		return $this->db->get()->result();
	}
}