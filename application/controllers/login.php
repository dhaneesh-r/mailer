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
		$input = $this->input->post();
		if($input['username'] == "" || $input['password'] == ""){
			$data['error'] = "Please Enter login credentials";
			$this->load->view('includes/v_header.php');
		   $this->load->view('v_login.php', $data);
		   $this->load->view('includes/v_footer.php');
		   return false;
		}
		$this->load->model('m_login');
		$userInfo = $this->m_login->authenticate($input);
		if(!isset($userInfo->auth_token)){
			$data['error'] = "Failed to authenticate login credentials";
			$this->load->view('includes/v_header.php');
		   $this->load->view('v_login.php', $data);
		   $this->load->view('includes/v_footer.php');
		   return false;
		}
		$this->session->set_userdata('token', $userInfo->auth_token);
		$this->session->set_userdata('username', $input['username']);
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