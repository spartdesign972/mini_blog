<?php

namespace Controller;

use \W\Controller\Controller;

use \Model\Articles\ArticlesModel;

use Respect\Validation\Validator as v;


class ArticleController extends Controller
{

	/**
	 * Page formulaire d'ajout d'articles
	 */
	public function AjoutArticle(){
		$this->show('Article/ajoutArticle');
	}



	/**
	 * Page qui liste les articles
	 */
	public function ListeArticle(){
		
		$allArticle = new ArticlesModel();
		
		$liste = $allArticle->findAllArticle();

		$this->show('Article/ListeArticle', ['liste' => $liste]);
	}


	public function DetailArticleid($id){
		
		$detailArticle = new ArticlesModel();
		$article = $detailArticle->find($id);

		$this->show('Article/DetailArticle', ['article' => $article]);
	}


	// Traitement du formulaire de postArticle
	public function PostArticle(){
		
		$post = [];

		if(!empty($_POST)) {
		    $post = array_map('trim', array_map('strip_tags', $_POST));
		    $err = [
		        (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['title'])) ? 'Le titre' : null,
		        (!v::notEmpty()->alpha('-.')->length(5)->validate($post['content'])) ? 'Le content' : null,
		    //     (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
		    //     (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe est invalide' : null,
		    ];

		    $errors = array_filter($err);
		  
		}
    if(count($errors) === 0){

    	$result = new ArticlesModel();
      $result->insertPost($post);

      echo 'Article Ajouter !';


    }else{
    	echo implode('<br>',$errors);
    }

		// $this->show('Article/ajoutArticle');
	}



}