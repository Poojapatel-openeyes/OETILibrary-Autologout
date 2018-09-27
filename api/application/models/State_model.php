<?php

class State_model extends CI_Model
{
	public function add_state($post_state)
	{
		try{
		if($post_state)
		{
			if($post_state['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}		
			$state_data=array(
				"CountryId"=>trim($post_state['CountryId']),
				"StateName"=>trim($post_state['StateName']),
				"StateAbbreviation"=>trim($post_state['StateAbbreviation']),
				"IsActive"=>$IsActive,
				'CreatedBy' => trim($post_state['CreatedBy']),
				'UpdatedBy' => trim($post_state['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s')				
			);					
			$res=$this->db->insert('tblmststate',$state_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res)
			{
				$log_data = array(
					'UserId' => trim($post_state['CreatedBy']),
					'Module' => 'State',
					'Activity' =>'Add'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
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
	
	public function get_statedata($state_id=Null)
	{
		try{
	  if($state_id)
	  {
		 $this->db->select('st.StateId,st.StateName,st.StateAbbreviation,st.CountryId,st.IsActive,(SELECT COUNT(u.UserId) FROM tbluser as u WHERE u.StateId=st.StateId) as isdisabled');
		 $this->db->where('st.StateId',$state_id);
		 $result=$this->db->get('tblmststate as st');
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 $company_data= array();
		 foreach($result->result() as $row)
		 {
			$company_data=$row;			
		 }
		 return $company_data;		 
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
	
	 public function edit_state($post_state) {
		 try{
		if($post_state) {
			if($post_state['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}			
			$state_data = array(
				"CountryId"=>trim($post_state['CountryId']),
				"StateName"=>trim($post_state['StateName']),
				"StateAbbreviation"=>trim($post_state['StateAbbreviation']),
				'UpdatedBy' => trim($post_state['UpdatedBy']),
				"IsActive"=>$IsActive				
			);
			
			$this->db->where('StateId',trim($post_state['StateId']));
			$res = $this->db->update('tblmststate',$state_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) 
			{
				$log_data = array(
					'UserId' => trim($post_state['UpdatedBy']),
					'Module' => 'State',
					'Activity' =>'Update'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
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
	
	function getlist_state()
	{
		try{
		$this->db->select('st.StateId,st.StateName,st.StateAbbreviation,st.IsActive,con.CountryName,(SELECT COUNT(u.UserId) FROM tbluser as u WHERE u.StateId=st.StateId) as isdisabled');
		$this->db->join('tblmstcountry con', 'con.CountryId = st.CountryId', 'left');
		$result=$this->db->get('tblmststate st');
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
	
	public function delete_state($post_state) 
	{	
		try{
		if($post_state) 
		{			
			$this->db->where('StateId',$post_state['id']);
			$res = $this->db->delete('tblmststate');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_state['Userid']),
					'Module' => 'State',
					'Activity' =>'Delete'
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
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
	
	public function getlist_country() {
		try{
		$this->db->select('CountryId,CountryName,IsActive');
		$result = $this->db->get('tblmstcountry');
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
			$this->db->where('StateId',trim($post_data['StateId']));
			$res = $this->db->update('tblmststate',$data);
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