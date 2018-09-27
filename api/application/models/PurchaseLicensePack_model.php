<?php
class PurchaseLicensePack_model extends CI_Model
{
    public function getlist_Licence_Pack()
	{
		try{
		$this->db->select('lp.LicensePackId,lp.Description,lp.Name,lp.NoOfLicense,lp.Price,lp.Validity,lp.DiscountId,lp.LicensePackType,lp.IsActive,d.Name as discountName,d.Value as discountValue,lt.Value as discountTypeName, (CASE WHEN lt.Value="Percentage" THEN ((lp.Price*d.Value)/100) ELSE "0" END) as DiscountPrice');
		$this->db->join('tblmstdiscount d', 'd.DiscountId = lp.DiscountId', 'left');
		$this->db->join('tblmstconfiguration lt', 'lt.ConfigurationId = d.DiscountType', 'left');
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
	public function addPurchase($post_purchase)
	{	
		try{
		if($post_purchase) {
			if($post_purchase['Validity']==0)
			{
				$validity = "0000-00-00 00:00:00";
			}
			else{
				$validity = date('Y-m-d', strtotime(' + '.$post_purchase['Validity'].' days'));
			}
			$purchase_data = array(
				'UserId' => trim($post_purchase['UserId']),
				'LicensePackId' => trim($post_purchase['LicensePackId']),
				'TotalLicense' => trim($post_purchase['TotalLicense']),
				'Price' => trim($post_purchase['Price']),
				'RemainingLicense' => trim($post_purchase['TotalLicense']),
				'ExpiredDate' => $validity,
				'IsActive' => true,
				'CreatedBy' => trim($post_purchase['CreatedBy']),
				'UpdatedBy' => trim($post_purchase['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s'),
			);	

			$res = $this->db->insert('tblclientlicense',$purchase_data);
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}	
			if($res) {
				$insert_id = $this->db->insert_id();
				return $insert_id;
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
?>