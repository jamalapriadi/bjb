<?php

class Anggota extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_anggota');
	}


	function index()
	{
		$this->load->helper('url');
		$this->load->library('pagination'); //meload library pagination

		$jml = $this->db->get('anggota'); //mengambil semua data anggota

		$config['base_url'] = site_url().'/anggota/index';
		$config['per_page'] = 5;
		$config['total_rows'] = $jml->num_rows();
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['query'] = $this->m_anggota->tampil_anggota($config['per_page'], $this->uri->segment(3));

		$this->load->view('anggota/anggota_view', $data);
	}


	function tambah()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('telp','Telp','required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('anggota/anggota_tambah');
		}else{
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telp = $this->input->post('telp');

			$data = array(
				'nama'=>$nama,
				'alamat'=>$alamat,
				'telp'=>$telp
				);

			$this->m_anggota->simpan_anggota($data);

			$this->session->set_flashdata('pesan','<p style="color:green; font-weight:bold;">Data Anggota berhasil ditambahkan.</p>');
			redirect('anggota/tambah');
		}
	}


	function ubah($id)
	{
		if(!$id){
			redirect('anggota');
		}else{

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('telp','Telp','required');

			if($this->form_validation->run() == FALSE)
			{
				$data['query'] = $this->m_anggota->ambil_anggota($id);

				$this->load->view('anggota/anggota_ubah',  $data);
			}else{
				$nama = $this->input->post('nama');
				$alamat = $this->input->post('alamat');
				$telp = $this->input->post('telp');

				$data = array(
					'nama'=>$nama,
					'alamat'=>$alamat,
					'telp'=>$telp
					);

				$this->m_anggota->ubah_anggota($data);

				$this->session->set_flashdata('pesan','<p style="color:green; font-weight:bold;">Data Anggota berhasil diubah.</p>');
				redirect('anggota');
			}
		}
	}

	function hapus($id)
	{
		if(!$id)
		{
			$this->m_anggota->hapus_anggota($id);

			$this->session->set_flashdata('pesan','<p style="color:green; font-weight:bold;">Data Anggota berhasil dihapus.</p>');
				redirect('anggota');
		}
	}


	function laporan()
	{
		$this->load->library(array('fpdf'));
    	define('FPDF_FONTPATH',$this->config->item('fonts_path'));

    	$data['query'] = $this->db->get('anggota')->result();

    	$this->load->view('anggota/anggota_pdf', $data);
	}

//end of class	
}