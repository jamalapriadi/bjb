<?php

class Tes extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}


	function index(){
		$this->load->view('tes/index');
	}
//end of class	
}