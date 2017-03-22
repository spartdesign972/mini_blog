$(function(){

	$('form button[type=submit]').on('click', function(e){
		e.preventDefault();

		myform = $('form');

		$.ajax({
			type: 'post',
			url: './PostArticle',
			data : $('form').serialize(),
			success : function(res){
				$('#result').html(res);
				myform[0].reset();		
			}
		});
	});


});