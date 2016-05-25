$(document).ready( function() {

});

$(document).on('click', '.action-water', function() {
	$.post('/myorchid/actions/water', {}, function(data) {
		console.log(data);
		alert('물줌!!');
	});
});