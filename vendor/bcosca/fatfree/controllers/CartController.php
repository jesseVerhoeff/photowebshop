<?php

class CartController extends Controller
{

	function render($f3)
	{

		if(empty($cartProduct)) {
			$cartProduct = array();
		}

		foreach ($_SESSION['cart'] as $i => $value) {


			$products = new Product($this->db);
			$product = $products->getById($value);

			array_push($cartProduct ,$product);

			$totalPrice = $totalPrice + $product[0]['productPrice'];

		}


		$f3->set('total', $totalPrice);
		$f3->set('cart',$cartProduct);
		$template = new Template;
		echo $template->render('cart.htm');
	}

	function addProduct($f3, $params) {

//		array_push($_SESSION['cart'],$params['item']);


		$value = $params['item'];
		$a = $_SESSION['cart'];

		if (!in_array($value, $a)){
			echo 'test';
			array_push($_SESSION['cart'],$params['item']);
			$this->f3->reroute('/products');
		}

		$this->f3->reroute('/products');
	}

	function deleteProduct($f3, $params) {


		echo $params['item'];
		$arraydel = array_search($params['item'], $_SESSION['cart']);

		unset($_SESSION['cart'][$arraydel]);
		$this->f3->reroute('/shoppingcart');
	}

}

