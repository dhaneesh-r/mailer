<?php
class M_mail extends CI_Model {

    private $_url = 'https://ray.practo.com/api/v1';
    function __construct()
    {
        parent::__construct();
    }
    
    function setRole($input)
    {
    	$url = $this->_url."/session";
    	$token = $this->session->userdata('token');
    	try {
    	   $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" ); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-AUTH-TOKEN: $token", "X-HTTP-METHOD-OVERRIDE: PATCH"));
			curl_setopt($ch, CURLOPT_POST, true);
     		 $data = array(
         	'user_role_id' => 13065,
      	);
      	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     		$output = curl_exec($ch);
     		//print_r($output);die;
     		curl_close($ch);
     		return true;
     		} catch (Exception $e) {
        		return false;
        	}
    	}
}
 ?>