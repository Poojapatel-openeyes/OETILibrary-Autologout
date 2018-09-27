<?php

class Feedback_model extends CI_Model
 {

	public function getFeedback($UserId = NULL)
	{
		try{
		if($UserId) {
			$this->db->select('UserFeedbackId,EndDateTime');
			$this->db->where('UserId',$UserId);
			$query = $this->db->get('tbluserfeedback');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if ($query->num_rows() > 0) {
				$r=$query->result();
				$UserFeedbackId = $r[0]->UserFeedbackId;
				$EndDateTime = $r[0]->EndDateTime;
				if($EndDateTime!=NULL){
					return 'score';
				}			
			} else {
				$feedback_data = array(
					'UserId' => $UserId,
					'StartDateTime' => date('y-m-d H:i:s'),
					'IsActive' => 1,
					'CreatedBy' => $UserId,
					'UpdatedBy' => $UserId,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);
				$res = $this->db->insert('tbluserfeedback',$feedback_data);
				if($res) {				
					$insert_id = $this->db->insert_id();
					$UserFeedbackId = $insert_id;
					$data_i = $this->db->query('INSERT INTO tbluserfeedbackanswer (UserFeedbackId, FeedbackQuestionId, CreatedBy, UpdatedBy, UpdatedOn) SELECT '.$insert_id.', que.FeedbackQuestionId, '.$UserId.', '.$UserId.', NOW() FROM tblmstfeedbackquestion as que WHERE que.IsActive=1 ORDER BY RAND();');
					$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				}
		
		}
				$this->db->select('cat.FeedbackCategoryId,cat.Name,cat.Description,(select COUNT(FeedbackQuestionId) from tblmstfeedbackquestion where FeedbackCategoryId=cat.FeedbackCategoryId) as count');
				//$this->db->join('tblmstfeedbackquestion q', 'q.FeedbackCategoryId = cat.FeedbackCategoryId', 'left');
				$this->db->where('cat.ParentId!=',0);
				$result=$this->db->get('tblmstfeedbackcategory cat');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				$res=array();
				if($result->result())
				{
					$res1=$result->result();
				}
				$data['category'] = $res1;

				$this->db->select('que.AnswerId,que.UserFeedbackId,q.FeedbackCategoryId,q.CustomAnswer,que.FeedbackQuestionId,que.FeedbackAnswerId as FeedbackAnswerId,(SELECT Name FROM tblmstfeedbackanswer WHERE FeedbackAnswerId = que.FeedbackAnswerId) as ansName,(SELECT Value FROM tblmstfeedbackanswer WHERE FeedbackAnswerId = que.FeedbackAnswerId) as ansValue,q.Name,cat.Description,cat.Name as cat_name,mcat.Name as mcat_name');
				$this->db->join('tblmstfeedbackquestion q', 'q.FeedbackQuestionId = que.FeedbackQuestionId', 'left');
				$this->db->join('tblmstfeedbackcategory cat', 'cat.FeedbackCategoryId = q.FeedbackCategoryId', 'left');
				$this->db->join('tblmstfeedbackcategory mcat', 'mcat.FeedbackCategoryId = cat.ParentId', 'left');				
				$this->db->where('que.UserFeedbackId',$UserFeedbackId);
				$this->db->order_by('que.AnswerId', 'asc');
				$query=$this->db->get('tbluserfeedbackanswer que');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				if($query->result())
				{
					$totalQuestion = $query->num_rows();
					$result = $query->result();
					$res2 = array();
					$j = -1;
					for($i=0; $i<$query->num_rows(); $i++) {
						$query_ans = array();
						// $result[$i]->FeedbackAnswerId['FeedbackAnswerId'] = $result[$i]->ansAnswerId;
						// $result[$i]->FeedbackAnswerId['Name'] = $result[$i]->ansName;
						// $result[$i]->FeedbackAnswerId['Value'] = $result[$i]->ansValue;
						
						if($result[$i]->CustomAnswer==1){
							$this->db->select('ans.FeedbackAnswerId,ua.Name,IF((SELECT `IsReverseAnswer` FROM `tblmstfeedbackcategory` WHERE `FeedbackCategoryId`='.$result[$i]->FeedbackCategoryId.')=0, ua.Value, ua.ReverseValue) as Value');
							$this->db->join('tblmstfeedbackanswer ua', 'ua.FeedbackAnswerId = ans.FeedbackAnswerId', 'left');
							$this->db->where('ans.IsActive',1);
							$this->db->where('ans.FeedbackQuestionId',$result[$i]->FeedbackQuestionId);
							$this->db->order_by('ans.DisplayOrder', 'asc');
							$query_ans=$this->db->get('tblquestionanswersoptions ans');
							$db_error = $this->db->error();
							if (!empty($db_error) && !empty($db_error['code'])) { 
								throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
								return false; // unreachable return statement !!!
							}
							// $this->db->select('ans.FeedbackAnswerId,ans.Name,IF((SELECT `IsReverseAnswer` FROM `tblmstfeedbackcategory` WHERE `FeedbackCategoryId`='.$result[$i]->FeedbackCategoryId.')=0, ans.Value, ans.ReverseValue) as Value,ans.IsActive');
							// $this->db->where('ans.IsActive',1);
							// $this->db->order_by('ans.Value', 'asc');
							// $query_ans=$this->db->get('tblmstfeedbackanswer ans');	
						} else {					
							$this->db->select('ans.FeedbackAnswerId,ans.Name,IF((SELECT `IsReverseAnswer` FROM `tblmstfeedbackcategory` WHERE `FeedbackCategoryId`='.$result[$i]->FeedbackCategoryId.')=0, ans.Value, ans.ReverseValue) as Value');
							$this->db->where('ans.IsActive',1);
							$this->db->order_by('ans.Value', 'asc');
							$query_ans=$this->db->get('tblmstfeedbackanswer ans');
							$db_error = $this->db->error();
							if (!empty($db_error) && !empty($db_error['code'])) { 
								throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
								return false; // unreachable return statement !!!
							}	
						}					
					
						if($i==0 || $i%3==0){
							$res = array();
							$j++;
						}	
						$result[$i]->answer = $query_ans->result();				
						array_push($res,$result[$i]);			
						$res2[$j]['row'] = $res;
					}
					$data['question'] = $res2;	
					$data['totalQuestion'] = $totalQuestion;	
					return $data;				
										
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

	public function getQuestion()
	{
		try{
		$this->db->select('que.FeedbackQuestionId,que.Name,cat.Description,cat.Name as cat_name,mcat.Name as mcat_name');
		$this->db->join('tblmstfeedbackcategory cat', 'cat.FeedbackCategoryId = que.FeedbackCategoryId', 'left');
		$this->db->join('tblmstfeedbackcategory mcat', 'mcat.FeedbackCategoryId = cat.ParentId', 'left');
		$this->db->where('que.IsActive',1);
		$this->db->order_by('rand()');
		$query=$this->db->get('tblmstfeedbackquestion que');
		$db_error = $this->db->error();
							if (!empty($db_error) && !empty($db_error['code'])) { 
								throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
								return false; // unreachable return statement !!!
							}	
		if($query->result())
		{
			$result = $query->result();
				$data = array();
				$j = -1;
				for($i=0; $i<$query->num_rows(); $i++) {
					if($i==0 || $i%3==0){
						$res = array();
						$j++;
					}					
					array_push($res,$result[$i]);			
					$data[$j]['row'] = $res;
				}
				return $data;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	public function checkFBstart($UserId = NULL) {
		try{
		if($UserId) {
			
			$this->db->select('UserFeedbackId,EndDateTime');
			$this->db->where('UserId',$UserId);
			$query = $this->db->get('tbluserfeedback');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if ($query->num_rows() > 0) {
				$r=$query->result();
				$EndDateTime = $r[0]->EndDateTime;
				if($EndDateTime!=NULL){
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

	public function startFeedback($UserId = NULL) {
		try{
		if($UserId) {
			$this->db->select('UserFeedbackId,EndDateTime');
			$this->db->where('UserId',$UserId);
			$query = $this->db->get('tbluserfeedback');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if ($query->num_rows() == 0) {

				$feedback_data = array(
					'UserId' => $UserId,
					'StartDateTime' => date('y-m-d H:i:s'),
					'IsActive' => 1,
					'CreatedBy' => $UserId,
					'UpdatedBy' => $UserId,
					'UpdatedOn' => date('y-m-d H:i:s'),
				);
				$res = $this->db->insert('tbluserfeedback',$feedback_data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
				if($res) {				
					$insert_id = $this->db->insert_id();
					$data = $this->db->query('INSERT INTO tbluserfeedbackanswer (UserFeedbackId, FeedbackQuestionId, CreatedBy, UpdatedBy, UpdatedOn) SELECT '.$insert_id.', que.FeedbackQuestionId, '.$UserId.', '.$UserId.', NOW() FROM tblmstfeedbackquestion as que WHERE que.IsActive=1 ORDER BY RAND();');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}	
					return true;
				}
			} else {
				return true;
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

	public function saveQuestion($question) {
		try{
		if($question)
		{
			$que_data = array(
				'FeedbackAnswerId' => trim($question['FeedbackAnswerId']),
				'UpdatedOn' => date('y-m-d H:i:s')
			);
			$this->db->where('AnswerId',trim($question['AnswerId']));
			$res=$this->db->update('tbluserfeedbackanswer',$que_data);
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

	public function submitFeedback($post_data) {
		try{
		if($post_data)
		{
			$user_feedback = array(
				'EndDateTime' => date('y-m-d H:i:s'),
				'UpdatedOn' => date('y-m-d H:i:s')
			);
			$this->db->where('UserFeedbackId',$post_data['feedbackId']);
			$res=$this->db->update('tbluserfeedback',$user_feedback);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if($res)
			{
				$query = $this->db->query('INSERT INTO tblcategorywisescore (UserFeedbackId, FeedbackCategoryId, NoOfFeedback, Score) SELECT ua.UserFeedbackId, q.FeedbackCategoryId, COUNT(ua.UserFeedbackId) as NoOfFeedback, CASE WHEN c.IsReverseAnswer=0 THEN round(AVG(a.Value), 1) ELSE round(AVG(a.ReverseValue), 1) END as Score FROM tbluserfeedbackanswer as ua LEFT JOIN tblmstfeedbackquestion as q ON ua.FeedbackQuestionId=q.FeedbackQuestionId LEFT JOIN tblmstfeedbackanswer as a ON a.FeedbackAnswerId=ua.FeedbackAnswerId LEFT JOIN tblmstfeedbackcategory as c ON c.FeedbackCategoryId=q.FeedbackCategoryId WHERE ua.UserFeedbackId = '.$post_data["feedbackId"].' GROUP BY q.FeedbackCategoryId;');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
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
