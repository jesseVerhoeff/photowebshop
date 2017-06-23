<?php

class Download extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db)
	{
		parent::__construct($db, 'downloads');
	}

	public function all() {
		return $this->db->exec('SELECT * FROM downloads');

	}

	public function getById($id) {
		return $this->db->exec("SELECT * FROM downloads WHERE orderId = '$id'");

	}

	public function add($userid, $productId, $date ) {
		return $this->db->exec("INSERT INTO downloads (userId, productId, downloadDate) VALUES ('$userid','$productId', '$date') ");
	}

	public function getByDate($downloadDate) {
		return $this->db->exec("SELECT * FROM downloads LEFT JOIN products ON downloads.productId = products.productId LEFT JOIN user ON downloads.userId = user.userId WHERE downloadDate > '$downloadDate' AND downloads.userId <> 0 AND downloads.productId <> 0");
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