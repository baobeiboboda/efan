<?php
namespace Home\Controller\Info;

use Home\Controller\HomeController;

class SubmitbugController extends HomeController
{
	public function index()
	{
		if(IS_AJAX){
			$bugTitle = I('title');
			$bugInfo = I('info');
			$user = $this->__INFO__;
			$bugInfo = $user['name'] . ' ' . date('Y-m-d H:i:s', time()) . ' ' . $bugInfo;
			$result = sendMail('efan_large@163.com', $bugTitle, $bugInfo);
			return $this->success('发送成功');
		}else{
			$this->display();
		}
	}
}