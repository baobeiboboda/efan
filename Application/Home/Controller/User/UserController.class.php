<?php

namespace Home\Controller\User;

use Home\Controller\HomeController;
use Home\Model\User\UserModel;
use Home\Model\User\PermisionModel;
use Home\Model\User\InterimPermisionModel;

class UserController extends HomeController
{
	public function index()
	{
		$templeUrl = __ROOT__ . '/UserInfo/temple.xlsx';
		$userModel = new UserModel;
        $userLists = $userModel->selectStudentLists();
        foreach ($userLists as &$userList) {
        	$userList['uid'] = uidWithYF($userList['uid']);
        }
        $permisionModel = new PermisionModel;
        $permisionList = $permisionModel->getPermisionList();
        $interimPermisionList = $permisionModel->getInterimPermisionList();
        foreach ($permisionList as $value) {
        	$permision[$value['id']] = $value;
        }
        $this->assign('permisionList',$permisionList);
        $this->assign('interimPermisionList',$interimPermisionList);
        $this->assign('userList',$userLists);
        $this->assign('permision',$permision);
        $this->assign('url' ,$templeUrl);
        $this->display();
	}

	public function newUser()
	{
		if(IS_POST){
			$password = md5('123456');
			$uid = I('uid');
			$name = I('name');
			$userModel = new UserModel;
			$count = $userModel->countRowsByUid($uid);
			if($count){
				return $this->error('此编号已经占用，请重新分配');
			}
			$count = $userModel->countRowsByName($name);
			if($count){
				return $this->error('此姓名已经占用，请重新分配');
			}
			$result = $userModel->insertNewUser($uid,$name,$password);
			if($result){
				return $this->success('新建用户成功');
			}else{
				return $this->error('新建失败请联系系统管理员提交bug');
			}
		}else{
			return $this->error('非法操作');
		}
	}

	public function leadingIn()
	{
		if(IS_POST){
			$upload = new \Think\Upload(C('UPLOAD_USER_EXCEL_CONFIG'));
			$info = $upload->uploadOne($_FILES['excel']);
			if(!$info) {// 上传错误提示错误信息
		        return $this->error($upload->getError());
		    }else{// 上传成功 获取上传文件信息
		        $url = './UserInfo/' . $info['savename'];
		        $data = $this->excelData($url);
		        $userModel = new UserModel;
		        $password = md5('123456');
		        foreach ($data as $value) {
		        	$uid = $value['uid'];
		        	$name = $value['name'];
		        	$count = $userModel->countRowsByUid($uid);
					if($count){
						break;
					}
					$count = $userModel->countRowsByName($name);
					if($count){
						break;
					}
					$result = $userModel->insertNewUser($uid,$name,$password);
				}
				return $this->success('批量导入成功');
		    }
		}else{
			$this->display();
		}
	}

	protected function excelData($url)
	{
		import('Org.Util.PHPExcel');
		$PHPReader = new \PHPExcel_Reader_Excel2007(); 
	    if(!$PHPReader->canRead($url)){ 
			$PHPReader = new \PHPExcel_Reader_Excel5(); 
			if(!$PHPReader->canRead($url)){ 
				echo 'no Excel';
			} 
	    }
	    $PHPExcel = $PHPReader->load($url);
	    $currentSheet = $PHPExcel->getSheet(0);  //读取excel文件中的第一个工作表
		$allRow = $currentSheet->getHighestRow(); //取得一共有多少行
		// 开始读取excel数据
		for($i = 2;$i <= $allRow;$i++){
			$data[$i] = array(
				'uid' => $currentSheet->getCell('B'.$i)->getValue(),
				'name' => $currentSheet->getCell('C'.$i)->getValue(),
				);
		}
		return $data;
	}

	public function edit()
	{
		if(IS_POST){
			$id = I('id');
            $id = authcode(urlsafe_b64decode($id), 'DECODE');
            if(empty($id)){
                return $this->error('非法操作！请返回上一页面再试');
            }
            $token = I('token');
            $time = time() - session('token.time');
            if(($token != session('token.token')) || ($time > 600) ){
                return $this->error('非法操作！刷新页面再试');
            }
            $IDcard = I('IDcard');
            $class = I('class');
			$college = I('college');
			$email = I('email');
			$major = I('major');
			$name = I('name');
			$phone = I('phone');
			$qq = I('qq');
			$student_ID = I('student_ID');
			$wechat = I('wechat');
			$data = array(
                'name' => $name,
                'student_ID' => $student_ID,
                'phone' => $phone,
                'college' => $college,
                'major' => $major,
                'class' => $class,
                'email' => $email,
                'qq' => $qq,
                'wechat' => $wechat,
                'IDcard' => $IDcard,
                );
			$userModel = new UserModel();
			$result = $userModel->editInfoById($id,$data);
			if($result){
				return $this->success('编辑成功');
			}else{
				return $this->error('操作失败，联系管理员提交bug');
			}
		}else{
			$id = I('get.id');
			$id = authcode(urlsafe_b64decode($id),'DECODE');
			$userModel = new UserModel();
			$studentInfo = $userModel->findStudentInfoById($id);
			$studentInfo['id'] = I('get.id');
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$studentInfo['token'] = $token;
			$this->assign('studentInfo', $studentInfo);
			$this->display();
		}
	}

	public function resetPassword()
	{
		if(IS_POST){
			$id = I('id');
			$ids = explode(',',$id);
			$password = md5('123456');
			$data = array(
				'password' => $password,
				'passwordstate' => 1,
				);
			$userModel = new UserModel();
			foreach ($ids as $value) {
				$result = $userModel->editInfoById($value,$data);
			}
			return $this->success('重置密码为123456');
		}else{
			return $this->error('非法操作');
		}
	}

	public function limitLogin()
	{
		if(IS_POST){
			$id = I('id');
			$ids = explode(',',$id);
			$data = array(
				'state' => 0,
				);
			$userModel = new UserModel();
			foreach ($ids as $value) {
				$result = $userModel->editInfoById($value,$data);
			}
			return $this->success('限制登录成功');
		}else{
			return $this->error('非法操作');
		}
	}

	public function disLimitLogin()
	{
		if(IS_POST){
			$id = I('id');
			$ids = explode(',',$id);
			$data = array(
				'state' => 1,
				);
			$userModel = new UserModel();
			foreach ($ids as $value) {
				$result = $userModel->editInfoById($value,$data);
			}
			return $this->success('允许登录成功');
		}else{
			return $this->error('非法操作');
		}
	}

	public function delete()
	{
		if(IS_POST){
			$id = I('id');
			$ids = explode(',',$id);
			$userModel = new UserModel();
			foreach ($ids as $id) {
				$result = $userModel->deleteUserById($id);
			}
			return $this->success('删除成功');
		}else{
			return $this->error('非法操作');
		}
	}

	public function changePermision()
	{
		if(IS_POST){
			$id = I('id');
			$ids = explode(',',$id);
			$permision = I('permision');
			$data = array(
				'permision' => $permision,
				);
			$userModel = new UserModel();
			foreach ($ids as $value) {
				$result = $userModel->editInfoById($value,$data);
			}
			return $this->success('修改权限成功');
		}else{
			return $this->error('非法操作');
		}
	}

	public function viewInterimPermision()
	{
		if(IS_POST){
			$id = I('id');
			$userModel = new UserModel();
			$uid = $userModel->findUidById($id);
			$uid = $uid['uid'];
			$interimPermision = new InterimPermisionModel();
			$permisionModel = new PermisionModel();
			$interimPermisionLists = $interimPermision->selectUserInterimPermisionByUid($uid);
			if(empty($interimPermisionLists)){
				$result['status'] = 0;
			}else{
				foreach ($interimPermisionLists as &$interimPermisionList) {
					$id = $interimPermisionList['interimpermision'];
					$permision = $permisionModel->findPermisionById($id);
					$interimPermisionList['interimpermision'] = $permision['permision'];
					$interimPermisionList['interimpermisionId'] = $id;
					$interimPermisionList['time'] = date('Y年m月d日 H:i:s', $interimPermisionList['time']);
				}
				$result['status'] = 1;
				$result['data'] = $interimPermisionLists;
				$name = $userModel->findNameByUid($uid);
				$result['name'] = $name['name'];
			}
			foreach ($this->actions as $key => $value) {
				$str = INDEX_PATH_NAME.$value['url'];
				$url = U($str,array('key'=>$value['key']));
				$urls[$key] = $url;
			}
			$result['url'] = $urls;
			return $this->ajaxReturn($result,'JSON');
		}else{
			return $this->error('非法操作');
		}
	}

	public function interimPermisionEdit()
	{
		if(IS_POST){
			$id = I('id');
			$interimPermisionModel = new InterimPermisionModel();
			$interimPermisionList = $interimPermisionModel->selectUserInterimPermisionById($id);
			$result['status'] = 1;
			$interimPermisionList['date'] = date('Y-m-d',$interimPermisionList['time']);
			$result['data'] = $interimPermisionList;
			foreach ($this->actions as $key => $value) {
				$str = INDEX_PATH_NAME.$value['url'];
				$url = U($str,array('key'=>$value['key']));
				$urls[$key] = $url;
			}
			$result['url'] = $urls;
			return $this->ajaxReturn($result,'JSON');
		}else{
			return $this->error('非法操作');
		}
	}

	public function interimPermisionEditSubmit()
	{
		if(IS_POST){
			$id = I('id');
			$interimpermision = I('interimPermision');
			$time = I('stopDate') . ' 23:59:59';
			$time = strtotime($time);
			$value = array(
				'interimpermision' => $interimpermision,
				'time' => $time,
				);
			$interimPermisionModel = new InterimPermisionModel();
			$result = $interimPermisionModel->updateUserInterimpermisionById($id,$value);
			if($result){
				return $this->success('修改成功！');
			}else{
				return $this->error('修改失败，联系管理员提交bug');
			}
		}
	}

	public function interimPermisionNew()
	{
		if(IS_AJAX){
			foreach ($this->actions as $key => $value) {
				$str = INDEX_PATH_NAME.$value['url'];
				$url = U($str,array('key'=>$value['key']));
				$urls[$key] = $url;
			}
			$result = array(
				'status' => 1,
				'url' => $urls,
				);
			return $this->ajaxReturn($result, 'JSON');
		}else{
			return $this->error('非法操作');
		}
	}

	public function interimPermisionNewSubmit()
	{
		if(IS_POST){
			$interimPermision = I('interimPermision');
			$time = I('stopDate') . ' 23:59:59';
			$time = strtotime($time);
			$id = I('hiddenId');
			$userModel = new UserModel();
			$uid = $userModel->findUidById($id);
			$uid = $uid['uid'];
			$interimPermisionModel = new InterimPermisionModel();
			$value = array(
				'uid' => $uid,
				'interimpermision' => $interimPermision,
				'time' => $time,
				);
			$result = $interimPermisionModel->insertInterimpermision($value);
			if($result){
				return $this->success('新建临时临时权限成功！');
			}else{
				return $this->error('新建失败请联系系统管理员提交bug');
			}
		}else{
			return $this->error('非法操作');
		}
	}

	public function interimPermisionDelete()
	{
		if(IS_POST){
			$id = I('id');
			$interimPermisionModel = new InterimPermisionModel();
			$result = $interimPermisionModel->deleteUserInterimPermisionById($id);
			if($result){
				return $this->success('删除成功');
			}else{
				return $this->error('操作失败，联系管理员提交bug');
			}
		}else{
			return $this->error('非法操作');
		}
	}

}