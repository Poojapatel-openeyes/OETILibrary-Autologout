<?php

class EditProfile_model extends CI_Model
{
	public function getlist_country() {
		try{
		$this->db->select('CountryId,CountryName');
		$this->db->where('IsActive="1"');
		$this->db->order_by('CountryName','asc');
		$result = $this->db->get('tblmstcountry');
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

	public function getStateList($country_id = NULL) {
		try{
		if($country_id) {
			
			$this->db->select('StateId,StateName');
			$this->db->order_by('StateName','asc');
			$this->db->where('IsActive="1"');
			$this->db->where('CountryId',$country_id);
			$result = $this->db->get('tblmststate');				
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
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
		
	public function get_userdata($user_id=Null)
	{
		try{
	    if($user_id)
	    {		  
		    $this->db->select('us.UserId,us.RoleId,us.FirstName,us.LastName,us.EmailAddress,us.Address1,
			us.Address2,tc.CountryId,us.StateId,us.City,us.ZipCode,us.PhoneNumber');
			
			$this->db->join('tblmststate tc', 'us.StateId = tc.StateId', 'left');
			$this->db->where('UserId',$user_id);
			$result = $this->db->get('tbluser us');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$user_data= array();
			foreach($result->result() as $row)
			{
				$user_data=$row;				
			}
		 	return $user_data;		 
		}
		else
		{
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}

	public function get_companydata($user_id=Null)
	{
		try{
	    if($user_id)
	    {		  
		    $this->db->select('CompanyId,ParentId,UserId,CompanyName,CompanyLogo,Favicon,CompanyEmail,Website,WorkspaceURL,ThemeCode,PhoneNo,Address,IsActive');
			$this->db->where('UserId',$user_id);
			$result = $this->db->get('tblcompany');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$company_data= array();
			foreach($result->result() as $row)
			{
				$company_data=$row;				
			}
		 	return $company_data;		 
		}
		else
		{
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}

	public function edit_profile($post_user) {
		try{
		if($post_user) 
		{
			$user_data = array(
				"FirstName"=>$post_user['FirstName'],
				"LastName"=>$post_user['LastName'],
				"EmailAddress"=>$post_user['EmailAddress'],
				"Address1"=>$post_user['Address1'],
				"Address2"=>$post_user['Address2'],
				"StateId"=>$post_user['StateId'],
				"City"=>$post_user['City'],
				"ZipCode"=>$post_user['ZipCode'],
				"PhoneNumber"=>$post_user['PhoneNumber'],
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$this->db->where('UserId',$post_user['UserId']);
			$res = $this->db->update('tbluser',$user_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) 
			{
				return true;
			} 
			else
			{
				return false;
			}
		}
		else 
		{
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}		
	}

	public function updateCompany($company_data)
	{
		try{
		if($company_data['fileToUpload']){
			if($company_data['Faviconicon']){
				$company_details=array(
					"CompanyName"=>$company_data['CompanyName'],
					"CompanyEmail"=>$company_data['CompanyEmail'],
					"Address"=>$company_data['Address'],
					"Website"=>$company_data['Website'],
					"CompanyLogo"=>$company_data['fileToUpload'],
					"Favicon"=>$company_data['Faviconicon'],
					"PhoneNo"=>$company_data['PhoneNo'],
					"ThemeCode"=>$company_data['ThemeCode'],
					"UpdatedBy" =>$company_data['UpdatedBy'],
					'UpdatedOn' => date('y-m-d H:i:s'),
				);
			} else {
				$company_details=array(
					"CompanyName"=>$company_data['CompanyName'],
					"CompanyEmail"=>$company_data['CompanyEmail'],
					"Address"=>$company_data['Address'],
					"Website"=>$company_data['Website'],
					"CompanyLogo"=>$company_data['fileToUpload'],
					"PhoneNo"=>$company_data['PhoneNo'],
					"ThemeCode"=>$company_data['ThemeCode'],
					"UpdatedBy" =>$company_data['UpdatedBy'],
					'UpdatedOn' => date('y-m-d H:i:s'),
				);
			}
		} else if($company_data['Faviconicon']){
			$company_details=array(
				"CompanyName"=>$company_data['CompanyName'],
				"CompanyEmail"=>$company_data['CompanyEmail'],
				"Address"=>$company_data['Address'],
				"Website"=>$company_data['Website'],
				"Favicon"=>$company_data['Faviconicon'],
				"PhoneNo"=>$company_data['PhoneNo'],
				"ThemeCode"=>$company_data['ThemeCode'],
				"UpdatedBy" =>$company_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
		} else {
			$company_details=array(
				"CompanyName"=>$company_data['CompanyName'],
				"CompanyEmail"=>$company_data['CompanyEmail'],
				"Address"=>$company_data['Address'],
				"Website"=>$company_data['Website'],
				"PhoneNo"=>$company_data['PhoneNo'],
				"ThemeCode"=>$company_data['ThemeCode'],
				"UpdatedBy" =>$company_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
		}
		
		$this->db->where('CompanyId',$company_data['CompanyId']);	
		$res = $this->db->update('tblcompany',$company_details);
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		if($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}		
	}
	
}