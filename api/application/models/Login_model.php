<?php

class Login_model extends CI_Model {

	public function check_login($data) {
		try{
		$this->db->select('u.UserId,u.RoleId,u.FirstName,u.LastName,u.EmailAddress,c.WorkspaceURL as WorkspaceURL,pc.WorkspaceURL as pWorkspaceURL');
		$this->db->join('tblcompany c', 'c.UserId = u.UserId', 'left');
		$this->db->join('tblcompany pc', 'pc.UserId = u.ParentId', 'left');
		$this->db->from('tbluser u');
		$this->db->where('u.EmailAddress',trim($data['EmailAddress']));
		$this->db->where('u.Password',md5(trim($data['Password'])));
		$this->db->where('u.StatusId',0);
		$this->db->where('u.IsActive',1);
		$this->db->limit(1);
		$query = $this->db->get();
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$res=$query->result();
		if ($query->num_rows() == 1) {
			if($data['WorkspaceURL']!=null && $res[0]->RoleId==3){
				if($res[0]->WorkspaceURL!=$data['WorkspaceURL']){
					return false;
				} 
			} elseif($data['WorkspaceURL']!=null && $res[0]->RoleId==4){
				if($res[0]->pWorkspaceURL!=$data['WorkspaceURL']){
					return false;
				}
			} elseif($data['WorkspaceURL']!=null && ($res[0]->RoleId==1 || $res[0]->RoleId==2 || $res[0]->RoleId==5)){
				return false;
			} 
				$login_data = array(
					'UserId ' => trim($res[0]->UserId),
					'LoginType' => 1
				);			
				$res = $this->db->insert('tblloginlog',$login_data);
				return $query->result();
			
			
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
