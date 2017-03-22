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
										<a href="./DetailArticleid/<?=$article['id'] ?>"><button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span>
											Visualiser cette recette</button>
										</a>
									</td>
									<td>
										
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>


<?php $this->stop('main_content') ?>