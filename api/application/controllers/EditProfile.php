<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class EditProfile extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EditProfile_model');
	}
	
	public function getStateList($country_id = NULL) {
		
		if(!empty($country_id)) {			
			$result = [];
			$result = $this->EditProfile_model->getStateList($country_id);			
			echo json_encode($result);				
		}			
	}
	
	public function editprofile()
	{
		$post_user = json_decode(trim(file_get_contents('php://input')), true);					
		if ($post_user) 
		{			
			$result = $this->EditProfile_model->edit_profile($post_user);
			if($result){
				$token = array(
					"UserId" => $post_user['UserId'],
					"RoleId" => $post_user['RoleId'],
					"EmailAddress" => $post_user['EmailAddress'],
					"FirstName" => $post_user['FirstName'],
					"LastName" => $post_user['LastName']
				);

				$jwt = JWT::encode($token, "MyGeneratedKey","HS256");
				$output['token'] = $jwt;
				echo json_encode($output);
			}
			else
			{
				echo json_encode('error');
			}					
		}
	}

	public function getProfileById($user_id=null)
	{			
		if(!empty($user_id))
		{
			$data=[];
			$data['user']=$this->EditProfile_model->get_userdata($user_id);
			$data['country']=$this->EditProfile_model->getlist_country();
			$data['company']=$this->EditProfile_model->get_companydata($user_id);
			if($data['user']){
				$data['state']=$this->EditProfile_model->getStateList($data['user']->CountryId);
			}			
			echo json_encode($data);
		}
	}

	public function updateCompany()
	{
		$post_company = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_company) 
		{			
			$result = $this->EditProfile_model->updateCompany($post_company);
			if($result){
				echo json_encode('success');
			}
			else
			{
				echo json_encode('error');
			}					
		}
	}

	public function uploadFile()
	{
		if($_FILES){
			if(isset($_FILES['logo']) && !empty($_FILES['logo'])){
				move_uploaded_file($_FILES["logo"]["tmp_name"], "../src/assets/company/".$_FILES["logo"]["name"]);
			}
			if(isset($_FILES['favicon']) && !empty($_FILES['favicon'])){
				move_uploaded_file($_FILES["favicon"]["tmp_name"], "../src/assets/company/".$_FILES["favicon"]["name"]);
			}
			echo json_encode('success');
		}
	}

}
