<?php

class OrderProduct extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'orderproduct');
	}

	public function all() {
		return $this->db->exec('SELECT * FROM orderproduct');

	}

	public function getById($id) {
		return $this->db->exec("SELECT * FROM orderproduct WHERE userId = '$id'");

	}

	public function getByIdD($id) {
		return $this->db->exec("SELECT * FROM orderproduct LEFT JOIN products ON orderproduct.productId = products.productId WHERE orderproduct.userId = '$id'");

	}

	public function add($userid, $productid ) {
		return $this->db->exec("INSERT INTO orderproduct (userId, productId) VALUES ('$userid','$productid') ");
	}

	public function edit($id) {
		$this->load(array('id=?', $id));
		$this->copyFrom('POST');
		$this->update();
	}

	public function delete($id) {
		$this->load(array('id=?',$id));
		$this->erase();
	}
}