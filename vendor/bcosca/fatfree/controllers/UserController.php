<?php

class UserController extends Controller {

	function render(){

		$template=new Template;
		echo $template->render('login.htm');
	}

	function logout()
	{
		$this->f3->clear('SESSION.userUsername');
		$this->f3->clear('SESSION.userId');
		$this->f3->clear('SESSION.cart');
		$this->f3->clear('SESSION.adminUsername');
		$this->f3->clear('SESSION.adminId');
		$this->f3->reroute('/login');
	}

	function beforeroute()
	{

	}

	function authenticate(){

		$useremail = $this->f3->get('POST.useremail');
		$password = $this->f3->get('POST.password');

		$user = new User($this->db);
		$user->getByEmail($useremail);

		if($user->dry()) {

			$this->f3->reroute('/login');
		}

		if(password_verify($password, $user->userPassword)){
			$this->f3->set('SESSION.userUsername',$user->userUsername);
			$this->f3->set('SESSION.userId',$user->userId);
			$this->f3->reroute('/');
//			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}
		else {

			$this->f3->reroute('/login');
		}
			;
	}
}