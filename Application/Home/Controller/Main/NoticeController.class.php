<?php
namespace Home\Controller\Main;

use Home\Controller\HomeController;
use Home\Model\Main\NoticeModel;

class NoticeController extends HomeController
{
	public function index()
	{
		$noticeModel = new NoticeModel();
		$noticeLists = $noticeModel->selectAllNotice();
		$this->assign('notice', $noticeLists);
		$this->display();
	}

	public function noticeNew()
	{
		if(IS_AJAX){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') || ($timeLimit > 1200)){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$title = I('title');
			if(empty($title)) return $this->error('标题不能为空');
			$content = $_POST['content'];
			if(empty($content)) return $this->error('文章内容不能为空');
			$important = I('important');
			if(empty($important)){
				$value = array(
					'title' => $title,
					'content' => $content,
					);
			}else{
				$value = array(
					'title' => $title,
					'content' => $content,
					'important' => $important,
					);
			}
			$noticeModel = new NoticeModel();
			$result = $noticeModel->insertNotice($value);
			if($result){
				return $this->success('操作成功');
			}else{
				return $this->error('操作失败，请联系系统管理员');
			}
		}else{
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$message = array(
				'token' => $token,
				);
			$this->assign('message', $message);
			$this->display();
		}
	}

	public function edit()
	{
		if(IS_AJAX){
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') || ($timeLimit > 1200)){
				session('token', null);
				return $this->error('非法操作，刷新当前页面后重试操作');
			}
			$id = I('id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			if(empty($id)) return $this->error('非法操作，请返回上一页面再试');
			$title = I('title');
			if(empty($title)) return $this->error('标题不能为空');
			$content = $_POST['content'];
			if(empty($content)) return $this->error('文章内容不能为空');
			$important = I('important');
			if(empty($important)){
				$value = array(
					'title' => $title,
					'content' => $content,
					'important' => 0,
					);
			}else{
				$value = array(
					'title' => $title,
					'content' => $content,
					'important' => $important,
					);
			}
			$noticeModel = new NoticeModel();
			$result = $noticeModel->updateNoticeById($id,$value);
			if($result){
				return $this->success('编辑成功');
			}else{
				return $this->error('操作失败，请联系系统管理员；如果没有修改，请点击返回返回上一层');
			}
		}else{
			$id = I('get.id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			if(empty($id)) return $this->error('非法操作，请返回上一页面再试');
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$noticeModel = new NoticeModel();
			$data = $noticeModel->selectNoticeById($id);
			$data['id'] = I('get.id');
			$data['token'] = $token;
			$this->assign('notice', $data);
			$this->display();
		}
	}

	public function important()
	{
		if(IS_AJAX){
			$id = I('id');
			$ids = explode(',',$id);
			$noticeModel = new NoticeModel();
			$data = array(
				'important' => 1,
				);
			foreach ($ids as $value) {
				$result = $noticeModel->updateNoticeById($value,$data);
			}
			return $this->success('操作成功');
		}else{
			return $this->error('非法操作');
		}
	}

	public function disimportant()
	{
		if(IS_AJAX){
			$id = I('id');
			$ids = explode(',',$id);
			$noticeModel = new NoticeModel();
			$data = array(
				'important' => 0,
				);
			foreach ($ids as $value) {
				$result = $noticeModel->updateNoticeById($value,$data);
			}
			return $this->success('操作成功');
		}else{
			return $this->error('非法操作');
		}
	}

	public function noticeDelete()
	{
		if(IS_AJAX){
			$id = I('id');
			$ids = explode(',',$id);
			$noticeModel = new NoticeModel();
			foreach ($ids as $value) {
				$result = $noticeModel->deleteNoticeById($value);
			}
			return $this->success('操作成功');
		}else{
			return $this->error('非法操作');
		}
	}
}