<?php $this->layout('MyBlog_layout', ['title' => 'Liste d\'articles']) ?>


<?php $this->start('main_content') ?>
	<h1>Liste des Articles</h1>
	
	<table class="well table">
							<thead>
								<tr>
									<th class="list">titre</th>
									<th class="list">post</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach($liste as $article): ?>
								<tr>
									<td class="list"><?=$article['title']; ?></td>
									<td class="list"><?=$article['content']; ?></td>
									<td>
										<a href="<?= $this->url('article_detailarticleid',['id'=> $article['id']]) ?>"><button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Visualiser cet Article</button>
										</a>
									</td>
									<td><a href="#" data-article="<?= $this->url('article_deletearticleid',['id' => $article['id']]); ?>"  class="btn btn-danger supprLink">Supprimer</a></td>
									<td>
										
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
<?php $this->stop('main_content') ?>
<?php $this->start('script') ?>
	
	<script>
	$(document).ready(function(){

		$('.supprLink').on('click', function(e){
			e.preventDefault();

			// var id = $(this).data('id');
			var delurl = $(this).data('article');


			console.log(delurl);

			var ligneTab = $(this).parent().parent();

			swal({
			  title: "supprimer cet utilisateur ?",
			  text: "",
			  type: "info",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  showLoaderOnConfirm: true
			}, function () {
			  setTimeout(function () {
			  	$.ajax({
					method: 'POST',
					url: delurl,
					// data: {id: id},
					success: function(res){	
					}
				});
			    swal('utilisateur supprimé');
			    ligneTab.fadeOut('slow').remove;
			  }, 200);
			});

		});
	});
	</script>

<?php $this->stop('script') ?>