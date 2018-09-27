<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Dashboard_model');
		
	}

	public function getClientDashboard($ClientId = NULL) {
		
		if (!empty($ClientId)) {
			$data = $this->Dashboard_model->getClientDashboard($ClientId);
			echo json_encode($data);			
		}
	}
	public function getDashboard($Id = NULL) {
		
		if (!empty($Id)) {
			$AllData = $this->Dashboard_model->getDashboard($Id);
			echo json_encode($AllData);			
		}
	}
}
