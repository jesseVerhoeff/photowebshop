<?php

class UserController extends Controller {

	function render(){

		$template=new Template;
		echo $template->render('login.htm');
	}

	function authenticate(){


	}
}