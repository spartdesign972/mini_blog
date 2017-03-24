<?php $this->layout('MyBlog_layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<form method="post" class="form-horizontal jumbotron" id="form_register">
	<div class="form-group">
		<label for="firstname">Prénom</label>
		<input class="form-control" type="text" id="firstname" name="firstname" placeholder="Votre prénom.." required>
	</div>
	<div class="form-group">
		<label for="lastname">Nom</label>
		<input class="form-control" type="text" id="lastname" name="lastname" placeholder="Votre nom de famille.." required>
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="email" id="email" name="email" placeholder="votre@email.fr">
	</div>
	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input class="form-control" type="password" id="password" name="password" placeholder="Un mot de passe super compliqué" required>
	</div>
	<div class="form-group">
		<label for="role">Rôle</label>
		<select class="selectpicker" id="role" name="role"  required>
			<?php foreach ($role as $key => $value): ?>
			<option value="<?php echo $value['rol_name'] ?>"><?php echo $value['rol_name'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="text-center">
		<a href="#" class="btn btn-default sendUser" data-url="<?=$this->url('users_suscribe') ?> ">Enregistrer</a>
	</div>
</form>
<?php $this->stop('main_content') ?>

<?php $this->start('script') ?>
	
	<script>
	$(document).ready(function(){

		$('#form_register .sendUser').on('click', function(e){
			e.preventDefault();

			// var id = $(this).data('id');
			var sendurl = $('.sendUser').data('url');
			var data = $('#form_register').serialize();

			swal({
			  title: "enregistrer cet utilisateur ?",
			  text: "",
			  type: "info",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  showLoaderOnConfirm: true
			}, function () {
			  setTimeout(function () {
			  	$.ajax({
					method: 'POST',
					url: sendurl,
					data: data,
					success: function(res){
					
					}
				});
			    swal('utilisateur enregister');
			    $('#form_register')[0].reset();
			  }, 200);
			});

		});
	});
	</script>

<?php $this->stop('script') ?>