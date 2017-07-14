<?php
namespace Home\Controller\Daily;

use Home\Controller\HomeController;

use Home\Model\Daily\DailyModel;
use Home\Model\Daily\OtherModel;
use Home\Model\User\UserModel;

class DailyController extends HomeController
{
	/**
	 * 查询自己的日报列表
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function index()
	{
		$dailyModel = new DailyModel;
		$dailyLists = $dailyModel->selectAllPrivateDaily(UID);
		$userInfos = $this->getUserInfo();
	        foreach ($userInfos as $value) {
	            $userInfo = $value;
	        }
			$name = $userInfo['name'];
		foreach ($dailyLists as &$dailyList) {
			$dailyList['time'] = date('Y-m-d',$dailyList['time']);
			$dailyList['name'] = $name;
			$dailyList['uid'] = uidWithYF($dailyList['uid']);
		}
		$this->assign('allDaily', $dailyLists);
		$this->display();
	}



	public function look()
	{
		$id = I('get.id');
		$id = urlsafe_b64decode($id);
		$id = authcode($id,'DECODE');
		if(empty($id)){
			return $this->error('非法操作，请退回上一页面重新进入');
		}
		$dailyModel = new DailyModel;
		$daily = $dailyModel->findDailyById($id);
		$daily['time'] = date('Y-m-d H:i:s',$daily['time']);
		$userModel = new UserModel;
		$name = $userModel->findNameByUid($daily['uid']);
		$daily['name'] = $name['name'];
		$daily['uid'] = uidWithYF($daily['uid']);
		$this->assign('daily',$daily);
		$this->display();
	}

	public function submit()
	{	
		if(IS_POST){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$submitTime = I('submitTime');
			$state = I('state');
			$submitTime = authcode($submitTime,'DECODE');
			$state = authcode($state,'DECODE');
			if(($state != 0) && ($state != 1)){
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			if(empty($submitTime)){
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$info = I('info');
			$dailyModel = new DailyModel;
			if($state == 1){
				$id = I('id');
				$id = authcode($id, 'DECODE');
				if(empty($id)){
					return $this->error('非法操作，刷新当前页面后重试操作');
				}
				$result = $dailyModel->updateDailyToday($id,$info,$submitTime);
				if($result){
					return $this->success('修改日报成功');
				}else{
					return $this->error('修改失败，若没有更改内容请点击返回返回上级菜单；若有更改请联系系统管理员提交bug');
				}
			}elseif($state == 0){
				$name = I('name');
				$value = array(
					'time' => $submitTime,
					'uid' => UID,
					'info' => $info,
					);
				$result = $dailyModel->insertDailyToday($value);
				if($result){
					return $this->success('提交成功');
				}else{
					return $this->error('提交失败，请联系系统管理员提交bug');
				}
			}else{
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
		}else{
			// 当晚9点才允许提交日报
			$time = date('H',time());
			// if($time < 21){
			// 	return $this->error('今天过完了么？你这么早提交日报干什么，21点之后再写日报！');
			// }
			// 检测今天是否提交过日报
			$time = strtotime(date('Y-m-d',time()));
			$title = '填写日报';
			$userInfos = $this->getUserInfo();
	        foreach ($userInfos as $value) {
	            $userInfo = $value;
	        }
			$name = $userInfo['name'];
			$uid = uidWithYF(UID);
			$dailyModel = new DailyModel;
			$todayDaily = $dailyModel->findDailyTodayByTimeStampAndUid($time,$uid);
			// 根据返回结果选择不同分支
			if(empty($todayDaily)){
				$info = '';
				$state = 0;
				$state = authcode($state,'ENCODE');
			}else{
				$info = $todayDaily['info'];
				$state = 1;
				$state = authcode($state,'ENCODE');
				$id = $todayDaily['id'];
				$id = authcode($id,'ENCODE');
			}
			// 传递参数到view
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$time = date('Y-m-d H:i:s',time());
			$message = array(
				'name' => $name,
				'uid' => $uid,
				'time' => $time,
				'info' => $info,
				'token' => $token,
				'submitTime' => authcode(strtotime($time),'ENCODE'),
				'state' => $state,
				'id' => $id,
				);
			$this->assign('title',$title);
			$this->assign('message',$message);
			$this->display();
		}
	}

	public function other()
	{
		if(IS_POST){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$submitTime = I('submitTime');
			$state = I('state');
			$submitTime = authcode($submitTime,'DECODE');
			$state = authcode($state,'DECODE');
			if(($state != 0) && ($state != 1)){
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			if(empty($submitTime)){
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$keynote = I('keynote');
			$summary = I('summary');
			$plan = I('plan');
			$idea = I('idea');
			$value = array(
				'keynote' => $keynote,
				'summary' => $summary,
				'plan' => $plan,
				'idea' => $idea,
				);
			$otherModel = new OtherModel;
			if($state == 1){
				$id = I('id');
				$id = authcode($id, 'DECODE');
				if(empty($id)){
					return $this->error('非法操作，刷新当前页面后重试操作');
				}
				$result = $otherModel->updateOtherThisWeek($id,$value,$submitTime);
				if($result){
					return $this->success('修改补充材料成功');
				}else{
					return $this->error('修改失败，若没有更改内容请点击返回返回上级菜单；若有更改请联系系统管理员提交bug');
				}
			}elseif($state == 0){
				$name = I('name');
				$value = array(
					'time' => $submitTime,
					'uid' => UID,
					'keynote' => $keynote,
					'summary' => $summary,
					'plan' => $plan,
					'idea' => $idea,
					);
				$result = $otherModel->insertOtherThisWeek($value);
				if($result){
					return $this->success('提交成功');
				}else{
					return $this->error('提交失败，请联系系统管理员提交bug');
				}
			}else{
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
		}else{
			// 判断今天是不是周日
			// $time = date('N',time());
			// if($time != 7){
			// 	return $this->error('今天不是星期日，无法填写补充材料');
			// }
			// // 判断是不是周日的21点
			// $time = date('H',time());
			// if($time != 21){
			// 	return $this->error('这周过完了么？今天21点之后再来吧！');
			// }
			$time = strtotime(date('Y-m-d',time()));
			$title = '周报补充材料';
			$userInfos = $this->getUserInfo();
	        foreach ($userInfos as $value) {
	            $userInfo = $value;
	        }
			$name = $userInfo['name'];
			$uid = UID;
			$otherModel = new OtherModel;
			$thisWeekDaily = $otherModel->findDailyThisWeekByTimeStampAndUid($time,$uid);
			if(empty($thisWeekDaily)){
				$keynote = '';
				$summary = '';
				$plan = '';
				$idea = '';
				$state = 0;
				$state = authcode($state,'ENCODE');
			}else{
				$keynote = $thisWeekDaily['keynote'];
				$summary = $thisWeekDaily['summary'];
				$plan = $thisWeekDaily['plan'];
				$idea = $thisWeekDaily['idea'];
				$state = 1;
				$state = authcode($state,'ENCODE');
				$id = $thisWeekDaily['id'];
				$id = authcode($id,'ENCODE');
			}
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$time = date('Y-m-d H:i:s',time());
			$uid = uidWithYF($uid);
			$message = array(
				'name' => $name,
				'uid' => $uid,
				'time' => $time,
				'keynote' => $keynote,
				'summary' => $summary,
				'plan' => $plan,
				'idea' => $idea,
				'token' => $token,
				'submitTime' => authcode(strtotime($time),'ENCODE'),
				'state' => $state,
				'id' => $id,
				);
			$this->assign('title',$title);
			$this->assign('message',$message);
			$this->display();
		}
	}
}