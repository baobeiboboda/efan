<?php
namespace Home\Controller\Recruit;

use Home\Controller\HomeController;
use Home\Model\Recruit\RecruitModel;
use Home\Model\User\UserModel;
use Home\Model\Recruit\RecruitTimeModel;

class AuditionController extends HomeController
{
	public function index()
	{
		$recruitModel = new RecruitModel;
		$auditionList = $recruitModel->findAuditionList();
		$recruitTimeModel = new RecruitTimeModel;
		$nowInfos = $recruitTimeModel->findNowInfo();
		foreach ($auditionList as &$value) {
			$value['birthday'] = date('Y-m-d', $value['birthday']);
			$value['auditiontime'] = date('Y年m月d日 H:i', $value['auditiontime']);
			if(($value['time'] >= $nowInfos['recruit_time_start']) and ($value['time'] <= $nowInfos['recruit_time_end'])){
				$value['status'] = 1;
			}else{
				$value['status'] = 0;
			}
		}
		$this->assign('audition',$auditionList);
		$this->assign('rotation', C('AUDITION_ROTATION'));
		$this->assign('messageStatus', C('AUDITION_MESSAGE_STATUS'));
		$this->display();
	}

	public function sendMessage()
	{
		$id = I('id');
		$id = explode(',',$id);
		$recruitModel = new RecruitModel;
		$studentInfos = $recruitModel->findSendInfoByIds($id);
		$userModel = new UserModel;
		$leaderPhones = $userModel->getGroupLeaderPhone();
		$ask_phone = '';
		foreach ($leaderPhones as $value) {
			$ask_phone = $ask_phone.$value['phone'].'，';
		}
		$ask_phone = substr($ask_phone,0,strlen($ask_phone)-1);
		foreach($studentInfos as $value){
			$tpl_value = array('time' => $value['auditiontime'], 'name' => $value['name'], 'number' => $value['rotation'], 'phone' => $ask_phone);
			$result = send_msg($value['phone'],$tpl_value,3);
			if($resule['code'] == 0){
				$message = $value['rotation'] * 10 + 1;
			}else{
				$message = $value['rotation'] * 10;
			}
			$message = $recruitModel->updateMessageState($value['id'],$message);
		}
		return $this->success('操作成功');
		

	}

	public function out()
	{
		$id = I('id');
		$id = explode(',',$id);
		$recruitModel = new RecruitModel;
		$studentInfos = $recruitModel->findStudentInfoById($id);
		foreach($studentInfos as $value){
			$result = $recruitModel->studentOutById($value['id']);
		}
		return $this->success('操作成功');
	}

	public function in()
	{
		$id = I('id');
		$id = explode(',',$id);
		$recruitModel = new RecruitModel;
		$studentInfos = $recruitModel->findStudentInfoById($id);
		foreach($studentInfos as $value){
			$result = $recruitModel->studentInById($value['id']);
		}
		return $this->success('操作成功');
	}

	public function auditionTime()
	{
		if(IS_POST){
			$id = I('id');
			$id = urlsafe_b64decode($id);
			$id = authcode($id,'DECODE');
			if(empty($id)){
				return $this->error('非法操作，请退回上一页面重新进入');
			}
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面之后重新尝试');
			}
			$date = I('date');
			$time = I('time');
			$time = $date . ' ' . $time;
			$time = strtotime($time);
			$id = explode(',',$id);
			foreach($id as $value){
				$recruitModel = new RecruitModel;
				$result = $recruitModel->changeAuditionTimeById($value,$time);
			}
			return $this->success('操作成功');
		}else{
			$id = I('get.id');
			$id = urlsafe_b64decode($id);
			$id = authcode($id,'DECODE');
			if(empty($id)){
				return $this->error('非法操作，请退回上一页面重新进入');
			}
			$id = I('get.id');
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$title = '面试时间设定';
			$this->assign('title',$title);
			$this->assign('id',$id);
			$this->assign('token',$token);
			$this->display();
		}
	}

	public function last()
	{
		$id = I('id');
		$id = explode(',',$id);
		$recruitModel = new RecruitModel;
		$studentInfos = $recruitModel->findStudentInfoById($id);
		foreach($studentInfos as $value){
			if($value['rotation'] != 1){
				$rotation = $value['rotation'] - 1;
				$result = $recruitModel->changeStudentRotationById($value['id'],$rotation);
			}
		}
		return $this->success('操作成功');
	}

	public function next()
	{
		$id = I('id');
		$id = explode(',',$id);
		$recruitModel = new RecruitModel;
		$studentInfos = $recruitModel->findStudentInfoById($id);
		foreach($studentInfos as $value){
			if($value['rotation'] != 3){
				$rotation = $value['rotation'] + 1;
				$result = $recruitModel->changeStudentRotationById($value['id'],$rotation);
			}
		}
		return $this->success('操作成功');
	}
	
	public function edit()
	{
		if(IS_POST){
			$id = I('id');
			$id = urlsafe_b64decode($id);
			$id = authcode($id,'DECODE');
			if(empty($id)){
				return $this->error('非法操作，请退回上一页面重新进入');
			}
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面之后重新尝试');
			}
			$studentId = I('student_ID');
			$name = I('name');
			$phone = I('phone');
			$college = I('college');
			$major = I('major');
			$class = I('class');
			$birth = strtotime(I('birth'));
			$qq = I('qq');
			$email = I('email');
			$value = array(
				'studentid' => $studentId,
				'name' => $name,
				'phone' => $phone,
				'college' => $college,
				'major' => $major,
				'class' => $class,
				'birthday' => $birth,
				'QQ' => $qq,
				'email' => $email,
				);
			$recruitModel = new RecruitModel;
			$result = $recruitModel->updateStudentInfoById($id,$value);
			if($result){
				return $this->success('操作成功');
			}else{
				return $this->error('操作失败，请稍候再试');
			}
		}else{
			$id = I('get.id');
			$id = urlsafe_b64decode($id);
			$id = authcode($id,'DECODE');
			if(empty($id)){
				return $this->error('非法操作，请退回上一页面重新进入');
			}
			session('token.token', getToken());
			session('token.time', time());
			$token = session('token.token');
			$recruitModel = new RecruitModel;
			$studentInfo = $recruitModel->findStudentInfoByIdUseFind($id);
			$studentInfo['id'] = I('get.id');
			$time = $studentInfo['time'];
			$recruitTimeModel = new RecruitTimeModel;
			$time = $recruitTimeModel->findRecruitInfoByTime($time);
			$studentInfo['time'] = $time['info'];
			$studentInfo['birthday'] = date('Y-m-d', $studentInfo['birthday']);
			$this->assign('info',$studentInfo);
			$this->assign('token', $token);
			$this->display();
		}
	}
}