<?php

	namespace Model\Comments;

	use \W\Model\Model;
	
	/**
	* 
	*/
	class CommentsModel extends Model
	{
		

		public function listeComments($idArticle){
				
			$idArticle = (int)$idArticle;

			$sql = 'SELECT C.*, U.lastname, U.role  FROM ' . $this->table .' as C LEFT JOIN users as U ON C.id_user = U.id WHERE id_article = :idArticle' ;
			$sth = $this->dbh->prepare($sql);
			
			$sth->bindValue(':idArticle', $idArticle, \PDO::PARAM_INT);

			$sth->execute();

			return $sth->fetchAll();

		}


		public function insertComment($post){
			return $this->insert($post);
		}


		public function supprComment($id){
			return $this->delete($id);
		}
	}


?>