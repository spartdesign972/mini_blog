<?php

namespace Model\Role;

use \W\Model\Model;
/**
* 
*/
class RoleModel extends Model
{
	
	public function findAllRole(){
		return $this->findAll();
	}

}