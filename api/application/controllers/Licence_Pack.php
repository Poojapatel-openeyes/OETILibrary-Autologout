<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Licence_Pack extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Licence_Pack_model');
	}

	public function add()
	{
		$post_Licence_Pack = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_Licence_Pack) 
		{
			if($post_Licence_Pack['LicensePackId']>0)
			{
				$result = $this->Licence_Pack_model->edit_Licence_Pack($post_Licence_Pack);
				if($result)
				{
					echo json_encode($post_Licence_Pack);	
				}	
			}
			else
			{
				$result = $this->Licence_Pack_model->add_Licence_Pack($post_Licence_Pack);
				if($result)
				{
					echo json_encode($post_Licence_Pack);	
				}	
			}					
		}
	}
	
	public function getById($Licence_Pack_id=null)
	{			
		if(!empty($Licence_Pack_id))
		{
			$data=[];
			$data=$this->Licence_Pack_model->get_Licence_Packdata($Licence_Pack_id);
			echo json_encode($data);
		}
	}
	
	public function getAll()
	{		
		$data=$this->Licence_Pack_model->getlist_Licence_Pack();		
		echo json_encode($data);
	}
	

	public function delete() {
		$post_Licence_Pack = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Licence_Pack) {
			if($post_Licence_Pack['id'] > 0){
				$result = $this->Licence_Pack_model->delete_Licence_Pack($post_Licence_Pack);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}

	public function getAllData()
	{
		$data['discount']=$this->Licence_Pack_model->getlist_discount();
		$data['licencetype']=$this->Licence_Pack_model->getlist_licencetype();
		echo json_encode($data);
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Licence_Pack_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
