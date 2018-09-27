<?php

class Discount_model extends CI_Model
{
	public function add_Discount($post_Discount)
	{
		try{
		if($post_Discount)
		{
			if($post_Discount['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}		
			$Discount_data=array(
				"DiscountType"=>trim($post_Discount['DiscountType']),
				"Name"=>trim($post_Discount['Name']),
				"Value"=>trim($post_Discount['Value']),
				"IsActive"=>$IsActive,
				'CreatedBy' => trim($post_Discount['CreatedBy']),
				'UpdatedBy' => trim($post_Discount['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s')				
			);					
			$res=$this->db->insert('tblmstdiscount',$Discount_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res)
			{
				$log_data = array(
					'UserId' => trim($post_Discount['CreatedBy']),
					'Module' => 'Discount',
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
	
	public function get_Discountdata($Discount_id=Null)
	{
	try{
	  if($Discount_id)
	  {
		 $this->db->select('st.DiscountId,st.DiscountType,st.Name,st.Value,st.IsActive,(SELECT COUNT(lp.LicensePackId) FROM tblmstlicensepack as lp WHERE lp.DiscountId=st.DiscountId) as isdisabled');
		 $this->db->where('st.DiscountId',$Discount_id);
		 $result=$this->db->get('tblmstdiscount as st');
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
	
	 public function edit_Discount($post_Discount) {
		 try{
		if($post_Discount) {
			if($post_Discount['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}			
			$Discount_data = array(
				"DiscountType"=>trim($post_Discount['DiscountType']),
				"Name"=>trim($post_Discount['Name']),
				"Value"=>trim($post_Discount['Value']),
				'UpdatedBy' => trim($post_Discount['UpdatedBy']),
				"IsActive"=>$IsActive				
			);
			
			$this->db->where('DiscountId',trim($post_Discount['DiscountId']));
			$res = $this->db->update('tblmstdiscount',$Discount_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) 
			{
				$log_data = array(
					'UserId' => trim($post_Discount['UpdatedBy']),
					'Module' => 'Discount',
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
	
	function getlist_Discount()
	{
		try{
		$this->db->select('st.DiscountId,st.DiscountType,con.Value as DTypeName,st.Name,st.Value,st.IsActive,(SELECT COUNT(lp.LicensePackId) FROM tblmstlicensepack as lp WHERE lp.DiscountId=st.DiscountId) as isdisabled');
		$this->db->join('tblmstconfiguration con', 'con.ConfigurationId = st.DiscountType', 'left');
		$result=$this->db->get('tblmstdiscount st');
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
	
	public function delete_Discount($post_Discount) 
	{	
		try{
		if($post_Discount) 
		{			
			$this->db->where('DiscountId',$post_Discount['id']);
			$res = $this->db->delete('tblmstdiscount');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Discount['Userid']),
					'Module' => 'Discount',
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
	
	public function getAllDiscountType() {
		try{
		$this->db->select('c.ConfigurationId,c.Key,c.Value,c.DisplayText,c.Description,c.DisplayOrder,c.IsActive,(SELECT COUNT(md.DiscountId) FROM tblmstdiscount as md WHERE md.DiscountType=c.ConfigurationId) as isdisabled');
		$this->db->order_by('c.DisplayOrder','asc');
		$this->db->where('c.Key','DiscountType');
		$result = $this->db->get('tblmstconfiguration as c');
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
			$this->db->where('DiscountId',trim($post_data['DiscountId']));
			$res = $this->db->update('tblmstdiscount',$data);
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