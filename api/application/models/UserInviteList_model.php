<?php

class UserInviteList_model extends CI_Model
 {
	public	function get_invimsg()
	{
		try{
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgSuccess');
		$result1=$this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgRevoke');
		$result2 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgPending');
		$result3 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		foreach($result1->result() as $row) {
			$res['Success'] = $row->Value;
		}
		foreach($result2->result() as $row) {
			$res['Revoke'] = $row->Value;
		}
		foreach($result3->result() as $row) {
			$res['Pending'] = $row->Value;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}

	}
	public function getlicenses($post_data)
	{
		try{
		$this->db->select('lp.LicensePackId,lp.Description,lp.Name,lp.NoOfLicense,lp.Price,lp.Validity,lp.DiscountId,lp.LicensePackType,lp.IsActive,cl.ExpiredDate,cl.ClientLicenseId as CLId');
		$this->db->join('tblclientlicense cl', 'cl.LicensePackId = lp.LicensePackId', 'left');
		 $this->db->where('lp.IsActive',1);
		 $this->db->where('cl.UserId',$post_data['userid']);
		 $result=$this->db->get('tblmstlicensepack lp');
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 //$this->db->limit(5);
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
	
	public function getlist_Invitation($post_data) {
		try{
		if($post_data['roleid']!=3){
			$array = array('u.RoleId' => 4);
			$this->db->select('u.UserId,CONCAT(u.FirstName," ",u.LastName) as Name,CONCAT(pu.FirstName," ",pu.LastName) as ClientName,u.EmailAddress,u.CreatedOn,u.StatusId,u.IsActive,u.ClientLicenseId');
			$this->db->join('tbluser pu', 'pu.UserId = u.ParentId', 'left');
			//$this->db->join('tblclientlicense cl', 'cl.UserId = pu.UserId', 'left');
			$this->db->where($array);
			$this->db->order_by('u.UserId','desc');
			$result = $this->db->get('tbluser u');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		} elseif($post_data['roleid']==3){
			$array = array('u.RoleId' => 4, 'u.ParentId' => $post_data['userid']);
			$this->db->select('u.UserId,CONCAT(u.FirstName," ",u.LastName) as Name,CONCAT(pu.FirstName," ",pu.LastName) as ClientName,u.EmailAddress,u.CreatedOn,u.StatusId,u.IsActive,u.ClientLicenseId');
			$this->db->join('tbluser pu', 'pu.UserId = u.ParentId', 'left');
			//$this->db->join('tblclientlicense cl', 'cl.UserId = pu.UserId', 'left');
			$this->db->where($array);
			$this->db->order_by('u.UserId','desc');
			$result = $this->db->get('tbluser u');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
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
	public function delete_Invitation($post_revoke) {
	try{
	if($post_revoke) {
		
			$Invitation_data = array(
				'StatusId' => 2,
				'InvitationCode' =>'',
				'ClientLicenseId' =>0,
				'UpdatedOn' => date('y-m-d H:i:s')
			
			);
			
			$this->db->where('UserId',$post_revoke['id']);
			$res = $this->db->update('tbluser',$Invitation_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				if($post_revoke['ClientLicenseId']>0){
				$this->db->set('RemainingLicense', 'RemainingLicense+1', FALSE);
                $this->db->where('ClientLicenseId',$post_revoke['ClientLicenseId']);
				$this->db->update('tblclientlicense');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				}
				$log_data = array(
					'UserId' => trim($post_revoke['Userid']),
					'Module' => 'User-Invitation',
					'Activity' =>'Revoke'
	
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
	public function ReInvite_Invitation($post_Invitation) {
	try{
	if($post_Invitation) {
		
			$Invitation_data = array(
				'StatusId' => 1,
				'InvitationCode' =>trim($post_Invitation['InvitationCode']),
				'ClientLicenseId' =>trim($post_Invitation['CLId']),
				'UpdatedBy' => trim($post_Invitation['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s')
			);
			
			$this->db->where('UserId',$post_Invitation['UserId']);
			$res = $this->db->update('tbluser',$Invitation_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {	
				if($post_Invitation['ClientLicenseId']>0){
				$this->db->set('RemainingLicense', 'RemainingLicense+1', FALSE);
                $this->db->where('ClientLicenseId',$post_Invitation['ClientLicenseId']);
				$this->db->update('tblclientlicense');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				}
				if($post_Invitation['CLId']>0){
					$this->db->set('RemainingLicense', 'RemainingLicense-1', FALSE);
					$this->db->where('ClientLicenseId',$post_Invitation['CLId']);
					$this->db->update('tblclientlicense');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					}
				
				$log_data = array(
				'UserId' => trim($post_Invitation['UpdatedBy']),
				'Module' => 'User-Invitation',
				'Activity' =>'ReInvitation'

			);
			$log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}
		}
		else {
			
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
			$this->db->where('UserId',trim($post_data['UserId']));
			$res = $this->db->update('tbluser',$data);
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_data['UpdatedBy']),
					'Module' => 'User',
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
