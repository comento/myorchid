$(document).ready( function() {

});


$(document).on('click', '.action-join', function(){
	var name = $("#name").val();
	if(name == ''){
		alert("이름을 넣어주쎼옹~~");
	}else{
		$.post('/myorchid/join/join', {name:name}, function(data) {
			var flag = $.trim(data);
			if(flag == '1'){
				alert("앗.. 사용중인 이름이에요.. 특별한 이름을 지어주세요");
				
			}else if(flag == '2'){
				alert("난이 생성되었습니다.");
				location.href = '/myorchid/orchid/index';
			}
		});			
	}
});

$(document).on('click', '.action-login', function(){
	var name = $("#name").val();
	if(name == ''){
		alert("이름을 넣어주쎼옹~~");
	}else{
		$.post('/myorchid/login/login', {name:name}, function(data) {
			var flag = $.trim(data);
			console.log(flag);
			if(flag == '1'){
				alert("그런 난은 없는데요..?");	
			}else if(flag == '2'){
				location.href = '/myorchid/orchid/greenhouse';
			}
		});			
	}
});


$(document).on('click', '.action-logout', function(){
	if(confirm("로그아웃 하시겠습니까?")){	
		$.post('/myorchid/login/logout', {}, function(data){	
			location.href = '/myorchid/orchid/index';
		});
	}
});
