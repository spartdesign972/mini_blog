<?php $this->layout('MyBlog_layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h1 class="text-center">PAGE DE TEST</h1>
	<p>Bonjour, id passer en parametre : <?=$id?> </p>
<?php $this->stop('main_content') ?>