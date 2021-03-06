<?php

class Country_model extends CI_Model
 {

	public function add_Country($post_Country) {
		try{
		if($post_Country) {	

			if($post_Country['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}				
			$Country_data = array(				
				'CountryName' => trim($post_Country['CountryName']),
				'CountryAbbreviation' => trim($post_Country['CountryAbbreviation']),
				'PhonePrefix' => trim($post_Country['PhonePrefix']),
				'CreatedBy' => trim($post_Country['CreatedBy']),
				'UpdatedBy' => trim($post_Country['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
				'IsActive' => $IsActive			
			);
			
			$res = $this->db->insert('tblmstcountry',$Country_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Country['UpdatedBy']),
					'Module' => 'Country',
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
	
	public function getlist_Country() {
		try{
		$this->db->select('c.CountryId,c.CountryName,c.CountryAbbreviation,c.PhonePrefix,c.IsActive,(SELECT COUNT(st.StateId) FROM tblmststate as st WHERE st.CountryId=c.CountryId) as isdisabled');
		$this->db->order_by('c.CountryId','asc');
		$result = $this->db->get('tblmstcountry as c');
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
	
	
	public function get_Countrydata($Country_Id = NULL)
	{
		try{
		if($Country_Id) {			
			$this->db->select('c.CountryId,c.CountryName,c.CountryAbbreviation,c.PhonePrefix,c.IsActive,(SELECT COUNT(st.StateId) FROM tblmststate as st WHERE st.CountryId=c.CountryId) as isdisabled');
			$this->db->where('c.CountryId',$Country_Id);
			$result = $this->db->get('tblmstcountry as c');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$Country_data = array();
			foreach($result->result() as $row) {
				$Country_data = $row;
			}
			return $Country_data;			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_Country($post_Country) {
	try{
		if($post_Country) {
			if($post_Country['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$Country_data = array(
				'CountryName' => trim($post_Country['CountryName']),
				'CountryAbbreviation' => trim($post_Country['CountryAbbreviation']),
				'PhonePrefix' => trim($post_Country['PhonePrefix']),
				'UpdatedBy' => trim($post_Country['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
				'IsActive' => $IsActive				
			);
			
			$this->db->where('CountryId',$post_Country['CountryId']);
			$res = $this->db->update('tblmstcountry',$Country_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Country['UpdatedBy']),
					'Module' => 'Country',
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
	
	
	public function delete_Country($post_Country) {
	try{
		if($post_Country) {
			
			$this->db->where('CountryId',$post_Country['id']);
			$res = $this->db->delete('tblmstcountry');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Country['Userid']),
					'Module' => 'Country',
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
			$this->db->where('CountryId',trim($post_data['CountryId']));
			$res = $this->db->update('tblmstcountry',$data);
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
