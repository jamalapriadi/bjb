<?php

class M_anggota extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}


	function tampil_anggota($num, $offset)
	{
		//untuk mengurutkan data
		$this->db->order_by('nama','ASC');

		//untuk mengambil semua data di table anggota
		$query = $this->db->get('anggota', $num, $offset);

		//untuk fetching data ke dalam bentu array.
		return $query->result();
	}


	function simpan_anggota($data)
	{
		$this->db->insert('anggota', $data);
	}


	function ambil_anggota($id)
	{
		$query = $this->db->get_where('anggota', array('id'=>$id));

		return $query->row();
	}


	function ubah_anggota($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('anggota', $data);
	}


	function hapus_anggota($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('anggota');
	}

//end of class	
}