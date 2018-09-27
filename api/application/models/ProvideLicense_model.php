<?php

class ProvideLicense_model extends CI_Model
 {
    public function getclients()
	{
		try{
        $this->db->select('UserId,RoleId,EmailAddress,FirstName,LastName,PhoneNumber');
			$this->db->where('StatusId="0"');
            $this->db->where('IsActive="1"');
            $this->db->where('RoleId="3"');
			$result = $this->db->get('tbluser');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 //$this->db->limit(5);
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
    public function getlicenses()
	{
		try{
        $this->db->select('lp.LicensePackId,lp.Description,lp.Name,lp.NoOfLicense,lp.Price,lp.Validity,lp.DiscountId,lp.LicensePackType,lp.IsActive,DATE_FORMAT(lp.StartDate,"%m/%d/%Y") as StartDate,DATE_FORMAT(lp.EndDate,"%m/%d/%Y") as EndDate,(SELECT COUNT(cl.ClientLicenseId) FROM tblclientlicense as cl WHERE cl.LicensePackId=lp.LicensePackId) as isdisabled');
		 $this->db->where('lp.IsActive',1);
		 $result=$this->db->get('tblmstlicensepack lp');
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
		 //$this->db->limit(5);
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
    public function addPurchase($post_purchase)
	{
		try{
        if($post_purchase) {
            $this->db->select('lp.Description,lp.Name,lp.NoOfLicense,lp.Price,lp.Validity,lp.DiscountId,lp.LicensePackType,lp.IsActive,d.Name as discountName,d.Value as discountValue,lt.Value as discountTypeName, (CASE WHEN lt.Value="Percentage" THEN ((lp.Price*d.Value)/100) ELSE "0" END) as DiscountPrice');
            $this->db->join('tblmstdiscount d', 'd.DiscountId = lp.DiscountId', 'left');
            $this->db->join('tblmstconfiguration lt', 'lt.ConfigurationId = d.DiscountType', 'left');
            $this->db->where('lp.LicensePackId',$post_purchase['LicensePackId']);
			$result=$this->db->get('tblmstlicensepack lp');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
            $res=array();
            foreach($result->result() as $row)
            {
                //$res=$result->result();
                //echo $res;
                if($row->discountTypeName=='License')
                {
                    $totalLicense = $row->NoOfLicense + $row->discountValue;
                }
                else
                {
                    $totalLicense = $row->NoOfLicense;
                }
                $validity=$row->Validity;
            }
           //return $totalLicense;
			$purchase_data = array(
				'UserId' => trim($post_purchase['UserId']),
				'LicensePackId' => trim($post_purchase['LicensePackId']),
				'TotalLicense' => $totalLicense,
				'RemainingLicense' => $totalLicense,
                'ExpiredDate' => date('Y-m-d', strtotime(' + '.$validity.' days')),
                'ProvideByAdmin' => 1,
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
 ?>
