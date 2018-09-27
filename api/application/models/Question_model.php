<?php

class Question_model extends CI_Model
 {

	public function add_Question($post_Question) {
		try{
		if($post_Question) {			
			if(trim($post_Question['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(trim($post_Question['CustomAnswer'])==1){
				$CustomAnswer = true;
			} else {
				$CustomAnswer = false;
			}
			$Question_data = array(
				'Name' => trim($post_Question['Name']),
				'FeedbackCategoryId' => $post_Question['FeedbackCategoryId'],			
				'IsActive' => $IsActive,
				'CustomAnswer' => $CustomAnswer,
				'CreatedBy' => trim($post_Question['CreatedBy']),
				'UpdatedBy' => trim($post_Question['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$res = $this->db->insert('tblmstfeedbackquestion',$Question_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}			
			if($res) {
				if(trim($post_Question['CustomAnswer'])==1){
					$FeedbackQuestionId = $this->db->insert_id();
					foreach($post_Question['FeedbackAnswerId'] as $value){
						if($value['checked']=='true'){
							$Answer_data = array(
								'FeedbackQuestionId' => $FeedbackQuestionId,
								'FeedbackAnswerId' => $value['FeedbackAnswerId'],
								'CreatedBy' => trim($post_Question['CreatedBy']),
								'UpdatedBy' => trim($post_Question['UpdatedBy']),
								'UpdatedOn' => date('y-m-d H:i:s'),
							);			
							$res = $this->db->insert('tblquestionanswersoptions',$Answer_data);	
							$db_error = $this->db->error();
							if (!empty($db_error) && !empty($db_error['code'])) { 
								throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
								return false; // unreachable return statement !!!
							}
						}
					}
				}

				$log_data = array(
					'UserId' => trim($post_Question['CreatedBy']),
					'Module' => 'Question',
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
	
	public function getlist_Question() {
		try{	
		$this->db->select('q.FeedbackQuestionId,q.Name,mcat.Name as catName,q.CustomAnswer,q.IsActive,(SELECT COUNT(fa.AnswerId) FROM tbluserfeedbackanswer as fa WHERE fa.FeedbackQuestionId=q.FeedbackQuestionId) as isdisabled');
		$this->db->join('tblmstfeedbackcategory mcat', 'mcat.FeedbackCategoryId = q.FeedbackCategoryId', 'left');
		$this->db->order_by('q.FeedbackQuestionId','asc');
		$result = $this->db->get('tblmstfeedbackquestion as q');
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
	
	
	public function get_Questiondata($Question_id = NULL) {
		try{
		if($Question_id) {
			
			$this->db->select('q.FeedbackQuestionId,q.FeedbackCategoryId,q.Name,q.CustomAnswer,q.IsActive,(SELECT COUNT(fa.AnswerId) FROM tbluserfeedbackanswer as fa WHERE fa.FeedbackQuestionId=q.FeedbackQuestionId) as isdisabled');
			$this->db->where('q.FeedbackQuestionId',$Question_id);
			$result = $this->db->get('tblmstfeedbackquestion as q');
			$db_error = $this->db->error();
			if (!empty($db_error) && !empty($db_error['code'])) { 
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
				return false; // unreachable return statement !!!
			}	
			$Question_data = array();
			foreach($result->result() as $row) {
				$Question_data = $row;
			}
			//if($Question_data->CustomAnswer==1){
				$this->db->select('ans.FeedbackAnswerId,ans.Name,(CASE WHEN (SELECT ao.FeedbackAnswerId FROM tblquestionanswersoptions as ao WHERE ao.FeedbackQuestionId='.$Question_data->FeedbackQuestionId.' and ao.FeedbackAnswerId=ans.FeedbackAnswerId) > 0 THEN "true" ELSE "false" END) as checked');
				$result = $this->db->get('tblmstfeedbackanswer as ans');
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
				$new_array = array();
				if($result->result()) {
					$new_array = $result->result();
				}
				//$res2=$this->db->query('SELECT ao.FeedbackAnswerId FROM tblquestionanswersoptions as ao WHERE ao.FeedbackQuestionId='.$Question_data->FeedbackQuestionId);
				//$new_array = array();
				// foreach($res2->result() as $row){
				// 	$new_array[] = $row->FeedbackAnswerId; // Inside while loop
				// }
				$Question_data->FeedbackAnswerId = $new_array;
			// } else {
			// 	$Question_data->FeedbackAnswerId = [];
			// }
			return $Question_data;
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_Question($post_Question) {
		try{
		if($post_Question) {
			if(trim($post_Question['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(trim($post_Question['CustomAnswer'])==1){
				$CustomAnswer = true;
			} else {
				$CustomAnswer = false;
			}
			$Question_data = array(
				'Name' => trim($post_Question['Name']),
				'FeedbackCategoryId' => $post_Question['FeedbackCategoryId'],	
				'IsActive' => $IsActive,
				'CustomAnswer' => $CustomAnswer,
				'UpdatedBy' => trim($post_Question['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$this->db->where('FeedbackQuestionId',trim($post_Question['FeedbackQuestionId']));
			$res = $this->db->update('tblmstfeedbackquestion',$Question_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if($res) {
				if(trim($post_Question['CustomAnswer'])==1){

					$this->db->where('FeedbackQuestionId',$post_Question['FeedbackQuestionId']);
					$resdel = $this->db->delete('tblquestionanswersoptions');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}	
					if($resdel){
						foreach($post_Question['FeedbackAnswerId'] as $value){
							if($value['checked']=='true'){
								$Answer_data = array(
									'FeedbackQuestionId' => trim($post_Question['FeedbackQuestionId']),
									'FeedbackAnswerId' => $value['FeedbackAnswerId'],
									'CreatedBy' => trim($post_Question['UpdatedBy']),
									'UpdatedBy' => trim($post_Question['UpdatedBy']),
									'UpdatedOn' => date('y-m-d H:i:s'),
								);			
								$res = $this->db->insert('tblquestionanswersoptions',$Answer_data);
								$db_error = $this->db->error();
								if (!empty($db_error) && !empty($db_error['code'])) { 
									throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
									return false; // unreachable return statement !!!
								}	
							}
						}
					}
				} else {
					$this->db->where('FeedbackQuestionId',$post_Question['FeedbackQuestionId']);
					$resdel = $this->db->delete('tblquestionanswersoptions');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
				}
				$log_data = array(
					'UserId' => trim($post_Question['UpdatedBy']),
					'Module' => 'Question',
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
	
	
	public function delete_Question($post_Question) {
		try{
		if($post_Question) {			
			$this->db->where('FeedbackQuestionId',$post_Question['id']);
			$res = $this->db->delete('tblmstfeedbackquestion');
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
			if($res) {
				$this->db->where('FeedbackQuestionId',$post_Question['id']);
				$res1 = $this->db->delete('tblquestionanswersoptions');
				$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
				$log_data = array(
				'UserId' => trim($post_Question['Userid']),
				'Module' => 'Question',
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

	public function getCatList() {	
		try{
		$this->db->select('cat.FeedbackCategoryId,cat.Name,cat.IsActive');
		$this->db->where('cat.ParentId!=',0);
		$this->db->where('cat.IsActive',1);
		$this->db->order_by('cat.Name','asc');
		$result = $this->db->get('tblmstfeedbackcategory as cat');
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

	public function getAnswerList() {	
		try{
		$this->db->select('ans.FeedbackAnswerId,ans.Name,"false" as checked');
		$result = $this->db->get('tblmstfeedbackanswer as ans');
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

	public function isActiveChange($post_data) {
		try{
		if($post_data) {
			if(trim($post_data['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$data = array(
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_data['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$this->db->where('FeedbackQuestionId',trim($post_data['FeedbackQuestionId']));
			$res = $this->db->update('tblmstfeedbackquestion',$data);
			$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}	
			if($res) {
				$log_data = array(
					'UserId' => trim($post_data['UpdatedBy']),
					'Module' => 'Category',
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
	
}
