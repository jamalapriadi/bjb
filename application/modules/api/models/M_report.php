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

	function report_staff_kcp($id){
		$report=$this->db->query("select a.id_staff, a.id_kcp, b.nama_kcp, c.nama_cabang,a.id_posisi, d.nama_posisi, a.nama_staff 
			from staff a
			join kcp b on b.id_kcp=a.id_kcp
			join cabang c on c.id_cabang=b.id_cabang
			join posisi d on d.id_posisi=a.id_posisi
			where a.id_kcp='".$id."'")->result();

		$hasil=array();

		foreach($report as $row){
			$hasil[]=array(
					'id_staff'=>$row->id_staff,
					'id_kcp'=>$row->id_kcp,
					'nama_kcp'=>$row->nama_kcp,
					'nama_cabang'=>$row->nama_cabang,
					'id_posisi'=>$row->id_posisi,
					'nama_posisi'=>$row->nama_posisi,
					'nama_staff'=>$row->nama_staff,
					'nilai'=>$this->nilai_report_staff_kcp($row->id_kcp,$row->id_staff)
				);
		}

		return $hasil;
	}

	function report_fisik_kcp($id){
		$report=$this->db->query("select a.id_fisik, b.id_kcp,a.nama_fisik, c.nama_kcp , d.nama_cabang
				from fisik a
				join fisik_kcp b on b.id_fisik=a.id_fisik and b.id_kcp='".$id."'
				join kcp c on c.id_kcp=b.id_kcp and c.id_kcp='".$id."'
				join cabang d on d.id_cabang=c.id_cabang")->result();

		$hasil=array();

		foreach($report as $row){
			$hasil[]=array(
					'id_fisik'=>$row->id_fisik,
					'id_kcp'=>$row->id_kcp,
					'nama_fisik'=>$row->nama_fisik,
					'nama_kcp'=>$row->nama_kcp,
					'nama_cabang'=>$row->nama_cabang,
					'nilai'=>$this->nilai_report_fisik_kcp($row->id_kcp,$row->id_fisik)
				);
		}

		return $hasil;
	}

	function nilai_report_staff_kcp($kcp,$staff){
		$idkunjungan=$this->session->kunjungan['id'];

		$nilai=$this->db->query("SELECT a.index_nilai from laporan_staff_or_fisik a 
				where a.id_kcp='".$kcp."'
				and a.id_staff='".$staff."'
				and a.id_daftar_laporan='".$idkunjungan."'")->row();

		if(count($nilai)>0){
			return $nilai->index_nilai;
		}else{
			return null;
		}
	}

	function nilai_report_fisik_kcp($kcp,$fisik){
		$idkunjungan=$this->session->kunjungan['id'];

		$nilai=$this->db->query("SELECT a.index_nilai from laporan_staff_or_fisik a 
				where a.id_kcp='".$kcp."'
				and a.id_fisik='".$fisik."'
				and a.id_daftar_laporan='".$idkunjungan."'")->row();

		if(count($nilai)>0){
			return $nilai->index_nilai;
		}else{
			return null;
		}
	}

	function report_by_kcp($id){
		$idkunjungan=$this->session->kunjungan['id'];

		$data=$this->db->query("select a.id_kcp,a.id_cabang,a.nama_kcp, a.alamat_kcp,a.telp_kcp,b.nama_cabang, c.index_nilai from kcp a
			join cabang b on b.id_cabang=a.id_cabang
			left join report_kcp c on c.id_kcp=a.id_kcp AND c.id_daftar_laporan='".$idkunjungan."'
			where a.id_kcp='".$id."'");

		return $data->row();
	}

	function cek_report_by_kcp($kcp,$idkunjungan){
		$data=$this->db->query("select * from report_kcp
			where id_kcp='".$kcp."' and id_daftar_laporan='".$idkunjungan."'");

		return $data;
	}

	function update_report_by_kcp($kcp,$nilai){
		$idkunjungan=$this->session->kunjungan['id'];

		$this->db->query("update report_kcp set index_nilai='".$nilai."'
			where id_kcp='".$kcp."' and id_daftar_laporan='".$idkunjungan."'");
	}

	function save_report_by_kcp($data){
		$this->db->insert('report_kcp',$data);

		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}

	function file_report_by_kcp($id){
		$this->db->where('id_report_kcp',$id);
		return $this->db->get('file_report_kcp')->result();
	}

	function delete_file_report_kcp($id){
		$this->db->where('id',$id);
		$this->db->delete('file_report_kcp');
	}

	function report_staff_by_person($id){
		$staff=$this->db->query("SELECT a.*, b.nama_kcp, c.nama_posisi, d.index_nilai from staff a 
				join kcp b on b.id_kcp=a.id_kcp
				join posisi c on c.id_posisi=a.id_posisi
				left join laporan_staff_or_fisik d on d.id_staff=a.id_staff
				where a.id_staff='".$id."'")->row();

		$data=array(
				'id_staff'=>$staff->id_staff,
				'id_kcp'=>$staff->id_kcp,
				'id_posisi'=>$staff->id_posisi,
				'nama_staff'=>$staff->nama_staff,
				'gender'=>$staff->gender,
				'nama_kcp'=>$staff->nama_kcp,
				'nama_posisi'=>$staff->nama_posisi,
				'nilai'=>$staff->index_nilai,
				'kategori'=>$this->report_detail_posisi_kategori($staff->id_posisi),
				'mcoa'=>$this->report_detail_posisi_mcoa($staff->id_posisi)
			);

		return $data;
	}

	function report_detail_posisi_mcoa($id){
		$query=$this->db->query("SELECT * FROM mcoa_kategori where id_posisi='".$id."' and jenis='Mcoa'")->result();

		if(count($query)>0){
			$data=array();
			foreach($query as $row){
				$data[]=array(
						'id_kategori'=>$row->id_kategori,
						'nama_kategori'=>$row->nama_kategori,
						'parameter'=>$this->report_parameter_posisi_by_kategori($id,$row->id_kategori)
					);
			}

			return $data;
		}else{
			return NULL;
		}
	}

	function report_detail_parameter($id){
		$detail=$this->db->query("select * from detail_parameter where id_parameter='".$id."'")->result();

		if(count($detail)>0){
			return $detail;
		}else{
			return null;
		}
	}

	function report_detail_posisi_kategori($id){
		$query=$this->db->query("SELECT * FROM mcoa_kategori where id_posisi='".$id."' and jenis='Kategori'")->result();

		if(count($query)>0){
			$data=array();
			foreach($query as $row){
				$data[]=array(
						'id_kategori'=>$row->id_kategori,
						'nama_kategori'=>$row->nama_kategori,
						'parameter'=>$this->report_parameter_posisi_by_kategori($id,$row->id_kategori)
					);
			}

			return $data;
		}else{
			return NULL;
		}
	}

	function report_parameter_posisi_by_kategori($posisi,$kategori){
		$param=$this->db->query("select * from parameter where id_posisi='".$posisi."'
			and id_kategori='".$kategori."'")->result();

		if(count($param)>0){
			$data=array();

			foreach($param as $row){
				$data[]=array(
						'id_parameter'=>$row->id_parameter,
						'id_kategori'=>$row->id_kategori,
						'id_posisi'=>$row->id_posisi,
						'id_fisik'=>$row->id_fisik,
						'gender'=>$row->gender,
						'nama_parameter'=>$row->nama_parameter,
						'detail'=>$this->detail_parameter_by_id($row->id_parameter)
					);
			}

			return $data;
		}else{
			return null;
		}
	}

	function detail_parameter_by_id($id){
		$detail=$this->db->query("select * from detail_parameter where id_parameter='".$id."'")->result();

		if(count($detail)>0){
			return $detail;
		}else{
			return null;
		}
	}

	function report_fisik_by_kcp($fisik,$kcp){
		$fisik=$this->db->query("select a.*,b.nama_fisik,c.nama_kcp, d.index_nilai from fisik_kcp a 
				left join fisik b on b.id_fisik=a.id_fisik
				left join kcp c on c.id_kcp=a.id_kcp
				left join laporan_staff_or_fisik d on d.id_kcp=a.id_kcp and d.id_fisik=a.id_fisik
				where a.id_fisik='".$fisik."' and a.id_kcp='".$kcp."'")->row();

		$data=array(
				'id'=>$fisik->id,
				'id_fisik'=>$fisik->id_fisik,
				'id_kcp'=>$fisik->id_kcp,
				'nama_fisik'=>$fisik->nama_fisik,
				'nama_kcp'=>$fisik->nama_kcp,
				'nilai'=>$fisik->index_nilai,
				'kategori'=>$this->report_detail_fisik_kategori($fisik->id_fisik),
				'mcoa'=>$this->report_detail_fisik_mcoa($fisik->id_fisik)
			);

		return $data;
	}

	function report_detail_fisik_kategori($id){
		$query=$this->db->query("SELECT * FROM mcoa_kategori where id_fisik='".$id."' and jenis='Kategori'")->result();

		if(count($query)>0){
			$data=array();
			foreach($query as $row){
				$data[]=array(
						'id_kategori'=>$row->id_kategori,
						'nama_kategori'=>$row->nama_kategori,
						'parameter'=>$this->report_parameter_fisik_by_kategori($id,$row->id_kategori)
					);
			}

			return $data;
		}else{
			return NULL;
		}
	}

	function report_detail_fisik_mcoa($id){
		$query=$this->db->query("SELECT * FROM mcoa_kategori where id_fisik='".$id."' and jenis='Mcoa'")->result();

		if(count($query)>0){
			$data=array();
			foreach($query as $row){
				$data[]=array(
						'id_kategori'=>$row->id_kategori,
						'nama_kategori'=>$row->nama_kategori,
						'parameter'=>$this->report_parameter_fisik_by_kategori($id,$row->id_kategori)
					);
			}

			return $data;
		}else{
			return NULL;
		}
	}

	function report_parameter_fisik_by_kategori($fisik,$kategori){
		$param=$this->db->query("select * from parameter where id_fisik='".$fisik."'
			and id_kategori='".$kategori."'")->result();

		if(count($param)>0){
			$data=array();

			foreach($param as $row){
				$data[]=array(
						'id_parameter'=>$row->id_parameter,
						'id_kategori'=>$row->id_kategori,
						'id_posisi'=>$row->id_posisi,
						'id_fisik'=>$row->id_fisik,
						'gender'=>$row->gender,
						'nama_parameter'=>$row->nama_parameter,
						'detail'=>$this->detail_parameter_by_id($row->id_parameter)
					);
			}

			return $data;
		}else{
			return null;
		}
	}
}