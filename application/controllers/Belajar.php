<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}


	function index()
	{
		echo "<h2>Belajar Codeigniter</h2>";
	}


	function latih()
	{
		$this->load->view('latih_view');
	}


	function tampil_nama($nama)
	{
		echo "<h2>Nama Saya ".$nama."</h2>";
	}


	function tampil_kota($kota=1)
	{
		$data['kota'] = $kota;
		
		$this->load->view('tampil_kota',$data);
	}


	function tampil_form()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');//tambahkan library

		$this->form_validation->set_rules('nama','Nama Anggota','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('jk','Jenis Kelamin','required');
		$this->form_validation->set_rules('hobi','Hobi','required');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_error_delimiters('<p style="color:red;">','</p>');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('buat_form');
		}else{

			$nama       =   $this->input->post('nama');
			$alamat     =   $this->input->post('alamat');
			$jenkel     =   $this->input->post('jk');
			$hobi       =   $this->input->post('hobi');

			echo 'Nama Anda <b>'.$nama.'</b><br>';
			echo 'Alamat <b>'.$alamat.'</b><br>';
			echo 'Jenis Kelamin <b>'.$jenkel.'</b><br>';
			echo 'Hobi <b>'.$hobi.'</b><br>';
		}
	}


	function bermain_teks()
	{
		$this->load->helper('text');

		$kata = "Perkenalkan nama saya adalah Dimas Edu Prasada. Saya akan membantu anda belajar Codeigniter sampai mahir.";

		//penggunaan word_limiter hanya akan membatasi text berdasarkan jumlah kata.
		echo word_limiter($kata, 5);
		echo '<hr>';

		//penggunaan character_limiter akan membatasi text berasarkan jumlah karakter atau huruf.
		echo character_limiter($kata, 20);

	}


	function upload_form()
	{
		$this->load->helper('form');

		$data['error'] = '';

		$this->load->view('upload_form', $data);
	}


	function proses_upload()
	{
		$this->load->library('upload');
		$this->load->helper(array('form','url'));

		$config['upload_path'] = './';
		$config['remove_spaces'] = TRUE;
		$config['allowed_types'] = 'jpg|png';

		$this->upload->initialize($config);

		if(!$this->upload->do_upload('gambar')){
			$data['error'] = $this->upload->display_errors();

			$this->load->view('upload_form', $data);
		}else{
			$data['upload_data'] = $this->upload->data();

			$this->load->view('upload_sukses', $data);
		}
	}


	function hari_ini()
	{
		$this->load->library('belajarlib');

		echo "Hari ini tanggal <b>".date('d F Y').'</b>. Hari ini hari <b>'.$this->belajarlib->tampil_hari().'</b>';
	}


	function acak_teks()
	{
		$this->load->library('belajarlib');

		$teks = "Ini adalah pesan rahasia";

		echo "Hasil acak teks <b>".$this->belajarlib->acak_kode($teks).'</b>';
	}


	function cek_angka()
	{
		$this->load->library('belajarlib');
		for($i=0; $i<=10; $i++){

			$this->belajarlib->cek_gejil($i);
		}
	}

//end of class	
}