<?php
namespace Home\Controller\Recruit;

use Home\Controller\HomeController;
use Home\Model\Recruit\RecruitTimeModel;
use Home\Model\Recruit\RecruitModel;

class RecruitController extends HomeController
{
	public function index()
	{
		$this->display();
	}

	public function view()
	{
		if(IS_POST){
			$student_id = I('student_ID');
			$time = time();
			// 查询当前面试的时间段
			$recruitTimeModel = new RecruitTimeModel();
			$recruitTime = $recruitTimeModel->findNowInfo();
			$recruitModel = new RecruitModel();
			if($time < $recruitTime['recruit_time_start'] || $time > $recruitTime['recruit_time_end']) {return $this->error('当前无进行的面试，操作失败');}
			$studentInfo = $recruitModel->findStudentInfoByStudentId($student_id, $recruitTime['recruit_time_start'], $recruitTime['recruit_time_end']);
			if(empty($studentInfo)){return $this->error('查询无结果');}
			$date = $studentInfo[0];
			$date['birthday'] = date('Y-m-d', $date['birthday']);
			$result = array('status' => 1, 'date' => $date);
			return $this->ajaxReturn($result,'JSON');
		}else{
			return $this->error('非法访问');
		}
	}

	public function changePhone()
	{
		if(IS_POST){
			$id = I('id');
			if(empty($id)){return $this->error('请重新获取学生信息后操作');}
			$phone = I('phone');
			$recruitTimeModel = new RecruitTimeModel();
			$recruitTime = $recruitTimeModel->findNowInfo();
			$recruitModel = new RecruitModel();
			if(empty($phone)){
				return $this->error('手机号不能为空');
			}else{
				$countPhone = $recruitModel->countRowsByPhone($phone,$recruitTime['recruit_time_start']);
				if($countPhone != 0){
					return $this->error('此手机号已经报名，请耐心等待通知');
				}
			}
			$result = $recruitModel->changeStudentPhoneById($id,$phone);
			if($result == 0){
				return $this->error('操作失败，请联系管理员');
			}else{
				return $this->success('修改手机号成功');
			}
		}else{
			return $this->error('非法访问');
		}
	}
}