<?php
class Join_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
	}
	
	//난 이름 중복 확인
	public function checkName($name = NULL){
		$sql = "select * from orchid where name = ?";
		$query = $this->db->query($sql, array($name));
		return $query;
	}
	
	//난 생성
	public function join($name = NULL){
		$sql = "insert into orchid (name, birth, status) values (?, now(), '1')";
		$query = $this->db->query($sql, array($name));
		return $query;
	}
	

	//난 삭제
	public function deleteOrchid($no){
		$sql = "delete from orchid where orchid_no = ?";
		$query = $this->db->query($sql, array($no));
	}
}