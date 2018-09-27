<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remaining extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Remaining_model');
	}
	
	
	public function getDays()
	{
		
		$Day=$this->Remaining_model->getlist_days();
		if($Day)
		{
				   $datetime1=date('Y-m-d',strtotime('-'.$Day.'Day'));
				
				$data2=$this->Remaining_model->getlist_value($datetime1);
			
				if($data2)
				{							
					foreach ($data2 as $users)
					{
						
						 $userId=$users->UserId;
							$userId_backup=$userId;
			
							$EmailToken = 'Incomplete Feedback';
							
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
										$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
										$rowTo = $queryTo->result();
										$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
										$body = $row->EmailBody;
										foreach($query1->result() as $row1){			
											$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
											$result2 = $query2->result();
											$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
										} 
										//$body = str_replace("{reset_url}",''.BASE_URL.'/forgotpassword',$body);
										$body = str_replace("{login_url}",''.BASE_URL.'/login',$body);
			
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
							echo json_encode('Success');
						
					}
					
				}
				
			
		}
	}
	
	public function noofLicense()
	{
		$Day=$this->Remaining_model->getnoofLicense_days();
		
		if($Day)
		{
				$data2=$this->Remaining_model->getnoofLicense_value($Day);
				
				if($data2)
				{							
					foreach ($data2 as $users)
					{
							$userId=$users->UserId;
							$Remaining_Licenses=$users->RemainingLicense;
							$LicensePackId=$users->LicensePackId;
							$userId_backup=$userId;
							$EmailToken = 'no. of License Remaining';
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
							$this->db->select('c.NoOfLicense,c.Name,c.Validity');
							//$this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
							$this->db->where('c.LicensePackId',$LicensePackId);
							$smtp2 = $this->db->get('tblmstlicensepack c');	
							foreach($smtp2->result() as $row1) {
							
							$LName = $row1->Name;
							
							}	
							// $this->db->select('c.WorkspaceURL,c.CompanyName');
							// $this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
							// $this->db->where('u.UserId',$userId);
							// $smtp2 = $this->db->get('tblcompany c');	
							// foreach($smtp2->result() as $row1) {
							// 	$WorkspaceURL = $row1->WorkspaceURL;
							// 	$CompanyName = $row1->CompanyName;
								
							// }	
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
								//	$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
								$body = str_replace("{action_url}",''.BASE_URL.'/purchase-licensepack',$body);

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
										$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
										$rowTo = $queryTo->result();
										$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
										$body = $row->EmailBody;
										foreach($query1->result() as $row1){			
											$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
											$result2 = $query2->result();
											$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
										} 
										$body = str_replace("{action_url}",''.BASE_URL.'/purchase-licensepack',$body);

										$body = str_replace("{License_Pack}",$LName,$body);
										$body = str_replace("{Remaining_Licenses}",$Remaining_Licenses,$body);
										//$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
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
							echo json_encode('Success');
						
					}
		
				}
				
			
		}
	}
	public function LicenseExpiry()
	{
		$Day=$this->Remaining_model->getLicenseExpiry_days();
		
		if($Day)
		{		
				$datetime1=date('Y-m-d',strtotime('+'.$Day.'Day'));
			
				 $data2=$this->Remaining_model->getLicenseExpiry_value($datetime1);
				if($data2)
				{							
					foreach ($data2 as $users)
					{
						    $userId=$users->UserId;
							$userId_backup=$userId;
							$ExpiredDate=$users->ExpiredDate;
							$LicensePackId=$users->LicensePackId;
							$EmailToken = 'License Expiry';
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
							$this->db->select('c.NoOfLicense,c.Name,c.Validity');
							//$this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
							$this->db->where('c.LicensePackId',$LicensePackId);
							$smtp2 = $this->db->get('tblmstlicensepack c');	
							foreach($smtp2->result() as $row1) {
							
							$LName = $row1->Name;
							
							}	
							// $this->db->select('c.WorkspaceURL,c.CompanyName');
							// $this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
							// $this->db->where('u.UserId',$userId);
							// $smtp2 = $this->db->get('tblcompany c');	
							// foreach($smtp2->result() as $row1) {
							// 	$WorkspaceURL = $row1->WorkspaceURL;
							// 	$CompanyName = $row1->CompanyName;
								
							// }	
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
										$body = str_replace("{login_url}",''.BASE_URL.'/purchase-licensepack',$body);

										$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
									} 
									if($row->BccEmail!=''){
										$bcc = $row->BccEmail.','.$row->totalbcc;
									} else {
										$bcc = $row->totalbcc;
									}
								//	$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
									
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
										$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
										$rowTo = $queryTo->result();
										$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
										$body = $row->EmailBody;
										foreach($query1->result() as $row1){			
											$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
											$result2 = $query2->result();
											$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
										} 
										$body = str_replace("{login_url}",''.BASE_URL.'/login',$body);

										$body = str_replace("{License_Pack}",$LName,$body);
										$body = str_replace("{Expire_Date}", date('m-d-Y', strtotime($ExpiredDate)),$body);
										//$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
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
							echo json_encode('Success');
						
					}
		
				}
				
			
		}
	}
	public function LicenseExpired()
	{
				//$Day=$this->Remaining_model->getLicenseExpiry_days();
				$datetime1=date('Y-m-d',strtotime('-'.'1'.'Day'));
				$data2=$this->Remaining_model->getLicenseExpired_value($datetime1);
			
				if($data2)
				{							
					foreach ($data2 as $users)
					{
						    $userId=$users->UserId;
							$userId_backup=$userId;
							$LicensePackId=$users->LicensePackId;
							$EmailToken = 'License Alert';
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
							$this->db->select('c.NoOfLicense,c.Name,c.Validity');
							//$this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
							$this->db->where('c.LicensePackId',$LicensePackId);
							$smtp2 = $this->db->get('tblmstlicensepack c');	
							foreach($smtp2->result() as $row1) {
							
							$LName = $row1->Name;
							
							}
							// $this->db->select('c.WorkspaceURL,c.CompanyName');
							// $this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
							// $this->db->where('u.UserId',$userId);
							// $smtp2 = $this->db->get('tblcompany c');	
							// foreach($smtp2->result() as $row1) {
							// 	$WorkspaceURL = $row1->WorkspaceURL;
							// 	$CompanyName = $row1->CompanyName;
								
							// }	
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
										$body = str_replace("{login_url}",''.BASE_URL.'/purchase-licensepack',$body);

										$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
									} 
									if($row->BccEmail!=''){
										$bcc = $row->BccEmail.','.$row->totalbcc;
									} else {
										$bcc = $row->totalbcc;
									}
								//	$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
								
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
										$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
										$rowTo = $queryTo->result();
										$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
										$body = $row->EmailBody;
										foreach($query1->result() as $row1){			
											$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
											$result2 = $query2->result();
											$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
										} 
										$body = str_replace("{License_Pack}",$LName,$body);
										$body = str_replace("{login_url}",''.BASE_URL.'/login',$body);

										//$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
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
							echo json_encode('Success');
						
					}
		
				}
				
			
		
	}
	
	
}
