<?php
class Orchid extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		$this->load->library('session');
		$this->load->helper('date');
	}

	//인덱스 페이지
	public function index()
	{
		$data = '';		
		$this->load->view('templates/header', $data);
		$data = $this->session->all_userdata();
	
		if(isset($data['orchid_no'])){
			$this->load->view('orchid/greenhouse', $data);
		}else{
		    $this->load->view('orchid/index', $data);				
		}
		
     }

	//로그인 시 온실로 이동
	public function greenhouse()
	{
		$data = '';		
		$this->load->view('templates/header', null);
		
		$user_no = $this->session->userdata('orchid_no');
	
		if(isset($user_no)){
			$data = $this->session->all_userdata();
		    $this->load->view('orchid/greenhouse', $data);
		}else{
		    $this->load->view('orchid/index', null);			
		}
	}


	public function album()
	{

	}
}