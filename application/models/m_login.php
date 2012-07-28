<?php
class M_login extends CI_Model {

    private $_url = 'https://ray.practo.com/api/v1';
    function __construct()
    {
        parent::__construct();
    }
    
    function authenticate($input)
    {
       	return $this->_urlCaller("sessions", "",$input);
    	
    }
    function getAllPatients($authToken)
    {
    	   return $this->_urlCaller("patients",$authToken);
    }
    function getRoles($authToken)
    {
    	
    	  return $this->_urlCaller("roles",$authToken);
    	   
    }
    	
    private function _urlCaller($url,$authToken="",$post = array())
    {
    	 $url = $this->_url."/".$url;
    	 try {
	    	    $ch = curl_init();
				 curl_setopt($ch, CURLOPT_URL, $url);
				 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				 if(count($post) > 0){
					curl_setopt($ch, CURLOPT_POST, true);
		     		 $data = array(
		         	'username' => $post['username'],
						'password' => $post['password'],
		      	);
	      	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				}
				if($authToken != ""){
	             curl_setopt($ch,CURLOPT_HTTPHEADER,array("X-AUTH-TOKEN: $authToken"));
	         }
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