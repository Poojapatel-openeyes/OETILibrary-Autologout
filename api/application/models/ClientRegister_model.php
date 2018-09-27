<?php

class ClientRegister_model extends CI_Model
{
	public function getlist_country() {
		try{
		$this->db->select('CountryId,CountryName');
		$this->db->where('IsActive="1"');
		$this->db->order_by('CountryName','asc');
		$result = $this->db->get('tblmstcountry');
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

	public function get_userdata($id = NULL){
		try{
		if(!empty($id)) {
			$res = array();
			$this->db->select('UserId,RoleId,EmailAddress,FirstName,LastName,PhoneNumber');
			$this->db->where('StatusId="1"');
			$this->db->where('InvitationCode',$id);
			$result = $this->db->get('tbluser');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if ($result->num_rows() == 1) {
				//$res = array();
				foreach($result->result() as $row) {
					$res['user'] = $row;
					$this->db->select('CompanyId,ParentId,UserId,CompanyName,CompanyEmail,Website,WorkspaceURL');
					$this->db->where('UserId',$row->UserId);
					$result1 = $this->db->get('tblcompany');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					if ($result1->num_rows() == 1) {
						foreach($result1->result() as $row1) {
							$res['company'] = $row1;
						}
					}
				}
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

	//List state
	public function getlist_state()
	{
		try{
		$this->db->select('StateId,StateName');
		$this->db->order_by('StateName','asc');
		$result=$this->db->get('tblmststate');
		$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	public function getStateList($country_id = NULL) {
		try{
		if($country_id) {
			
			$this->db->select('StateId,StateName');
			$this->db->order_by('StateName','asc');
			$this->db->where('IsActive="1"');
			$this->db->where('CountryId',$country_id);

			$result = $this->db->get('tblmststate');
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
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	public function updateClient($post_user)
	{	
		try{
		if($post_user)
		{	
			$client_data=$post_user['RegisterEntity'];
			$company_data=$post_user['CompanyEntity'];

			if(isset($client_data['Address2']) && !empty($client_data['Address2'])){
				$Address2 = $client_data['Address2'];
			}	else {
				$Address2 = '';
			}
			$personal_data=array(
					"FirstName"=>$client_data['FirstName'],
					"LastName"=>$client_data['LastName'],
					"Password"=>md5($client_data['Password']),
					"Address1"=>$client_data['Address1'],
					"Address2"=>$Address2,
					"StateId"=>$client_data['StateId'],
					"City"=>$client_data['City'],
					"ZipCode"=>$client_data['ZipCode'],
					"PhoneNumber"=>$client_data['PhoneNumber'],
					"StatusId"=>0,
					"InvitationCode"=>"",
					"CreatedBy" =>$client_data['UserId'],
					"UpdatedBy" =>$client_data['UserId'],
					'UpdatedOn' => date('y-m-d H:i:s'),
				);	
				
				$this->db->where('UserId',$client_data['UserId']);
				$res = $this->db->update('tbluser',$personal_data);
				$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
					if($res)
					{
						if($company_data['fileToUpload']){
							if($company_data['Faviconicon']){
								$company_details=array(
									"UserId"=>$client_data['UserId'],
									"CompanyName"=>$company_data['CompanyName'],
									"CompanyEmail"=>$company_data['CEmailAddress'],
									"Address"=>$company_data['Address'],
									"Website"=>$company_data['URL'],
									"CompanyLogo"=>$company_data['fileToUpload'],
									"Favicon"=>$company_data['Faviconicon'],
									"PhoneNo"=>$company_data['ContactNumber'],
									"ThemeCode"=>$company_data['ThemeCode'],
									"CreatedBy" =>$client_data['UserId'],
									"UpdatedBy" =>$client_data['UserId'],
									'UpdatedOn' => date('y-m-d H:i:s'),
								);	
							} else {
								$company_details=array(
									"UserId"=>$client_data['UserId'],
									"CompanyName"=>$company_data['CompanyName'],
									"CompanyEmail"=>$company_data['CEmailAddress'],
									"Address"=>$company_data['Address'],
									"Website"=>$company_data['URL'],
									"CompanyLogo"=>$company_data['fileToUpload'],
									"PhoneNo"=>$company_data['ContactNumber'],
									"ThemeCode"=>$company_data['ThemeCode'],
									"CreatedBy" =>$client_data['UserId'],
									"UpdatedBy" =>$client_data['UserId'],
									'UpdatedOn' => date('y-m-d H:i:s'),
								);	
							}
						} else if($company_data['Faviconicon']){
							$company_details=array(
								"UserId"=>$client_data['UserId'],
								"CompanyName"=>$company_data['CompanyName'],
								"CompanyEmail"=>$company_data['CEmailAddress'],
								"Address"=>$company_data['Address'],
								"Website"=>$company_data['URL'],
								"Favicon"=>$company_data['Faviconicon'],
								"PhoneNo"=>$company_data['ContactNumber'],
								"ThemeCode"=>$company_data['ThemeCode'],
								"CreatedBy" =>$client_data['UserId'],
								"UpdatedBy" =>$client_data['UserId'],
								'UpdatedOn' => date('y-m-d H:i:s'),
							);	
						} else {
							$company_details=array(
								"UserId"=>$client_data['UserId'],
								"CompanyName"=>$company_data['CompanyName'],
								"CompanyEmail"=>$company_data['CEmailAddress'],
								"Address"=>$company_data['Address'],
								"Website"=>$company_data['URL'],
								"PhoneNo"=>$company_data['ContactNumber'],
								"ThemeCode"=>$company_data['ThemeCode'],
								"CreatedBy" =>$client_data['UserId'],
								"UpdatedBy" =>$client_data['UserId'],
								'UpdatedOn' => date('y-m-d H:i:s'),
							);	
						}
						$this->db->where('CompanyId',$company_data['CompanyId']);
						$res1 = $this->db->update('tblcompany',$company_details);
						$db_error = $this->db->error();
						if (!empty($db_error) && !empty($db_error['code'])) { 
							throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
							return false; // unreachable return statement !!!
						}
						if($res1)
						{
							return $client_data;
						}
						else{
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
?>