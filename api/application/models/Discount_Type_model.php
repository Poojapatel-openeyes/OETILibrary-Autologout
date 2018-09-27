<?php

class Discount_Type_model extends CI_Model
 {

	public function add_Discount_Type($post_Discount_Type) {
		try{
		if($post_Discount_Type) {	

			if($post_Discount_Type['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}	
			if(isset($post_Discount_Type['Description']) && !empty($post_Discount_Type['Description']))
			{
				$Description = $post_Discount_Type['Description'];
			} else {
				$Description = '';
			}
			if(isset($post_Discount_Type['DisplayOrder']) && !empty($post_Discount_Type['DisplayOrder']))
			{
				$DisplayOrder = $post_Discount_Type['DisplayOrder'];
			} else {
				$DisplayOrder = 0;
			}			
			$Discount_Type_data = array(				
				'Value' => trim($post_Discount_Type['Value']),
				'DisplayText' => trim($post_Discount_Type['DisplayText']),
				'Description' => $Description,
				'DisplayOrder' => $DisplayOrder,
				'Key' => 'DiscountType',
				'CreatedBy' => trim($post_Discount_Type['CreatedBy']),
				'UpdatedBy' => trim($post_Discount_Type['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
				'IsActive' => $IsActive			
			);
			
			$res = $this->db->insert('tblmstconfiguration',$Discount_Type_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Discount_Type['UpdatedBy']),
					'Module' => 'Discount-Type',
					'Activity' =>'Add'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}	
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	public function getlist_Discount_Type() {
		try{
		$this->db->select('c.ConfigurationId,c.Key,c.Value,c.DisplayText,c.Description,c.DisplayOrder,c.IsActive,(SELECT COUNT(md.DiscountId) FROM tblmstdiscount as md WHERE md.DiscountType=c.ConfigurationId) as isdisabled');
		$this->db->order_by('c.DisplayOrder','asc');
		$this->db->where('c.Key','DiscountType');
		$result = $this->db->get('tblmstconfiguration as c');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$res = array();
		if($result->result()) {
			$res = $result->result();
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
		
	}
	
	
	public function get_Discount_Typedata($Discount_Type_Id = NULL)
	{	
		try{	
		if($Discount_Type_Id) {			
			$this->db->select('c.ConfigurationId,c.Key,c.Value,c.DisplayText,c.Description,c.DisplayOrder,c.IsActive,(SELECT COUNT(md.DiscountId) FROM tblmstdiscount as md WHERE md.DiscountType=c.ConfigurationId) as isdisabled');
			$this->db->where('c.ConfigurationId',$Discount_Type_Id);
			$result = $this->db->get('tblmstconfiguration as c');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$Discount_Type_data = array();
			foreach($result->result() as $row) {
				$Discount_Type_data = $row;
			}
			return $Discount_Type_data;			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_Discount_Type($post_Discount_Type) {
		try{
		if($post_Discount_Type) {
			if($post_Discount_Type['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(isset($post_Discount_Type['Description']) && !empty($post_Discount_Type['Description']))
			{
				$Description = $post_Discount_Type['Description'];
			} else {
				$Description = '';
			}
			if(isset($post_Discount_Type['DisplayOrder']) && !empty($post_Discount_Type['DisplayOrder']))
			{
				$DisplayOrder = $post_Discount_Type['DisplayOrder'];
			} else {
				$DisplayOrder = 0;
			}		
			$Discount_Type_data = array(
				'Value' => trim($post_Discount_Type['Value']),
				'DisplayText' => trim($post_Discount_Type['DisplayText']),
				'Description' => $post_Discount_Type['Description'],
				'DisplayOrder' => $post_Discount_Type['DisplayOrder'],
				'UpdatedBy' => trim($post_Discount_Type['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
				'IsActive' => $IsActive				
			);
			
			$this->db->where('ConfigurationId',$post_Discount_Type['ConfigurationId']);
			$res = $this->db->update('tblmstconfiguration',$Discount_Type_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Discount_Type['UpdatedBy']),
					'Module' => 'Discount-Type',
					'Activity' =>'Update'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}	
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function delete_Discount_Type($post_Discount_Type) {
		try{
		if($post_Discount_Type) {
			
			$this->db->where('ConfigurationId',$post_Discount_Type['id']);
			$res = $this->db->delete('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Discount_Type['Userid']),
					'Module' => 'Discount-Type',
					'Activity' =>'Delete'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}	
	}
	public function isActiveChange($post_data) {
		try{
		if($post_data) {
			if(trim($post_data['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$data = array(
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_data['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$this->db->where('ConfigurationId',trim($post_data['ConfigurationId']));
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_data['UpdatedBy']),
					'Module' => 'Category',
					'Activity' =>'Update'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}	
	
	}
	
}
