<?php

namespace Model\Articles;

use \W\Model\Model;
/**
* 
*/
class ArticlesModel extends Model
{
	
	public function insertPost($post){
		return $this->insert($post);
	}


	public function findAllArticle(){
		return $this->findAll();
	}

	public function findArticle($id){
		return $this->find($id);
	}
}


?>