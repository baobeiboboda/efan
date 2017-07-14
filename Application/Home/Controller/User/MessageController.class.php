<?php
namespace Home\Controller\User;

use Home\Controller\HomeController;
use Home\Model\User\UserModel;

class MessageController extends HomeController
{
	public function index()
	{
		
		$userModel = new UserModel();
		$studentsNameList = $userModel->selectAllStudent();
		$this->assign('studentsNameList',$studentsNameList);
		$this->display();
	}

	public function send()
	{
		if(IS_POST){
			$id = I('id');
			$ids = explode(',',$id);
			$message = I('message');
			$userModel = new UserModel();
			$userInfo = $this->getUserInfo();
			$name = $userInfo[0]['name'];
			foreach ($ids as $value) {
				$nameAndPhone = $userModel->findPhoneById($value);
				$tpl_value = array(
					'name' => $name,
					'note' => $message,
					);
				$phone = $nameAndPhone['phone'];
				$result = send_msg($phone,$tpl_value,2);
			}
			return $this->success('发送成功!');
		}else{
			return $this->error('非法访问！');
		}
	}
}