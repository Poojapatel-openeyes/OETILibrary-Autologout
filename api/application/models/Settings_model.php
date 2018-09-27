<?php

class Settings_model extends CI_Model
 {

	public function add_teamsize($post_teamsize) {
		try{
		if($post_teamsize) {
						
			$teamsize_data = array(
				'TeamSize' => $post_teamsize['TeamSize'],
				'CreatedBy' => $post_teamsize['CreatedBy'],
				'UpdatedBy' => $post_teamsize['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$res = $this->db->insert('tblmstteamsize',$teamsize_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_teamsize['UpdatedBy']),
					'Module' => 'Teamsize',
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

	public function addRemainigDays($post_rdays) {
		try{
		if($post_rdays) {
			$result = $this->db->truncate('tblmstreminderdays');
			if($result){
				foreach($post_rdays as $days) {

					$rdays_data = array(
						'Day' => $days['Day'],
						'CreatedBy' => $days['CreatedBy'],
						'UpdatedBy' => $days['UpdatedBy'],
						'UpdatedOn' => date('y-m-d H:i:s'),
					);
					
					$res = $this->db->insert('tblmstreminderdays',$rdays_data);
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
				}
				if($res) {
					$log_data = array(
						'UserId' => trim($days['UpdatedBy']),
						'Module' => 'Reminderdays',
						'Activity' =>'Add/Update'
		
					);
					$log = $this->db->insert('tblactivitylog',$log_data);
					return true;
				} else {
					return false;
				}
		
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
	
	public function getlist_teamsize() {
		try{
		$this->db->select('TeamSizeId,TeamSize,IsActive');
		$result = $this->db->get('tblmstteamsize');	
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
	public function get_Contact() {
		try{
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','ContactFrom');
		$result = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
	
		if($result->num_rows()==0){
			$data = array(
				'Key' => 'ContactFrom',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res = $this->db->insert('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','ContactFrom');
			$result = $this->db->get('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

		} 
		$res = array();
		foreach($result->result() as $row) {
			$res = $row;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}	
	}
	public function get_noofksa($userid = NULL){
		try{
		if($userid) {
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','NoOfKSA');
			$result = $this->db->get('tblmstconfiguration');			
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($result->num_rows()==0){
				$data = array(
					'Key' => 'NoOfKSA',
					'Value' => '50',
					'IsActive' => 1,
					'CreatedBy' => $userid,
					'UpdatedBy' => $userid,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);			
				$res = $this->db->insert('tblmstconfiguration',$data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$log_data = array(
					'UserId' => trim($userid),
					'Module' => 'NoOfKSA',
					'Activity' =>'Add'
	
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				$this->db->select('ConfigurationId,Key,Value');
				$this->db->where('Key','NoOfKSA');
				$result = $this->db->get('tblmstconfiguration');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			} 
			$res = array();
			foreach($result->result() as $row) {
				$res = $row;
			}
			return $res;

		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}	

	}

	public function get_invitation($userid = NULL){
		try{
		if($userid) {
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','Invitation');
			$result = $this->db->get('tblmstconfiguration');			
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($result->num_rows()==0){
				$data = array(
					'Key' => 'Invitation',
					'Value' => 1,
					'IsActive' => 1,
					'CreatedBy' => $userid,
					'UpdatedBy' => $userid,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);			
				$res = $this->db->insert('tblmstconfiguration',$data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$this->db->select('ConfigurationId,Key,Value');
				$this->db->where('Key','Invitation');
				$result = $this->db->get('tblmstconfiguration');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			} 
			$res = array();
			foreach($result->result() as $row) {
				$res = $row;
			}
			return $res;

		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}

	public function get_remainingdays(){
		try{
		$this->db->select('Day,CreatedBy,UpdatedBy');
		$result = $this->db->get('tblmstreminderdays');		
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

	public function get_isopenregister($userid = NULL){
		try{
		if($userid) {
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','IsOpenRegister');
			$result = $this->db->get('tblmstconfiguration');			
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($result->num_rows()==0){
				$data = array(
					'Key' => 'IsOpenRegister',
					'Value' => '',
					'IsActive' => 1,
					'CreatedBy' => $userid,
					'UpdatedBy' => $userid,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);			
				$res = $this->db->insert('tblmstconfiguration',$data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$log_data = array(
					'UserId' => trim($userid),
					'Module' => 'Open Register',
					'Activity' =>'Add'
	
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				$this->db->select('ConfigurationId,Key,Value');
				$this->db->where('Key','IsOpenRegister');
				$result = $this->db->get('tblmstconfiguration');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			} 
			$res = array();
			foreach($result->result() as $row) {
				$res = $row;
			}
			return $res;

		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}

	public function get_emailfrom($userid = NULL){
		try{
		if($userid) {
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','EmailFrom');
			$result = $this->db->get('tblmstconfiguration');			
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($result->num_rows()==0){
				$data = array(
					'Key' => 'EmailFrom',
					'Value' => '',
					'IsActive' => 1,
					'CreatedBy' => $userid,
					'UpdatedBy' => $userid,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);			
				$res = $this->db->insert('tblmstconfiguration',$data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$log_data = array(
					'UserId' => trim($userid),
					'Module' => 'SMTP Email',
					'Activity' =>'Add'
	
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				$this->db->select('ConfigurationId,Key,Value');
				$this->db->where('Key','EmailFrom');
				$result = $this->db->get('tblmstconfiguration');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			} 
			$res = array();
			foreach($result->result() as $row) {
				$res = $row;
			}
			return $res;

		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}

	public function get_emailpassowrd($userid = NULL){
		try{
		if($userid) {
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','EmailPassword');
			$result = $this->db->get('tblmstconfiguration');			
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($result->num_rows()==0){
				$data = array(
					'Key' => 'EmailPassword',
					'Value' => '',
					'IsActive' => 1,
					'CreatedBy' => $userid,
					'UpdatedBy' => $userid,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);			
				$res = $this->db->insert('tblmstconfiguration',$data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$log_data = array(
					'UserId' => trim($userid),
					'Module' => 'SMTP Password',
					'Activity' =>'Add'
	
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				$this->db->select('ConfigurationId,Key,Value');
				$this->db->where('Key','EmailPassword');
				$result = $this->db->get('tblmstconfiguration');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			} 
			$res = array();
			foreach($result->result() as $row) {
				$res = $row;
			}
			return $res;

		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	// public function get_teamsizedata($teamsize_id = NULL) {
		
	// 	if($teamsize_id) {
			
	// 		$this->db->select('*');
	// 		$this->db->where('TeamSizeId',$teamsize_id);
	// 		$result = $this->db->get('tblmstteamsize');
			
	// 		$teamsize_data = array();
	// 		foreach($result->result() as $row) {
	// 			$teamsize_data = $row;
	// 		}
	// 		return $teamsize_data;
			
	// 	} else {
	// 		return false;
	// 	}
	// }
	
	public function update_config($config_data) {
		try{
		if($config_data) {

			$data = array(
				'Value' => $config_data['Value'],
				'UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$this->db->where('Key',$config_data['Key']);
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($config_data['UpdatedBy']),
					'Module' => $config_data['Key'],
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

	public function updateEmail($config_data) {
		try{
		if($config_data) {

			$data = array(
				'Value' => $config_data['EmailFrom'],
				'UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			$data1 = array(
				'Value' => $config_data['EmailPassword'],
				'UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$this->db->where('Key','EmailFrom');
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$this->db->where('Key','EmailPassword');
				$res1 = $this->db->update('tblmstconfiguration',$data1);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				if($res1) {
					$log_data = array(
						'UserId' => trim($config_data['UpdatedBy']),
						'Module' => 'SMTP Details',
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
		} else {
			return false;
		}	
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	
	}
	public function addContact($config_data) {
		try{
		if($config_data) {

			$data = array(
				'Value' => $config_data['ContactFrom'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$this->db->where('Key','ContactFrom');
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
					return true;
				
				}else {
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
	public function addOpenRegister($config_data) {
		try{
		if($config_data) {
			if(trim($config_data['IsOpenRegister'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$data = array(
				'Value' => $IsActive,
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			
			$this->db->where('Key','IsOpenRegister');
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
					return true;
				
				}else {
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
	public function addinvimsg($config_data) {
		try{
		if($config_data) {

			$data = array(
				'Value' => $config_data['Success'],
				//UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			$data1 = array(
				'Value' => $config_data['Revoke'],
				//UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			
			$this->db->where('Key','InvitationMsgSuccess');
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$this->db->where('Key','InvitationMsgRevoke');
				$res1 = $this->db->update('tblmstconfiguration',$data1);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				   if($res1)
				   {
						$data2 = array(
							'Value' => $config_data['Pending'],
							//UpdatedBy' => $config_data['UpdatedBy'],
							'UpdatedOn' => date('y-m-d H:i:s'),
						);
						$this->db->where('Key','InvitationMsgPending');
						$res2 = $this->db->update('tblmstconfiguration',$data2);
						$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}
						return true;
				   }else
				   {
					return false; 
				   }
				}else {
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
	public function get_Invimsg() {
		try{
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgSuccess');
		$result1 = $this->db->get('tblmstconfiguration');
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

		if($result1->num_rows()==0){
			$data1 = array(
				'Key' => 'InvitationMsgSuccess',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res1 = $this->db->insert('tblmstconfiguration',$data1);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}
			$data2 = array(
				'Key' => 'InvitationMsgRevoke',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res2 = $this->db->insert('tblmstconfiguration',$data2);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}
			$data3 = array(
				'Key' => 'InvitationMsgPending',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res3 = $this->db->insert('tblmstconfiguration',$data3);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}
			$res = array();
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgSuccess');
		$result1 = $this->db->get('tblmstconfiguration');
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
	public function edit_teamsize($post_teamsize) {
		try{
		if($post_teamsize) {

			$teamsize_data = array(
				'TeamSize' => $post_teamsize['TeamSize'],
				'UpdatedBy' => $post_teamsize['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$this->db->where('TeamSizeId',$post_teamsize['TeamSizeId']);
			$res = $this->db->update('tblmstteamsize',$teamsize_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

			
			if($res) {
				$log_data = array(
					'UserId' => trim($post_teamsize['UpdatedBy']),
					'Module' => 'Teamsize',
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
	
	
	public function delete_teamsize($post_teamsize) {
		try{
		if($post_teamsize) {
			
			$this->db->where('TeamSizeId',$post_teamsize['id']);
			$res = $this->db->delete('tblmstteamsize');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_teamsize['Userid']),
					'Module' =>'Teamsize',
					'Activity' =>'Delete'
	
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

	public function get_noOfCArea() {
		try{
		$this->db->select('count(CAreaId) as count');
		$result = $this->db->get('tblmstcompetencyarea');	
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		if($result->result()) {
			$res = $result->result()[0]->count;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
		
	}

	public function get_totnoOfKsa()
	{	
		try{
		$this->db->select('count(KSAId) as count');
		$result = $this->db->get('tblmstksa');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}			
		if($result->result()) {
			$res = $result->result()[0]->count;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	public function get_ContactUs() {
		try{
		$this->db->select('ConfigurationId,Key,Value,Description');
		$this->db->where('Key','contactus_address');
		$result1 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','contactus_phoneno');
		$result2 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','contactus_email');
		$result3 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','contactus_latitude');
		$result4 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','contactus_longitude');
		$result5 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
	
		if($result1->num_rows()==0){
			$data1 = array(
				'Key' => 'contactus_address',
				'Value' => '',
				'Description' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res1 = $this->db->insert('tblmstconfiguration',$data1);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			
			$this->db->select('ConfigurationId,Key,Value,Description');
			$this->db->where('Key','contactus_address');
			$result1 = $this->db->get('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		} 
		if($result2->num_rows()==0){
			$data2 = array(
				'Key' => 'contactus_phoneno',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res2 = $this->db->insert('tblmstconfiguration',$data2);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','contactus_phoneno');
			$result2 = $this->db->get('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		} 
		if($result3->num_rows()==0){
			$data3 = array(
				'Key' => 'contactus_email',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res3 = $this->db->insert('tblmstconfiguration',$data3);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','contactus_email');
			$result3 = $this->db->get('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		} 
		if($result4->num_rows()==0){
			$data4 = array(
				'Key' => 'contactus_latitude',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res4 = $this->db->insert('tblmstconfiguration',$data4);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','contactus_latitude');
			$result4 = $this->db->get('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		} 
		if($result5->num_rows()==0){
			$data5 = array(
				'Key' => 'contactus_longitude',
				'Value' => '',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res5 = $this->db->insert('tblmstconfiguration',$data5);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			
			$this->db->select('ConfigurationId,Key,Value');
			$this->db->where('Key','contactus_longitude');
			$result5 = $this->db->get('tblmstconfiguration');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		} 
		$res = array();
		foreach($result1->result() as $row1) {
			$res['address'] = $row1->Description;
		}
		foreach($result2->result() as $row2) {
			$res['phoneno'] = $row2->Value;
		}
		foreach($result3->result() as $row3) {
			$res['email'] = $row3->Value;
		}
		foreach($result4->result() as $row4) {
			$res['Latitude'] = $row4->Value;
		}
		foreach($result5->result() as $row5) {
			$res['Longitude'] = $row5->Value;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
		
	}

	public function update_contactus($config_data) {
		try{
		if($config_data) {

			$data = array(
				'Description' => $config_data['address'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			$data1 = array(
				'Value' => $config_data['phoneno'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
						
			$this->db->where('Key','contactus_address');
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if($res) {
				$this->db->where('Key','contactus_phoneno');
				$res1 = $this->db->update('tblmstconfiguration',$data1);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
				   if($res1)
				   {
						$data2 = array(
							'Value' => $config_data['email'],
							'UpdatedOn' => date('y-m-d H:i:s'),
						);
						$this->db->where('Key','contactus_email');
						$res2 = $this->db->update('tblmstconfiguration',$data2);
						$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	

						$data3 = array(
							'Value' => $config_data['Latitude'],
							'UpdatedOn' => date('y-m-d H:i:s'),
						);
						$this->db->where('Key','contactus_latitude');
						$res2 = $this->db->update('tblmstconfiguration',$data3);
						$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	

						$data4 = array(
							'Value' => $config_data['Longitude'],
							'UpdatedOn' => date('y-m-d H:i:s'),
						);
						$this->db->where('Key','contactus_longitude');
						$res2 = $this->db->update('tblmstconfiguration',$data4);
						$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
						return true;
				   }else
				   {
					return false; 
				   }
				}else {
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
	public function addreminder($config_data) {
		try{
		if($config_data) {

			$data = array(
				'Value' => $config_data['noofLicense'],
				//UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			$data1 = array(
				'Value' => $config_data['LicenseExpiry'],
				//UpdatedBy' => $config_data['UpdatedBy'],
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			
			$this->db->where('Key','noofLicense');
			$res = $this->db->update('tblmstconfiguration',$data);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
			if($res) {
				$this->db->where('Key','LicenseExpiry');
				$res1 = $this->db->update('tblmstconfiguration',$data1);
				$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
				   if($res1)
				   {
						$data2 = array(
							'Value' => $config_data['IncompleteFeedback'],
							//UpdatedBy' => $config_data['UpdatedBy'],
							'UpdatedOn' => date('y-m-d H:i:s'),
						);
						$this->db->where('Key','IncompleteFeedback');
						$res2 = $this->db->update('tblmstconfiguration',$data2);
						$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
						return true;
				   }else
				   {
					return false; 
				   }
				}else {
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
	public function get_reminder() {
		try{
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','noofLicense');
		$result1 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}			
	
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','LicenseExpiry');
		$result2 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','IncompleteFeedback');
		$result3 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	

		if($result1->num_rows()==0){
			$data1 = array(
				'Key' => 'noofLicense',
				'Value' => '2',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res1 = $this->db->insert('tblmstconfiguration',$data1);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
			$data2 = array(
				'Key' => 'LicenseExpiry',
				'Value' => '2',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res2 = $this->db->insert('tblmstconfiguration',$data2);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
			$data3 = array(
				'Key' => 'IncompleteFeedback',
				'Value' => '2',
				'IsActive' => 1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);			
			$res3 = $this->db->insert('tblmstconfiguration',$data3);
			$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	
			$res = array();
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','noofLicense');
		$result1 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}			
	
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','LicenseExpiry');
		$result2 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','IncompleteFeedback');
		$result3 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}	

		} 
		foreach($result1->result() as $row) {
			$res['noofLicense'] = $row->Value;
		}
		foreach($result2->result() as $row) {
			$res['LicenseExpiry'] = $row->Value;
		}
		foreach($result3->result() as $row) {
			$res['IncompleteFeedback'] = $row->Value;
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
}
 