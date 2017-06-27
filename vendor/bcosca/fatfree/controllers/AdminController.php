<?php

class AdminController extends Controller {

	function render($f3, $params){

		$template=new Template;
		$f3->set('item',$params['link']);
		echo $template->render('/admin/login.htm');
	}

	function logout()
	{
		$this->f3->clear('SESSION.userUsername');
		$this->f3->clear('SESSION.userId');
		$this->f3->clear('SESSION.cart');
		$this->f3->reroute('/login');
	}

	function beforeroute()
	{

	}

	function authenticate($admin, $params){

		$adminEmail = $this->f3->get('POST.adminEmail');
		$password = $this->f3->get('POST.password');

		$admin = new Admin($this->db);
		$admin->getAdminByEmail($adminEmail);

		if($admin->dry()) {

			$this->f3->reroute('/login');
		}

		if(password_verify($password, $admin->adminPassword)){
			$this->f3->set('SESSION.adminUsername',$admin->adminUsername);
			$this->f3->set('SESSION.adminId',$admin->adminId);
			$link = $params['link'];
			var_dump($params['link']);
			die();
			$this->f3->reroute('/admin/' . $link);

		}

		else {

			$this->f3->reroute('/login');
		}
		;
	}
}