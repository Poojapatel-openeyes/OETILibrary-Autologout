<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userscore extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Userscore_model');
		
	}
	public function getall() 
	{
		$data = json_decode(trim(file_get_contents('php://input')), true);
		if ($data) 
		{
		$data1=$this->Userscore_model->getuserscore($data);		
		echo json_encode($data1);
		}
				
	}

	public function getUserList() 
	{
		$data = json_decode(trim(file_get_contents('php://input')), true);
		if ($data) 
		{
		$data1=$this->Userscore_model->getUserList($data);		
		echo json_encode($data1);
		}
				
	}

	public function getScore($UserId = NULL)
	{
		if(!empty($UserId)) {
			$data=$this->Userscore_model->getScore($UserId);
			if($data){
				echo json_encode($data);
			} else {
				echo json_encode('no');
			}		
		}		
	}
	
	public function getAllScore() 
	{
		$data = json_decode(trim(file_get_contents('php://input')), true);
		if ($data) 
		{
		$data1=$this->Userscore_model->getAllScore($data);		
		echo json_encode($data1);
		}
				
	}
	
}
