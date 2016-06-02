<?php
class Actions_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
	}
	
	//액션 업데이트
	public function setAction($no, $type){
		$sql ="INSERT INTO log_action (orchid_no, action, date) values (?, ?, now())";
		$query = $this->db->query($sql, array($no, $type));
	}
		
	//난의 액션 로그 조회
	public function getActionlog($no, $type = null){
		if($type == "all") {
			$sql = "select * from log_action where orchid_no = ?";
			$query = $this->db->query($sql, array($no));			
		} else {
			$sql = "select * from log_action where orchid_no = ? and action = ?";
			$query = $this->db->query($sql, array($no, $type));						
		}

		return $query;
	}
}