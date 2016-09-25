<?php

class M_penjualan extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}


	function ambil_penjualan()
	{
		$this->db->order_by('nota','ASC');
		$query = $this->db->get('penjualan');

		return $query->result_array();
	}

//end of class	
}