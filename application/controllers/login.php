<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('includes/v_header.php');
		$this->load->view('v_login.php');
		$this->load->view('includes/v_footer.php');
	}
	public function authenticate()
	{
		$this->load->model('m_login');
		$userInfo = $this->m_login->authenticate($this->input->post());
		$this->session->set_userdata('token', $userInfo->auth_token);
		$rolesInfo = $this-> _checkUserRoles($userInfo);
		if($rolesInfo){
		   $data['patients'] = $this->m_login->getAllPatients($userInfo->auth_token);
		   $this->load->view('includes/v_header.php');
		   $this->load->view('v_patients.php', $data);
		   $this->load->view('includes/v_footer.php');
		}else{
			$data['userRoles'] = $this->m_login->getRoles($userInfo->auth_token);
			//print_r($data['userRoles']);die;
			$this->load->view('includes/v_header.php');
		   $this->load->view('v_roles.php', $data);
		   $this->load->view('includes/v_footer.php');
			}
		
		
	}
	private function _checkUserRoles($userInfo){
		if(isset($userInfo->user_role_id)){
			return true;//means only single role
		}
		return false;//no or multiple roles
		}
}