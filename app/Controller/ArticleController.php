<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\Articles\ArticlesModel;
// require_once '../Model/articles/ArticlesModel.php';


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

}