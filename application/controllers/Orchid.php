<?php
class Orchid extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
		$this->load->library('session');
		$this->load->model('message_model');
		//$this->load->helper('date');
	}

	//인덱스 페이지
	public function index()
	{
		$data = '';		
		$this->load->view('templates/header', null);
		$data = $this->session->all_userdata();
	
		if(isset($data['orchid_no'])){
			$this->load->view('orchid/greenhouse', null);
		}else{
		    $this->load->view('orchid/index', null);				
		}
		
     }

	//로그인 시 온실로 이동
	public function greenhouse()
	{
		$data = '';		
		$actionLog = '';
		$this->load->view('templates/header', null);
		$this->load->view('orchid/gamerules', null);
		
		$user_no = $this->session->userdata('orchid_no');
	
		if(isset($user_no)){
			$data = $this->session->all_userdata();
			
			$date = date("Y-m-d",mktime(0,0,0,date("m"),date("d"),date("Y")));
			$now = new DateTime($date);
			$birth = new DateTime(substr($this->session->userdata('birth'),0,10));		
			$diff = date_diff($birth, $now);
			$day_diff = $diff->days;

			$data['day_diff'] = $day_diff+1;
				
			$special_names = array("유진","창섭","재성","다린","진규","조은","다혜");
			$img_url = array("yjjang.jpg","csbg.jpg","js.png","linda.png","aka.png","jenny.png","dana.jpg");
			$key_num;
			foreach($special_names as $key=>$value){
				if(strpos($this->session->userdata('name'), $value) !== false){
					$key_num = $key;
				}
			}
			
			if(isset($key_num)){
				$data['character_img'] = $img_url[$key_num];
			} 
			
			if($this->session->userdata('status') == 7){
				$data['random_message'] = "죽은 난은 말이 없다.";
			}else{
				$message = $this->message_model->getRandomMessage($user_no);
				$data['random_message'] = $message;	
			}
			
		    $this->load->view('orchid/greenhouse', $data);
			$this->load->view('orchid/checksheet', null);
			
		}else{
		    $this->load->view('orchid/index', null);			
		}
	}


	public function album()
	{

	}
}