<?php if(!defined('BASEPATH')) exit ('No Script Allowed Access');

class Access{
	public $user;

	function __construct(){
		$this->ci=& get_instance();
		$auth=$this->ci->config->item('auth');

		$this->ci->load->helper('cookie');
		$this->ci->load->model('admin/m_user');

		$this->m_user=& $this->ci->m_user;
	}

	function login($username){
		$cek=$this->m_user->get_user_info($username);
		$cek = $this->m_user->login($username);
		if ($cek->num_rows() > 0) {
			//login succes, create session
			foreach ($cek->result() as $result) {
				$sess_data['USER_ID'] = $result->USER_ID;
				$sess_data['NAME'] = $result->USER_NAME;
					
				$this->ci->session->set_userdata($sess_data);
			}

			return true;     
		} else {
			return false;
		}
	}

	function sudah_login(){
		return (($this->ci->session->userdata('USER_ID'))?true:false);
	}

	function logout(){
		$this->ci->session->unset_userdata('USER_ID');
	}
}