/*
	160608
	난 액션 관련 js
*/

//물주기
$(document).on('click', '.action-water', function() {
	//orchid_no
	var orchid_no = $("input[name=orchid_no]").val();
	$.post('/myorchid/actions/action', {orchid_no:orchid_no, act_type:'water'}, function(data) {
		console.log(data);
		alert('물줌!!');
		window.location.reload();
	});
});

//닦아주기
$(document).on('click', '.action-clean', function() {
	//orchid_no
	var orchid_no = $("input[name=orchid_no]").val();
	$.post('/myorchid/actions/action', {orchid_no:orchid_no, act_type:'clean'}, function(data) {
		console.log(data);
		alert('닦는 액션!!');
		window.location.reload();
	});
});

//영양주기
$(document).on('click', '.action-nutrition', function() {
	//orchid_no
	var orchid_no = $("input[name=orchid_no]").val();
	$.post('/myorchid/actions/action', {orchid_no:orchid_no, act_type:'nutrition'}, function(data) {
		console.log(data);
		alert('영양 주기!!');
		window.location.reload();
	});
});

//다시 살리기
$(document).on('click', '.action-revival', function(){
	if(confirm('난을 처음부터 다시 키우시겠습니까?')){
		var orchid_no = $("input[name=orchid_no]").val();
		$.post('/myorchid/actions/revival', {orchid_no:orchid_no}, function(data) {
			alert('아기부터 다시 시작합니다.');
			window.location.reload();
		});
	}
});

//죽이기
$(document).on('click', '.action-kill', function(){
	if(confirm("난을 영영 보지 못하게 됩니다. 확실하신가요?")){
		var orchid_no = $("input[name=orchid_no]").val();
		$.post('/myorchid/join/deleteOrchid', {orchid_no:orchid_no}, function(data) {
			alert('난이 삭제되었습니다.');
			window.location.href = '/myorchid/orchid/index';
		});
	} 
});

//자연에 돌려보내기
$(document).on('click', '.action-honor', function(){
	
});

//화분 바꾸기
$(document).on('click', '.changevase', function(){
	
});
