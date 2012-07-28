<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {

	public function sendMail()
	{
      
      $this->load->library('email');
      $mailSendError = array();
      $input =  $this->input->post();
      $this->email->from('your@example.com', 'Your Name');
      $this->email->subject('Email Test');
      $patientsInfo =  $input['patients'];
      foreach($patientsInfo as $patient){
	     	$infoArr = explode("||",$patient);
	  		$this->email->to($infoArr[1]);
	      $this->email->message($input['mailText']);
	      try{
	        $this->email->send();
	      }catch (Exception $e) {
	        $error['message'] = $e->getMessage();
	        $error['mailId'] = $infoArr[1];
	        array_push($mailSendError,$error);
	        continue;
	     }
      }
	}
	public function addRole() {
		$this->load->model('m_mail');
		$this->load->model('m_login');
      $setRole = $this->m_mail->setRole($this->input->post());
      if($setRole){
      	$token = $this->session->userdata('token');
      	$data['patients'] = $this->m_login->getAllPatients($token);
		   $this->load->view('includes/v_header.php');
		   $this->load->view('v_patients.php', $data);
		   $this->load->view('includes/v_footer.php');
       }
     }	
}