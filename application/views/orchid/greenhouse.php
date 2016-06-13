<?php //print_r($_SESSION);
?>
<input type='hidden' name='orchid_no' value="<?php echo $orchid_no;?>">
<div class='col-md-6'>
	<br>
	<a data-toggle="modal" data-target="#instruction" style='cursor:pointer;'>게임 방법 <span class='glyphicon glyphicon-question-sign'></span></a>
	<div class="panel panel-primary text-center">
		<div class="panel-heading"><span class='glyphicon glyphicon-leaf'><h3 class="panel-title"><?php echo $name;?></span></h3>(<?php echo $day_diff."일차";?>)</div>
		<div class="panel-body">
			<div id='orchid_house'>
				<h5><b><?php echo $name?></b>의 상태: <?php echo $status_name;?></h5>
				<?php					
					if(isset($character_img)) {			
				?>	
					<img src="../images/members/<?php echo $character_img;?>" alt="<?php echo $name?>" style ='width:25%' class='character img-thumbnail'>	
				<?php
					} else {?>
					<img src="../<?php echo $img?>" alt="<?php echo $img?>" class='character img-thumbnail'>
				<?php	
					}
				?>
				<div style='width:25%; margin:auto; margin-top:10px;'><span class='glyphicon glyphicon-comment'></span> <?php echo $random_message?></div>
			</div>
			<div id ='event_div' style='display:none;'>
				<div class="alert alert-warning alert-dismissible" role="alert">
				</div>
			</div>
			<br>
			<a style = 'cursor:pointer;' data-toggle="modal" data-target="#checkSheet" >일일 점검표 <span class='glyphicon glyphicon-check'></span></a>
			
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
		<button class="btn btn-default action-kill" type="button">이 난을 포기<span class='glyphicon glyphicon-trash'></span></button>
		<div class='clear'>&nbsp;</div>
	</div>
	<br>
</div>

