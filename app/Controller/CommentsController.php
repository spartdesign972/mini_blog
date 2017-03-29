<?php

namespace Controller;

use \W\Controller\Controller;

use \Model\Comments\CommentsModel;

use \Respect\Validation\Validator as v;



class CommentsController extends Controller
{

	public function CommentArticle(){
		
			$post = [];
	

			if(!empty($_POST)) {
		    $post = array_map('trim', array_map('strip_tags', $_POST));

		    $err = [
		        (!v::notEmpty()->length(5)->validate($post['content'])) ? 'Contenus du commentaire incorrect, il doit faire plus de 5 carateres' : null,
		    ];

		    $errors = array_filter($err);

		    if(count($errors) === 0){
		    	
		    	$result = new CommentsModel();
		    	$data =[
		    		'content' => $post['content'],
		    		'id_article' => $post['id_Article'],
		    		'id_user' => $post['id_User'],
		    	];
		      $result->insertComment($data);

		      echo 'Commentaire Ajouter';


		    }else{
		    	echo implode('<br>',$errors);
		    }
			}
	}

	public function SupprCommentid($id){

		$com = new CommentsModel();
		$com->supprComment($id);

	}
}