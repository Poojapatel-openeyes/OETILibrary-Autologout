<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends MY_Controller {


    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Contactus_model');
		
	}

	public function getContactDetails($user_id=null) {	
		if(!empty($user_id))
		{	
		$data=[];
		$data=$this->Contactus_model->getContactDetails();
		$data['user']=$this->Contactus_model->getContactById($user_id);
		if($data){
			echo json_encode($data);	
		} 
	}					
	}

	public function add() {
		
		$post_Inquiry = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Inquiry) {
			$result = $this->Contactus_model->add_Inquiry($post_Inquiry);
			if($result) {
				if($post_Inquiry['RoleId']==3){

					$userId=$post_Inquiry['UserId'];
					$userId_backup=$userId;

					$EmailToken = 'Contact Us Client';
					
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
						if($row->To==1){
							$userId_ar = explode(',', $row->totalTo);			 
							foreach($userId_ar as $userId){
								
								$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
								$rowTo = $queryTo->result();
								$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
								$body = $row->EmailBody;
								foreach($query1->result() as $row1){			
									$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
									$result2 = $query2->result();
									$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
								} 
								$body = str_replace("{login_url}",''.BASE_URL.'/inquiry/list',$body);
								$body = str_replace("{Client Name}",$post_Inquiry['Name'],$body);
								$body = str_replace("{Client Email}",$post_Inquiry['Email'],$body);
								$body = str_replace("{Client Phone}",$post_Inquiry['PhoneNumber'],$body);
								$body = str_replace("{Description}",$post_Inquiry['Message'],$body);

								$row->Subject = str_replace("{Client Name}",$post_Inquiry['Name'],$row->Subject);
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

				} elseif($post_Inquiry['RoleId']==4) {
					$userId=$post_Inquiry['UserId'];
					$userId_backup=$userId;

					$EmailToken = 'Contact Us User';
					
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
						if($row->To==3){
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
								$body = str_replace("{login_url}",''.BASE_URL.'/inquiry/list',$body);
								$body = str_replace("{User Name}",$post_Inquiry['Name']."",$body);
								$body = str_replace("{User Email}",$post_Inquiry['Email'],$body);
								$body = str_replace("{User Phone}",$post_Inquiry['PhoneNumber'],$body);
								$body = str_replace("{Description}",$post_Inquiry['Message'],$body);

								$row->Subject = str_replace("{User Name}",$post_Inquiry['Name'],$row->Subject);
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
				} else {
					$userId=$post_Inquiry['UserId'];
					$userId_backup=$userId;

					$EmailToken = 'Contact Us Client';
					
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
						if($row->To==1){
							$userId_ar = explode(',', $row->totalTo);			 
							foreach($userId_ar as $userId){
								
								$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
								$rowTo = $queryTo->result();
								$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
								$body = $row->EmailBody;
								foreach($query1->result() as $row1){			
									$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
									$result2 = $query2->result();
									$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
								} 
								$body = str_replace("{login_url}",''.BASE_URL.'/inquiry/list',$body);
								$body = str_replace("{Client Name}",$post_Inquiry['Name'],$body);
								$body = str_replace("{Client Email}",$post_Inquiry['Email'],$body);
								$body = str_replace("{Client Phone}",$post_Inquiry['PhoneNumber'],$body);
								$body = str_replace("{Description}",$post_Inquiry['Message'],$body);

								$row->Subject = str_replace("{Client Name}",$post_Inquiry['Name'],$row->Subject);
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
				echo json_encode('success');	
			}							
		}		
	}

	public function getAllInquiry() {
		
		$data=$this->Contactus_model->getlist_Inquiry();		
		echo json_encode($data);
				
	}
	
	
}
