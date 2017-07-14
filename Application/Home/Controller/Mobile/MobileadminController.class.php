<?php
 
 namespace Home\Controller\Mobile;

 use Home\Controller\HomeController;
 use Home\Model\Mobile\MobileGroupModel;
 use Home\Model\Mobile\MobileCreativeTimeModel;
 use Home\Model\Mobile\MobileCreativeModel;
 use Home\Model\User\UserModel;

 class MobileadminController extends HomeController
 {
 	public function index()
 	{
 		$mobileGroupModel = new MobileGroupModel();
 		$mobileGroupList = $mobileGroupModel->selectAllMobileGroup();
 		$mobileCreativeTimeModel = new MobileCreativeTimeModel();
 		$mobileCreativeModel = new MobileCreativeModel();
 		$creativeLists = $mobileCreativeModel->selectAllMobileCreative();
 		$userModel = new UserModel();
 		foreach ($creativeLists as &$creativeList) {
 			$name = $userModel->findNameByUid($creativeList['uid']);
 			$creativeList['name'] = $name['name'];
 			$creativeList['uid'] = uidWithYF($creativeList['uid']);
 			$info = $mobileCreativeTimeModel->findInfoByTime($creativeList['time']);
 			$creativeList['info'] = $info['info'];
 		}
 		$this->assign('creativeList', $creativeLists);
 		$this->assign('mobileGroup', $mobileGroupList);
 		$this->display();
 	}
 }