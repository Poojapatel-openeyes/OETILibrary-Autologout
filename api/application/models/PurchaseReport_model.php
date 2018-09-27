<?php

class PurchaseReport_model extends CI_Model
 {
	 
    public function getAll()
	{
		try{
        $this->db->select('u.FirstName,u.LastName,cl.CreatedOn,lp.Name,c.Value');
		$this->db->from('tblclientlicense AS cl');
		$this->db->join('tblmstlicensepack as lp', 'cl.LicensePackId=lp.LicensePackId', 'inner');
		$this->db->join('tblmstconfiguration as c', 'lp.LicensePackType=c.ConfigurationId', 'inner');
		$this->db->join('tbluser as u', 'cl.UserId=u.UserId', 'inner');
		 $this->db->order_by('cl.CreatedOn','desc');
		 //$this->db->limit(5);
         $res = array();
		 $result=$this->db->get();
		 $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
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

 }
 ?>
