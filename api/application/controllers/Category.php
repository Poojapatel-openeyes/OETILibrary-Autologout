<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Category_model');
		
	}
	
	public function getAll() {
		
		$data=$this->Category_model->getlist_category();		
		echo json_encode($data);				
	}
	
	
	public function add() {
		
		$post_category = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_category) {
			if($post_category['FeedbackCategoryId'] > 0){
				$result = $this->Category_model->edit_category($post_category);
				if($result) {
					echo json_encode($post_category);	
				}	
			} else {
				$result = $this->Category_model->add_category($post_category);
				if($result) {
					echo json_encode($post_category);	
				}	
			}							
		}		
	}
	
	public function getById($category_id = NULL) {
		
		if (!empty($category_id)) {
			$data = $this->Category_model->get_categorydata($category_id);
			echo json_encode($data);			
		}
	}	
	
	public function delete() {
		$post_category = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_category) {
			if($post_category['id'] > 0){
				$result = $this->Category_model->delete_category($post_category);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}

	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Category_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
