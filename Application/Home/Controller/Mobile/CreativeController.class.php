<?php

namespace Home\Controller\Mobile;

use Home\Controller\HomeController;
use Home\Model\Mobile\MobileGroupModel;
use Home\Model\Mobile\MobileCreativeModel;
use Home\Model\Mobile\MobileCreativeTimeModel;

class CreativeController extends HomeController
{
	public function index()
	{
		session('token.token', getToken());
		session('token.time', time());
		$token = session('token.token');
		$mobileCreativeTimeModel = new MobileCreativeTimeModel();
		$mobileCreativeTime = $mobileCreativeTimeModel->findNowInfo();
		$nowTime = time();
		if($nowTime > $mobileCreativeTime['creative_time_start'] && $nowTime < $mobileCreativeTime['creative_time_end']){
			$titleInfo = $mobileCreativeTime['info'] . '创意申报';
			$mobileGroupModel = new MobileGroupModel();
			$mobileGroupList = $mobileGroupModel->selectMobileGroupActive();
			$message = array(
				'time' => authcode(time(),'ENCODE'),
				'token' => $token,
				);
			$this->assign('message', $message);
			$this->assign('mobileGroup', $mobileGroupList);
			$this->assign('titleInfo', $titleInfo);
			$this->display();
		}else{
			return $this->error('移动应用开发创意申报尚未开启，或者已经关闭');
		}
	}

	public function submit()
	{
		if(IS_AJAX){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if(($token != session('token.token')) || ($timeLimit > 1200)){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$time = I('time');
			$time = authcode($time,'DECODE');
			if(empty($time)) return $this->error('非法操作，刷新当前页面后重试操作');
			$mobileCreativeTimeModel = new MobileCreativeTimeModel();
			$mobileCreativeTime = $mobileCreativeTimeModel->findNowInfo();
			if($time < $mobileCreativeTime['creative_time_start'] || $time > $mobileCreativeTime['creative_time_end']) return $this->error('当前不在允许提交创意的时间');
			$mobileCreativeModel = new MobileCreativeModel();
			if($countUid != 0) return $this->error('已经提交创意，等待评审结果');
			$title = I('title');
			if(empty($title)) return $this->error('标题不能为空！');
			$group = I('group');
			if($group == 0) return $this->error('请选择类别！');
			$content = $_POST['content'];
			if(empty($content)) return $this->error('请输入详细方案！');
			$value = array(
				'uid' => UID,
				'title' => $title,
				'group' => $group,
				'content' => $content,
				'time' => $time, 
				);
			$result = $mobileCreativeModel->insertMobileCreative($value);
			if($result){
				return $this->success('创意提交成功');
			}else{
				return $this->error('创意提交失败，请联系系统管理员提交bug');
			}
		}else{
			return $this->error('非法操作');
		}
	}
}