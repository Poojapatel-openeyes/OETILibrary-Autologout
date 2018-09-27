<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends MY_Controller {


    public function __construct() {
	
		parent::__construct();		
		$this->load->model('Subcategory_model');		
	}
	
	public function getAll() {
		
		$data=$this->Subcategory_model->getlist_subcategory();		
		echo json_encode($data);				
	}
	
	public function getMainCatList() {
		
		$data=$this->Subcategory_model->getMainCatList();		
		echo json_encode($data);				
	}
	
	public function add() {
		
		$post_subcategory = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_subcategory) {
			if($post_subcategory['FeedbackCategoryId'] > 0){
				$result = $this->Subcategory_model->edit_subcategory($post_subcategory);
				if($result) {
					echo json_encode($post_subcategory);	
				}	
			} else {
				$result = $this->Subcategory_model->add_subcategory($post_subcategory);
				if($result) {
					echo json_encode($post_subcategory);	
				}	
			}							
		}		
	}
	
	public function getById($subcategory_id = NULL) {
		
		if (!empty($subcategory_id)) {
			$data = $this->Subcategory_model->get_subcategorydata($subcategory_id);
			echo json_encode($data);			
		}
	}	
	
	public function delete() {
		$post_subcategory = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_subcategory) {
			if($post_subcategory['id'] > 0){
				$result = $this->Subcategory_model->delete_subcategory($post_subcategory);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Subcategory_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
