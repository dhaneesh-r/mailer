<?php
class M_login extends CI_Model {

    private $_url = 'https://ray.practo.com/api/v1';
    function __construct()
    {
        parent::__construct();
    }
    
    function authenticate()
    {
    	try {

    	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://www.example.com/path/to/form");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);

      $data = array(
         'foo' => 'foo foo foo',
         'bar' => 'bar bar bar',
         'baz' => 'baz baz baz'
      );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     $output = curl_exec($ch);
     curl_close($ch);
     } catch (Exception $e) {
        return false
    }
 ?>