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
		$sql = "select birth from orchid where orchid_no = ?";
		$query = $this->db->query($sql, array($no));			
		$row = $query->row(); 
		$birth = $row->birth;
		
		if($type == "all") {
			$sql = "select * from log_action where orchid_no = ? and date >= ?";
			$query = $this->db->query($sql, array($no, $birth));			
		} else {
			$sql = "select * from log_action where orchid_no = ? and action = ? and date >= ? order by date desc limit 1";
			$query = $this->db->query($sql, array($no, $type, $birth));						
		}

		return $query;
	}
	
	//난의 액션 로그 삭제
	public function deleteActionlog($no){
		$sql = "delete from log_action where orchid_no = ?";
		$query = $this->db->query($sql, array($no));
	}
	
}