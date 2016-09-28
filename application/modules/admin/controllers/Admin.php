<?php
class Admin extends bjb_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library(array('menu','template','datatables'));
		$this->load->helper('tanggal');
		/*
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
		    redirect('auth', 'refresh');
		}
		*/

		if(!$this->session->userdata('kunjungan')){
			redirect('home');
		}
	}

	function dashboard(){
		$data['title']="Dashboard";
		$data['ctrl']='dashboard';

		$this->template->admin('dashboard',$data);
	}

	function main(){
		$this->load->view('dashboard');
	}

	function kanpus(){
		$data['title']='Pusat';
		$data['ctrl']="kanpus";

		$this->template->admin('kanpus',$data);
	}

	function kanwils(){
		$data['ctrl']="kanwil";
		$data['title']='Kanwil';

		$this->template->admin('kanwil',$data);
	}

	function cabangs(){
		$data['title']='Cabang';
		$data['ctrl']="cabang";

		$this->template->admin('cabang',$data);
	}

	function kcp(){
		$data['title']='KCP';
		$data['ctrl']='kcp';

		$this->template->admin('kcp',$data);
	}

	function positions(){
		$data['title']='Posisi';
		$data['ctrl']='posisi';

		$this->template->admin('position',$data);
	}

	function category_mcoa($id){
		$data['title']="Kategori MCOA Posisi";
		$data['ctrl']="kategoriMcoa";
		$data['id']=$id;

		$this->template->admin('category_mcoa',$data);

	}

	function positions_mcoa($lokasi,$kategori){
		$data['title']="MCOA Posisi";
		$data['ctrl']="positionsMcoa";

		$this->template->admin('positions_mcoa',$data);
	}

	function staffs_kcp(){
		$data['title']='Staff';
		$data['ctrl']='staff';

		$this->template->admin('staff',$data);
	}

	function fisiks_parameter(){
		$data['title']="Fisik";
		$data['ctrl']='fisik';

		$this->template->admin('fisik',$data);
	}

	function fisiks_kcp(){
		$data['title']="KCP";
		$data['ctrl']='fisikKcp';

		$this->template->admin('fisik_kcp',$data);
	}

	function laporan_daftar(){
		$data['title']="Laporan";
		$data['ctrl']='laporan';

		$this->template->admin('daftar_laporan',$data);
	}

	function laporan_list_kcp(){
		$data['title']="Laporan KPC";
		$data['ctrl']="laporanListKcp";

		$this->template->admin('laporan_list_kcp',$data);
	}

	function laporan_list_staff(){
		$data['title']="KCP";
		$data['ctrl']="laporanListStaff";

		$this->template->admin('laporan_list_staff',$data);
	}

	function laporan_list_fisik(){
		$data['title']="KCP";
		$data['ctrl']="laporanListFisik";

		$this->template->admin('laporan_list_fisik',$data);	
	}

	function login(){
		$this->load->view('login');
	}

	function logout(){
		$this->data['title'] = "Logout";

		$this->session->unset_userdata('kunjungan');

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->ion_auth->messages()."</div>");
		redirect('auth/login', 'refresh');
	}
}