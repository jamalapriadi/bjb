<?php
class M_kcp extends CI_Model{
	private $table="kcp";
	private $primary="id_kcp";
	private $relasi="cabang";
	private $key="cabang.id_cabang=kcp.id_cabang";
	private $select="id_kcp,kcp.id_cabang,cabang.nama_cabang,nama_kcp,
	alamat_kcp,telp_kcp,fax_kcp,foto_kcp";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);
		$this->db->join($this->relasi,$this->key);

		return $this->db->get()->result();
	}
}