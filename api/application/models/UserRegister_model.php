<?php

class UserRegister_model extends CI_Model
{
	public function get_userdata($id = NULL){
		try{
		if(!empty($id)) {
			$this->db->select('UserId,RoleId,ParentId,EmailAddress');
			$this->db->where('StatusId="1"');
			$this->db->where('InvitationCode',$id);
			$result = $this->db->get('tbluser');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if ($result->num_rows() == 1) {
				$res = array();
			foreach($result->result() as $row) {
				$res = $row;
			}
			return $res;
			} else {
				return false;
			}			
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}

	}
	public function updateUser($post_user)
	{
		try{	
		if($post_user)
		{	
			$user_data=array(
					"FirstName"=>$post_user['FirstName'],
					"LastName"=>$post_user['LastName'],
					"Password"=>md5($post_user['Password']),
					"PhoneNumber"=>$post_user['PhoneNumber'],
					"StatusId"=>0,
					"InvitationCode"=>"",
					"CreatedBy" =>$post_user['UserId'],
					"UpdatedBy" =>$post_user['UserId'],
					'UpdatedOn' => date('y-m-d H:i:s'),
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
						return $post_user;
						
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
