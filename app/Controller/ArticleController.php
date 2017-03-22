<?php

namespace Controller;

use \W\Controller\Controller;

use \Model\Articles\ArticlesModel;

use Respect\Validation\Validator as v;

class ArticleController extends Controller
{

	/**
	 * Page d'ajout d'articles
	 */
	public function AjoutArticle(){
		$this->show('Article/ajoutArticle');
	}



	/**
	 * Page liste d'articles
	 */
	public function ListeArticle(){
		$this->show('Article/ListeArticle');
	}


	public function PostArticle(){
		
		$post = [];

		if(!empty($_POST)) {
		    $post = array_map('trim', array_map('strip_tags', $_POST));
		    $err = [
		        (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['title'])) ? 'Le titre' : null,
		        (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['content'])) ? 'Le content' : null,
		    //     (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
		    //     (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe est invalide' : null,
		    ];

		    $errors = array_filter($err);
		  
		}
    if(count($errors) === 0){

    	$result = new ArticlesModel();
      $result->insertPost($post);
        

    }else{
    	echo implode('<br>',$errors);
    }

		$this->show('Article/ajoutArticle');
	}



}