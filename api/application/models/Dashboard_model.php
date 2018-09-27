<?php

class Dashboard_model extends CI_Model
 {
	public function getClientDashboard($ClientId=Null)
	{
		try{
	  if($ClientId)
	  {
		 $this->db->select('u.UserId,u.FirstName,u.EmailAddress,u.CreatedOn,u.StatusId');
		 $this->db->where('u.ParentId',$ClientId);
		 $this->db->order_by('u.CreatedOn','desc');
		 $this->db->limit(5);
		 $result1=$this->db->get('tbluser as u');
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 if($result1->result()) {
			$data['users'] = $result1->result();
		}

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
		$data['status'] = $res;

		$this->db->select('CONCAT(u.FirstName," ",u.LastName) as Name,u.EmailAddress,uf.EndDateTime');
		$this->db->join('tbluser u', 'u.UserId=uf.userId', 'inner');
		$this->db->where('u.ParentId',$ClientId);
		$this->db->where('uf.EndDateTime is NOT NULL');
		 $this->db->order_by('uf.EndDateTime','desc');
		 $this->db->limit(5);
		$result4=$this->db->get('tbluserfeedback uf');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
		if($result4->result())
		{
			$data['feedbacks']=$result4->result();
		}

		$register_user=$this->db->query('SELECT COUNT(u.UserId) as registered_user FROM tbluser as u WHERE u.ParentId='.$ClientId.' and u.StatusId=0');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$total_feedback=$this->db->query('SELECT COUNT(u.UserId) as total_feedback FROM tbluser as u inner join tbluserfeedback as uf on u.UserId=uf.UserId WHERE u.ParentId='.$ClientId.' and uf.EndDateTime IS NOT NULL');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$incomplete_feedback=$this->db->query('SELECT COUNT(u.UserId) as incomplete_feedback FROM tbluser as u inner join tbluserfeedback as uf on u.UserId=uf.UserId WHERE u.ParentId='.$ClientId.' and uf.EndDateTime IS NULL');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$today_feedback=$this->db->query('SELECT COUNT(u.UserId) as today_feedback FROM tbluser as u inner join tbluserfeedback as uf on u.UserId=uf.UserId WHERE u.ParentId='.$ClientId.' and uf.EndDateTime IS NOT NULL and DATE(NOW()) = DATE(uf.EndDateTime)');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$data['registered_user']=$register_user->result()[0]->registered_user;
		$data['total_feedback']=$total_feedback->result()[0]->total_feedback;
		$data['incomplete_feedback']=$incomplete_feedback->result()[0]->incomplete_feedback;
		$data['today_feedback']=$today_feedback->result()[0]->today_feedback;

		$total_licenses=$this->db->query('SELECT SUM(cl.TotalLicense) as total_licenses FROM tblclientlicense as cl INNER JOIN tbluser as u ON u.UserId=cl.UserId WHERE u.UserId='.$ClientId);
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$remaining_licenses=$this->db->query('SELECT SUM(cl.RemainingLicense) as remaining_licenses FROM tblclientlicense as cl INNER JOIN tbluser as u ON u.UserId=cl.UserId WHERE u.UserId='.$ClientId);
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		$data['total_licenses']=$total_licenses->result()[0]->total_licenses;
		$data['remaining_licenses']=$remaining_licenses->result()[0]->remaining_licenses;

		return $data;		 
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

	public function getDashboard($Id=Null)
	{
		try{
	  if($Id)
	  {
		$this->db->select('u.EmailAddress,u.CreatedOn,u.StatusId,c.CompanyName');
		$this->db->join('tblcompany c', 'u.UserId=c.UserId', 'inner');
		// $this->db->where('u.UserId',$Id);
		 $this->db->where('u.RoleId',3);
		 $this->db->order_by('u.CreatedOn','desc');
		 $this->db->limit(5);
		 $AllData = array();
		 $result=$this->db->get('tbluser as u');
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 if($result->result()) {
			$AllData['clients'] = $result->result();
		}

		$this->db->select('inq.InquiryId,inq.Name,inq.Email,inq.PhoneNumber,inq.Message,inq.CreatedOn');
		$this->db->order_by('inq.CreatedOn','desc');
		$this->db->limit(5);
		$result11=$this->db->get('tblinquiry inq');
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 if($result11->result()) {
			$AllData['recentInquiry'] = $result11->result();
		}

		$month = date('m');
		if($month == 1){
			$sub_query = "SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy";
		}
		elseif($month == 2){
			$sub_query = "SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy";
		}
		elseif($month == 3){
			$sub_query = "SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy";
		}
		elseif($month == 4){
			$sub_query = "SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy";
		}
		elseif($month == 5){
			$sub_query = "SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy";
		}
		elseif($month == 6){
			$sub_query = "SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy";
		}
		elseif($month == 7){
			$sub_query = "SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy";
		}
		elseif($month == 8){
			$sub_query = "SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy";
		}
		elseif($month == 9){
			$sub_query = "SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy";
		} 
		elseif($month == 10){
			$sub_query = "SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy";
		} 
		elseif($month == 11){
			$sub_query = "SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy";
		} 
		elseif($month == 12){
			$sub_query = "SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy";
		} 

		$clientsByMonth=$this->db->query("SELECT COUNT(u.UserID) AS value, DATE_FORMAT(m.merge_date,'%b') AS month
     FROM (
		$sub_query
          ) AS m
LEFT JOIN tbluser u 
       ON MONTH(m.merge_date) = MONTH(u.CreatedOn)
	   and u.RoleId=3 
GROUP BY m.merge_date
ORDER BY OrderBy");
$db_error = $this->db->error();
if (!empty($db_error) && !empty($db_error['code'])) { 
	throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
	return false; // unreachable return statement !!!
}
$AllData['clientsByMonth'] = $clientsByMonth->result();


		$month1 = date('m');
		if($month1 == 1){
			$sub_query1 = "SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy";
		}
		elseif($month1 == 2){
			$sub_query1 = "SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy";
		}
		elseif($month1 == 3){
			$sub_query1 = "SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy";
		}
		elseif($month1 == 4){
			$sub_query1 = "SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy";
		}
		elseif($month1 == 5){
			$sub_query1 = "SELECT '2013-12-01' AS merge_date, 12 AS OrderBy
			UNION SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy";
		}
		elseif($month1 == 6){
			$sub_query1 = "SELECT '2013-01-01' AS merge_date, 1 AS OrderBy
			UNION SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy";
		}
		elseif($month1 == 7){
			$sub_query1 = "SELECT '2013-02-01' AS merge_date, 2 AS OrderBy
			UNION SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy";
		}
		elseif($month1 == 8){
			$sub_query1 = "SELECT '2013-03-01' AS merge_date, 3 AS OrderBy
			UNION SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy";
		}
		elseif($month1 == 9){
			$sub_query1 = "SELECT '2013-04-01' AS merge_date, 4 AS OrderBy
			UNION SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy";
		} 
		elseif($month1 == 10){
			$sub_query1 = "SELECT '2013-05-01' AS merge_date, 5 AS OrderBy
			UNION SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy";
		} 
		elseif($month1 == 11){
			$sub_query1 = "SELECT '2013-06-01' AS merge_date, 6 AS OrderBy
			UNION SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy";
		} 
		elseif($month1 == 12){
			$sub_query1 = "SELECT '2013-07-01' AS merge_date, 7 AS OrderBy
			UNION SELECT '2013-08-01' AS merge_date, 8 AS OrderBy
			UNION SELECT '2013-09-01' AS merge_date, 9 AS OrderBy
			UNION SELECT '2013-10-01' AS merge_date, 10 AS OrderBy
			UNION SELECT '2013-11-01' AS merge_date, 11 AS OrderBy
			UNION SELECT '2013-12-01' AS merge_date, 12 AS OrderBy";
		} 

$licensesByMonth=$this->db->query("SELECT COUNT(cl.ClientLicenseId) AS value, DATE_FORMAT(m.merge_date,'%b') AS month
     FROM (
		$sub_query1
          ) AS m
LEFT JOIN tblclientlicense cl
       ON MONTH(m.merge_date) = MONTH(cl.CreatedOn)
GROUP BY m.merge_date
ORDER BY OrderBy");
$db_error = $this->db->error();
if (!empty($db_error) && !empty($db_error['code'])) { 
	throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
	return false; // unreachable return statement !!!
}
$AllData['licensesByMonth'] = $licensesByMonth->result();

		
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgSuccess');
		$result2=$this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
		if (!empty($db_error) && !empty($db_error['code'])) { 
			throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			return false; // unreachable return statement !!!
		}
		
		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgRevoke');
		$result3 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
		if (!empty($db_error) && !empty($db_error['code'])) { 
			throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			return false; // unreachable return statement !!!
		}

		$this->db->select('ConfigurationId,Key,Value');
		$this->db->where('Key','InvitationMsgPending');
		$result4 = $this->db->get('tblmstconfiguration');
		$db_error = $this->db->error();
		if (!empty($db_error) && !empty($db_error['code'])) { 
			throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			return false; // unreachable return statement !!!
		}
		foreach($result2->result() as $row) {
			$res['Success'] = $row->Value;
		}
		foreach($result3->result() as $row) {
			$res['Revoke'] = $row->Value;
		}
		foreach($result4->result() as $row) {
			$res['Pending'] = $row->Value;
		}
		$AllData['status'] = $res;

		$this->db->select('u.FirstName,u.LastName,cl.CreatedOn,lp.Name,c.Value');
		$this->db->from('tblclientlicense AS cl');
		$this->db->join('tblmstlicensepack as lp', 'cl.LicensePackId=lp.LicensePackId', 'inner');
		$this->db->join('tblmstconfiguration as c', 'lp.LicensePackType=c.ConfigurationId', 'inner');
		$this->db->join('tbluser as u', 'cl.UserId=u.UserId', 'inner');
		 $this->db->order_by('cl.CreatedOn','desc');
		 $this->db->limit(5);
		 //$AllData = array();
		 $result5=$this->db->get();
		 $db_error = $this->db->error();
		if (!empty($db_error) && !empty($db_error['code'])) { 
			throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			return false; // unreachable return statement !!!
		}
		 if($result5->result()) {
			$AllData['clientlicenses'] = $result5->result();
		}

		$date = date("Y-m-d");
		$this->db->select('u.FirstName,u.LastName,a.CreatedOn,a.Module,a.Activity,lp.Name');
		$this->db->from('tblactivitylog AS a');
		$this->db->join('tbluser as u', 'a.UserId=u.UserId', 'left');
		$this->db->join('tblclientlicense as cl', 'a.ClientLicenseId=cl.ClientLicenseId', 'left');
		$this->db->join('tblmstlicensepack as lp', 'cl.LicensePackId=lp.LicensePackId', 'left');
		//$this->db->where('u.RoleId',3);
		$this->db->where('u.StatusId',0);
		$this->db->where('u.IsActive',1);
		$this->db->where("DATE(a.CreatedOn)", $date);
		$where = '(a.Module="Client-Registration" or a.Module = "Purchase-LicensePack")';
		$this->db->where($where);
		$where1 = '(a.Activity="Add" or a.Activity = "PurchaseLicense")';
		$this->db->where($where1);
		 $this->db->order_by('a.CreatedOn','desc');
		 $this->db->limit(5);
		 //$AllData = array();
		 $result6=$this->db->get();
		 $db_error = $this->db->error();
		 if (!empty($db_error) && !empty($db_error['code'])) { 
			throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			return false; // unreachable return statement !!!
		}
		 if($result6->result()) {
			$AllData['notifications'] = $result6->result();
		}

		$this->db->select('u.FirstName,u.LastName,a.CreatedOn,a.Module,a.Activity,lp.Name');
		$this->db->from('tblactivitylog AS a');
		$this->db->join('tbluser as u', 'a.UserId=u.UserId', 'left');
		$this->db->join('tblclientlicense as cl', 'a.ClientLicenseId=cl.ClientLicenseId', 'left');
		$this->db->join('tblmstlicensepack as lp', 'cl.LicensePackId=lp.LicensePackId', 'left');
		//$this->db->where('u.RoleId',3);
		$this->db->where('u.StatusId',0);
		$this->db->where('u.IsActive',1);
		$this->db->where('DATE(a.CreatedOn) BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');
		$where = '(a.Module="Client-Registration" or a.Module = "Purchase-LicensePack")';
		$this->db->where($where);
		$where1 = '(a.Activity="Add" or a.Activity = "PurchaseLicense")';
		$this->db->where($where1);
		 $this->db->order_by('a.CreatedOn','desc');
		 $this->db->limit(5);
		 //$AllData = array();
		 $result7=$this->db->get();
		 $db_error = $this->db->error();
		 if (!empty($db_error) && !empty($db_error['code'])) { 
			throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			return false; // unreachable return statement !!!
		}
		 if($result7->result()) {
			$AllData['notificationsMonth'] = $result7->result();
		}

		return $AllData;	
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
