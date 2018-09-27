<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class MyLicensePack extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyLicensePack_model');
    }

	public function getAll($UserId = NULL) {
		
		if (!empty($UserId)) {
			$data=$this->MyLicensePack_model->getlist_Licence_Pack($UserId);
			echo json_encode($data);			
		}
	}
	public function add() {
								
		$post_Invitation = json_decode(trim(file_get_contents('php://input')), true);		
		if ($post_Invitation) {
			$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$res = "";
			for ($i = 0; $i < 6; $i++) {
				$res .= $chars[mt_rand(0, strlen($chars)-1)];
			}			
			$post_Invitation['InvitationCode']= $res;

			$result = $this->MyLicensePack_model->add_Invitation($post_Invitation);
			if($result) {
				$userId=$result;
				$userId_backup=$userId;

				$EmailToken = 'User Invitation';
				
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
				foreach($smtp2->result() as $row) {
					$WorkspaceURL = $row->WorkspaceURL;
					$CompanyName = $row->CompanyName;
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

						//$body = str_replace("{action_url}",''.BASE_URL.'/user-registration/'.JWT::encode($post_Invitation['InvitationCode'],"MyGeneratedKey","HS256").'',$body);
						$body = str_replace("{action_url}",''.BASE_URL.'/'.$WorkspaceURL.'/user-registration/'.JWT::encode($post_Invitation['InvitationCode'],"MyGeneratedKey","HS256").'',$body);
						$this->db->select('CompanyName');
						$this->db->from('tblcompany');
						$this->db->where('UserId',$post_Invitation['UpdatedBy']);
						$this->db->limit(1);
						$res_c = $this->db->get()->row();
						$name = '';
						if($res_c){
							$name=$res_c->CompanyName;
						}
						

						$row->Subject = str_replace("{company_name}",$name,$row->Subject);
						$body = str_replace("{company_name}",$name,$body);

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
							$log_data = array(
								'UserId' => trim($post_Invitation['UpdatedBy']),
								'Module' => 'User-Invitation',
								'Activity' =>'Invitation'		
							);
							$log = $this->db->insert('tblactivitylog',$log_data);
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
			} else {				
				echo json_encode("email duplicate");
			}										
		}		
	}	
}
?>