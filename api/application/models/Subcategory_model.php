<?php

class Subcategory_model extends CI_Model
 {

	public function add_subcategory($post_subcategory) {
		try{
		if($post_subcategory) {			
			if(trim($post_subcategory['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(trim($post_subcategory['IsReverseAnswer'])=="1"){
				$IsReverseAnswer = 1;
			} else {
				$IsReverseAnswer = 0;
			}
			$subcategory_data = array(
				'Name' => trim($post_subcategory['Name']),
				'Description' => trim($post_subcategory['Description']),
				'ParentId' => $post_subcategory['ParentId'],
				'IsReverseAnswer' =>$IsReverseAnswer,				
				'IsActive' => $IsActive,
				'CreatedBy' => trim($post_subcategory['CreatedBy']),
				'UpdatedBy' => trim($post_subcategory['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$res = $this->db->insert('tblmstfeedbackcategory',$subcategory_data);	
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
			if($res) {
				$log_data = array(
					'UserId' => trim($post_subcategory['CreatedBy']),
					'Module' => 'Subcategory',
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
	
	public function getlist_subcategory() {	
		try{
		$this->db->select('cat.FeedbackCategoryId,cat.Description,cat.Name,mcat.Name as catName,cat.IsReverseAnswer,cat.IsActive,(SELECT COUNT(fq.FeedbackQuestionId) FROM tblmstfeedbackquestion as fq WHERE fq.FeedbackCategoryId=cat.FeedbackCategoryId) as isdisabled');
		$this->db->join('tblmstfeedbackcategory mcat', 'mcat.FeedbackCategoryId = cat.ParentId', 'left');
		$this->db->where('cat.ParentId!=',0);
		$this->db->order_by('cat.FeedbackCategoryId','asc');
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
	
	
	public function get_subcategorydata($subcategory_id = NULL) {
		try{
		if($subcategory_id) {
			
			$this->db->select('cat.FeedbackCategoryId,cat.Description,cat.ParentId,cat.Name,cat.IsReverseAnswer,cat.IsActive,(SELECT COUNT(fq.FeedbackQuestionId) FROM tblmstfeedbackquestion as fq WHERE fq.FeedbackCategoryId=cat.FeedbackCategoryId) as isdisabled');
			$this->db->where('cat.FeedbackCategoryId',$subcategory_id);
			$this->db->where('cat.ParentId!=',0);
			$result = $this->db->get('tblmstfeedbackcategory as cat');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			$subcategory_data = array();
			foreach($result->result() as $row) {
				$subcategory_data = $row;
			}
			return $subcategory_data;
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_subcategory($post_subcategory) {
		try{
		if($post_subcategory) {
			if(trim($post_subcategory['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(trim($post_subcategory['IsReverseAnswer'])=="1"){
				$IsReverseAnswer = 1;
			} else {
				$IsReverseAnswer = 0;
			}
			$subcategory_data = array(
				'Name' => trim($post_subcategory['Name']),
				'Description' => trim($post_subcategory['Description']),
				'ParentId' => $post_subcategory['ParentId'],
				'IsReverseAnswer' => $IsReverseAnswer,
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_subcategory['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$this->db->where('FeedbackCategoryId',trim($post_subcategory['FeedbackCategoryId']));
			$res = $this->db->update('tblmstfeedbackcategory',$subcategory_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			
			if($res) {
				$log_data = array(
					'UserId' => trim($post_subcategory['UpdatedBy']),
					'Module' => 'Subcategory',
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
	
	
	public function delete_subcategory($post_subcategory) {
		try{
		if($post_subcategory) {			
			$this->db->where('FeedbackCategoryId',$post_subcategory['id']);
			$res = $this->db->delete('tblmstfeedbackcategory');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {$log_data = array(
				'UserId' => trim($post_subcategory['Userid']),
				'Module' => 'Subcategory',
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

	public function getMainCatList() {
		try{	
		$this->db->select('cat.FeedbackCategoryId,cat.Name,cat.IsActive');
		$this->db->where('cat.ParentId',0);
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
			$this->db->where('FeedbackCategoryId',trim($post_data['FeedbackCategoryId']));
			$res = $this->db->update('tblmstfeedbackcategory',$data);
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
