<?php

class AuditLog_model extends CI_Model
 {	
	public function getEmailLog() {
		try{
		$this->db->select('el.EmailLogId,el.From,el.Cc,el.Bcc,el.To,el.Subject,el.MessageBody,el.CreatedOn');
		$this->db->order_by('el.EmailLogId',"desc");
		$result = $this->db->get('tblemaillog as el');	
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

	public function getLoginLog() {
		try{
		$this->db->select('ll.LoginLogId,ll.UserId,ll.LoginType,ll.CreatedOn,CONCAT(u.FirstName," ",u.LastName) as UserName,ur.RoleName');
		$this->db->order_by('ll.LoginLogId',"desc");
		$this->db->join('tbluser u', 'u.UserId = ll.UserId', 'left');
		$this->db->join('tblmstuserrole ur', 'ur.RoleId = u.RoleId', 'left');
		$result = $this->db->get('tblloginlog as ll');
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

	public function getActivityLog() {
		try{
		$this->db->select('al.ActivityLogId,al.UserId,al.Module,al.Activity,al.CreatedOn,CONCAT(u.FirstName," ",u.LastName) as UserName,ur.RoleName');
		$this->db->order_by('al.ActivityLogId',"desc");
		$this->db->join('tbluser u', 'u.UserId = al.UserId', 'left');
		$this->db->join('tblmstuserrole ur', 'ur.RoleId = u.RoleId', 'left');
		$result = $this->db->get('tblactivitylog as al');	
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

	public function getErrorLog() {
		try{
		$this->db->select('el.id,el.errtype,el.errstr,el.errfile,el.errline,el.time');
		$this->db->where('el.time BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
		$this->db->order_by('el.id',"desc");
		$result = $this->db->get('tblerrorlog as el');	
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
}
