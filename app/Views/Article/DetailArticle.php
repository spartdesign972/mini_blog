<?php $this->layout('MyBlog_layout', ['title' => 'Détail de l\'article']) ?>

<?php $this->start('main_content') ?>
	<div class="container">
		<div class="jumbotron">
			<h2>titre : <?= $article['title'] ?></h2>
			<hr>
			<p>Content : <?= $article['content'] ?></p>
		</div>
	</div>
<?php $this->stop('main_content') ?>