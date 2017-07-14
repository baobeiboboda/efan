<?php
namespace Home\Controller\Creative;

use Home\Controller\HomeController;
use Home\Model\Recruit\RecruitModel;
use Home\Model\Creative\CreativeModel;
use Home\Model\Creative\CreativeGroupModel;

class PublishController extends HomeController
{
	public function index()
	{
		if(IS_POST){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$submitTime = I('time');
			$submitTime = authcode($submitTime,'DECODE');
			if(empty($submitTime)){
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$title = I('title');
			$group = I('group');
			$content = $_POST['content'];
			if(empty($content)){
				return $this->error('创意不能为空，请重新操作');
			}
			$creativeModel = new CreativeModel;
			$value = array(
				'uid' => UID,
				'submittime' => $submitTime,
				'creativetitle' => $title,
				'group' => $group,
				'creative' => $content,
				);
			$result = $creativeModel->insertCreative($value);
			if($result){
				return $this->success('创意提交成功！');
			}else{
				return $this->error('请联系系统管理员提交bug');
			}
		}else{
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$time = authcode(time(),'ENCODE');
			$message = array(
				'token' => $token,
				'time' => $time,
				);
			$this->assign('message', $message);
			$this->display();
		}
		
	}
}