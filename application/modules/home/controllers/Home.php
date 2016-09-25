<?php 

class Home extends Bjb_Controller{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view('index');
	}
}