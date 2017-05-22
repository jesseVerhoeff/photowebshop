<?php

class Controller {

    protected $f3;
    protected $db;

	function beforeroute(){
		?>
		<div  class="col-md-12">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="#">Home</a></li>
			<li role="presentation"><a href="#">Profile</a></li>
			<li role="presentation"><a href="#">Messages</a></li>
		</ul>

		<?php
	}

	function afterroute(){
		?>
		</div>
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