<?php

class MainController extends Controller{

	function render($f3){

		$products = new Product($this->db);
		$product = $products->all()[0];

		$f3->set('product',$product);
		$template=new Template;
		echo $template->render('welcome.htm');
		$this->adddd();

	}

	function adddd() {

		$product = new Product($this->db);
		$product->productName = 'Bane';
		$product->productDescription = 'Hang them where the world can see.';
		$product->save();

	}



}