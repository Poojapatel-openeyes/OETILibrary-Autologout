<?php

class UserResult_model extends CI_Model
 {
    public function get_result($UserId = NULL){
        try{
		if(!empty($UserId)) {

            $this->db->select('UserFeedbackId,EndDateTime');
			$this->db->where('UserId',$UserId);
			$query = $this->db->get('tbluserfeedback');
			$db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
			if ($query->num_rows() > 0) {
                $r=$query->result();
				$EndDateTime = $r[0]->EndDateTime;
				if($EndDateTime==NULL){
					return 'feedback';
				}	

                $query = $this->db->query('SELECT pc.FeedbackCategoryId,pc.Name,uf.UserFeedbackId,(CAST(((SUM(cs.Score))/COUNT(c.FeedbackCategoryId)) AS DECIMAL(4,1))) as score FROM tblcategorywisescore as cs LEFT JOIN tblmstfeedbackcategory c ON cs.FeedbackCategoryId=c.FeedbackCategoryId LEFT JOIN tblmstfeedbackcategory pc ON pc.FeedbackCategoryId=c.ParentId LEFT JOIN tbluserfeedback as uf ON uf.UserFeedbackId=cs.UserFeedbackId WHERE pc.ParentId=0 && uf.UserId='.$UserId.' GROUP BY pc.FeedbackCategoryId');
                $db_error = $this->db->error();
				if (!empty($db_error) && !empty($db_error['code'])) { 
					throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					return false; // unreachable return statement !!!
				}
                $res = array();
                foreach($query->result() as $row) {
                    $FeedbackCategoryId = $row->FeedbackCategoryId;
                    $UserFeedbackId = $row->UserFeedbackId;
                    $subquery = $this->db->query('SELECT c.Name, c.FeedbackCategoryId, cs.Score as score FROM tblcategorywisescore as cs LEFT JOIN tblmstfeedbackcategory c ON cs.FeedbackCategoryId=c.FeedbackCategoryId WHERE c.ParentId='.$FeedbackCategoryId.' && cs.UserFeedbackId='.$UserFeedbackId);
                    $db_error = $this->db->error();
                    if (!empty($db_error) && !empty($db_error['code'])) { 
                        throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                        return false; // unreachable return statement !!!
                    }
                    $row->child = $subquery->result();
                    array_push($res,$row);	
                }
                return $res;
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
