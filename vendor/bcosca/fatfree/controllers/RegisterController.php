<?php

class RegisterController extends Controller
{

	function render()
	{

		$template = new Template;
		echo $template->render('register.htm');
	}

	function beforeroute()
	{

	}

	function register()
	{
		$useremail = $this->f3->get('POST.useremail');

		$user = new User($this->db);
		$user->getByEmail($useremail);

		if($user->dry())
		{
			$useremail = $this->f3->get('POST.useremail');
			$hashpassword = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT)."\n";
			$userName = $this->f3->get('POST.userName');
			$userLastname = $this->f3->get('POST.userLastname');
			$userUsername = $this->f3->get('POST.userUsername');
			$userStreet = $this->f3->get('POST.userStreet');
			$usercity = $this->f3->get('POST.usercity');
			$userZipcode = $this->f3->get('POST.userZipcode');
			$userHomenumber = $this->f3->get('POST.userHomenumber');


//			echo $hashpassword;
			$user = new User($this->db);
			$users = $user->add($useremail,
				       $hashpassword,
						$userName,
						$userLastname,
						$userUsername,
						$userStreet,
						$usercity,
						$userZipcode,
						$userHomenumber);

			$this->f3->reroute('/login');
		}
		else
		{
			$this->f3->reroute('/register');
		}

	}
}