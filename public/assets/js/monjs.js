$(function(){

	$('form button[type=submit]').on('click', function(e){
		e.preventDefault();

		$.ajax({
			type: 'post',
			url: './PostArticle',
			data : $('form').serialize(),
			success : function(res){
				$('#result').html(res);
				form_user.find('input').val('');
			}
		});
	});


});