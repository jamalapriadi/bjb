<?php
class Template{
	protected $_ci;

	function __construct(){
		$this->_ci=&get_instance();
	}

	function admin($template,$data=null){
		if(!$this->is_ajax()){
			$data['_content']=$this->_ci->load->view($template,$data,true);
			$data['_header']=$this->_ci->load->view('template/admin/header',$data,true);
			$data['_sidebar']=$this->_ci->load->view('template/admin/sidebar',$data,true);
			$data['_footer']=$this->_ci->load->view('template/admin/footer',$data,true);
			$this->_ci->load->view('template/admin.php',$data);
		}else{
			$this->_ci->load->view($template,$data);
		}
	}

	function is_ajax(){
		return (
				$this->_ci->input->server('HTTP_X_REQUESTED_WITH') &&
				($this->_ci->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest')
			);
	}

	function dashboard($template,$data=null){
		$data['_content']=$this->_ci->load->view($template,$data,true);
		$data['_header']=$this->_ci->load->view('template/dashboard/header',$data,true);
		$data['_top_menu']=$this->_ci->load->view('template/dashboard/menu',$data,true);
		$data['_right_menu']=$this->_ci->load->view('template/dashboard/sidebar',$data,true);
		$this->_ci->load->view('template/dashboard/template.php',$data);	
	}
}