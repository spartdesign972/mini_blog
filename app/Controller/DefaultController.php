<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('Front/default/my_home_page');
	}


	public function test($id){
		$this->show('Front/default/test', ['id' => $id]);
	}

}