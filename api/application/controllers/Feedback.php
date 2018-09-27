<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Feedback_model');
		
	}

	public function getFeedback($UserId=null) {

		if(!empty($UserId))
		{
			$data = $this->Feedback_model->getFeedback($UserId);	
			if($data){
				echo json_encode($data);
			} else {
				echo json_encode('no');
			}				
		}				
	}

	public function checkFBstart($UserId=null)
	{			
		if(!empty($UserId))
		{
			$result=$this->Feedback_model->checkFBstart($UserId);
			if($result){
				echo json_encode('yes');
			} else {
				echo json_encode('no');
			}			
		}
	}

	public function startFeedback($UserId=null)
	{			
		if(!empty($UserId))
		{
			$result=$this->Feedback_model->startFeedback($UserId);
			if($result){
				echo json_encode($result);
			}		
		}
	}

	public function saveQuestion() {
		$question = json_decode(trim(file_get_contents('php://input')), true);		

		if ($question) {
			$result = $this->Feedback_model->saveQuestion($question);
			if($result) {					
				echo json_encode("Success");
			} 
		} 			
	}

	public function test(){
		$this->db->select('ans.FeedbackAnswerId,ua.Name,IF((SELECT `IsReverseAnswer` FROM `tblmstfeedbackcategory` WHERE `FeedbackCategoryId`=8)=0, ua.Value, ua.ReverseValue) as Value,ans.IsActive');
		$this->db->join('tblmstfeedbackanswer ua', 'ua.FeedbackAnswerId = ans.FeedbackAnswerId', 'left');
		$this->db->where('ans.IsActive',1);
		$this->db->where('ans.FeedbackbQuestionId',6);
		$this->db->order_by('ans.DisplayOrder', 'asc');
		$query_ans=$this->db->get('tblquestionanswersoptions ans');
		$row = $query_ans->result();		
		echo json_encode($row);
	}

	public function submitFeedback() {
		$post_data = json_decode(trim(file_get_contents('php://input')), true);		

		if($post_data) {
			$result = $this->Feedback_model->submitFeedback($post_data);
			if($result) {	

				$userId=$post_data['UserId'];
				$userId_backup=$userId;

				$EmailToken = 'User Feedback Complete';
				
				$this->db->select('Value');
				$this->db->where('Key','EmailFrom');
				$smtp1 = $this->db->get('tblmstconfiguration');	
				foreach($smtp1->result() as $row) {
					$smtpEmail = $row->Value;
				}
				$this->db->select('Value');
				$this->db->where('Key','EmailPassword');
				$smtp2 = $this->db->get('tblmstconfiguration');	
				foreach($smtp2->result() as $row) {
					$smtpPassword = $row->Value;
				}

				$this->db->select('ParentId');
				$this->db->where('UserId',$userId);
				$res3 = $this->db->get('tbluser');	
				foreach($res3->result() as $row) {
					$Sales_Assign = $row->ParentId;
				}

				$this->db->select('c.WorkspaceURL,c.CompanyName');
				$this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
				$this->db->where('u.UserId',$userId);
				$smtp2 = $this->db->get('tblcompany c');	
				foreach($smtp2->result() as $row1) {
					$WorkspaceURL = $row1->WorkspaceURL;
					$CompanyName = $row1->CompanyName;
				}	
				
				// $config['protocol']='smtp';
				// $config['smtp_host']='ssl://smtp.googlemail.com';
				// $config['smtp_port']='465';
				// $config['smtp_user']='myopeneyes3937@gmail.com';
				// $config['smtp_pass']='W3lc0m3@2018';	

				$config['protocol']='mail';
				$config['smtp_host']='vps40446.inmotionhosting.com';
				$config['smtp_port']='587';
				$config['smtp_user']=$smtpEmail;
				$config['smtp_pass']=$smtpPassword;
				
				$config['charset']='utf-8';
				$config['newline']="\r\n";
				$config['mailtype'] = 'html';							
				$this->email->initialize($config);
		
				$query = $this->db->query("SELECT et.To,et.Subject,et.EmailBody,et.BccEmail,(SELECT GROUP_CONCAT(UserId SEPARATOR ',') FROM tbluser WHERE RoleId = et.To && ISActive = 1 && StatusId = 0) AS totalTo,(SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tbluser WHERE RoleId = et.Cc && ISActive = 1 && StatusId = 0) AS totalcc,(SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tbluser WHERE RoleId = et.Bcc && ISActive = 1 && StatusId = 0) AS totalbcc FROM tblemailtemplate AS et LEFT JOIN tblmsttoken as token ON token.TokenId=et.TokenId WHERE token.TokenName = '".$EmailToken."' && et.IsActive = 1");
				foreach($query->result() as $row){ 
					if($row->To==4){
						$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
						$rowTo = $queryTo->result();
						$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
						$body = $row->EmailBody;
						foreach($query1->result() as $row1){			
							$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId);
							$result2 = $query2->result();
							$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
						} 
						if($row->BccEmail!=''){
							$bcc = $row->BccEmail.','.$row->totalbcc;
						} else {
							$bcc = $row->totalbcc;
						}
						$body = str_replace("{login_url}",''.BASE_URL.'/login',$body);										

						$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
						
						$this->email->from($smtpEmail, 'Learn Feedback');
						$this->email->to($rowTo[0]->EmailAddress);		
						$this->email->subject($row->Subject);
						$this->email->cc($row->totalcc);
						$this->email->bcc($bcc);
						$this->email->message($body);
						if($this->email->send())
						{
							$email_log = array(
								'From' => trim($smtpEmail),
								'Cc' => trim($row->totalcc),
								'Bcc' => trim($bcc),
								'To' => trim($rowTo[0]->EmailAddress),
								'Subject' => trim($row->Subject),
								'MessageBody' => trim($body),
							);
							
							$res = $this->db->insert('tblemaillog',$email_log);
		
							//echo json_encode("Success");
						}else
						{
							//echo json_encode("Fail");
						}
					} else {
						$userId_ar = explode(',', $row->totalTo);			 
						foreach($userId_ar as $userId){
							if($userId==$Sales_Assign){
							$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
							$rowTo = $queryTo->result();
							$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
							$body = $row->EmailBody;
							foreach($query1->result() as $row1){			
								$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
								$result2 = $query2->result();
								$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
							} 
							$body = str_replace("{login_url}",''.BASE_URL.'/feedback-userreport',$body);

							$this->email->from($smtpEmail, 'LFB Admin');
							$this->email->to($rowTo[0]->EmailAddress);		
							$this->email->subject($row->Subject);
							$this->email->cc($row->totalcc);
							$this->email->bcc($row->BccEmail.','.$row->totalbcc);
							$this->email->message($body);
							if($this->email->send())
							{
								//echo 'success';
							}else
							{
								//echo 'fail';
							}
						}
						}
					}
				}				
				echo json_encode("Success");
			} 
		} 			
	}
	
}
