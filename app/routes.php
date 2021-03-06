<?php
	
	$w_routes = array(

		// route vers la page d'acceuil
		['GET', '/', 'Default#home', 'default_home'],

		// // route vers la page d'insertion d'articles 
		// ['GET', '/AjoutArticle', 'Article#AjoutArticle', 'article_ajoutarticle'],
		
		// route vers la page de liste des articles
		['GET', '/ListeArticle', 'Article#ListeArticle', 'article_listearticle'],

		//  route vers le traitement de formulaire
		['POST|GET', '/PostArticle', 'Article#PostArticle', 'article_postarticle'],

		// route vers le traitement et l'affichage du details d'un article
		['POST|GET', '/DetailArticleid/[i:id]', 'Article#DetailArticleid', 'article_detailarticleid'],
		
		['POST', '/DeleteArticleid/[i:id]', 'Article#DeleteArticleid', 'article_deletearticleid'],

		['POST|GET', '/commentArticle', 'Comments#CommentArticle', 'comment_commentArticle'],
		
		['POST|GET', '/suppComment/[i:id]', 'Comments#SupprCommentid', 'comment_supprComment'],



		// Routes pour la gestion des utilisateurs
		['POST|GET', '/suscribe', 'Users#PostUser', 'users_suscribe'],
		
		['GET', '/logout', 'Users#Logout', 'user_logout'],

		['POST|GET', '/connection', 'Users#ConnectUser', 'login'],


		['GET|POST', '/admin', 'Users#Admin', 'users_admin'],
		



		['GET|POST', '/mail', 'SendMail#mailTo', 'sendmail_mailTo'],
		


		['GET|POST', '/test/[i:id]', 'Default#test', 'default_test'],






	);