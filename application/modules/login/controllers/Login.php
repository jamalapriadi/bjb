<?php 
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library(array('access','form_validation'));
		$this->load->model('M_login','login');

		if($this->access->sudah_login()){
			redirect('home');
		}
	}

	function index(){
		$this->load->view('index');
	}

	function proses_login(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==false){
			return redirect('login');
		}else{
			//cek login
		}
	}
}