<?php
class M_parameter extends CI_Model{
	private $table="mcoa_kategori";
	private $primary="id_kategori";

	function get(){
		$this->db->select($this->select);
		$this->db->from($this->table);

		return $this->db->get()->result();
	}

	function get_by_posisi($id,$jenis){
		$this->db->where('mcoa_kategori.id_posisi',$id);
		$this->db->where('mcoa_kategori.jenis',$jenis);
		$this->db->join('posisi','posisi.id_posisi=mcoa_kategori.id_posisi');
		return $this->db->get($this->table)->result();
	}

	function get_by_fisik($id,$jenis){
		$this->db->where('mcoa_kategori.id_fisik',$id);
		$this->db->where('mcoa_kategori.jenis',$jenis);
		$this->db->join('fisik','fisik.id_fisik=mcoa_kategori.id_fisik');
		return $this->db->get($this->table)->result();
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

	function save_parameter($data){
		if($data['jenis']=='Mcoa'){
			$param=$this->db->query("insert into parameter
				(id_kategori,id_posisi,gender,nama_parameter)
				values(
						'".$data['id_kategori']."',
						'".$data['id_posisi']."',
						'".$data['pria'].",".$data['wanita']."',
						'".$data['nama_parameter']."'
					)
				");

			$insert_id = $this->db->insert_id();

			foreach($data['pilihan'] as $row){
				$this->db->query("
						insert into detail_parameter (id_parameter,pilihan)
						values('".$insert_id."','".$row."')
					");
			}
		}else{
			foreach($data['nama_parameter'] as $row){
				$param=$this->db->query("insert into parameter
					(id_kategori,id_posisi,gender,nama_parameter)
					values(
							'".$data['id_kategori']."',
							'".$data['id_posisi']."',
							'".$data['pria'].",".$data['wanita']."',
							'".$row."'
						)
					");				
			}
		}
	}

	function save_fisik_parameter($data){
		if($data['jenis']=='Mcoa'){
			$param=$this->db->query("insert into parameter
				(id_kategori,id_fisik,nama_parameter)
				values(
						'".$data['id_kategori']."',
						'".$data['id_fisik']."',
						'".$data['nama_parameter']."'
					)
				");

			$insert_id = $this->db->insert_id();

			foreach($data['pilihan'] as $row){
				$this->db->query("
						insert into detail_parameter (id_parameter,pilihan)
						values('".$insert_id."','".$row."')
					");
			}
		}else{
			foreach($data['nama_parameter'] as $row){
				$param=$this->db->query("insert into parameter
					(id_kategori,id_fisik,nama_parameter)
					values(
							'".$data['id_kategori']."',
							'".$data['id_fisik']."',
							'".$row."'
						)
					");				
			}
		}
	}

	function parameter_by_id($id){
		$query=$this->db->query("select id_parameter,nama_parameter from parameter where id_parameter='".$id."'")->row();

		return $query;
	}

	function update_parameter_by_id($id,$data){
		$this->db->where('id_parameter',$id);
		$this->db->update('parameter',$data);
	}
}