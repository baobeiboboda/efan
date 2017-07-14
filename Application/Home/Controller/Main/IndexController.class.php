<?php
namespace Home\Controller\Main;

use Home\Controller\HomeController;
use Home\Model\Main\NoticeModel;

class IndexController extends HomeController {

    public function index(){
    	$noticeModel = new NoticeModel();
    	$count = $noticeModel->countNotice();
    	C('REPLY_PAGE')? C('REPLY_PAGE') : 10;
		$page = new \Think\Page($count,C('REPLY_PAGE'));
		$pageShow = $page->show();
		// 进行分页数据查询
		$nowPage = I('get.page');
		$nowPage = intval(authcode(urlsafe_b64decode($nowPage),'DECODE'));
		$totalPage = $page->pages();
		empty($nowPage)? 1 : $nowPage;
		if($nowPage > $totalPage) return $this->error('非法操作，返回上一页面重新再试');
		$noticeLists = $noticeModel->selectNoticeForPage($nowPage,C('REPLY_PAGE'));
		$this->assign('notice', $noticeLists);
		$this->assign('page', $pageShow);
        $this->display(); 
    }
}