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

	function get_by_id($id){
		$this->db->where($this->primary,$id);
		$this->db->from($this->table);

		return $this->db->get()->row_array();	
	}

	function save($data){
		$this->db->insert($this->table,$data);
	}

	function update($id,$data){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$data);
	}

	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}

	function top_kcp(){
		$data=$this->db->query("select a.*, b.nama_kcp, b.alamat_kcp from report_kcp a
			left join kcp b on b.id_kcp=a.id_kcp
			where a.id_daftar_laporan='".$this->session->kunjungan['id']."'
			order by a.index_nilai desc
			limit 10")->result();

		return $data;
	}
}