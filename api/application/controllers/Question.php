<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {


    public function __construct() {
	
		parent::__construct();		
		$this->load->model('Question_model');		
	}
	
	public function getAll() {
		
		$data=$this->Question_model->getlist_Question();		
		echo json_encode($data);				
	}
	
	public function getDataList() {
		
		$data['cat']=$this->Question_model->getCatList();	
		$data['answer']=$this->Question_model->getAnswerList();	
		echo json_encode($data);				
	}
	
	public function add() {
		
		$post_Question = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_Question) {
			if($post_Question['FeedbackQuestionId'] > 0){
				$result = $this->Question_model->edit_Question($post_Question);
				if($result) {
					echo json_encode($post_Question);	
				}	
			} else {
				$result = $this->Question_model->add_Question($post_Question);
				if($result) {
					echo json_encode($post_Question);	
				}	
			}							
		}		
	}
	
	public function getById($Question_id = NULL) {
		
		if (!empty($Question_id)) {
			$data = $this->Question_model->get_Questiondata($Question_id);
			echo json_encode($data);			
		}
	}	
	
	public function delete() {
		$post_Question = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_Question) {
			if($post_Question['id'] > 0){
				$result = $this->Question_model->delete_Question($post_Question);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Question_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
