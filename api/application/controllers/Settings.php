<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends My_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Settings_model');
		
	}
	
	public function getAll($userid = NULL) {
	
		if(!empty($userid)) {
			
			$data['isopenregister']=$this->Settings_model->get_isopenregister($userid);
			$data['emailfrom']=$this->Settings_model->get_emailfrom($userid);
			$data['emailpassword']=$this->Settings_model->get_emailpassowrd($userid);
			$data['Contact']=$this->Settings_model->get_Contact();
			$data['Invimsg']=$this->Settings_model->get_Invimsg();
			$data['reminder']=$this->Settings_model->get_reminder();
			$data['contactus']=$this->Settings_model->get_ContactUs();
			
		}
		
		echo json_encode($data);
				
	}

	public function getTeamSizeList() {
		
		//$data="";
		
		$data=$this->Settings_model->getlist_teamsize();
		
		echo json_encode($data);
				
	}	

	public function updateConfiguration()
	 {
		$config_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->update_config($config_data);
		if($result) {
			echo json_encode($config_data);	
		}	
		
	}

	public function updateEmail() {
		
		$config_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->updateEmail($config_data);
		if($result) {
			echo json_encode($config_data);	
		}	
		
	}
	public function addContact() {
		
		$config_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->addContact($config_data);
		if($result) {
			echo json_encode($config_data);	
		}	
		
	}
	public function addOpenRegister() {
		
		$config_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->addOpenRegister($config_data);
		if($result) {
			echo json_encode($config_data);	
		}	
		
	}
	public function addinvimsg() {
		
		$config_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->addinvimsg($config_data);
		if($result) {
			echo json_encode($config_data);	
		}	
		
	}
	public function addTeamSize() {
		
		$post_teamsize = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_teamsize) {
			if($post_teamsize['TeamSizeId'] > 0){
				$result = $this->Settings_model->edit_teamsize($post_teamsize);
				if($result) {
					echo json_encode($post_teamsize);	
				}	
			} else {
				$result = $this->Settings_model->add_teamsize($post_teamsize);
				if($result) {
					echo json_encode($post_teamsize);	
				}	
			}							
		}
		
	}

	public function addRemainigDays() {
		
		$post_rdays = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->addRemainigDays($post_rdays);
		if($result) {
			echo json_encode($post_rdays);	
		}	
		
	}
	

	
	public function deleteTeamSize() {
		$post_teamsize = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_teamsize) {
			if($post_teamsize['id'] > 0){
				$result = $this->Settings_model->delete_teamsize($post_teamsize);
				if($result) {
					
					echo json_encode("Delete successfully");
				}
				}
		} 
	}

	public function update_contactus() {
		
		$contactus_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->update_contactus($contactus_data);
		if($result) {
			echo json_encode('success');	
		}	
		
	}
	public function addreminder() {
		
		$config_data = json_decode(trim(file_get_contents('php://input')), true);		

		$result = $this->Settings_model->addreminder($config_data);
		if($result) {
			echo json_encode($config_data);	
		}	
		
	}
	
}
