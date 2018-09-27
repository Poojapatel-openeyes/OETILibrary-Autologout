<?php

class Resetpassword_model extends CI_Model
{
	
	public function reset_password($post_pass) 
	{
		try{
		if($post_pass)
		{			
			$pass_data = array(
				'Password' =>md5(trim($post_pass['Password'])),
				'ResetPasswordCode' =>'',
				'UpdatedOn' => date('y-m-d H:i:s')				
			);
			
			$this->db->where('UserId',trim($post_pass['UserId']));
			$res = $this->db->update('tbluser',$pass_data);
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

	public function reset_passlink($post_passlink) 
	{
		try{
		if($post_passlink)
		{			
			$this->db->select('UserId,ResetPasswordCode');				
			$this->db->where('UserId',trim($post_passlink['UserId']));
			$this->db->where('ResetPasswordCode',trim($post_passlink['ResetPasswordCode']));			
			$this->db->limit(1);
			$this->db->from('tbluser');
			$query= $this->db->get();
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
			
			if ($query->num_rows() == 1) 
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
	
}