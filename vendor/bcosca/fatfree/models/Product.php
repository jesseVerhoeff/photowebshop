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

	public function getByCategory($productCategory) {
		return $this->db->exec("SELECT * FROM products WHERE productCategory = '$productCategory'");

	}

	public function add($productName, $productDescription, $productCategory, $productType, $productPrice, $productLink ) {
		return $this->db->exec("INSERT INTO products (productName, productDescription, productCategory, productType, productLink, productPrice) VALUES ('$productName','$productDescription', '$productCategory', ' $productType', '$productLink', '$productPrice') ");
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