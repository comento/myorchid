<?php //print_r($_SESSION);

$now = new DateTime();
$birth = new DateTime($birth);		
					
$diff=date_diff($birth, $now);
$day_diff = ($diff->days) +1;
?>
<input type='hidden' name='orchid_no' value="<?php echo $orchid_no;?>">

<div class='col-md-6'>
	<br>
	<div class="panel panel-primary text-center">
		<div class="panel-heading"><h3 class="panel-title"><?php echo $name;?></h3>(<?php echo $day_diff."일차";?>)</div>
		<div class="panel-body">
			난의 상태:<?php echo $status_name;?><br>
			마지막 로그인:<?php echo $login_date;?><br>
			<div id='orchid_house'>
				<img src="../<?php echo $img?>" alt="<?php echo $img?>">
				<img src="#" style='display:none'>
			</div>
		</div>
		<?php
			if($status == 7){
		?>
		
			<button class="btn btn-info action-revival" type="button">뿌리라도 살려 다시 시작</button>
		<?php		
			}else if($status == 6){
		?>
			<button class="btn btn-info action-honor" type="button">자연에 돌려보내기</button>
		<?php		
			}else{
		?>
			<button class="btn btn-info action-water" type="button">물주기</button>
			<button class="btn btn-info action-clean" type='button'>닦아주기</button>
			<button class="btn btn-info action-nutrition" type="button" >영양주기</button>
			<button class="btn btn-info action-changevase" type='button' <?php echo $day_diff>=7?"":"disabled"?>>분갈이</button>
		<?php		
			}
		?>
		<br><br>
		<button class="btn btn-warning action-logout" type="button">로그아웃</button>
		<button class="btn btn-default action-kill" type="button">이 난을 포기</button>
	</div>
	<br>
</div>

