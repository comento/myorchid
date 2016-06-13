<?php

class Message_model extends CI_Model {
		
	public function __construct(){
		$this->load->database();
		$this->load->helper('array');
	}
	
	//랜덤 메시지 하나 출력
	public function getRandomMessage($no = null){
		$message_box = array(
            "[[friend]]과(와) 말다툼을 해서 속상합니다.",
            "[[friend]]과(와) 광합성을 했습니다.",
            "저리가! 나비를 내쫓았습니다.",
            "무서운 꿈을 꾸었습니다.",
            "[[friend]]과(와) 놀다가 개미에게 물렸습니다.",
            "[[friend]](이)가 놀러왔습니다.",
            "[[friend]]과(와) 음악감상을 했습니다.",
            "[[friend]]을(를) 좋아하는 것 같습니다.",
            "[[friend]]에게 차였습니다.",
            "속상한 [[friend]]를(을) 위로해줬습니다.",
            "[[friend]]과(와) 파티를 즐겼습니다.",
            "[[friend]]과(와) 온실탈출 계획을 세웠습니다.",
            "[[friend]]과(와) 번호를 교환했습니다.",
            "[[friend]](이)가 맘에 들지 않습니다.",
            "그냥 기분이 나쁩니다.",
            "졸립니다.",
            "행복한 것 같습니다.",
            "뀨우 쀼뀨융",
            "[[friend]]이(가) 나를 좋아하는 것 같습니다.",
            "난~ 나나난~ 난난 나나나난 난!",
            "졸립니다.",
            "난 정말 난일까?",
            "[[friend]]과(와) 영양제 한잔해서 알딸딸합니다.",
            "화이팅! 열일! ",
            "인재와 기업의 꿈을 연결합니다. - 코멘토",
            "[[friend]]과(와) 드라이브를 했습니다.",
            "아이스아메리카노가 마시고 싶습니다.",
            "난~ 꿈이 있어요~ 그 꿈을 믿어요",
            "난냔난냔난냔냔냔냔난냔냔난냔난난냔난난냔난냔냔난. 여기서 '난'은 몇개?",
            "비가 올 것 같네...",
            "하모예~! 한뚝배기 하실래예?",
            "[[friend]]과(와) 셀카를 찍었습니다.",
            "[[friend]]를(을) 만나느라 샤-샤-샤!",
            "엽떡이 먹고싶다.",
            "어떤 음식 좋아하세요?",
            "바람이 살랑살랑",
            "무슨 음악을 듣나요?",
            "스트레칭 좀 하세요. 거북목 퇴치!",
            "난! 난이다. 난! 난!!!",
            "히익-! 진딧물이다!",
            "키킥..키킥킥.. 킥.. 크큭..",
            "[[friend]]과(와) 눈이 마주쳤습니다.",
            "조금 서글픕니다.",
            "m(0_0)m 슈퍼맨~",
            "기분이 울적합니다.",
            "날씨가 좋아 기분이 좋습니다."          
            );

		$message = random_element($message_box);
		if(strpos($message, "[[friend]]") > -1 ){ 
			$sql = "select name from orchid where orchid_no != ? and status != '7' order by rand() limit 1";
			//살아있는 난 하나를 랜덤으로 불러옴.
			$query = $this->db->query($sql, array($no));
			if ($query->num_rows() > 0)
			{
			   $row = $query->row(); 
			   $friend = $row->name;
			}
			
			$message = str_replace("[[friend]]", "<b>".$friend."</b>", $message);			
		}		
		
		return $message;		
	}	
	
}


?>