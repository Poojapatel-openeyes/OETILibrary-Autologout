<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Licence_Type extends MY_Controller {


	public function __construct() {
	
		parent::__construct();		
		$this->load->model('Licence_Type_model');
		
	}
	
	public function getAll() {
		
		$data=$this->Licence_Type_model->getlist_Licence_Type();		
		echo json_encode($data);
				
	}
	
	
	public function add() {
		
		$post_Licence_Type = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Licence_Type) {
			if($post_Licence_Type['ConfigurationId'] > 0){
				$result = $this->Licence_Type_model->edit_Licence_Type($post_Licence_Type);
				if($result) {
					echo json_encode($post_Licence_Type);	
				}	
			} else {
				$result = $this->Licence_Type_model->add_Licence_Type($post_Licence_Type);
				if($result) {
					echo json_encode($post_Licence_Type);	
				}	
			}							
		}		
	}
	
	public function getById($Licence_Type_Id = NULL) {
		
		if (!empty($Licence_Type_Id)) {
			$data = [];		
			$data = $this->Licence_Type_model->get_Licence_Typedata($Licence_Type_Id);
			echo json_encode($data);			
		}
	}
		
	public function delete() {
		$post_Licence_Type = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Licence_Type) {
			if($post_Licence_Type['id'] > 0){
				$result = $this->Licence_Type_model->delete_Licence_Type($post_Licence_Type);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Licence_Type_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
