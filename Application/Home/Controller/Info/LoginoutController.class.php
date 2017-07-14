<?php
namespace Home\Controller\Info;

use Home\Controller\HomeController;

class LoginoutController extends HomeController
{
	public function index()
	{
		session(null);
		$this->redirect(INDEX_PATH_NAME . 'Main/Index/index/key/WELCOMEINDEX');
	}
}