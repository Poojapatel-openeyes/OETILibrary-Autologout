<?php

class Client_Invite_model extends CI_Model
 {

	public function add_Invitation($post_Invitation) {
		try{
		if($post_Invitation) {
			$this->db->select('EmailAddress');
			$this->db->from('tbluser');
			$this->db->where('EmailAddress',trim($post_Invitation['EmailAddress']));
			$this->db->limit(1);
			$query = $this->db->get();
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			$this->db->select('WorkspaceURL');
			$this->db->from('tblcompany');
			$this->db->where('WorkspaceURL',trim($post_Invitation['WorkspaceURL']));
			$this->db->limit(1);
			$query1 = $this->db->get();

			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			if ($query->num_rows() == 1 || $query1->num_rows() == 1) {
				return false;
			} 
			else 
			{
				$Invitation_data = array(
					'FirstName' =>  trim($post_Invitation['FirstName']),
					'LastName' =>  trim($post_Invitation['LastName']),
					'EmailAddress' =>  trim($post_Invitation['EmailAddress']),
					'PhoneNumber' =>  trim($post_Invitation['ContactNumber']),
					'RoleId' =>  3,					
					'StatusId' =>  1,
					'InvitationCode' =>  trim($post_Invitation['InvitationCode']),
					'UpdatedOn' => date('y-m-d H:i:s')
				);
				$res = $this->db->insert('tbluser',$Invitation_data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				if($res) {
					$userid = $this->db->insert_id();
					$Company_data = array(
						'UserId' =>  $userid,
						'CompanyName' =>  trim($post_Invitation['CompanyName']),
						'CompanyEmail' =>  trim($post_Invitation['CompanyEmail']),
						'Website' =>  trim($post_Invitation['URL']),
						'WorkspaceURL' =>  trim($post_Invitation['WorkspaceURL']),
						'UpdatedOn' => date('y-m-d H:i:s')
					);
					$res = $this->db->insert('tblcompany',$Company_data);
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					return $userid;
				} else {
					return false;
				}
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

	public function check_openRegister(){
		try{
		$this->db->select('Value');
		$this->db->from('tblmstconfiguration');
		$this->db->where('Key','IsOpenRegister');
		$query = $this->db->get();
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$res=$query->result();
		if ($query->num_rows() == 1) {
			return $res[0];
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
