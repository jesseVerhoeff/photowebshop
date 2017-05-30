<?php

class CartController extends Controller
{

	function render($f3)
	{

//		array_push($_SESSION['cart'],'48');
//		var_dump($_SESSION['cart']);

//		$products = new Product($this->db);
//		$product = $products->getById(1);
//
//		var_dump($product);

		if(empty($cartProduct)) {
			$cartProduct = array();
		}

		foreach ($_SESSION['cart'] as $i => $value) {


			$products = new Product($this->db);
			$product = $products->getById($value);

//			$result = array_merge($cartProduct, $product);
			array_push($cartProduct ,$product);
//			var_dump($product);
//			echo "<br><br><br>";
			echo "<pre>";
			var_dump($cartProduct);
			echo "</pre>";
		}
//				var_dump($cartProduct);

		var_dump($_SESSION['cart'] );



		$f3->set('cart',$cartProduct);
		$template = new Template;
		echo $template->render('cart.htm');
	}

	function deleteproduct($f3, $params) {

//		$delItem = $f3->get('PARAMS.item');
		echo $params['item'];
		$arraydel = array_search($params['item'], $_SESSION['cart']);
//		echo "<br><br><br>";
//		var_dump($arraydel);
		unset($_SESSION['cart'][$arraydel]);

	}

}

