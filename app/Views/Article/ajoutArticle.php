<?php $this->layout('MyBlog_layout', ['title' => 'Ajout d\'articles']) ?>

<?php $this->start('main_content') ?>
	
	<div id="result"></div>

	<form method="POST" class="form-horizontal" role="form">
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
				<div class="col-sm-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
	</form>

<?php $this->stop('main_content') ?>

<?php $this->start('script') ?>
		<script src="<?= $this->assetUrl('js/monjs.js') ?>" type="text/javascript"></script>
<?php $this->stop('script') ?>