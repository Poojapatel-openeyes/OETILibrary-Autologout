<?php

class Answer_model extends CI_Model
 {

	public function add_answer($post_answer) {
		try{
		if($post_answer) {			
			if(trim($post_answer['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$answer_data = array(
				'Name' => trim($post_answer['Name']),
				'Value' => trim($post_answer['Value']),
				'ReverseValue' => trim($post_answer['ReverseValue']),
				'IsActive' => $IsActive,
				'CreatedBy' => trim($post_answer['CreatedBy']),
				'UpdatedBy' => trim($post_answer['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$res = $this->db->insert('tblmstfeedbackanswer',$answer_data);	
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
			if($res) {
				$log_data = array(
					'UserId' => trim($post_answer['CreatedBy']),
					'Module' => 'Answer',
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
	
	public function getlist_answer() {	
		try{
		$this->db->select('ans.FeedbackAnswerId,ans.Name,ans.Value,ans.ReverseValue,ans.IsActive,0 as isdisabled');
		$this->db->order_by('ans.FeedbackAnswerId','asc');
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
	
	
	public function get_answerdata($answer_id = NULL) {
		try{
		if($answer_id) {
			
			$this->db->select('ans.FeedbackAnswerId,ans.Name,ans.Value,ans.ReverseValue,ans.IsActive,0 as isdisabled');
			$this->db->where('ans.FeedbackAnswerId',$answer_id);
			$result = $this->db->get('tblmstfeedbackanswer as ans');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$answer_data = array();
			foreach($result->result() as $row) {
				$answer_data = $row;
			}
			return $answer_data;
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_answer($post_answer) {
		try{
		if($post_answer) {
			if(trim($post_answer['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$answer_data = array(
				'Name' => trim($post_answer['Name']),
				'Value' => trim($post_answer['Value']),
				'ReverseValue' => trim($post_answer['ReverseValue']),
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_answer['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$this->db->where('FeedbackAnswerId',trim($post_answer['FeedbackAnswerId']));
			$res = $this->db->update('tblmstfeedbackanswer',$answer_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_answer['UpdatedBy']),
					'Module' => 'Answer',
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
	
	
	public function delete_answer($post_answer) {
		try{
		if($post_answer) {			
			$this->db->where('FeedbackAnswerId',$post_answer['id']);
			$res = $this->db->delete('tblmstfeedbackanswer');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {$log_data = array(
				'UserId' => trim($post_answer['Userid']),
				'Module' => 'Answer',
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
			$this->db->where('FeedbackAnswerId',trim($post_data['FeedbackAnswerId']));
			$res = $this->db->update('tblmstfeedbackanswer',$data);
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
