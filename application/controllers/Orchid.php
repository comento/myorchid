<?php
class Orchid extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$data = '';		
		$this->load->view('templates/header', $data);
	    $this->load->view('orchid/index', $data);
	}

	public function greenhouse($slag = false)
	{
		$data = $_SESSION;
		$data['slag'] = $slag;
		$data['random'] = '';

		$data['random'] = 'flag1';
		//or $data['random'] = 'flag2';

		$this->load->view('templates/header', $data);
	
		//if (isset($data['user_no'])) {
		    $this->load->view('orchid/greenhouse', $data);
		//} else {
		//    $this->load->view('orchid/index', $data);	
		//}

		//print_r($_SESSION);	
	}


	public function album()
	{

	}
}