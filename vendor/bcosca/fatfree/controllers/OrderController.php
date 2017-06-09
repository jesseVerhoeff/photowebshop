<?php


class OrderController extends Controller
{

	function render()
	{

		$order = $this->f3->get('SESSION.cart');
		$id = $this->f3->get('SESSION.userId');

		var_dump($id);
		foreach ($order as $value ) {
			var_dump($value);
			echo '<br>';

		}

//		$template = new Template;
//		echo $template->render('order.htm');
	}

}



