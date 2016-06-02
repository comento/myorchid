<?php
class Status_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
	}
	
	//죽는 조건 확인
	public function checkDeath($no = NULL){
		
		return true;		
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
	

}