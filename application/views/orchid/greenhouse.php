<input type='hidden' name='orchid_no' value="<?php echo $user_no;?>">

<div class='col-md-6'>
	<br>
	<div class="panel panel-primary text-center">
		<div class="panel-heading"><h3 class="panel-title"><?php echo $name;?></h3></div>
		<div class="panel-body">
			난의 상태:<?php echo $status_name;?><br>
			마지막 로그인:<?php echo $login_date;?><br>
			<div><img src="#" alt="<?php echo $img?>" class="img-circle"></div>
		</div>	
		<button class="btn btn-info action-water" type="button">물주기</button>
		<button class="btn btn-info action-clsean" type='button'>닦아주기</button>
		<button class="btn btn-info action-nuturition" type="button" >영양주기</button>
		<button class="btn btn-warning action-logout" type="button">로그아웃</button>
	</div>
	<br>
</div>

