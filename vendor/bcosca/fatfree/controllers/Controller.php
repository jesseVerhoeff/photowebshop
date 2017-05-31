<?php

class Controller {

    protected $f3;
    protected $db;

	function beforeroute(){

	    if($this->f3->get('SESSION.userUsername') == null) {

			$this->f3->reroute('/login');
			exit;
		}

        session_start();

        if(empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }


		?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Ph. Otto Graaf</title>

            <link href="../css/bootstrap.min.css" rel="stylesheet">

            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


        </head>
		<div  class="col-md-12">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="/">Home</a></li>
			<li role="presentation"><a href="/products">Products</a></li>
			<li role="presentation"><a href="#">Messages</a></li>
			<li role="presentation"><a href="#">Messages</a></li>
            <li role="presentation" class="pull-right"><a href="/login">Login</a></li>
            <li role="presentation" class="pull-right"><a href="/shoppingcart">Shopping cart</a></li>
		</ul>

		<?php
	}

	function afterroute(){
		?>
		</div>
        </html>
		<?php
	}

	function __construct() {

		$f3=Base::instance();
		$this->f3=$f3;
		$db=new DB\SQL(
			$f3->get('devdb'),
			$f3->get('devdbusername'),
			$f3->get('devdbpassword'),
			array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
		);
		$this->db=$db;
	}
}