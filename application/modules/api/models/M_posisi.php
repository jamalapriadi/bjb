<?php
class M_posisi extends CI_Model{
	private $table="posisi";
	private $primary="id_posisi";
	private $select="id_posisi,nama_posisi";

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

	function get_fisik_by_id($id){
		$this->db->where('id_fisik',$id);
		return $this->db->get('fisik')->row_array();
	}

	function top_posisi(){
		$posisi=$this->db->query("select * from posisi")->result();

		$data=array();
		$no=0;
		foreach($posisi as $row){
			$no++;
			if($no==1){
				$class="active";
				$kcp=$this->top_kcp_by_posisi($row->id_posisi);
			}else{
				$class="";
				$kcp="";
			}

			$data[]=array(
				'id'=>$row->id_posisi,
				'nama_posisi'=>$row->nama_posisi,
				'class'=>$class,
				'kcp'=>$kcp
			);
		}

		return $data;
	}

	function top_kcp_by_posisi($id){
		$query=$this->db->query("SELECT a.id,a.id_kcp,a.id_staff,
					a.index_nilai, b.nama_staff, d.nama_posisi, c.nama_kcp,c.alamat_kcp 
					FROM laporan_staff_or_fisik a 
					left join staff b on b.id_staff=a.id_staff
					left join kcp c on c.id_kcp=b.id_kcp
					left join posisi d on d.id_posisi=b.id_posisi
					where a.id_daftar_laporan='".$this->session->kunjungan['id']."' 
					and a.id_staff is not null
					and b.id_posisi='".$id."'
					order by a.index_nilai desc limit 10")->result();
		return $query;
	}
}