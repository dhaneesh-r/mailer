<?php
class M_login extends CI_Model {

    private $_url = 'https://ray.practo.com/api/v1';
    function __construct()
    {
        parent::__construct();
    }
    
    function authenticate($input)
    {
    	
    	$url = $this->_url."/sessions";
    	try {
    	    $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, true);
          //curl_setopt($ch,CURLOPT_HTTPHEADER,array('HeaderName: HeaderValue'));
     		 $data = array(
         	'username' => $input['username'],
				'password' => $input['password'],
         	
      	);
      	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     		$output = curl_exec($ch);
     		curl_close($ch);
     		$userInfo = json_decode($output);
     		return $userInfo;
     		} catch (Exception $e) {
        		return false;
        	}
    	}
    function getAllPatients($authToken){
    	
    	$url = $this->_url."/patients";
    	try {
    	    $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-AUTH-TOKEN: $authToken"));
     		$output = curl_exec($ch);
     		curl_close($ch);
     		$userInfo = json_decode($output);
     		return $userInfo;
     		} catch (Exception $e) {
        		return false;
        	}
    	   
    	}
  }
 ?>