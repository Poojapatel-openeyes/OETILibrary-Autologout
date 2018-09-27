<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Answer_model');
		
	}
	
	public function getAll() {
		
		$data=$this->Answer_model->getlist_answer();		
		echo json_encode($data);				
	}
	
	
	public function add() {
		
		$post_answer = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_answer) {
			if($post_answer['FeedbackAnswerId'] > 0){
				$result = $this->Answer_model->edit_answer($post_answer);
				if($result) {
					echo json_encode($post_answer);	
				}	
			} else {
				$result = $this->Answer_model->add_answer($post_answer);
				if($result) {
					echo json_encode($post_answer);	
				}	
			}							
		}		
	}
	
	public function getById($answer_id = NULL) {
		
		if (!empty($answer_id)) {
			$data = $this->Answer_model->get_answerdata($answer_id);
			echo json_encode($data);			
		}
	}	
	
	public function delete() {
		$post_answer = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_answer) {
			if($post_answer['id'] > 0){
				$result = $this->Answer_model->delete_answer($post_answer);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Answer_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
