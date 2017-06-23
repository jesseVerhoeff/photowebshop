<?php


class OrderController extends Controller
{

	function render()
	{

		$order = $this->f3->get('SESSION.cart');
		$id = $this->f3->get('SESSION.userId');

//		var_dump($id);
		echo '<br>';
		if($id == NULL)
		{
			$this->f3->reroute('/login');
		}


		foreach ($order as $value ) {
//			var_dump($value);
			echo '<br>';

			$check = new OrderProduct($this->db);
			$orderCheck = $check->check($id, $value);

		if($orderCheck == NULL) {

			$orderproducts = new OrderProduct($this->db);
			$orderproduct = $orderproducts->add($id, $value);
		}

		}

		$orders = new Order($this->db);
		$order = $orders->add($id);

		$this->f3->clear('SESSION.cart');
		$this->f3->reroute('/downloads');



		$template = new Template;
		echo $template->render('order.htm');
	}

}



