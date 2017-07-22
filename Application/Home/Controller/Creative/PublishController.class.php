<?php
namespace Home\Controller\Creative;

use Home\Controller\HomeController;
use Home\Model\Recruit\RecruitModel;
use Home\Model\Creative\CreativeModel;
use Home\Model\Creative\CreativeGroupModel;
use Home\Model\User\UserModel;

class PublishController extends HomeController
{
	public function index()
	{
		if(IS_POST){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if(($token != session('token.token')) || ($timeLimit > 1200)){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$submitTime = I('time');
			$submitTime = authcode($submitTime,'DECODE');
			if(empty($submitTime)){
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$uid = I('uid');
			$uid = uidWithoutYF($uid);
			if($uid < 18) return $this->error('团队编号不合法，重新输入姓名后获取');
			$title = I('title');
			if(empty($title)) return $this->error('标题不能为空');
			$group = I('group');
			if((empty($group)) or ($group == 0)) return $this->error('请选择类别');
			$content = $_POST['content'];
			if(empty($content)){
				return $this->error('创意不能为空，请重新操作');
			}
			$creativeModel = new CreativeModel;
			$value = array(
				'uid' => $uid,
				'submittime' => $submitTime,
				'creativetitle' => $title,
				'group' => $group,
				'creative' => $content,
				);
			$result = $creativeModel->insertCreative($value);
			if($result){
				session('token', null);
				return $this->success('创意提交成功！');
			}else{
				return $this->error('请联系系统管理员提交bug');
			}
		}else{
			$creativeGroupModel = new CreativeGroupModel();
			$creativeGroupLists = $creativeGroupModel->selectAllAbledGroup();
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$time = authcode(time(),'ENCODE');
			$message = array(
				'token' => $token,
				'time' => $time,
				);
			$this->assign('creativeGroup', $creativeGroupLists);
			$this->assign('message', $message);
			$this->display();
		}	
	}

	public function findUID()
	{
		if(IS_AJAX){
			$name = I('name');
			if(empty($name)) return $this->error('姓名为空，请重新输入');
			$userModel = new UserModel();
			$uid = $userModel->findUidByName($name);
			$uid = $uid['uid'];
			if($uid){
				$jsonResult = array(
					'status' => 1,
					'uid' => uidWithYF($uid),
					);
				return $this->ajaxReturn($jsonResult);
			}else{
				return $this->error('无法获取团队编号，请核对姓名');
			}
		}
	}
}