<?php

class Penjualan extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_penjualan');
	}


	function index()
	{
		$data = array();
		foreach($this->m_penjualan->ambil_penjualan() as $row)
		$data[] = (int) $row['total'];

		$this->load->view('penjualan/grafik', array('data'=>$data));
	}

//end of class	
}