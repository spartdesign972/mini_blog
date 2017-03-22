$(function(){

	$('form button[type=submit]').on('click', function(e){
		e.preventDefault();

		console.log('click');

		$.ajax({
			type: 'post',
			url: '#',
			data : $('form').serialize(),
			success : function(res){
				
			}
		});
	});


});