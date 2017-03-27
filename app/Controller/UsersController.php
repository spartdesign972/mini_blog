<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;

use \Model\users\UsersModel;
use \Model\Role\RoleModel;

use \Respect\Validation\Validator as v;


class UsersController extends Controller
{


	/**
	 * 
	 */
	public function PostUser(){
 		
		$post = array();

		if(!empty($_POST)){
	
		$post= array_map('trim', array_map('strip_tags', $_POST));

		$err = [
					(!v::notEmpty()->alpha('-.')->length(3)->validate($post['firstname'])) ? 'Le prénom doit faire au moins 3 caractères' : null,
					(!v::notEmpty()->alpha('-.')->length(3)->validate($post['lastname'])) ? 'Le nom doit faire au moins 3 caractères' : null,
					(!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
					(!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe est invalide' : null,
					(!v::notEmpty()->alpha()->validate($post['role'])) ? 'Erreur lors du choix du role !' : null,
	        // (!v::notEmpty()->alpha('-.')->length(5)->validate($post['content'])) ? 'Le content' : null,
	    ];

		  $errors = array_filter($err);

			if(count($error) > 0){		
				echo implode('<br>',$errors);
			}
			else {
				$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
				$insert = new UsersModel();
				$insert->insertUser($post);
				echo 'utilisateur ajouter !';
			}
				
		}else{
			// creation de l'objet pour utiliser les methode sur la table role
			$qrt = new RoleModel();

			// On recherche dans la table role tous les elements que l'on affect au tableau $role
			$role = $qrt->findAllRole();

			// on passe le tableau role a la vue via la methode show()
			$this->show('Front/users/suscrib_user', ['role' => $role]);
		}

	}

	

	public function ConnectUser(){

		if(!empty($_POST)){
			$post= array_map('trim', array_map('strip_tags', $_POST));

			$err = [
				(!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
				(!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe est invalide' : null,
			];

			$errors = array_filter($err);

			if(count($errors) > 0){		
				echo implode('<br>',$errors);
			}else {
				$ident = new AuthentificationModel();
				$id = $ident->isValidLoginInfo($post['email'], $post['password']);
				if(isset($id)){
					$user = new UsersModel();
					$currentUser = $user->findUser($id);
					$ident->logUserIn($currentUser);
					echo 'ok Bonjour : '.$currentUser['lastname'];
				}
			}
		}else{
			$this->show('Front/Users/connect_user');
		}
	}

	public function Logout(){
		$user = new AuthentificationModel();
		$user->logUserOut();
		$this->redirectToRoute('article_listearticle');
	}
}