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

	function save($data){
		$this->db->insert($this->table,$data);
	}

	function get_by_id($id){
		$this->db->where($this->primary,$id);
		return $this->db->get($this->table)->row_array();
	}

	function update($id,$data){
		$this->db->where($this->primary,$id);
		$this->db->update($this->table,$data);
	}

	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
	}

	function fisik_by_kcp($id){
		$fisik=$this->db->query("select a.*, b.nama_fisik, c.nama_kcp, d.nama_cabang
				from fisik_kcp a 
				join fisik b on b.id_fisik=a.id_fisik
				join kcp c on c.id_kcp=a.id_kcp
				join cabang d on d.id_cabang=c.id_cabang
				where a.id_kcp='".$id."'")->result();

		return $fisik;
	}

	function save_fisik_by_kcp($data){
		$this->db->insert('fisik_kcp',$data);
	}

	function get_by_id_fisik($id){
		$this->db->where('id',$id);
		return $this->db->get('fisik_kcp')->row();
	}

	function update_by_kcp($id,$data){
		$this->db->where('id',$id);
		$this->db->update('fisik_kcp',$data);
	}

	function delete_by_kcp($id){
		$this->db->where('id',$id);
		$this->db->delete('fisik_kcp');	
	}
}