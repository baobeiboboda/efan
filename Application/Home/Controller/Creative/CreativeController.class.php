<?php
namespace Home\Controller\Creative;

use Home\Controller\HomeController;
use Home\Model\Creative\CreativeModel;
use Home\Model\User\UserModel;
use Home\Model\Creative\CreativeGroupModel;
use Home\Model\Creative\ReplyModel;

class CreativeController extends HomeController
{
	public function index()
	{
		$creativeModel = new CreativeModel;
		$creativeLists = $creativeModel->selectAllCreative();
		$userModel = new UserModel;
		$creativeGroupModel = new CreativeGroupModel;
		foreach ($creativeLists as $key => &$creativeList) {
			$name = $userModel->findNameByUid($creativeList['uid']);
			$creativeList['name'] = $name['name'];
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
			empty($creativeList['pdfurl'])? $creativeList['pdfurl'] = '0' : $creativeList['pdfurl'];
		}
		$this->assign('lists', $creativeLists);
		$this->display();
	}
	public function reply()
	{
		if(IS_POST){
			$id = I('get.id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			if(empty($id)) return $this->error('非法操作，返回上一页面重新再试');
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$time = I('time');
			$time = authcode($time,'DECODE');
			if(empty($time)) return $this->error('非法操作，返回上一页面重新再试');
			$reply = I('reply');
			$replyModel = new ReplyModel;
			$value = array(
				'cid' => $id,
				'uid' => UID,
				'time' => $time,
				'reply' => $reply,
				);
			$result = $replyModel->insertReply($value);
			if($result){
				return $this->success('回复成功');
			}else{
				return $this->error('回复失败，请联系管理员提交bug');
			}
		}else{
			// get获取当前创意id
			$id = I('id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			$cid = $id;
			if(empty($id)) return $this->error('非法操作，返回上一页面重新再试');
			// 根据id查询创意是否存在防止注入
			$creativeModel = new CreativeModel;
			$creative = $creativeModel->findCreativeById($id);
			if(empty($creative)) return $this->error('非法操作，返回上一页面重新再试');
			// 获取当前创意的相关信息
			$userModel = new UserModel;
			$name = $userModel->findNameByUid($creative['uid']);
			$creative['name'] = $name['name'];
			$creative['submittime'] = date('Y-m-d H:i:s', $creative['submittime']);
			$creativeGroupModel = new CreativeGroupModel;
			$group = $creativeGroupModel->findGroupById($creative['group']);
			$creative['group'] = $group['group'];
			$creative['creative'] = $creative['creative'];
			// 获取父类回复列表
			$replyModel = new ReplyModel;
			$count = $replyModel->countFatherReplyByCid($cid);
			// 分页显示 每页显示数据量在config中已经设置
			C('REPLY_PAGE')? C('REPLY_PAGE') : 10;
			$page = new \Think\Page($count,C('REPLY_PAGE'));
			$pageShow = $page->show();
			// 进行分页数据查询
			$nowPage = I('get.page');
			$nowPage = intval(authcode(urlsafe_b64decode($nowPage),'DECODE'));
			$totalPage = $page->pages();
			empty($nowPage)? 1 : $nowPage;
			if($nowPage > $totalPage) return $this->error('非法操作，返回上一页面重新再试');
			$fatherReplyLists = $replyModel->selectFatherReplyByCidForPage($cid,$nowPage,C('REPLY_PAGE'));
			foreach ($fatherReplyLists as &$fatherReplyList) {
				$name = $userModel->findNameByUid($fatherReplyList['uid']);
				$fatherReplyList['name'] = $name['name'];
				$fatherReplyList['time'] = date('Y-m-d H:i:s', $fatherReplyList['time']);
				$sonDiscussLists = $replyModel->selectSonDiscussByPid($fatherReplyList['id']);
				if(!empty($sonDiscussLists)){
					foreach ($sonDiscussLists as &$sonDiscussList) {
						$name = $userModel->findNameByUid($sonDiscussList['uid']);
						$sonDiscussList['name'] = $name['name'];
						$sonDiscussList['time'] = date('Y-m-d H:i:s', $sonDiscussList['time']);
					}
					$fatherReplyList['son'] = $sonDiscussLists;
				}
			}
			$replyLists = $fatherReplyLists;
			// 回复token,time获取
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$time = authcode(time(),'ENCODE');
			$this->assign('reply', $replyLists);
			$this->assign('page', $pageShow);
			$this->assign('time', $time);
			$this->assign('token', $token);
			$this->assign('creative', $creative);
			$this->display();
		}
	}

	public function discuss()
	{
		if(IS_POST){
			$id = I('get.id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			if(empty($id)) return $this->error('非法操作，返回上一页面重新再试');
			$token = 'token' . $id;
			$token = I($token);
			$timeLimit = time()-session('token.time');
			if(($token != session('token.token')) || ($timeLimit > 1200)){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$time = 'time' . $id;
			$time = I($time);
			$time = authcode($time,'DECODE');
			if(empty($time)){
				return $this->error('非法操作，返回上一页面重新再试');
			}
			$discuss = 'discuss' . $id;
			$discuss = I($discuss);
			$value = array(
				'pid' => $id,
				'uid' => UID,
				'time' => $time,
				'reply' => $discuss,
				);
			$replyModel = new ReplyModel;
			$result = $replyModel->insertReply($value);
			if($result){
				return $this->success('回复成功');
			}else{
				return $this->error('回复失败，请联系管理员提交bug');
			}
		}else{
			return $this->error('非法操作');
		}
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

}