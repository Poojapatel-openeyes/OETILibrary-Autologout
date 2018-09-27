<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Discount_Type extends MY_Controller {


	public function __construct() {
	
		parent::__construct();		
		$this->load->model('Discount_Type_model');
		
	}
	
	public function getAll() {
		
		$data=$this->Discount_Type_model->getlist_Discount_Type();		
		echo json_encode($data);
				
	}
	
	
	public function add() {
		
		$post_Discount_type = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Discount_type) {
			if($post_Discount_type['ConfigurationId'] > 0){
				$result = $this->Discount_Type_model->edit_Discount_Type($post_Discount_type);
				if($result) {
					echo json_encode($post_Discount_type);	
				}	
			} else {
				$result = $this->Discount_Type_model->add_Discount_Type($post_Discount_type);
				if($result) {
					echo json_encode($post_Discount_type);	
				}	
			}							
		}		
	}
	
	public function getById($Discount_Type_Id = NULL) {
		
		if (!empty($Discount_Type_Id)) {
			$data = [];		
			$data = $this->Discount_Type_model->get_Discount_Typedata($Discount_Type_Id);
			echo json_encode($data);			
		}
	}
		
	public function delete() {
		$post_Discount_type = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Discount_type) {
			if($post_Discount_type['id'] > 0){
				$result = $this->Discount_Type_model->delete_Discount_Type($post_Discount_type);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Discount_Type_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
