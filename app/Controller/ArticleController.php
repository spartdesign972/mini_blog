<?php

namespace Controller;

use \W\Controller\Controller;

use \Model\Articles\ArticlesModel;

use \Respect\Validation\Validator as v;
use \Intervention\Image\ImageManagerStatic as Image;
use Behat\Transliterator\Transliterator;



class ArticleController extends Controller
{

	/**
	 * Page qui liste les articles
	 */
	public function ListeArticle(){
		
		$allArticle = new ArticlesModel();
		
		$liste = $allArticle->findAllArticle();

		$this->show('Front/Article/liste_article', ['liste' => $liste]);
	}


	public function DetailArticleid($id){
		
		$detailArticle = new ArticlesModel();
		$article = $detailArticle->find($id);
		if(empty($article)){
			$this->showNotFound();
		}
		$this->show('Front/Article/detail_article', ['article' => $article]);
	}


	public function DeleteArticleid($id){

		$deletearticle = new ArticlesModel();
		$deletearticle->delArticle($id);
	}


	// Traitement du formulaire de postArticle
	public function PostArticle(){
		
		// Accessible que pour l'admin
		$this->allowTo('admin');

		$post = [];
		$upload_dir = 'upload/';
		$maxSize = (1024 * 1000) * 2;

		if(!empty($_POST)) {
	    $post = array_map('trim', array_map('strip_tags', $_POST));
	    $err = [
	        (!v::notEmpty()->length(2, 30)->validate($post['title'])) ? 'Titre incorrect doit faire entre 2 et 30 carateres' : null,
	        (!v::notEmpty()->length(5)->validate($post['content'])) ? 'Contenus de l\'article incorrect, doit faire plus de 5 carateres' : null,
	    ];

	    $errors = array_filter($err);

	    if(isset($_FILES['url_picture']) && $_FILES['url_picture']['error'] == 0){
				
				$img = Image::make($_FILES['url_picture']['tmp_name']);
				
				if(!is_dir($upload_dir)){
					mkdir($upload_dir, 0755);
				}

				if($img->filesize() > $maxSize){
					$errors[] = 'Image trop lourde, 2 Mo maximum';
				}
				if(!v::image()->validate($_FILES['url_picture']['tmp_name'])){
					$errors[] = 'L\'url_picture est une image invalide';
				}
				else {
					switch ($img->mime()) {
						case 'image/jpg':
						case 'image/jpeg':
						case 'image/pjpeg':
							$ext = '.jpg';
						break;
						
						case 'image/png':
							$ext = '.png';
						break;

						case 'image/gif':
							$ext = '.gif';
						break;
					}
					$save_name = Transliterator::transliterate(time().'-'. preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['url_picture']['name']));
					$img->save($upload_dir.$save_name.$ext);
					$post['url_picture'] = $upload_dir.$save_name.$ext;
				}
			}

			if(count($errors) === 0){

    	$result = new ArticlesModel();
      $result->insertPost($post);

      echo 'Article Ajouter !';


    }else{
    	echo implode('<br>',$errors);
    }
		  
		}else{
			$this->show('Front\Article/ajout_article');
		}

	}

}