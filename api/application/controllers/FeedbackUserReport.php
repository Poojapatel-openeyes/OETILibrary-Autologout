<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FeedbackUserReport extends MY_Controller {

    public function __construct() {
	
		parent::__construct();		
		$this->load->model('FeedbackUserReport_model');
    }
    
    public function getAll() {
		$post_data= json_decode(trim(file_get_contents('php://input')), true);
	
		if($post_data)
		{
			$data=$this->FeedbackUserReport_model->getAll($post_data);			
			echo json_encode($data);
		}				
	}

	public function getUserScore($UserId = NULL) {		
		if (!empty($UserId)) {
			$data = $this->FeedbackUserReport_model->getUserScore($UserId);
			echo json_encode($data);		
			//print_r($data);	
		}
	}
	
	public function getAllIncomplete() {
		$post_data= json_decode(trim(file_get_contents('php://input')), true);
	
		if($post_data)
		{
			$data=$this->FeedbackUserReport_model->getAllIncomplete($post_data);			
			echo json_encode($data);
		}				
	}

}