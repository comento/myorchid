<?php
class Status_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
		$this->load->model('actions_model');
	}
	
	//상태 업데이트
	public function updateStatus($no, $status){
		$sql = "update orchid set status = ? where orchid_no = ?";
		$query = $this->db->query($sql, array($status, $no));
	}
	
	//난 정보 받아오기
	public function getOrchid($no){
		$select_sql ="select o.*, s.status as status_name, s.img from orchid o join status_desc s on o.status=s.no where orchid_no = ?";
		$query = $this->db->query($select_sql, array($no));
		return $query;
	}
	
	//초기화
	public function revival($no){
		$sql = "update orchid set status = ?, birth = now() where orchid_no = ? ";
		$query = $this->db->query($sql, array('1', $no));
	}
	
	//상태 체크
	public function checkStatus($no, $row){
		$login_date = $row['login_date'];
		$water_query = $this->actions_model->getActionlog($no, 'water');			
		$clean_query = $this->actions_model->getActionlog($no, 'clean');			
		$nutriton_query = $this->actions_model->getActionlog($no, 'nutrition');			
		
		if( $water_query ->num_rows() == 0 ){
			$water_date = $row['birth'];
		}else{
			$row1 = $water_query->row_array(); 
			$water_date = $row1['date'];
		}
	
		if( $clean_query ->num_rows() == 0 ){
			$clean_date = $row['birth'];
		}else{
			$row1 = $clean_query->row_array(); 
			$clean_date = $row1['date'];
		}
	
		if( $nutriton_query ->num_rows() == 0 ){
			$nutrition_date = $row['birth'];
		}else{
			$row1 = $nutriton_query->row_array(); 
			$nutrition_date = $row1['date'];
		}
		
		//차이를 계산한다. 
		$login_date = new DateTime($login_date);
		
		$water_date = new DateTime($water_date);
		$clean_date = new DateTime($clean_date);
		$nutrition_date = new DateTime($nutrition_date);
					
		$water_diff=date_diff($water_date, $login_date);
		$clean_diff=date_diff($clean_date, $login_date);
		$nutrition_diff=date_diff($nutrition_date, $login_date);
		
		$water_days = $water_diff->days;
		$clean_days = $clean_diff->days;		
		$nutrition_days = $nutrition_diff->days;		


		if(($water_days/2)+($clean_days/3)+($nutrition_days/4) >= 3){
			return 7; //7 죽은 상태
		}else if(($water_days/2) > 0 || ($clean_days/3) > 0 || $nutrition_days/4 > 0){
				
			$max = $water_days/2;
			$status = 4; //건조
			
			if($clean_days/3 > $max){
				$max = $clean_days/3;
				$status = 5; //더러워
			}
			
			if($nutrition_days/4 > $max){
				$max = $nutrition_days/4;
				$status = 3;	//영양부족
			}
			
			return $status;
		}
		
		return 0; //1 평온 상태
	}
	
}