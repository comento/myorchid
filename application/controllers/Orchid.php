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

	public function greenhouse()
	{
		$data = '';		
		$this->load->view('templates/header', $data);
		$user_no = $this->session->userdata('no');
		//$row=print_r($this->session->all_userdata());
		
		if(isset($user_no)){
		    $this->load->view('orchid/greenhouse', $data);
		}else{
		    $this->load->view('orchid/index', $data);			
		}
	}


	public function album()
	{

	}
}