<?php
class M_report extends CI_Model{
	private $table="report_kcp";
	private $primary="id";
	private $join="kcp";
	private $key="kcp.id_kcp=report_kcp.id_kcp";
	private $select="id,cabang.nama_cabang,kcp.nama_kcp,index_nilai";

	function get(){
		$this->db->select('kcp.id_kcp,nama_kcp,cabang.nama_cabang,report_kcp.index_nilai');
		$this->db->from('kcp');
		$this->db->join('cabang','cabang.id_cabang=kcp.id_cabang','left');
		$this->db->join('report_kcp','kcp.id_kcp=report_kcp.id_kcp','left');

		return $this->db->get()->result();
	}
}