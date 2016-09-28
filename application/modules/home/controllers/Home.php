<?php 

class Home extends Bjb_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library(array('menu','template','datatables'));
		$this->load->helper('tanggal');
	}

	function index(){
		$this->load->model('api/M_laporan','laporan');
		$data['laporan']=$this->laporan->get();
		$this->load->view('index',$data);
	}

	function session($id){
		$this->load->model('api/M_laporan','laporan');

		$data=$this->laporan->get_by_id($id);

		$this->session->set_userdata('kunjungan',$data);

		redirect('home/kunjungan');
	}

	function kunjungan(){
		$this->load->view('kunjungan');
	}
}