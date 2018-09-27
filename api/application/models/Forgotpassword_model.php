<?php

class Forgotpassword_model extends CI_Model
{
	
	public function forgot_password($post_pass) 
	{
		try{
		if($post_pass)
		{
			$this->db->select('u.UserId,u.EmailAddress,u.ResetPasswordCode,u.RoleId,c.WorkspaceURL as WorkspaceURL,pc.WorkspaceURL as pWorkspaceURL');
			$this->db->join('tblcompany c', 'c.UserId = u.UserId', 'left');
			$this->db->join('tblcompany pc', 'pc.UserId = u.ParentId', 'left');
			$this->db->from('tbluser u');				
			$this->db->where('EmailAddress',trim($post_pass['EmailAddress']));	
			$this->db->where('StatusId',0);			
			$this->db->limit(1);
			$query = $this->db->get();
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$res=$query->result();

			if ($query->num_rows() == 1) 
			{
				if($post_pass['WorkspaceURL']!=null && $res[0]->RoleId==3){
					if($res[0]->WorkspaceURL!=$post_pass['WorkspaceURL']){
						return false;
					} 
				} elseif($post_pass['WorkspaceURL']!=null && $res[0]->RoleId==4){
					if($res[0]->pWorkspaceURL!=$post_pass['WorkspaceURL']){
						return false;
					}
				} elseif($post_pass['WorkspaceURL']!=null && ($res[0]->RoleId==1 || $res[0]->RoleId==2 || $res[0]->RoleId==5)){
					return false;
				} 

				$pass_data = array(
					'ResetPasswordCode' => $post_pass['ResetPasswordCode'],
					'CreatedOn' => date('y-m-d H:i:s'),
					'UpdatedOn' => date('y-m-d H:i:s')
				);				
				$this->db->where('EmailAddress',trim($post_pass['EmailAddress']));
				$res1 = $this->db->update('tbluser',$pass_data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				if($res1)
				{
					$pass = array();
					foreach($query->result() as $row) {
						$pass = $row;
					}
					return $pass;
				}else
				{
					return false;
				}			
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
	
}