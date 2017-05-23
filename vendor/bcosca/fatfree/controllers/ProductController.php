<?php

class ProductController extends Controller{

	function render($f3){

		$products = new Product($this->db);
		$product = $products->all()[1];

		$f3->set('product',$product);
		$template=new Template;
		echo $template->render('products.htm');


	}




}