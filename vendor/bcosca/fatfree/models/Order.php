<?php

class Order extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'orders');
	}

	public function all() {
		return $this->db->exec('SELECT * FROM orders');

	}

	public function getById($id) {
		return $this->db->exec("SELECT * FROM orders WHERE orderId = '$id'");

	}

	public function add($userid ) {
		return $this->db->exec("INSERT INTO orders (userId) VALUES ('$userid') ");
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