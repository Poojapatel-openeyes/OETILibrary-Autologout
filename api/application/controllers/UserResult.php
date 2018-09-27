<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserResult extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('UserResult_model');
		
	}

	public function getResult($UserId = NULL)
	{
		if(!empty($UserId)) {
			$data=$this->UserResult_model->get_result($UserId);
			if($data){
				echo json_encode($data);
			} else {
				echo json_encode('no');
			}			
		}		
    }

	public function test() {
 
		// $config['protocol']='smtp';
		//   $config['smtp_host']='ssl://smtp.googlemail.com';
		//   $config['smtp_port']='465';
		//   $config['smtp_user']='myopeneyes3937@gmail.com';
		//   $config['smtp_pass']='W3lc0m3@2018';
		  
		  $config['protocol']='mail';
		  $config['smtp_host']='mail.uatbyopeneyes.com';
		  $config['smtp_port']='587';
		  $config['smtp_user']='noreply@uatbtopeneyes.com';
		  $config['smtp_pass']='P.UpKOS&3aY~';
		  
	  
		  $config['charset']='utf-8';
		  $config['newline']="\r\n";
		  $config['mailtype'] = 'html';         
		  $this->email->initialize($config);
	  
		  $this->email->from('myopeneyes3937@gmail.com', 'LFB');
		  $this->email->to("vidhi.bathani@theopeneyes.in"); 
		  $this->email->subject('LFB - Invite a user');
		  //$body = 'click this link - '.BASE_URL.'/user-registration/'.JWT::encode($post_Invitation['InvitationCode'],"MyGeneratedKey","HS256");
		  $body = "hi";
		  $this->email->message($body);
		  if($this->email->send())
		  {   
			//print_r($this->email->print_debugger()); 
		   echo json_encode("success");
		  } else {
		   echo json_encode("notsend");
		  }
	   }
}
