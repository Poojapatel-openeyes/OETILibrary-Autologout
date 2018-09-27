<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class UserRegister extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserRegister_model');
		include APPPATH . 'vendor/firebase/php-jwt/src/JWT.php';
	}
	
	public function getAllData($id = NULL)
	{
		if(!empty($id)) {
			$data['user']=$this->UserRegister_model->get_userdata($id);
			if($data['user']){
				echo json_encode($data);
			} else {
				echo json_encode('wrong code');
			}
			
		}
		
    }
	public function updateUser()
	{
		$post_user = json_decode(trim(file_get_contents('php://input')), true);			
		if ($post_user) 
			{
				$result = $this->UserRegister_model->updateUser($post_user); 
					
				if($result)
				{
					$userId=$result['UserId'];
					$userId_backup=$userId;
	
					$EmailToken = 'User Registration';
					
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
							$body = str_replace("{login_link}",''.BASE_URL.'/login/',$body);

							$this->db->select('CompanyName');
							$this->db->from('tblcompany');
							$this->db->where('UserId',$post_user['ParentId']);
							$this->db->limit(1);
							$res_c = $this->db->get()->row();
							if($res_c){
								$name=$res_c->CompanyName;
								$row->Subject = str_replace("{company_name}",$name,$row->Subject);
							} else {
								$row->Subject = str_replace("{company_name}",'Learn Feedback',$row->Subject);
							}
							

							

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
									'UserId' => trim($result['UserId']),
									'Module' => 'Client-Registration',
									'Activity' =>'Add'		
								);
								$log = $this->db->insert('tblactivitylog',$log_data);
								
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
								$body = str_replace("{login_link}",''.BASE_URL.'/user-invitelist/',$body);
								$name=$result['FirstName']." ".$result['LastName'];
								$row->Subject = str_replace("{full_name}",$name,$row->Subject);
								
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

						$token = array(
							"UserId" => $result['UserId'],
							"RoleId" => $result['RoleId'],
							"EmailAddress" => $result['EmailAddress'],
							"FirstName" => $result['FirstName'],
							"LastName" => $result['LastName'],
						);

						$jwt = JWT::encode($token, "MyGeneratedKey","HS256");
						$output['token'] = $jwt;
						echo json_encode($output);			
				}
				else
				{
					return $this->output
				->set_status_header(404)
				->set_output(json_encode(array(
						'text' => 'Registration Failed!!!',
						'type' => 'danger'
				)));
				}
			}
					
	}
	
}
?>