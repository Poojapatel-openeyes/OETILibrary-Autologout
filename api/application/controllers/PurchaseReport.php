<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseReport extends MY_Controller {

    public function __construct() {
	
		parent::__construct();
		
		$this->load->model('PurchaseReport_model');
		
	}

	public function getAll() {
		
		$data=$this->PurchaseReport_model->getAll();		
		echo json_encode($data);				
	}
}
