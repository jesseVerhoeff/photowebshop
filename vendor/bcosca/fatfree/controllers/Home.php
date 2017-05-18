<?php

namespace controller;


class Home {

	function render($f3){

		$f3->set('name','world');
		$template=new Template;
		echo $template->render('template.htm');
	}



}