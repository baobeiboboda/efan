<?php
namespace Home\Controller\Creative;

use Home\Controller\HomeController;
use Home\Model\Creative\CreativeModel;
use Home\Model\Creative\CreativeGroupModel;
use Home\Model\User\UserModel;

class AdminController extends HomeController
{
	public function index()
	{
		$creativeModel = new CreativeModel;
		$creativeLists = $creativeModel->selectAllAdminCreative();
		$userModel = new UserModel;
		$creativeGroupModel = new CreativeGroupModel;
		foreach ($creativeLists as &$creativeList) {
			$name = $userModel->findNameByUid($creativeList['uid']);
			$creativeList['name'] = $name['name'];
			$creativeList['uid'] = uidWithYF($creativeList['uid']);
			$group = $creativeGroupModel->findGroupById($creativeList['group']);
			$creativeList['group'] = $group['group'];
			switch ($creativeList['state']) {
				case '0':
					$creativeList['statedetail'] = '待讨论';
					break;
				
				case '1':
					$creativeList['statedetail'] = '讨论中';
					break;
			}
			switch ($creativeList['zentaostate']) {
				case '0':
					$creativeList['statedetail'] = $creativeList['statedetail'] . ',未导入禅道';
					break;
				
				case '1':
					$creativeList['statedetail'] = $creativeList['statedetail'] . ',已导入禅道';
					break;
			}
		}
		$this->assign('creativeLists', $creativeLists);
		$this->display();
	}

	public function edit()
	{
		if(IS_POST){
			$id = I('id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			if(empty($id)){
				return $this->error('非法操作，返回上一页面重新再试');
			}
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if(($token != session('token.token')) || ($timeLimit > 1200)){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$content = $_POST['content'];
			$group = I('group');
			$creativetitle = I('title');
			$creativeModel = new CreativeModel;
			$result = $creativeModel->updateCreative($id,$creativetitle,$group,$content);
			if($result){
				return $this->success('修改提交成功');
			}else{
				return $this->error('没有修改，请点击返回按钮返回上一页面');
			}
		}else{
			$id = I('get.id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			if(empty($id)){
				return $this->error('非法操作，返回上一页面重新再试');
			}
			$creativeModel = new CreativeModel;
			$creative = $creativeModel->findCreativeById($id);
			if(empty($creative)){
				return $this->error('非法操作，返回上一页面重新再试');
			}
			$userModel = new UserModel;
			$name = $userModel->findNameByUid($creative['uid']);
			$creative['name'] = $name['name'];
			$creativeGroupModel = new CreativeGroupModel;
			$creativeGroup = $creativeGroupModel->selectAllAbledGroup();
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$message = array(
				'id' => I('get.id'),
				'token' => $token,
				);
			$this->assign('message', $message);
			$this->assign('creativeGroup', $creativeGroup);
			$this->assign('creative', $creative);
			$this->display();
		}
	}

	public function open()
	{
		$id = I('id');
		$id = explode(',',$id);
		$creativeModel = new CreativeModel;
		$result = $creativeModel->setStateOpenByIds($id);
		if($result){
			return $this->success('操作成功');
		}else{
			return $this->error('操作失败，请联系管理员提交bug');
		}
	}

	public function close()
	{
		$id = I('id');
		$id = explode(',',$id);
		$creativeModel = new CreativeModel;
		$result = $creativeModel->setStateCloseByIds($id);
		if($result){
			return $this->success('操作成功');
		}else{
			return $this->error('操作失败，请联系管理员提交bug');
		}
	}

	public function delete()
	{
		$id = I('id');
		$id = explode(',',$id);
		$creativeModel = new CreativeModel;
		$result = $creativeModel->deleteCreativeByIds($id);
		if($result){
			return $this->success('操作成功');
		}else{
			return $this->error('操作失败，请联系管理员提交bug');
		}
	}

	
}