<?php
class MyLicensePack_model extends CI_Model
{
    public function getlist_Licence_Pack($UserId = NULL)
	{
		try{
        if($UserId){
            $this->db->select('cl.ClientLicenseId,cl.LicensePackId,cl.TotalLicense,cl.RemainingLicense,cl.ExpiredDate,cl.CreatedOn,lp.Name,cl.ProvideByAdmin');
            $this->db->join('tblmstlicensepack lp', 'lp.LicensePackId = cl.LicensePackId', 'left');
			$this->db->where('cl.UserId',$UserId);
			$this->db->order_by('cl.RemainingLicense','desc');
			$this->db->order_by('cl.ExpiredDate','desc');
            $result=$this->db->get('tblclientlicense cl');
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
        } else {
            return false;
		}
	}
	catch(Exception $e){
		trigger_error($e->getMessage(), E_USER_ERROR);
		return false;
	}
    }
    public function add_Invitation($post_Invitation) {
		try{
		if($post_Invitation) {
			$this->db->select('EmailAddress');
			$this->db->from('tbluser');
			$this->db->where('EmailAddress',trim($post_Invitation['EmailAddress']));
			$this->db->limit(1);
			$query = $this->db->get();
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if ($query->num_rows() == 1) {
				return false;
			} 
			else 
			{
				$Invitation_data = array(
					'EmailAddress' =>  trim($post_Invitation['EmailAddress']),
					'ParentId' => trim($post_Invitation['UpdatedBy']),
					'RoleId' =>  4,					
					'StatusId' =>  1,
					'InvitationCode' =>  trim($post_Invitation['InvitationCode']),
					'ClientLicenseId' => trim($post_Invitation['ClientLicenseId']),
					'UpdatedOn' => date('y-m-d H:i:s')
				);
				$res = $this->db->insert('tbluser',$Invitation_data);
				$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
				if($res) {
                    $result = $this->db->insert_id();
                    $this->db->set('RemainingLicense', 'RemainingLicense-1', FALSE);
                    $this->db->where('ClientLicenseId',$post_Invitation['ClientLicenseId']);
					$this->db->update('tblclientlicense');
					$db_error = $this->db->error();
					if (!empty($db_error) && !empty($db_error['code'])) { 
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
						return false; // unreachable return statement !!!
					}
                    return $result;
				} else {
					return false;
				}
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