<?php

class ProductController extends Controller{

	function render($f3){

		$products = new Product($this->db);
		$product = $products->all($this->db);

		$f3->set('product',$product);
		$template=new Template;
		echo $template->render('products.htm');

//		$f3->set('product',$this->db->exec('SELECT * FROM products'));
//		echo Template::instance()->render('products.htm');


	}




}