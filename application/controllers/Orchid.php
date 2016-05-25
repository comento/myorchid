<?php
class Orchid extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		session_start();
	}

	public function index()
	{
		$data = '';		
		if(isset($_COOKIE['user_no'])){
			$this->load->view('templates/header', $data);
    	    $this->load->view('orchid/index', $data);	
		}else{
			$this->load->view('templates/header', $data);
    	    $this->load->view('orchid/join', $data);		
		}
        print_r($_SESSION);
	}

	public function album()
	{

	}
}