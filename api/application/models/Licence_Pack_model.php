<?php

class Licence_Pack_model extends CI_Model
{
	public function add_Licence_Pack($post_Licence_Pack)
	{
		try{
		if($post_Licence_Pack)
		{
			if($post_Licence_Pack['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if($post_Licence_Pack['DiscountId']>0){		
				$StartDate = strtotime($post_Licence_Pack['StartDate']);
				$EndDate = strtotime($post_Licence_Pack['EndDate']);
				$StartDate = date('Y-m-d',$StartDate);
				$EndDate = date('Y-m-d',$EndDate);	
			} else {
				$StartDate = NULL;
				$EndDate = NULL;
			}		
			if(isset($post_Licence_Pack['Description']) && !empty($post_Licence_Pack['Description'])){
				$Description = $post_Licence_Pack['Description'];
			}	else {
				$Description = '';
			}

			if(isset($post_Licence_Pack['Validity']) && !empty($post_Licence_Pack['Validity'])){
				$Validity = $post_Licence_Pack['Validity'];
			}	else {
				$Validity = '';
			}
			$Licence_Pack_data=array(
				"LicensePackType"=>trim($post_Licence_Pack['LicensePackType']),
				"DiscountId"=>trim($post_Licence_Pack['DiscountId']),
				"Name"=>trim($post_Licence_Pack['Name']),
				"Description"=>trim($Description),
				"NoOfLicense"=>trim($post_Licence_Pack['NoOfLicense']),
				"Price"=>trim($post_Licence_Pack['Price']),
				"Validity"=>trim($Validity),
				"StartDate"=>$StartDate,
				"EndDate"=>$EndDate,
				"IsActive"=>$IsActive,
				'CreatedBy' => trim($post_Licence_Pack['CreatedBy']),
				'UpdatedBy' => trim($post_Licence_Pack['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s')				
			);					
			$res=$this->db->insert('tblmstlicensepack',$Licence_Pack_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res)
			{
				$log_data = array(
					'UserId' => trim($post_Licence_Pack['CreatedBy']),
					'Module' => 'Licence Pack',
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
	
	public function get_Licence_Packdata($Licence_Pack_id=Null)
	{
	  try{
	  if($Licence_Pack_id)
	  {
		 $this->db->select('lp.LicensePackId,lp.Description,lp.Name,lp.NoOfLicense,lp.Price,lp.Validity,lp.DiscountId,lp.LicensePackType,lp.IsActive,DATE_FORMAT(lp.StartDate,"%m/%d/%Y") as StartDate,DATE_FORMAT(lp.EndDate,"%m/%d/%Y") as EndDate,(SELECT COUNT(cl.ClientLicenseId) FROM tblclientlicense as cl WHERE cl.LicensePackId=lp.LicensePackId) as isdisabled');
		 $this->db->where('lp.LicensePackId',$Licence_Pack_id);
		 $result=$this->db->get('tblmstlicensepack lp');
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
	
	 public function edit_Licence_Pack($post_Licence_Pack) {
		 try{
		if($post_Licence_Pack) {
			if($post_Licence_Pack['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if($post_Licence_Pack['DiscountId']>0){		
				$StartDate = strtotime($post_Licence_Pack['StartDate']);
				$EndDate = strtotime($post_Licence_Pack['EndDate']);
				$StartDate = date('Y-m-d',$StartDate);
				$EndDate = date('Y-m-d',$EndDate);	
			} else {
				$StartDate = NULL;
				$EndDate = NULL;
			}
			$Licence_Pack_data = array(
				"LicensePackType"=>trim($post_Licence_Pack['LicensePackType']),
				"DiscountId"=>trim($post_Licence_Pack['DiscountId']),
				"Name"=>trim($post_Licence_Pack['Name']),
				"Description"=>trim($post_Licence_Pack['Description']),
				"NoOfLicense"=>trim($post_Licence_Pack['NoOfLicense']),
				"Price"=>trim($post_Licence_Pack['Price']),
				"Validity"=>trim($post_Licence_Pack['Validity']),
				"StartDate"=>$StartDate,
				"EndDate"=>$EndDate,
				"IsActive"=>$IsActive,
				'UpdatedBy' => trim($post_Licence_Pack['UpdatedBy'])
			);
			
			$this->db->where('LicensePackId',trim($post_Licence_Pack['LicensePackId']));
			$res = $this->db->update('tblmstlicensepack',$Licence_Pack_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) 
			{
				$log_data = array(
					'UserId' => trim($post_Licence_Pack['UpdatedBy']),
					'Module' => 'Licence Pack',
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
	
	public function getlist_Licence_Pack()
	{
		try{
		$this->db->select('lp.LicensePackId,lp.Description,lp.Name,lp.NoOfLicense,lp.Price,lp.Validity,lp.DiscountId,lp.LicensePackType,lp.IsActive,d.Name as discountName,lt.Value as licenceTypeName,(SELECT COUNT(cl.ClientLicenseId) FROM tblclientlicense as cl WHERE cl.LicensePackId=lp.LicensePackId) as isdisabled');
		$this->db->join('tblmstdiscount d', 'd.DiscountId = lp.DiscountId', 'left');
		$this->db->join('tblmstconfiguration lt', 'lt.ConfigurationId = lp.LicensePackType', 'left');
		$result=$this->db->get('tblmstlicensepack lp');
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
	
	public function delete_Licence_Pack($post_Licence_Pack) 
	{	
		try{
		if($post_Licence_Pack) 
		{			
			$this->db->where('LicensePackId',$post_Licence_Pack['id']);
			$res = $this->db->delete('tblmstlicensepack');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if($res) {
				$log_data = array(
					'UserId' => trim($post_Licence_Pack['Userid']),
					'Module' => 'Licence Pack',
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
	
	public function getlist_discount() {
		try{
		$this->db->select('DiscountId,Name,Value,IsActive');
		$result = $this->db->get('tblmstdiscount');
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

	public function getlist_licencetype() {
		try{
		$this->db->select('ConfigurationId,Key,Value,DisplayOrder,IsActive');
		$this->db->where('Key','LicenceType');
		$this->db->order_by('DisplayOrder','asc');
		$result = $this->db->get('tblmstconfiguration');
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
			$this->db->where('LicensePackId',trim($post_data['LicensePackId']));
			$res = $this->db->update('tblmstlicensepack',$data);
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