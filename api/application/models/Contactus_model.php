<?php

class Contactus_model extends CI_Model
 {
	public function getContactDetails() {
		try{	
		$this->db->select('ConfigurationId,Key,Value,Description');
		$this->db->where('Key','contactus_address');
		$result = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
		$res = array();
		if($result->result()) {
			$res['address'] = $result->result()[0]->Description;
		}
		$this->db->select('ConfigurationId,Key,Value,Description');
		$this->db->where('Key','contactus_phoneno');
		$result = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		if($result->result()) {
			$res['phone'] = $result->result()[0]->Value;
		}
		$this->db->select('ConfigurationId,Key,Value,Description');
		$this->db->where('Key','contactus_email');
		$result = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		if($result->result()) {
			$res['email'] = $result->result()[0]->Value;
		}
		$this->db->select('ConfigurationId,Key,Value,Description');
		$this->db->where('Key','contactus_latitude');
		$result = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		if($result->result()) {
			$res['latitude'] = $result->result()[0]->Value;
		}
		$this->db->select('ConfigurationId,Key,Value,Description');
		$this->db->where('Key','contactus_longitude');
		$result = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		if($result->result()) {
			$res['longitude'] = $result->result()[0]->Value;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}		
	}
	public function getContactById($user_id=Null) {
		try{
			$this->db->select('CONCAT(u.FirstName," ",u.LastName) as Name,u.EmailAddress as Email,u.PhoneNumber');
			$this->db->where('UserId',$user_id);
		$result=$this->db->get('tbluser u');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		$res=array();
		foreach($result->result() as $row)
		{
			$res=$row;
		}
		return $res;	
		}
		catch(Exception $e){
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}
	}
	public function add_Inquiry($post_Inquiry) {
		try{
		if($post_Inquiry) {	
				
			$Inquiry_data = array(				
				'Name' => trim($post_Inquiry['Name']),
				'Email' => trim($post_Inquiry['Email']),
				'PhoneNumber' => trim($post_Inquiry['PhoneNumber']),
				'Message' => trim($post_Inquiry['Message']),
				'CreatedBy' => trim($post_Inquiry['CreatedBy']),
			);
			
			$res = $this->db->insert('tblinquiry',$Inquiry_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Inquiry['CreatedBy']),
					'Module' => 'Inquiry',
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

	function getlist_Inquiry()
	{
		try{
		$this->db->select('inq.InquiryId,inq.Name,inq.Email,inq.PhoneNumber,inq.Message,inq.CreatedBy,inq.CreatedOn,CONCAT(u.FirstName," ",u.LastName) as UserName');
		$this->db->join('tbluser u', 'u.UserId = inq.CreatedBy', 'left');
		$result=$this->db->get('tblinquiry inq');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
}
