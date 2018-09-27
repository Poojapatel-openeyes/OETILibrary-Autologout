<?php

class Userscore_model extends CI_Model
 {	
	
	public function getuserscore($data) {
		try{
		if($data) {

		if($data['RoleId']!=3){
		$array = array('us.RoleId' => 4,'us.StatusId'=> 0);
		$this->db->select('us.UserId,CONCAT(us.FirstName," ",us.LastName) as Name,fd.StartDateTime,fd.EndDateTime,fc.Name as catName,sc.Score');
		$this->db->join('tbluserfeedback fd', 'fd.UserId = us.UserId', 'left');
		$this->db->join('tblcategorywisescore sc', 'sc.UserFeedbackId = fd.UserFeedbackId', 'left');
		$this->db->join('tblmstfeedbackcategory fc', 'fc.FeedbackCategoryId = sc.FeedbackCategoryId', 'left');
		$this->db->where($array);
		$result = $this->db->get('tbluser as us');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

		}elseif($data['RoleId']==3){
		$array = array('us.RoleId' => 4,'us.StatusId'=> 0,'us.ParentId' => $data['UserId']);
		$this->db->select('us.UserId,CONCAT(us.FirstName," ",us.LastName) as Name,fd.StartDateTime,fd.EndDateTime');
		$this->db->join('tbluserfeedback fd', 'fd.UserId = us.UserId', 'left');
		$this->db->join('tblcategorywisescore sc', 'sc.UserFeedbackId = fd.UserFeedbackId', 'left');
		$this->db->where($array);
		$result = $this->db->get('tbluser as us');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		}

		$res = array();
		if($result->result()) {
			$res = $result->result();
		}
		return $res;
		
	}else {
		return 'fail';
	}	
}
catch(Exception $e){
	trigger_error($e->getMessage(), E_USER_ERROR);
	return false;
}	
}

public function getUserList($data) {
	try{
	if($data) {

	if($data['RoleId']!=3){
	$array = array('us.RoleId' => 4,'us.StatusId'=> 0);
	$this->db->select('us.UserId,CONCAT(us.FirstName," ",us.LastName) as Name');
	$this->db->where($array);
	$result = $this->db->get('tbluser as us');
	$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

	}elseif($data['RoleId']==3){
	$array = array('us.RoleId' => 4,'us.StatusId'=> 0,'us.ParentId' => $data['UserId']);
	$this->db->select('us.UserId,CONCAT(us.FirstName," ",us.LastName) as Name');
	$this->db->where($array);
	$result = $this->db->get('tbluser as us');
	$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
	}

	$res = array();
	if($result->result()) {
		$res = $result->result();
	}
	return $res;
	
}else {
	return 'fail';
}	
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}		
}

public function getScore($UserId = NULL){
	try{
	if(!empty($UserId)) {

		$this->db->select('fc.Name as catName,sc.Score,mc.Name as subCatName');
		$this->db->join('tbluserfeedback fd', 'fd.UserId = us.UserId', 'inner');
		$this->db->join('tblcategorywisescore sc', 'sc.UserFeedbackId = fd.UserFeedbackId', 'inner');
		$this->db->join('tblmstfeedbackcategory fc', 'fc.FeedbackCategoryId = sc.FeedbackCategoryId', 'inner');
		$this->db->join('tblmstfeedbackcategory mc', 'mc.FeedbackCategoryId = fc.ParentId', 'inner');
		$this->db->where('us.UserId',$UserId);
		$result = $this->db->get('tbluser as us');
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

public function getAllScore($data) {
	try{
	if($data) {

	if($data['RoleId']!=3){
	// $array = array('us.RoleId' => 4,'us.StatusId'=> 0);
	// $this->db->select('us.UserId,CONCAT(us.FirstName," ",us.LastName) as Name,fd.StartDateTime,fd.EndDateTime,fc.Name as catName,sc.Score');
	// $this->db->join('tbluserfeedback fd', 'fd.UserId = us.UserId', 'left');
	// $this->db->join('tblcategorywisescore sc', 'sc.UserFeedbackId = fd.UserFeedbackId', 'left');
	// $this->db->join('tblmstfeedbackcategory fc', 'fc.FeedbackCategoryId = sc.FeedbackCategoryId', 'left');
	// $this->db->where($array);
	// $result = $this->db->get('tbluser as us');

	$this->db->select('c.FeedbackCategoryId,c.Name,(select COUNT(FeedbackCategoryId) from tblmstfeedbackcategory where ParentId=c.FeedbackCategoryId) as count');
	$this->db->where('c.ParentId',0);
	$this->db->where('c.IsActive',1);
	$result = $this->db->get('tblmstfeedbackcategory as c');
	$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
	$res = array();
	foreach($result->result() as $row) {

		$this->db->select('c.FeedbackCategoryId,c.Name as catName,q.FeedbackQuestionId,q.Name as queName,(select COUNT(FeedbackQuestionId) from tblmstfeedbackquestion where FeedbackCategoryId=c.FeedbackCategoryId) as count');
		$this->db->join('tblmstfeedbackquestion q', 'q.FeedbackCategoryId = c.FeedbackCategoryId', 'left');
		$this->db->where('c.ParentId',$row->FeedbackCategoryId);
		$this->db->where('c.IsActive',1);
		$this->db->order_by('c.FeedbackCategoryId','asc');
		$this->db->order_by('q.FeedbackQuestionId','asc');
		$result1 = $this->db->get('tblmstfeedbackcategory as c');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

		$row->child = $result1->result();
		array_push($res,$row);	
	}

	$this->db->select('CONCAT(u.FirstName," ",u.LastName) as userName,u.UserId,fd.UserFeedbackId');
	$this->db->join('tbluserfeedback fd', 'fd.UserId = u.UserId', 'inner');
	$this->db->where('fd.EndDateTime IS NOT NULL');
	$this->db->where('u.IsActive',1	);
	$this->db->where('u.RoleId',4);
	$result1 = $this->db->get('tbluser as u');
	$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
	
	$res1 = array();
	foreach($result1->result() as $row1) {

		$this->db->select('ufa.FeedbackQuestionId,ufa.FeedbackAnswerId,ans.Value');
		//$this->db->join('tbluserfeedback fd', 'fd.UserId = u.UserId', 'inner');
		//$this->db->join('tbluserfeedbackanswer fans', 'fans.UserFeedbackId = fd.UserFeedbackId', 'inner');
		$this->db->join('tblmstfeedbackanswer ans', 'ans.FeedbackAnswerId = ufa.FeedbackAnswerId', 'inner');
		$this->db->join('tblmstfeedbackquestion q', 'q.FeedbackQuestionId = ufa.FeedbackQuestionId', 'inner');
		$this->db->join('tblmstfeedbackcategory c', 'c.FeedbackCategoryId = q.FeedbackCategoryId', 'inner');
		$this->db->where('ufa.UserFeedbackId',$row1->UserFeedbackId);
		$this->db->order_by('c.FeedbackCategoryId','asc');
		$this->db->order_by('ufa.FeedbackQuestionId','asc');
		$result1 = $this->db->get('tbluserfeedbackanswer as ufa');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}

		$row1->child = $result1->result();
		array_push($res1,$row1);	
	}

	} elseif($data['RoleId']==3){
		$array = array('us.RoleId' => 4,'us.StatusId'=> 0,'us.ParentId' => $data['UserId']);
		$this->db->select('us.UserId,CONCAT(us.FirstName," ",us.LastName) as Name,fd.StartDateTime,fd.EndDateTime');
		$this->db->join('tbluserfeedback fd', 'fd.UserId = us.UserId', 'left');
		$this->db->join('tblcategorywisescore sc', 'sc.UserFeedbackId = fd.UserFeedbackId', 'left');
		$this->db->where($array);
		$result = $this->db->get('tbluser as us');
		$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
	}

	// $res = array();
	// if($result->result()) {
	// 	$res = $result->result();
	// }
	$data['category']=$res;
	$data['user']=$res1;

	return $data;
	
}else {
	return 'fail';
}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}			
}


}
