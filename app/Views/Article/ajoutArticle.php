<?php $this->layout('MyBlog_layout', ['title' => 'Ajout d\'articles']) ?>
<?php $this->start('main_content') ?>

<div id="result"></div>
<form method="POST" action=" <?= $this->url('article_postarticle') ?> " class="form-horizontal" role="form" enctype="multipart/form-data" id="my_form">
	<div class="form-group">
		<legend>Ajouter un article</legend>
	</div>
	
	<div class="form-group">
		<label for="title">Titre de l'Article</label>
		<input class="form-control" type="text" name="title" id="title">
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea class="form-control" name="content" id="content" rows="15"></textarea>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label" for="avatar">Photo</label>
		<div class="col-md-4">
			<input id="avatar" name="url_picture" class="input-file" type="file">
		</div>
	</div>
	<div class="form-group" style="margin-bottom: 0;">
		<div id="image_preview" class="col-lg-10 col-lg-offset-2">
			<div class="thumbnail hidden">
				<img src="http://placehold.it/5" alt="">
				<div class="caption">
					<h4></h4>
					<p></p>
					<p><button type="button" class="btn btn-default btn-danger">Annuler</button></p>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>
<?php $this->stop('main_content') ?>
<?php $this->start('script') ?>
<script src="<?= $this->assetUrl('js/monjs.js') ?>" type="text/javascript"></script>
<?php $this->stop('script') ?>