<?php

class Admin extends DB\SQL\Mapper
{


	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'admin');
	}

	public function getAdminByEmail($email)
	{
		$this->load(array('adminEmail=?', $email));


	}
}