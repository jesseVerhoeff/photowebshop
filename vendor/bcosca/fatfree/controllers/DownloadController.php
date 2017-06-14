<?php

class DownloadController extends Controller{

	function render($f3){

		$id = $this->f3->get('SESSION.userId');
		if($id == NULL)
		{
			$this->f3->reroute('/login');
		}

		$userId = $this->f3->get('SESSION.userId');

		$products = new OrderProduct($this->db);
		$product = $products->getByIdD($userId);

		$f3->set('product',$product);
		$template=new Template;
		echo $template->render('download.htm');

//		$f3->set('product',$this->db->exec('SELECT * FROM products'));
//		echo Template::instance()->render('products.htm');


	}

	function download($f3, $params)
	{
		$id = $this->f3->get('SESSION.userId');
		if($id == NULL)
		{
			$this->f3->reroute('/login');
		}

		$userId = $this->f3->get('SESSION.userId');
		$productId = $params['product'];
		$date = date("Y-m-d");

		$downloads = new Download($this->db);
		$download = $downloads->add($userId, $productId, $date);

		$products = new Product($this->db);
		$product = $products->getById($productId);

		$link = $product[0]['productLink'];

		$this->f3->reroute('/download.php?img='.$link);




	}


}