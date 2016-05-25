$(document).ready( function() {

});

$(document).on('click', '.action-water', function() {
	$.post('/myorchid/actions/water', {}, function(data) {
		console.log(data);
		alert('물줌!!');
	});
});

$(document).on('click', '.action-join', function(){

	var name = $("#name").val();
	if(name == ''){
		alert("이름을 넣어주쎼옹~~");
	}else{
		$.post('/myorchid/actions/join', {name:name}, function(data) {
			var flag = $.trim(data);
			//console.log(flag);
			if(flag == '1'){
				alert("앗.. 사용중인 이름이에요.. 특별한 이름을 지어주세요");
				
			}else if(flag == '2'){
				alert("난이 생성되었습니다.");
				location.href='orchid/index';
			}
		});			
	}
});
