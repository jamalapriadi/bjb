<?php
class M_staff extends CI_Model{
	private $table="staff";
	private $primary="id_posisi";
	private $select="id_posisi,nama_posisi";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}

	function get_by_kcp($id){
		$kcp=$this->db->query("SELECT a.id_kcp, a.nama_kcp ,b.nama_cabang, c.id_staff,
			c.nama_staff, d.nama_posisi from kcp a
			join cabang b on b.id_cabang=a.id_cabang
			join staff c on c.id_kcp=a.id_kcp
			join posisi d on d.id_posisi=c.id_posisi
			where a.id_kcp='".$id."'")->result();

		return $kcp;
	}

	function save($data){
		$this->db->insert($this->table,$data);
	}

	function get_by_id($id){
		$staff=$this->db->query("select a.id_staff,a.nama_staff,a.id_kcp,a.id_posisi,a.gender,a.foto, b.nama_kcp, c.nama_posisi, d.nama_cabang
			from staff a
			join kcp b on b.id_kcp=a.id_kcp
			join posisi c on c.id_posisi=a.id_posisi
			join cabang d on d.id_cabang=b.id_cabang

			where a.id_staff='".$id."'")->row();

		return $staff;
	}

	function update($id,$data){
		$this->db->where('id_staff',$id);
		$this->db->update($this->table,$data);
	}

	function delete($id){
		$this->db->where('id_staff',$id);
		$this->db->delete($this->table);
	}
}