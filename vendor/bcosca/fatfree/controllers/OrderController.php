<?php


class OrderController extends Controller
{

	function render()
	{

		$template = new Template;
		echo $template->render('order.htm');
	}

}



