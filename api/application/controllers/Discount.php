<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Discount_model');
	}

	public function add()
	{
		$post_Discount = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_Discount) 
		{
			if($post_Discount['DiscountId']>0)
			{
				$result = $this->Discount_model->edit_Discount($post_Discount);
				if($result)
				{
					echo json_encode($post_Discount);	
				}	
			}
			else
			{
				$result = $this->Discount_model->add_Discount($post_Discount);
				if($result)
				{
					echo json_encode($post_Discount);	
				}	
			}					
		}
	}
	
	public function getById($Discount_id=null)
	{			
		if(!empty($Discount_id))
		{
			$data=[];
			$data=$this->Discount_model->get_Discountdata($Discount_id);
			echo json_encode($data);
		}
	}
	
	public function getAll()
	{		
		$data=$this->Discount_model->getlist_Discount();		
		echo json_encode($data);
	}
	

	public function delete() {
		$post_Discount = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Discount) {
			if($post_Discount['id'] > 0){
				$result = $this->Discount_model->delete_Discount($post_Discount);
				if($result) {					
					echo json_encode("Delete successfully");
				}
			}			
		} 			
	}

	public function getAllDiscountType()
	{
		$data=$this->Discount_model->getAllDiscountType();
		echo json_encode($data);
	}
	public function isActiveChange() {
		
		$post_data = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_data) {
			$result = $this->Discount_model->isActiveChange($post_data);
			if($result) {
				echo json_encode('success');	
			}						
		}		
	}
	
}
