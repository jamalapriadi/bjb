<?php if(!defined('BASEPATH')) exit('No Script Access Allowed');

class Bjb_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->ci=& get_instance();
		$this->ci->load->library('ion_auth');

		if (!$this->ion_auth->logged_in())
		{
		    redirect('auth', 'refresh');
		}
	}

	function sudah_login(){
		return $this->ion_auth->logged_in();
	}
}

class MY_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
}