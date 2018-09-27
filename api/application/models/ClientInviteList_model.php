<?php

class ClientInviteList_model extends CI_Model
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
	
	public function getlist_Invitation() {
		try{
        $array = array('RoleId' => 3);
		$this->db->select('UserId,EmailAddress,CreatedOn,StatusId','InvitationCode');
		$this->db->where($array);
		$this->db->order_by('UserId','desc');
		$result = $this->db->get('tbluser');
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
public function delete_Invitation($post_revoke) {
	try{
	if($post_revoke) {
		
			$Invitation_data = array(
				'StatusId' => 2,
				'InvitationCode' =>'',
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
				$log_data = array(
					'UserId' => trim($post_revoke['Userid']),
					'Module' => 'Client-Invitation',
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
	
}
