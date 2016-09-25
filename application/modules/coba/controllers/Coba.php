<?php

class Coba extends MX_Controller{
	
	function __construct()
	{
		parent::__construct();
	}


	function index()
	{
		$data['query'] = $this->db->get('tbl_menu')->result();

		echo json_encode($data['query']);
	}
}