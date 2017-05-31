<?php

class Product extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'products');
	}

	public function all() {
		return $this->db->exec('SELECT * FROM products');

	}

	public function getById($id) {
		return $this->db->exec("SELECT * FROM products WHERE productId = '$id'");

	}

	public function add($productName, $productDescription, $productPrice ) {
		return $this->db->exec("INSERT INTO products (productName, productDescription, productPrice) VALUES ('$productName','$productDescription','$productPrice') ");
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