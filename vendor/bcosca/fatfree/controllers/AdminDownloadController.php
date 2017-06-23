<?php

class AdminDownloadController extends Controller
{

	function render($f3)
	{
		if($this->f3->get('SESSION.adminUsername') == null) {

			$this->f3->reroute('/admin/login');
			exit;
		}

		$date = mktime(0, 0, 0, date("m")  , date("d")-7, date("Y"));

		$downloads = new Download($this->db);
		$download = $downloads->getByDate($date);

		$f3->set('downloads',$download);

		$template = new Template;
		echo $template->render('/admin/downloads.htm');
	}

}
