<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseLicensePack extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PurchaseLicensePack_model');
    }
    public function getAll()
	{		
		$data=$this->PurchaseLicensePack_model->getlist_Licence_Pack();		
		echo json_encode($data);
	}
	public function addPurchase(){
		$post_purchase = json_decode(trim(file_get_contents('php://input')), true);	
		if ($post_purchase) {
				$result = $this->PurchaseLicensePack_model->addPurchase($post_purchase);
				
				if($result) {	

					$userId=$post_purchase['UserId'];
					$userId_backup=$userId;
	
					$EmailToken = 'License Purchase';
					
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
	
					$this->db->select('ParentId,FirstName');
					$this->db->where('UserId',$userId);
					$res3 = $this->db->get('tbluser');	
					foreach($res3->result() as $row) {
						$Sales_Assign = $row->ParentId;
						$Sales_Assign_name = $row->FirstName;
						
					}
	
					$this->db->select('c.WorkspaceURL,c.CompanyName');
					//$this->db->join('tbluser u', 'u.ParentId = c.UserId', 'inner');
					$this->db->where('c.UserId',$userId);
					$smtp2 = $this->db->get('tblcompany c');	
					foreach($smtp2->result() as $row1) {
						$WorkspaceURL = $row1->WorkspaceURL;
						$CompanyName = $row1->CompanyName;
					}	
					
					$config['protocol']='smtp';
					$config['smtp_host']='ssl://smtp.googlemail.com';
					$config['smtp_port']='465';
					$config['smtp_user']='myopeneyes3937@gmail.com';
					$config['smtp_pass']='W3lc0m3@2018';	
	
					// $config['protocol']='mail';
					// $config['smtp_host']='vps40446.inmotionhosting.com';
					// $config['smtp_port']='587';
					// $config['smtp_user']=$smtpEmail;
					// $config['smtp_pass']=$smtpPassword;
					
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

							if($post_purchase['Validity']==0)
							{
								$validity = "No Validity";
							}
							else{
								$validity = date('Y-m-d', strtotime(' + '.$post_purchase['Validity'].' days'));
							}

							$body = str_replace("{License_Pack}",$post_purchase['Name'],$body);
							$body = str_replace("{No_License_Pack}",$post_purchase['TotalLicense'],$body);
							$body = str_replace("{Expire_Date}",$validity,$body);
							$body = str_replace("{Amount}",$post_purchase['Price'],$body);										
	
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
						} elseif($row->To==3) {
							$userId_ar = explode(',', $row->totalTo);			 
							foreach($userId_ar as $userId){
								if($userId==$userId_backup){
								$queryTo = $this->db->query('SELECT EmailAddress FROM tbluser where UserId = '.$userId); 
								$rowTo = $queryTo->result();
								$query1 = $this->db->query('SELECT p.PlaceholderId,p.PlaceholderName,t.TableName,c.ColumnName FROM tblmstplaceholder AS p LEFT JOIN tblmsttablecolumn AS c ON c.ColumnId = p.ColumnId LEFT JOIN tblmsttable AS t ON t.TableId = c.TableId WHERE p.IsActive = 1');
								$body = $row->EmailBody;
								foreach($query1->result() as $row1){			
									$query2 = $this->db->query('SELECT '.$row1->ColumnName.' AS ColumnName FROM '.$row1->TableName.' AS tn LEFT JOIN tblmstuserrole AS role ON tn.RoleId = role.RoleId LEFT JOIN tblmststate AS st ON tn.StateId = st.StateId LEFT JOIN tblmstcountry AS con ON st.CountryId = con.CountryId LEFT JOIN tblcompany AS com ON tn.UserId = com.UserId WHERE tn.UserId = '.$userId_backup);
									$result2 = $query2->result();
									$body = str_replace("{ ".$row1->PlaceholderName." }",$result2[0]->ColumnName,$body);					
								} 
								if($post_purchase['Validity']==0)
							{
								$validity = "No Validity";
							}
							else{
								$validity = date('Y-m-d', strtotime(' + '.$post_purchase['Validity'].' days'));
							}
								$body = str_replace("{License_Pack}",$post_purchase['Name'],$body);
								$body = str_replace("{No_License_Pack}",$post_purchase['TotalLicense'],$body);
								$body = str_replace("{Expire_Date}",$validity,$body);
								$body = str_replace("{Amount}",$post_purchase['Price'],$body);
								$body = str_replace("{Client_Name}",$Sales_Assign_name,$body);
							
								$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);

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
								$body = str_replace("{login_url}",''.BASE_URL.'/purchase-report',$body);
								$body = str_replace("{License_Pack}",$post_purchase['Name'],$body);
								$body = str_replace("{No_License_Pack}",$post_purchase['TotalLicense'],$body);
								$body = str_replace("{Expire_Date}",date('Y-m-d', strtotime(' + '.$post_purchase['Validity'].' days')),$body);
								$body = str_replace("{Amount}",$post_purchase['Price'],$body);
								
								$body = str_replace("{Client_Name}",$Sales_Assign_name,$body);
								$row->Subject = str_replace("{company_name}",$CompanyName,$row->Subject);
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
					$log_data = array(
						'UserId' => trim($post_purchase['UserId']),
						'ClientLicenseId' => $result,
						'Module' => 'Purchase-LicensePack',
						'Activity' =>'PurchaseLicense'		
					);
					$log = $this->db->insert('tblactivitylog',$log_data);

					echo json_encode($post_purchase);		
					//echo json_encode("Success");
				} 
		}	
	}
}
?>