<?php  defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller{
	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->library(array('datatables'));
        $this->load->model('M_kanwil','kanwil');
        $this->load->model('M_cabang','cabang');
        $this->load->model('M_kcp','kcp');
        $this->load->model('M_posisi','posisi');
        $this->load->model('M_fisik','fisik');
        $this->load->model('M_laporan','laporan');
        $this->load->model('M_report','report');
        $this->load->model('M_Parameter','parameter');
        $this->load->model('M_mcoa','mcoa');
        $this->load->model('M_staff','staff');

        $this->load->library(array('form_validation','ion_auth'));
        $this->load->helper('url');
    }

	function index_get(){
		$this->response('Api untuk BJB Syariah');
	}

	/* kanwil */
	function kanwil_get(){
		$data=$this->kanwil->get();

		$this->response($data);
	}

	function kanwil_post(){
	    $this->form_validation->set_data($this->post());
	    $this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
				'id_kanpus'=>1,
				'nama_kanwil'=>$this->post('nama')
			);

			$simpan=$this->kanwil->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');

		}else{
			$json=array('success'=>false,'pesan'=>'Tidak ada data');
		}

		$this->response($json, 200);
	}

	function kanwilDetail_get($id){
		$kanwil=$this->kanwil->get_by_id($id);

		$json=array(
				'success'=>true,
				'pesan'=>'Data Berhasil diload',
				'kanwil'=>$kanwil
			);

		$this->response($json,200);
	}

	function kanwil_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
				'nama_kanwil'=>$this->put('nama')
			);

			$this->kanwil->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate');
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal diupdate');
		}

     	$this->response($json, 200);  	
	}

	function kanwil_delete($id){
		$this->kanwil->delete($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json,200);
	}
	/* end of kanwil */

	/* cabang */
	function cabang_get(){
		$data=$this->cabang->get();

		$this->response($data);
	}

	function cabang_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kanwil','Kanwil','required');
	    $this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
				'id_kanwil'=>$this->post('kanwil'),
				'nama_cabang'=>$this->post('nama')
			);

			$simpan=$this->cabang->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');

		}else{
			$json=array('success'=>false,'pesan'=>'Tidak ada data');
		}

		$this->response($json, 200);
	}

	function cabangDetail_get($id){
		$cabang=$this->cabang->get_by_id($id);

		$json=array(
				'success'=>true,
				'pesan'=>'Data Berhasil diload',
				'cabang'=>$cabang
			);

		$this->response($json,200);
	}

	function cabang_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('kanwil','Kanwil','required');

		if($this->form_validation->run()==true){
			$data=array(
				'nama_cabang'=>$this->put('nama'),
				'id_kanwil'=>$this->put('kanwil')
			);

			$this->cabang->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate');
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal diupdate');
		}

     	$this->response($json, 200);  	
	}	

	function cabang_delete($id){
		$this->cabang->delete($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json,200);
	}
	/* end cabang */

	/* kcp */
	function kcp_get(){
		$data=$this->kcp->get();

		$this->response($data);
	}

	function save_report_staff_by_person_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kcp','Kcp','required');
		$this->form_validation->set_rules('staff','Staff','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('nilai','Nilai','required');

		if($this->form_validation->run()==true){
			$user = $this->ion_auth->user()->row();

			//cek dulu sudah ada atau belum
			$cek=$this->db->query("select * from laporan_staff_or_fisik
				where id_kcp='".$this->post('kcp')."'
				and id_staff='".$this->post('staff')."'
				and id_daftar_laporan='".$this->session->kunjungan['id']."'")->row();

			if(count($cek)>0){
				//update
				$updatereport=$this->db->query("update laporan_staff_or_fisik set index_nilai='".$this->post('nilai')."'
						where id='".$cek->id."'");

				$this->load->library('upload');

				//jika ada file
				if(!empty($_FILES['file']['name'])){
					$number_of_files_uploaded = count($_FILES['file']['name']);
				    
				    for ($i = 0; $i < $number_of_files_uploaded; $i++){
				    	$_FILES['userfile']['name']     = $_FILES['file']['name'][$i];
				      	$_FILES['userfile']['type']     = $_FILES['file']['type'][$i];
				      	$_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
				      	$_FILES['userfile']['error']    = $_FILES['file']['error'][$i];
				      	$_FILES['userfile']['size']     = $_FILES['file']['size'][$i];

				      	$config['upload_path']          = './uploads/file/';
						$config['allowed_types'] = 'gif|jpg|png';
				      	
				      	$this->upload->initialize($config);
				      	if(! $this->upload->do_upload()){
				      		$pesanfile=$this->upload->display_errors();
				      	}else{
				      		$data = $this->upload->data();
				      		$this->db->query("insert into file_report_kcp
									(id_report_kcp,type_file,nama_file,tipe,user_id)
									values('".$cek->id."','".$this->upload->file_type."','".$this->upload->file_name."',
									'File','".$user->id."')");
				      		$pesanfile="Berhasil diupload file";
				      	}
				    }
				}else{
					$pesanfile="Tidak ada file yang dipilih";
				}
				

				//jika ada video
			    $video['upload_path']          = './uploads/video/';
				$video['allowed_types']        = 'gif|jpg|png';
				$video['max_size']             = 100;
				$video['max_width']            = 1024;
				$video['max_height']           = 768;

				$this->upload->initialize($video);

				if ( $this->upload->do_upload('video')){
					$data=$this->upload->data();

					$savevideo=$this->db->query("insert into file_report_kcp 
						(id_report_kcp,type_file,nama_file,tipe,user_id)
						values('".$cek->id."','".$data['file_type']."','".$data['file_name']."',
						'Video','".$user->id."')");
					$pesanvideo="Video Berhasil diupload";
				}else{
					$pesanvideo=$this->upload->display_errors();
				}


				//jika ada misterycaller
				if(!empty($_FILES['fileMistery']['name'])){
					$number_of_files_uploaded = count($_FILES['fileMistery']['name']);
				    
				    for ($i = 0; $i < $number_of_files_uploaded; $i++){
				    	$_FILES['userfile']['name']     = $_FILES['fileMistery']['name'][$i];
				      	$_FILES['userfile']['type']     = $_FILES['fileMistery']['type'][$i];
				      	$_FILES['userfile']['tmp_name'] = $_FILES['fileMistery']['tmp_name'][$i];
				      	$_FILES['userfile']['error']    = $_FILES['fileMistery']['error'][$i];
				      	$_FILES['userfile']['size']     = $_FILES['fileMistery']['size'][$i];

				      	$config['upload_path']          = './uploads/mistery/';
						$config['allowed_types'] = 'gif|jpg|png';
				      	
				      	$this->upload->initialize($config);
				      	if(! $this->upload->do_upload()){
				      		$pesanmistery=$this->upload->display_errors();
				      	}else{
				      		$data = $this->upload->data();
				      		$this->db->query("insert into file_report_kcp
									(id_report_kcp,type_file,nama_file,tipe,user_id)
									values('".$cek->id."','".$this->upload->file_type."','".$this->upload->file_name."',
									'File Mistery','".$user->id."')");
				      		$pesanmistery="Berhasil diupload Mistery File";
				      	}
				    }
				}else{
					$pesanmistery="Tidak ada mistery file";
				}
				

				$json=array('success'=>true,
					'pesan'=>'Data Berhasil disimpan, Update',
					'video'=>$pesanvideo,
					'pesanfile'=>$pesanfile,
					'pesanMistery'=>$pesanmistery);
			}else{
				//insert new
				$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan, Insert new');
			}
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan, Data tidak lengkap');
		}

		$this->response($json);
	}

	function kcp_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('cabang','Cabang','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('fax','Fax','required');

		if($this->form_validation->run()==true){
			//jika ada file
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
	 
			$this->load->library('upload', $config);
	 
			if ( $this->upload->do_upload('file')){
				$file=$this->upload->file_name;
			}

			//end jika ada file
			$data=array(
					'id_cabang'=>$this->post('cabang'),
					'nama_kcp'=>$this->post('nama'),
					'alamat_kcp'=>$this->post('alamat'),
					'telp_kcp'=>$this->post('telp'),
					'fax_kcp'=>$this->post('fax'),
					'username'=>$this->post('username'),
					'password'=>md5($this->post('password')),
					'foto_kcp'=>$file
				);

			$this->kcp->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
			
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan, Data tidak lengkap');
		}

		$this->response($json);
	}

	function updateKcp_post(){
		$id=$this->post('kode');

		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('cabang','Cabang','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('fax','Fax','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==true){
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
	 
			$this->load->library('upload', $config);
	 
			if ( $this->upload->do_upload('file')){
				$file=$this->upload->file_name;
			}

			$data=array(
					'id_cabang'=>$this->post('cabang'),
					'nama_kcp'=>$this->post('nama'),
					'alamat_kcp'=>$this->post('alamat'),
					'telp_kcp'=>$this->post('telp'),
					'fax_kcp'=>$this->post('fax'),
					'foto_kcp'=>$file
				);

			$this->kcp->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate');
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan, Data tidak lengkap');
		}

		$this->response($json);	
	}

	function kcpDetail_get($id){
		$kcp=$this->kcp->get_by_id($id);

		$this->response($kcp,200);
	}

	function kcp_delete($id){
		$this->kcp->delete($id);

		$json=array('success'=>true,'pesan'=>'Data berhasil dihapus');

		$this->response($json,200);
	}
	/* end kcp*/

	/* posisi */
	function posisi_get(){
		$data=$this->posisi->get();

		$this->response($data);
	}

	function posisiDetail_get($id){
		$data=$this->posisi->get_by_id($id);

		$json=array(
				'success'=>true,
				'pesan'=>'Data Berhasil diload',
				'posisi'=>$data
			);

		$this->response($json,200);
	}

	function posisi_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_posisi'=>$this->post('nama')
				);

			$this->posisi->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
		}

		$this->response($json);
	}

	function posisi_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_posisi'=>$this->put('nama')
				);

			$this->posisi->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
		}

		$this->response($json);
	}

	function posisi_delete($id){
		$this->posisi->delete($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json);
	}
	/* end posisi */

	/* category mcoa */
	function categoryMcoaPosisi_get($id,$jenis){
		$posisi=$this->posisi->get_by_id($id);
		$parameter=$this->parameter->get_by_posisi($id,$jenis);

		$json=array(
				'posisi'=>$posisi,
				'parameter'=>$parameter
			);

		$this->response($json);
	}

	function categoryFisikMcoaPosisi_get($id,$jenis){
		$fisik=$this->posisi->get_fisik_by_id($id);
		$parameter=$this->parameter->get_by_fisik($id,$jenis);

		$json=array(
				'fisik'=>$fisik,
				'parameter'=>$parameter
			);

		$this->response($json);
	}

	function categoryMcoaPosisinya_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('jenis','Jenis','required');

		if($this->form_validation->run()==false){
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan');
		}else{
			$pilihan=$this->post('pilihan');

			if($this->post('jenis')=='Mcoa'){
				$data=array(
					'id_kategori'=>$this->post('kategori'),
					'id_posisi'=>$this->post('posisi'),
					'nama_parameter'=>$this->post('pertanyaan'),
					'pria'=>$this->post('pria'),
					'wanita'=>$this->post('wanita'),
					'pilihan'=>$this->post('pilihan'),
					'jenis'=>$this->post('jenis')
				);
			}else if($this->post('jenis')=='Kategori'){
				$data=array(
					'id_kategori'=>$this->post('kategori'),
					'id_posisi'=>$this->post('posisi'),
					'nama_parameter'=>$this->post('pertanyaan'),
					'pria'=>$this->post('pria'),
					'wanita'=>$this->post('wanita'),
					'jenis'=>$this->post('jenis')
				);
			}

			
			$parameter=$this->parameter->save_parameter($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan','data'=>$data);
		}
		$this->response($json);
	}

	function categoryMcoaFisiknya_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('fisik','Fisik','required');
		$this->form_validation->set_rules('jenis','Jenis','required');

		if($this->form_validation->run()==false){
			$data=array(
					'id_kategori'=>$this->post('kategori'),
					'id_fisik'=>$this->post('fisik'),
					'nama_parameter'=>$this->post('pertanyaan'),
					'pilihan'=>$this->post('pilihan'),
					'jenis'=>$this->post('jenis')
				);

			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan','data'=>$data);
		}else{
			$pilihan=$this->post('pilihan');

			if($this->post('jenis')=='Mcoa'){
				$data=array(
					'id_kategori'=>$this->post('kategori'),
					'id_fisik'=>$this->post('fisik'),
					'nama_parameter'=>$this->post('pertanyaan'),
					'pilihan'=>$this->post('pilihan'),
					'jenis'=>$this->post('jenis')
				);
			}else if($this->post('jenis')=='Kategori'){
				$data=array(
					'id_kategori'=>$this->post('kategori'),
					'id_fisik'=>$this->post('fisik'),
					'nama_parameter'=>$this->post('pertanyaan'),
					'jenis'=>$this->post('jenis')
				);
			}

			
			$parameter=$this->parameter->save_fisik_parameter($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan','data'=>$data);
		}
		$this->response($json);
	}

	function categoryMcoa_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_kategori'=>$this->post('kategori'),
					'id_posisi'=>$this->post('posisi'),
					'jenis'=>$this->post('jenis')
				);

			$this->mcoa->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
		}

		$this->response($json);
	}

	function categoryFisikMcoa_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('fisik','Fisik','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('jenis','Jenis','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_kategori'=>$this->post('kategori'),
					'id_fisik'=>$this->post('fisik'),
					'jenis'=>$this->post('jenis')
				);

			$this->mcoa->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
		}

		$this->response($json);
	}

	function categoryDetailMcoa_get($id){
		$mcoa=$this->mcoa->get_by_id($id);

		$data=array(
				'id_kategori'=>$mcoa->id_kategori,
				'nama_kategori'=>$mcoa->nama_kategori,
				'id_posisi'=>$mcoa->id_posisi,
				'id_fisik'=>$mcoa->id_fisik,
				'nama_posisi'=>$mcoa->nama_posisi,
				'jenis'=>$mcoa->jenis,
				'parameter'=>$this->mcoa->parameter_by_kategori($id)->num_rows() > 0?$this->mcoa->parameter_by_kategori($id)->result():NULL
			);

		$this->response($data);
	}

	function categoryFisikDetailMcoa_get($id){
		$mcoa=$this->mcoa->get_by_fisik_id($id);

		$data=array(
				'id_kategori'=>$mcoa->id_kategori,
				'nama_kategori'=>$mcoa->nama_kategori,
				'id_fisik'=>$mcoa->id_fisik,
				'nama_fisik'=>$mcoa->nama_fisik,
				'jenis'=>$mcoa->jenis,
				'parameter'=>$this->mcoa->parameter_by_kategori($id)->num_rows() > 0?$this->mcoa->parameter_by_kategori($id)->result():NULL
			);

		$this->response($data);
	}

	function categoryMcoa_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_kategori'=>$this->put('nama')
				);

			$this->mcoa->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
		}

		$this->response($json);
	}

	function categoryMcoa_delete($id){
		$this->mcoa->delete($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json);
	}

	function deleteParameter_delete($id){
		$this->mcoa->delete_parameter($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json);
	}
	/* end category mcoa */

	/* fisik */
	function fisik_get(){
		$data=$this->fisik->get();

		$this->response($data);
	}

	function fisik_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_fisik'=>$this->post('nama')
				);

			$this->fisik->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
		}

		$this->response($json);
	}

	function fisikDetail_get($id){
		$data=$this->fisik->get_by_id($id);

		$this->response($data);
	}

	function fisik_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama_fisik'=>$this->put('nama')
				);

			$this->fisik->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate');
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal diupdate, Data tidak lengkap');
		}

		$this->response($json);
	}

	function fisik_delete($id){
		$this->fisik->delete($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json);
	}

	function fisik_by_kcp_get($id){
		$kcp=$this->kcp->get_by_id($id);
		$data=$this->fisik->fisik_by_kcp($id);
		$fisik=$this->fisik->get();


		$json=array(
				'kcp'=>$kcp,
				'data'=>$data,
				'fisik'=>$fisik
			);

		$this->response($json);
	}

	function fisik_by_kcp_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kcp','Kcp','required');
		$this->form_validation->set_rules('fisik','Fisik','required');

		if($this->form_validation->run()==true){
			$data=array(
					'id_fisik'=>$this->post('fisik'),
					'id_kcp'=>$this->post('kcp')
				);

			$this->fisik->save_fisik_by_kcp($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan, Data tidak lengkap');
		}

		$this->response($json);	
	}

	function get_by_id_fisik_get($id){
		$fisik=$this->fisik->get_by_id_fisik($id);

		$this->response($fisik);
	}

	function fisik_by_kcp_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('fisik','Fisik','required');

		if($this->form_validation->run()==true){
			$data=array(
					'id_fisik'=>$this->put('fisik')
				);

			$this->fisik->update_by_kcp($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate');
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal diupdate, Data tidak lengkap');
		}

		$this->response($json);
	}

	function delete_by_kcp_delete($id){
		$this->fisik->delete_by_kcp($id);

		$json=array('success'=>true,'pesan'=>'Data berhasil dihapus');

		$this->response($json);
	}
	/* end fisik */

	/*daftar*/
	function daftar_get(){
		$data=$this->laporan->daftar();

		$this->response($data,200);
	}

	function daftar_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('start','Start','required');
		$this->form_validation->set_rules('end','End','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama'=>$this->post('nama'),
					'start_date'=>date('Y-m-d',strtotime($this->post('start'))),
					'end_date'=>date('Y-m-d',strtotime($this->post('end')))
				);

			$this->laporan->saveDaftar($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
		}else{
			$json=array('success'=>false,'pesan'=>'Data gagal disimpan, data kurang lengkap');
		}

		$this->response($json);
	}

	function daftarDetail_get($id){
		$data=$this->laporan->daftar_by_id($id);

		$this->response($data);
	}

	function daftar_put($id){
		$this->form_validation->set_data($this->put());

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('start','Start','required');
		$this->form_validation->set_rules('end','End','required');

		if($this->form_validation->run()==true){
			$data=array(
					'nama'=>$this->put('nama'),
					'start_date'=>date('Y-m-d',strtotime($this->put('start'))),
					'end_date'=>date('Y-m-d',strtotime($this->put('end')))
				);

			//$this->laporan->updateDaftar($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate','id'=>$id,'data'=>$data);
		}else{
			$json=array('success'=>false,'pesan'=>'Data gagal disimpan, data kurang lengkap');
		}

		$this->response($json);
	}

	function daftar_delete($id){
		$this->laporan->deleteDaftar($id);

		$json=array('success'=>true,'pesan'=>'Data berhasil dihapus');

		$this->response($json);
	}
	/* end of daftar */

	/* laporan kcp */
	function laporanKcp_get(){
		$data=$this->report->get();

		$this->response($data,200);
	}
	/* end laporan kcp*/

	/* daftar laporan */
	function laporan_get(){
		$data=$this->laporan->get();

		$this->response($data);
	}
	/* end daftar laporan */

	/* report list kcp*/
	function report_list_kcp_get(){
		$data=$this->report->get();

		$this->response($data);
	}

	function report_staff_kcp_get($id){
		$data=$this->report->report_staff_kcp($id);

		$this->response($data);
	}

	function report_fisik_kcp_get($id){
		$data=$this->report->report_fisik_kcp($id);

		$this->response($data);	
	}

	function report_by_kcp_get($id){
		$report=$this->report->report_by_kcp($id);
		$file=$this->report->file_report_by_kcp($id);

		$json=array(
				'kcp'=>$report,
				'file'=>$file
			);

		$this->response($json);
	}

	function upload_report_kcp_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kcp','Kcp','required');
		$this->form_validation->set_rules('nilai','Nilai','required');

		if($this->form_validation->run()==false){
			$json=array('success'=>false,'pesan'=>'Data tidak lengkap');
			$this->response($json);
		}else{
			$user = $this->ion_auth->user()->row();

			$iduser=$user->id;

			$kcp=$this->post('kcp');
			$nilai=$this->post('nilai');
			$idkunjungan=$this->session->kunjungan['id'];

			//cek apakah kcp ini dan kunjungan sudah dinilai atau belum
			$cek=$this->report->cek_report_by_kcp($kcp,$idkunjungan);

			if($cek->num_rows()>0){
				//jika sudah ada maka update
				$update=$this->report->update_report_by_kcp($kcp,$nilai);

				$id=$cek->row()->id;
				
	            $this->load->library('upload');

	            $number_of_files_uploaded = count($_FILES['file']['name']);
			    // Faking upload calls to $_FILE
			    for ($i = 0; $i < $number_of_files_uploaded; $i++){
			    	$_FILES['userfile']['name']     = $_FILES['file']['name'][$i];
			      	$_FILES['userfile']['type']     = $_FILES['file']['type'][$i];
			      	$_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
			      	$_FILES['userfile']['error']    = $_FILES['file']['error'][$i];
			      	$_FILES['userfile']['size']     = $_FILES['file']['size'][$i];
			      	$config['upload_path']          = './uploads/reportkcp/';
					$config['allowed_types'] = 'gif|jpg|png';
			      	
			      	$this->upload->initialize($config);
			      	if(! $this->upload->do_upload()){
			      		$data = array('error' => $this->upload->display_errors());
			      	}else{
			      		$data = $this->upload->data();
			      		$this->db->query("insert into file_report_kcp
								(id_report_kcp,type_file,nama_file,user_id)
								values('".$id."','".$this->upload->file_type."','".$this->upload->file_name."','".$iduser."')");
			      	}
			    }


				$json=array('success'=>'true','pesan'=>'Data Berhasil diupdate','data'=>$data);
			}else{
				//jika belum ada maka simpan
				$data=array(
						'id_kcp'=>$kcp,
						'id_daftar_laporan'=>$idkunjungan,
						'index_nilai'=>$nilai,
						'user_id'=>$iduser
					);
				$simpan=$this->report->save_report_by_kcp($data);
		 		
		 		$this->load->library('upload');

	            $number_of_files_uploaded = count($_FILES['file']['name']);
			    // Faking upload calls to $_FILE
			    for ($i = 0; $i < $number_of_files_uploaded; $i++){
			    	$_FILES['userfile']['name']     = $_FILES['file']['name'][$i];
			      	$_FILES['userfile']['type']     = $_FILES['file']['type'][$i];
			      	$_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
			      	$_FILES['userfile']['error']    = $_FILES['file']['error'][$i];
			      	$_FILES['userfile']['size']     = $_FILES['file']['size'][$i];
			      	$config['upload_path']          = './uploads/reportkcp/';
					$config['allowed_types'] = 'gif|jpg|png';
			      	
			      	$this->upload->initialize($config);
			      	if(! $this->upload->do_upload()){
			      		$data = array('error' => $this->upload->display_errors());
			      	}else{
			      		$data = $this->upload->data();
			      		$this->db->query("insert into file_report_kcp
								(id_report_kcp,type_file,nama_file,user_id)
								values('".$id."','".$this->upload->file_type."','".$this->upload->file_name."','".$iduser."')");
			      	}
			    }


				$json=array('success'=>'true','pesan'=>'Data Berhasil disimpan','data'=>$data);
			}

			$this->response($json);
		}
	}

	function delete_file_report_kcp_delete($id){
		$this->report->delete_file_report_kcp($id);

		$json=array('success'=>true,'pesan'=>'Data Berhasil dihapus');

		$this->response($json);
	}

	function report_staff_by_person_get($id){
		$report=$this->report->report_staff_by_person($id);

		$this->response($report);
	}
	/* end report list kcp*/

	/* staff */
	function staff_get($id){
		$kcp=$this->kcp->get_by_id($id);
		$staff=$this->staff->get_by_kcp($id);
		$posisi=$this->posisi->get();

		$json=array(
				'kcp'=>$kcp,
				'staff'=>$staff,
				'posisi'=>$posisi
			);

		$this->response($json);
	}

	function staff_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kcp','Kcp','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('gender','Gender','required');

		if($this->form_validation->run()==true){
			//jika ada file
			$config['upload_path']          = './uploads/staff/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
	 
			$this->load->library('upload', $config);
	 
			if ( $this->upload->do_upload('file')){
				$file=$this->upload->file_name;
			}

			//end jika ada file
			$data=array(
					'id_kcp'=>$this->post('kcp'),
					'id_posisi'=>$this->post('posisi'),
					'nama_staff'=>$this->post('nama'),
					'gender'=>$this->post('gender'),
					'foto'=>$file
				);

			$this->staff->save($data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil disimpan');
			
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan, Data tidak lengkap');
		}

		$this->response($json);
	}

	function staffDetail_get($id){
		$data=$this->staff->get_by_id($id);

		$this->response($data);
	}

	function updateStaff_post(){
		$this->form_validation->set_data($this->post());

		$this->form_validation->set_rules('kcp','Kcp','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run()==true){
			//jika ada file
			$config['upload_path']          = './uploads/staff/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
	 
			$this->load->library('upload', $config);

			$id=$this->post('idstaff');
	 
			if ( $this->upload->do_upload('file')){
				$file=$this->upload->file_name;

				$data=array(
					'id_kcp'=>$this->post('kcp'),
					'id_posisi'=>$this->post('posisi'),
					'nama_staff'=>$this->post('nama'),
					'gender'=>$this->post('gender'),
					'foto'=>$file
				);
			}else{
				$data=array(
					'id_kcp'=>$this->post('kcp'),
					'id_posisi'=>$this->post('posisi'),
					'nama_staff'=>$this->post('nama'),
					'gender'=>$this->post('gender')
				);
			}

			//end jika ada file

			

			$this->staff->update($id,$data);

			$json=array('success'=>true,'pesan'=>'Data Berhasil diupdate');
			
		}else{
			$json=array('success'=>false,'pesan'=>'Data Gagal disimpan, Data tidak lengkap','data'=>$data);
		}

		$this->response($json);
	}

	function staff_delete($id){
		$this->staff->delete($id);

		$json=array('success'=>true,'pesan'=>'Data berhasil dihapus');
	}
	/* end staff */

	function report_fisik_by_kcp_get($fisik,$kcp){
		$report=$this->report->report_fisik_by_kcp($fisik,$kcp);

		$this->response($report);		
	}

	function keterangan_get(){
		$user = $this->ion_auth->user()->row();

		echo "Nama : ".$this->session->kunjungan['nama']."<br>";
		echo "Nama : ".$this->session->kunjungan['id']."<br>";
		echo "ID User :".$user->id."<br>";
	}
}