<?php

class FeedbackUserReport_model extends CI_Model
 {
public function getAll($post_data) {
	try{
		if($post_data['roleid']!=3){
			$array = array('u.RoleId' => 4,'u.StatusId' => 0,'u.IsActive' => 1);
			$this->db->select('u.UserId,u.FirstName,u.LastName,c.CompanyName');
			$this->db->join('tblcompany c', 'u.ParentId = c.UserId', 'left');
			$this->db->join('tbluserfeedback uf', 'uf.UserId = u.UserId', 'left');
			$this->db->where($array);
			$this->db->where('uf.EndDateTime IS NOT NULL');
			$this->db->order_by('u.UserId','desc');
			$result = $this->db->get('tbluser u');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		} elseif($post_data['roleid']==3){
			$array = array('u.RoleId' => 4, 'u.ParentId' => $post_data['userid'],'u.StatusId' => 0,'u.IsActive' => 1);
			$this->db->select('u.UserId,u.FirstName,u.LastName');
			$this->db->join('tblcompany c', 'u.UserId = c.UserId', 'left');
			$this->db->join('tbluserfeedback uf', 'uf.UserId = u.UserId', 'left');
			$this->db->where($array);
			$this->db->where('uf.EndDateTime IS NOT NULL');
			$this->db->order_by('u.UserId','desc');
			$result = $this->db->get('tbluser u');
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
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	public function getUserScore($UserId = NULL) {
		try{
		if($UserId) {
			
			$this->db->select('c.FeedbackCategoryId,c.Name,(SELECT AVG(Score) FROM `tblcategorywisescore` as cs LEFT JOIN tblmstfeedbackcategory as c1 ON c1.FeedbackCategoryId=cs.FeedbackCategoryId LEFT JOIN tbluserfeedback as uf ON uf.UserFeedbackId=cs.UserFeedbackId WHERE uf.UserId = '.$UserId.' and c1.ParentId = c.FeedbackCategoryId GROUP BY c1.ParentId) as Score,(select COUNT(FeedbackCategoryId) from tblmstfeedbackcategory where ParentId=c.FeedbackCategoryId) as count');
			$this->db->where('c.ParentId',0);
			$result = $this->db->get('tblmstfeedbackcategory as c');

			$res = array();
			foreach($result->result() as $row) {

				$this->db->select('c.FeedbackCategoryId,c.Name as Name,cs.Score,(select COUNT(FeedbackQuestionId) from tblmstfeedbackquestion where FeedbackCategoryId=c.FeedbackCategoryId) as count');
				$this->db->join('tblcategorywisescore cs', 'cs.UserFeedbackId = uf.UserFeedbackId', 'left');
				$this->db->join('tblmstfeedbackcategory c', 'c.FeedbackCategoryId = cs.FeedbackCategoryId', 'left');
				$this->db->where('c.ParentId',$row->FeedbackCategoryId);
				$this->db->where('uf.UserId',$UserId);
				$this->db->order_by('c.FeedbackCategoryId','asc');
				$result1 = $this->db->get('tbluserfeedback as uf');			

				foreach($result1->result() as $row1){
					$this->db->select('q.FeedbackQuestionId,q.Name,(CASE WHEN c.IsReverseAnswer=0 THEN a.Value ELSE a.ReverseValue END) as Score');
					$this->db->join('tbluserfeedbackanswer ufa', 'ufa.UserFeedbackId = uf.UserFeedbackId', 'left');
					$this->db->join('tblmstfeedbackquestion q', 'q.FeedbackQuestionId = ufa.FeedbackQuestionId', 'left');
					$this->db->join('tblmstfeedbackanswer a', 'a.FeedbackAnswerId = ufa.FeedbackAnswerId', 'left');
					$this->db->join('tblmstfeedbackcategory c', 'c.FeedbackCategoryId = q.FeedbackCategoryId', 'left');
					$this->db->where('uf.UserId',$UserId);
					$this->db->where('q.FeedbackCategoryId',$row1->FeedbackCategoryId);
					$this->db->order_by('q.FeedbackQuestionId','asc');
					$result2 = $this->db->get('tbluserfeedback as uf');

					$row1->child = $result2->result();
				}
				$row->child = $result1->result();
				array_push($res,$row);
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

	public function getAllIncomplete($post_data) {
		try{
			if($post_data['roleid']!=3){
				$array = array('u.RoleId' => 4,'u.StatusId' => 0,'u.IsActive' => 1);
				$this->db->select('u.UserId,u.FirstName,u.LastName,c.CompanyName,uf.StartDateTime');
				$this->db->join('tblcompany c', 'u.ParentId = c.UserId', 'left');
				$this->db->join('tbluserfeedback uf', 'uf.UserId = u.UserId', 'inner');
				$this->db->where($array);
				$this->db->where('uf.EndDateTime IS NULL');
				$this->db->order_by('u.UserId','desc');
				$result = $this->db->get('tbluser u');
				$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			} elseif($post_data['roleid']==3){
				$array = array('u.RoleId' => 4, 'u.ParentId' => $post_data['userid'],'u.StatusId' => 0,'u.IsActive' => 1);
				$this->db->select('u.UserId,u.FirstName,u.LastName,c.CompanyName,uf.StartDateTime');
				$this->db->join('tblcompany c', 'u.UserId = c.UserId', 'left');
				$this->db->join('tbluserfeedback uf', 'uf.UserId = u.UserId', 'inner');
				$this->db->where($array);
				$this->db->where('uf.EndDateTime IS NULL');
				$this->db->order_by('u.UserId','desc');
				$result = $this->db->get('tbluser u');
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
		}
		catch(Exception $e){
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}
	}

}