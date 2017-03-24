<?php

namespace Model\Users;

use \W\Model\Model;
/**
* 
*/
class UsersModel extends Model
{
	
	public function insertUser($post){
		return $this->insert($post);
	}


	public function findAllUser(){
		return $this->findAll();
	}


}