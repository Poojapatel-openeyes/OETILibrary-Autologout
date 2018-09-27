<?php

class Licence_Type_model extends CI_Model
 {

	public function add_Licence_Type($post_Licence_Type) {
		try{
		if($post_Licence_Type) {	

			if($post_Licence_Type['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}	
			if(isset($post_Licence_Type['Description']) && !empty($post_Licence_Type['Description']))
			{
				$Description = $post_Licence_Type['Description'];
			} else {
				$Description = '';
			}
			if(isset($post_Licence_Type['DisplayOrder']) && !empty($post_Licence_Type['DisplayOrder']))
			{
				$DisplayOrder = $post_Licence_Type['DisplayOrder'];
			} else {
				$DisplayOrder = 0;
			}			
			$Licence_Type_data = array(				
				'Value' => trim($post_Licence_Type['Value']),
				'Description' => $Description,
				'DisplayOrder' => $DisplayOrder,
				'Key' => 'LicenceType',
				'CreatedBy' => trim($post_Licence_Type['CreatedBy']),
				'UpdatedBy' => trim($post_Licence_Type['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
				'IsActive' => $IsActive			
			);
			
			$res = $this->db->insert('tblmstconfiguration',$Licence_Type_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Licence_Type['UpdatedBy']),
					'Module' => 'Licence-Type',
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
	
	public function getlist_Licence_Type() {
		try{
		$this->db->select('c.ConfigurationId,c.Key,c.Value,c.Description,c.DisplayOrder,c.IsActive,(SELECT COUNT(md.LicensePackId) FROM tblmstlicensepack as md WHERE md.LicensePackType=c.ConfigurationId) as isdisabled');
		$this->db->order_by('c.DisplayOrder','asc');
		$this->db->where('c.Key','LicenceType');
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
	
	
	public function get_Licence_Typedata($Licence_Type_Id = NULL)
	{	
		try{	
		if($Licence_Type_Id) {			
			$this->db->select('c.ConfigurationId,c.Key,c.Value,c.Description,c.DisplayOrder,c.IsActive,(SELECT COUNT(md.LicensePackId) FROM tblmstlicensepack as md WHERE md.LicensePackType=c.ConfigurationId) as isdisabled');
			$this->db->where('c.ConfigurationId',$Licence_Type_Id);
			$result = $this->db->get('tblmstconfiguration as c');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$Licence_Type_data = array();
			foreach($result->result() as $row) {
				$Licence_Type_data = $row;
			}
			return $Licence_Type_data;			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_Licence_Type($post_Licence_Type) {
		try{
		if($post_Licence_Type) {
			if($post_Licence_Type['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(isset($post_Licence_Type['Description']) && !empty($post_Licence_Type['Description']))
			{
				$Description = true;
			} else {
				$Description = false;
			}
			if(isset($post_Licence_Type['DisplayOrder']) && !empty($post_Licence_Type['DisplayOrder']))
			{
				$DisplayOrder = true;
			} else {
				$DisplayOrder = false;
			}		
			$Licence_Type_data = array(
				'Value' => trim($post_Licence_Type['Value']),
				'Description' => $post_Licence_Type['Description'],
				'DisplayOrder' => $post_Licence_Type['DisplayOrder'],
				'UpdatedBy' => trim($post_Licence_Type['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
				'IsActive' => $IsActive				
			);
			
			$this->db->where('ConfigurationId',$post_Licence_Type['ConfigurationId']);
			$res = $this->db->update('tblmstconfiguration',$Licence_Type_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Licence_Type['UpdatedBy']),
					'Module' => 'Licence-Type',
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
	
	
	public function delete_Licence_Type($post_Licence_Type) {
		try{
		if($post_Licence_Type) {
			
			$this->db->where('ConfigurationId',$post_Licence_Type['id']);
			$res = $this->db->delete('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Licence_Type['Userid']),
					'Module' => 'Licence-Type',
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
