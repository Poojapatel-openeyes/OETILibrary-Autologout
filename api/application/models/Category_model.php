<?php

class Category_model extends CI_Model
 {

	public function add_category($post_category) {
		try{
		if($post_category) {			
			if(trim($post_category['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$category_data = array(
				'Name' => trim($post_category['Name']),
				'ParentId' => 0,
				'IsActive' => $IsActive,
				'CreatedBy' => trim($post_category['CreatedBy']),
				'UpdatedBy' => trim($post_category['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$res = $this->db->insert('tblmstfeedbackcategory',$category_data);	
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}		
			if($res) {
				$log_data = array(
					'UserId' => trim($post_category['CreatedBy']),
					'Module' => 'Category',
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
	
	public function getlist_category() {
		try{	
		$this->db->select('cat.FeedbackCategoryId,cat.Name,cat.IsActive,(SELECT COUNT(sc.FeedbackCategoryId) FROM tblmstfeedbackcategory as sc WHERE sc.ParentId=cat.FeedbackCategoryId) as isdisabled');
		$this->db->where('cat.ParentId',0);
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
	
	
	public function get_categorydata($category_id = NULL) {
		try{
		if($category_id) {
			
			$this->db->select('cat.FeedbackCategoryId,cat.Name,cat.IsActive,(SELECT COUNT(sc.FeedbackCategoryId) FROM tblmstfeedbackcategory as sc WHERE sc.ParentId=cat.FeedbackCategoryId) as isdisabled');
			$this->db->where('cat.FeedbackCategoryId',$category_id);
			$this->db->where('cat.ParentId',0);
			$result = $this->db->get('tblmstfeedbackcategory as cat');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$category_data = array();
			foreach($result->result() as $row) {
				$category_data = $row;
			}
			return $category_data;
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}	
	}
	
	
	public function edit_category($post_category) {
		try{
		if($post_category) {
			if(trim($post_category['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$category_data = array(
				'Name' => trim($post_category['Name']),
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_category['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);			
			$this->db->where('FeedbackCategoryId',trim($post_category['FeedbackCategoryId']));
			$res = $this->db->update('tblmstfeedbackcategory',$category_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_category['UpdatedBy']),
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
	
	public function delete_category($post_category) {
		try{
		if($post_category) {			
			$this->db->where('FeedbackCategoryId',$post_category['id']);
			$res = $this->db->delete('tblmstfeedbackcategory');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {$log_data = array(
				'UserId' => trim($post_category['Userid']),
				'Module' => 'Category',
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
