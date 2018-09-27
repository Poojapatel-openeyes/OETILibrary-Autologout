<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuditLog extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('AuditLog_model');
		
	}

	public function getEmailLog() 
	{		
		$data=$this->AuditLog_model->getEmailLog();		
		echo json_encode($data);
				
	}

	public function getLoginLog() 
	{
		$data=$this->AuditLog_model->getLoginLog();		
		echo json_encode($data);
				
	}

	public function getActivityLog() 
	{
		$data=$this->AuditLog_model->getActivityLog();		
		echo json_encode($data);
				
	}
	public function getErrorLog() 
	{
		$data=$this->AuditLog_model->getErrorLog();		
		echo json_encode($data);
				
	}
	
}
