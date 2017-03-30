<?php $this->layout('MyBlog_layout', ['title' => 'Détail de l\'article']) ?>

<?php $this->start('main_content') ?>
	<div class="container">
		<div class="jumbotron">
			
			<div class="row">
				<div class="col-xs-6">
					<img src=" ../<?= $article['url_picture']  ?>" alt="" class="img-thumbnail" style="max-height: 300px; height: 150px;">
				</div>
				<div class="col-xs-6">
					<h2>titre : <?= $article['title'] ?></h2>
				</div>
			</div>
			<div class="row">
				<p>Content : <?= $article['content'] ?></p>
			</div>
		</div>
	</div>
	<?php if(isset($w_user) && !empty($w_user['role'])):  ?>
		
		<div id="result" style="backgroud: green; color: pink;"></div>

		<form action=" <?= $this->url('comment_commentArticle') ?> " class="form-horizontal " role="form" id="my_form" method="POST">
				<div class="form-group">
					<legend>Laisser un commentaire sur cet article</legend>
				</div>
				<div id="result" class="text-center"></div>

				<div class="form-group">
					<textarea name="content" id="input" class="form-control" rows="5" required="required"></textarea>
				</div>
				<input type="hidden" name="id_User" value=" <?=$w_user['id'] ?> ">
				<input type="hidden" name="id_Article" value=" <?=$article['id'] ?> ">

				<div class="form-group">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-primary">Envoyer</button>
					</div>
				</div>
		</form>

	<?php endif; ?>

	<h4>Commentaire(s) :</h4>
	<?php 
	if(isset($listCom)){
	foreach ($listCom as $key => $Value):?>
		
		<div class="well">
			<div class="content">
				<h4>Commentaire : </h4>
				<p> <?= $Value['content'] ?> </p>
			</div>
			<hr>

			<h4>Poster par : <?=$Value['lastname'] ?> </h4>

			<div class="row">
				<div class="col-sm-8">
					<h4>Poster par : <?=$Value['lastname']  ?> </h4>
				</div>
				<?php if($w_user['role'] === $Value['role']): ?>
				<div class="col-sm-4">
					<a href="#" class="btn btn-danger btnSupprComment" data-delCom="<?=$this->url('comment_supprComment', ['id' => $Value['id']])?>">Supprimer</a>
				</div>
			<?php endif; ?>
			</div>


		</div>
		<br>
	<?php endforeach;
	} ?>
<?php $this->stop('main_content') ?>




<?php $this->start('script') ?>

<script>
$(function() {

  $('#my_form').on('submit', function(e) {
      e.preventDefault();

      var $form = $(this);
      var data = $form.serialize();
      var url = $('#my_form').attr('action');
      

      $.ajax({
					type: 'post',
					// dataType: 'json',
					url: url,
					data: data,
					success: function(res) {
             	$('#result').html(res).fadeOut(1600);
              $form[0].reset();
              location.reload();
              // res.each(function(index){
              // 		condole.log(index + " : "+ $(this).text);
              // });

              
          }
      });
  });

  $('.btnSupprComment').on('click', function(e) {
      e.preventDefault();

      var data = $(this).data('delCom');
      var parent = $(this).parent().parent().parent();

      $.ajax({
					type: 'post',
					// dataType: 'json',
					url: data,
					success: function(res) {
              parent.fadeOut('slow').remove;
              
          }
      });
  });

});
 </script>

<?php $this->stop('script') ?>