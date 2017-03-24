<?php $this->layout('MyBlog_layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<h3>Veuillez vous identifier pour acceder a cette page !</h3>
<form method="post" action="<?=$this->url('login') ?>" class="form-horizontal jumbotron">
	
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="email" id="email" name="email" placeholder="votre@email.fr">
	</div>

	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input class="form-control" type="password" id="password" name="password" placeholder="Un mot de passe super compliqué" required>
	</div>
	
	<div class="text-center">
		<input type="submit" class="btn btn-default"></a>
	</div>

</form>

<?php $this->stop('main_content') ?>