<?php
class Orchid extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		$this->load->library('session');
	}

	//인덱스 페이지
	public function index()
	{
		$data = '';		
		$this->load->view('templates/header', $data);
	    $this->load->view('orchid/index', $data);		
	
     }

	//로그인 시 온실로 이동
	public function greenhouse()
	{
		$data = '';		
		$this->load->view('templates/header', null);
		
		$user_no = $this->session->userdata('orchid_no');
	
		if(isset($user_no)){
			$data['user_no'] = $user_no;
			$data['name'] = $this->session->userdata('name');
			$data['status_name'] = $this->session->userdata('status_name');		
			$data['img'] = $this->session->userdata('img');	
			$data['login_date'] = $this->session->userdata('login_date');	
		
		    $this->load->view('orchid/greenhouse', $data);
		}else{
		    $this->load->view('orchid/index', null);			
		}
	}


	public function album()
	{

	}
}