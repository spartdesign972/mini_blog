<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?= $this->assetUrl('css/Blogstyle.css') ?>">

		<!-- dist/sweetalert.css -->
	<link rel="stylesheet" href="../bower_components/bootstrap-sweetalert/dist/sweetalert.css">

	<!-- dist/sweetalert.js -->
    <script src="../bower_components/bootstrap-sweetalert/dist/sweetalert.js"></script>

	<?= $this->section('css/js') ?>


</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?=$this->url('default_home')?>">WF3 BLOG</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?=$this->url('article_postarticle')?>">Ajouter article</a></li>
					<li><a href="<?=$this->url('article_listearticle')?>">Liste des Articles</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(empty($w_user)): ?>
					<li><a href=" <?= $this->url('login') ?> ">Se Connecter</a></li>
					<li><a href=" <?= $this->url('users_suscribe') ?> ">S'inscrire</a></li>
				<?php else: ?>
					<li><a href="#"><?php echo 'Bonjour : '.$w_user['lastname'] ?> </a></li>
					<li><a href=" <?php echo $this->url('user_logout') ?> ">Vous Deconnecter</a></li>
				<?php endif; ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container">
		<header>
			<h1 class="text-center"><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<!-- Latest compiled and minified JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<?= $this->section('script') ?>
</body>
</html>