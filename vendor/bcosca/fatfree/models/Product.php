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
		$this->load(array('id=?',$id));
		return $this->query;
	}

	public function add() {
		$this->copyfrom('POST');
		$this->save();
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