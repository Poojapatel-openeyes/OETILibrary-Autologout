<?php

class Remaining_model extends CI_Model
{
	public function getlist_days()
	{

		$this->db->select('ConfigurationId,Key,Value,IsActive');
		$this->db->where('Key','IncompleteFeedback');
		$result=$this->db->get('tblmstconfiguration');
			foreach($result->result() as $row) {
				$res = $row->Value;
			}
			return $res;
	}
	public function getlist_value($datetime1)
	{
		$this->db->select('user.UserId,user.FirstName,user.EmailAddress,ca.UserFeedbackId,ca.StartDateTime,ca.EndDateTime');
		$this->db->where('DATE(ca.StartDateTime)',$datetime1);
		$this->db->where('ca.EndDateTime is NULL');
		$this->db->join('tbluser user','ca.UserId = user.UserId', 'left');
		$result = $this->db->get('tbluserfeedback ca');
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	public function getnoofLicense_days()
	{
		
		$this->db->select('ConfigurationId,Key,Value,IsActive');
		$this->db->where('Key','noofLicense');
		$result=$this->db->get('tblmstconfiguration');
			foreach($result->result() as $row) {
				$res = $row->Value;
			}
			return $res;
	}
	
	public function getnoofLicense_value($Day)
	{
		$this->db->select('user.UserId,user.FirstName,user.EmailAddress,ca.ClientLicenseId,ca.LicensePackId,ca.TotalLicense,ca.RemainingLicense');
		$this->db->where('ca.RemainingLicense',$Day);
		//$this->db->where('ca.EndDateTime is NULL');
		$this->db->join('tbluser user','ca.UserId = user.UserId', 'left');
		$result = $this->db->get('tblclientlicense ca');
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	
	public function getLicenseExpiry_days()
	{
		try{
		$this->db->select('ConfigurationId,Key,Value,IsActive');
		$this->db->where('Key','LicenseExpiry');
		$result=$this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			foreach($result->result() as $row) {
				$res = $row->Value;
			}
			return $res;
		}
		catch(Exception $e){
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}
	}
	public function getLicenseExpiry_value($datetime1)
	{
		$this->db->select('user.UserId,user.FirstName,user.EmailAddress,ca.ClientLicenseId,ca.LicensePackId,ca.ExpiredDate');
		$this->db->where('DATE(ca.ExpiredDate)',$datetime1);
		$this->db->join('tbluser user','ca.UserId = user.UserId', 'left');
		$result = $this->db->get('tblclientlicense ca');
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	public function getLicenseExpired_value($datetime1)
	{
		$this->db->select('user.UserId,user.FirstName,user.EmailAddress,ca.ClientLicenseId,ca.LicensePackId,ca.ExpiredDate');
		$this->db->where('DATE(ca.ExpiredDate)',$datetime1);
		$this->db->join('tbluser user','ca.UserId = user.UserId', 'left');
		$result = $this->db->get('tblclientlicense ca');
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
}
	
	
	
	
