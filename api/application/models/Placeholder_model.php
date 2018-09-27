<?php

class Placeholder_model extends CI_Model
 {

	public function add_placeholder($post_placeholder) {
		try{
		if($post_placeholder) {
			
			if(trim($post_placeholder['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}

			$placeholder_data = array(
				'PlaceholderName' => trim($post_placeholder['PlaceholderName']),
				'ColumnId' => trim($post_placeholder['ColumnId']),
				'IsActive' => $IsActive,
				'CreatedBy' => trim($post_placeholder['CreatedBy']),
				'UpdatedBy' => trim($post_placeholder['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$res = $this->db->insert('tblmstplaceholder',$placeholder_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
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
	
	public function getlist_placeholder() {
		try{
		$this->db->select('p.PlaceholderId,t.DisplayName as tablename,c.DisplayName as columnname,t.TableId,c.ColumnId,p.PlaceholderName,p.IsActive');
		$this->db->join('tblmsttablecolumn c', 'p.ColumnId = c.ColumnId', 'left');
		$this->db->join('tblmsttable t', 'c.TableId = t.TableId', 'left');		
		$this->db->order_by('p.PlaceholderId','asc');
		$result = $this->db->get('tblmstplaceholder p');
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
	
	
	public function get_placeholderdata($placeholder_id = NULL) {
		try{
		if($placeholder_id) {
			
			$this->db->select('p.PlaceholderId,p.PlaceholderName,p.ColumnId,p.IsActive,c.TableId');
			$this->db->where('PlaceholderId',$placeholder_id);
			$this->db->join('tblmsttablecolumn c', 'p.ColumnId = c.ColumnId', 'left');	
			$result = $this->db->get('tblmstplaceholder p');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			$placeholder_data = array();
			foreach($result->result() as $row) {
				$placeholder_data = $row;
			}
			return $placeholder_data;
			
		} else {
			return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
	}
	
	
	public function edit_placeholder($post_placeholder) {
		try{
		if($post_placeholder) {
			
			if(trim($post_placeholder['IsActive'])==1){
				$IsActive = true;
			} else {
				$IsActive = false;
			}

			$placeholder_data = array(
				'PlaceholderName' => trim($post_placeholder['PlaceholderName']),
				'ColumnId' => trim($post_placeholder['ColumnId']),
				'IsActive' => $IsActive,
				'UpdatedBy' => trim($post_placeholder['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);
			
			$this->db->where('PlaceholderId',trim($post_placeholder['PlaceholderId']));
			$res = $this->db->update('tblmstplaceholder',$placeholder_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
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
	
	
	public function delete_placeholder($placeholder_id) {
		try{
		if($placeholder_id) {
			
			$this->db->where('PlaceholderId',$placeholder_id);
			$res = $this->db->delete('tblmstplaceholder');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
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
	
	public function getTableList() {
		try{
		$this->db->select('TableId,TableName,DisplayName,IsActive');
		$this->db->where('IsActive',1);
		$this->db->order_by('TableName','asc');
		$result = $this->db->get('tblmsttable');
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

	public function getColumnList($table_id = NULL) {
		try{
		if($table_id) {
			
			$this->db->select('ColumnId,DisplayName');
			$this->db->where('TableId',$table_id);
			$this->db->order_by('DisplayName','asc');
			$result = $this->db->get('tblmsttablecolumn');
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
			$this->db->where('PlaceholderId',trim($post_data['PlaceholderId']));
			$res = $this->db->update('tblmstplaceholder',$data);
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
