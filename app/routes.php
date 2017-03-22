<?php
	
	$w_routes = array(

		// route vers la page d'acceuil
		['GET', '/', 'Default#home', 'default_home'],

		// route vers la page d'insertion d'articles 
		['GET', '/AjoutArticle', 'Article#AjoutArticle', 'article_ajoutarticle'],
		
		// route vers la page de liste des articles
		['GET', '/ListeArticle', 'Article#ListeArticle', 'article_listearticle'],

		//  route vers le traitement de formulaire
		['POST', '/PostArticle', 'Article#PostArticle', 'article_postarticle']
	);