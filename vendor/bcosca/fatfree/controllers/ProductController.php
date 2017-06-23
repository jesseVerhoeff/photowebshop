<?php

class ProductController extends Controller{

	function render($f3){

		$products = new Product($this->db);
		$product = $products->all($this->db);

		$username = $this->f3->get('SESSION.userUsername');
		$f3->set('product',$product);
		$f3->set('username',$username);
		$template=new Template;
		echo $template->render('products.htm');

//		$f3->set('product',$this->db->exec('SELECT * FROM products'));
//		echo Template::instance()->render('products.htm');


	}

	function modelRender($f3, $params) {

		$products = new Product($this->db);
		$product = $products->getByCategory($params['cat']);

		$username = $this->f3->get('SESSION.userUsername');
		$f3->set('product',$product);
		$f3->set('username',$username);
		$template=new Template;
		echo $template->render('products.htm');

	}




}