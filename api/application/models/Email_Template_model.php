<?php

class Email_Template_model extends CI_Model
 {

	public function add_email($post_email) {
		try{
		if($post_email) {
			
			if(trim($post_email['check'])==0){
				if(trim($post_email['IsActive'])==1){

					$this->db->select('EmailId');
					$this->db->where('TokenId',trim($post_email['TokenId']));
					$this->db->where('To',trim($post_email['To']));
					$this->db->where('IsActive',true);
					$query = $this->db->get('tblemailtemplate');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					if($query->num_rows() > 0)
					{
						return 'sure';		
					} 
				}	
			}	
			
			if(trim($post_email['IsActive'])==1){
				$email_updatedata = array(
					'IsActive' => false,
				);
				$this->db->where('TokenId',trim($post_email['TokenId']));
				$this->db->where('To',trim($post_email['To']));
				$this->db->where('IsActive',true);
				$update_res = $this->db->update('tblemailtemplate',$email_updatedata);
				$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			}

			if(trim($post_email['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(isset($post_email['BccEmail']) && !empty(trim($post_email['BccEmail']))){
				$BccEmail = trim($post_email['BccEmail']);
			} else {
				$BccEmail = '';
			}		
			$email_data = array(
				'TokenId' => trim($post_email['TokenId']),
				'Subject' => trim($post_email['Subject']),
				'EmailBody' => trim($post_email['EmailBody']),
				'To' => trim($post_email['To']),
				'Cc' => trim($post_email['Cc']),
				'Bcc' => trim($post_email['Bcc']),
				'BccEmail' => $BccEmail,
				'IsActive' => $IsActive,
				'CreatedBy' => trim($post_email['CreatedBy']),
				'UpdatedBy' => trim($post_email['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);

			$res = $this->db->insert('tblemailtemplate',$email_data);
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			if($res) {
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
	
	public function getlist_email() {
		try{
		$this->db->select('et.EmailId,t.DisplayText as Token,et.Subject,et.EmailBody,et.To,et.Cc,et.Bcc,et.IsActive,role1.RoleName as roleTo,role2.RoleName as roleCc,role3.RoleName as roleBcc');
		$this->db->join('tblmstuserrole role1', 'role1.RoleId = et.To', 'left');
		$this->db->join('tblmstuserrole role2', 'role2.RoleId = et.Cc', 'left');
		$this->db->join('tblmstuserrole role3', 'role3.RoleId = et.Bcc', 'left');
		$this->db->join('tblmsttoken t', 't.TokenId = et.TokenId', 'left');
		$this->db->order_by('EmailId','asc');
		$result = $this->db->get('tblemailtemplate as et');
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
	
	
	public function get_emaildata($email_id = NULL) {
		try{
		if($email_id) {
			
			$this->db->select('EmailId,TokenId,Subject,EmailBody,To,Cc,Bcc,BccEmail,IsActive');
			$this->db->where('EmailId',$email_id);
			$result = $this->db->get('tblemailtemplate');
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			$email_data = array();
			foreach($result->result() as $row){
				$email_data = $row;
			}
			return $email_data;
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}		
	}
	
	
	public function edit_email($post_email) {
		try{
		if($post_email) {
			
			if(trim($post_email['check'])==0){
				if(trim($post_email['IsActive'])==1){

					$this->db->select('EmailId');
					$this->db->where('TokenId',trim($post_email['TokenId']));
					$this->db->where('To',trim($post_email['To']));
					$this->db->where('IsActive',true);
					$query = $this->db->get('tblemailtemplate');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					if($query->num_rows() > 0){
						return 'sure';		
					} 
				}	
			}	
			
			if(trim($post_email['IsActive']==1)){
				$email_updatedata = array(
					'IsActive' => false,
				);
				$this->db->where('TokenId',trim($post_email['TokenId']));
				$this->db->where('To',trim($post_email['To']));
				$this->db->where('IsActive',true);
				$update_res = $this->db->update('tblemailtemplate',$email_updatedata);
				$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			}
						
			if(trim($post_email['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(isset($post_email['BccEmail']) && !empty(trim($post_email['BccEmail']))){
				$BccEmail = trim($post_email['BccEmail']);
			} else {
				$BccEmail = '';
			}		
			$email_data = array(
				'TokenId' => trim($post_email['TokenId']),
				'Subject' => trim($post_email['Subject']),
				'EmailBody' => trim($post_email['EmailBody']),
				'To' => trim($post_email['To']),
				'Cc' => trim($post_email['Cc']),
				'Bcc' => trim($post_email['Bcc']),
				'BccEmail' => $BccEmail,
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_email['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);

			$this->db->where('EmailId',$post_email['EmailId']);
			$res = $this->db->update('tblemailtemplate',$email_data);
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			if($res) {
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
	
	
	public function delete_email($email_id) {
		try{
		if($email_id) {
			
			$this->db->where('EmailId',$email_id);
			$res = $this->db->delete('tblemailtemplate');
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			if($res) {
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

	public function getRoleList() {
		try{
		$this->db->select('RoleId,RoleName,IsActive');
		$this->db->where('RoleName!=','IT');
		$this->db->order_by('RoleName','asc');
		$result = $this->db->get('tblmstuserrole');
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

	public function getPlaceholderList() {
		try{
		$this->db->select('PlaceholderId,PlaceholderName,IsActive');
		$this->db->where('IsActive',1);
		$result = $this->db->get('tblmstplaceholder');
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

	public function getTokenList() {
		try{
		$this->db->select('TokenId,DisplayText,IsActive');
		$this->db->where('IsActive',1);
		$result = $this->db->get('tblmsttoken');
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
			$this->db->where('EmailId',trim($post_data['EmailId']));
			$res = $this->db->update('tblemailtemplate',$data);
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
