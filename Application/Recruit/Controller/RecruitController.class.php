<?php
namespace Recruit\Controller;

use Think\Controller;
use Recruit\Model\RecruitModel;
use Recruit\Model\RecruitTimeModel;

class RecruitController extends Controller
{
	/**
	 * 报名的入口文件
	 * 报名的页面不可能一直给用户放出来，所以应该加以限制
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function index()
	{
		// 查询允许报名的时间范围
		session('token.token', getToken());
		session('token.time', time());
		$token = session('token.token');
		$recruitTimeModel = new RecruitTimeModel();
		$recruitTime = $recruitTimeModel->findNowInfo();
		$nowTime = time();

		if($nowTime > $recruitTime['recruit_time_start'] && $nowTime < $recruitTime['recruit_time_end']){
			$title = '逸凡创新团队' . $recruitTime['info'] . '招新报名';
			$this->assign('title', $title);
			$this->assign('time', $nowTime);
			$this->assign('token', $token);
			$this->display();
		}else{
			$this->error('招新报名系统暂未开放，感谢关注，可以关注辽宁工业大学逸凡创新团队官方微信efan_studio');
		}
	}
	public function newRecruit()
	{
		/**
		 * 提交新的报名信息
		 * 这里要各种判定，token的有效期为20分钟，一旦提交成功，直接清空所有token
		 * @author efan_MouBo <efan_large@163.com>
		 */
		if(IS_POST){
			// 查询允许的报名时间范围 避免之前的报名数据对本次报名有影响
			$recruitTimeModel = new RecruitTimeModel();
			$recruitTime = $recruitTimeModel->findNowInfo();
			$recruitModel = new RecruitModel();
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 1200){
				session('token', null);
				return $this->error('非法操作，刷新当前页面之后重新尝试');
			}
			$time = I('time');
			if($time < $recruitTime['recruit_time_start'] || $time > $recruitTime['recruit_time_end']) return $this->error('当前不在允许的报名时间');
			$studentId = I('student_ID');
			if(!empty($studentId)){
				$countStudentId = $recruitModel->countRowsByStudentId($studentId,$recruitTime['recruit_time_start']);
				if($countStudentId != 0){
					return $this->error('此学号已经注册，请耐心等待通知');
				}
			}else{
				return $this->error('学号不能为空');
			}
			$name = I('name');
			if(empty($name)){
				return $this->error('姓名不能为空');
			}
			$phone = I('phone');
			if(empty($phone)){
				return $this->error('电话不能为空');
			}else{
				$countPhone = $recruitModel->countRowsByPhone($phone,$recruitTime['recruit_time_start']);
				if($countPhone != 0){
					return $this->error('此手机号已经报名，请耐心等待通知');
				}
			}
			$code = I('code');
			if(empty($code)){
				return $this->error('验证码不能为空');
			}else{
				switch (is_msgcode($code)) {
					case 3:
						return $this->error('验证码已经失效，请重新获取');
						break;
					case 2:
						return $this->error('验证码错误，请核对后重新输入，或者重新获取');
					case 1:
						break;
					case 0:
						return $this->error('验证码不能为空');
				}
			}
			$college = I('college');
			if(empty($college)){
				return $this->error('学院不能为空');
			}
			$major = I('major');
			if(empty($major)){
				return $this->error('专业不能为空');
			}
			$class = I('class');
			if(empty($class)){
				return $this->error('班级不能为空');
			}
			$birth = strtotime(I('birth'));
			if(empty($birth)){
				return $this->error('出生日期不能为空');
			}else{
				if($birth > time()){
					return $this->error('出生日期有误，请重新选择');
				}
			}
			$qq = I('qq');
			if(empty($qq)){
				return $this->error('qq号不能为空');
			}
			$email = I('email');
			if(empty($email)){
				return $this->error('邮箱不能为空');
			}
			$introduce = I('introduce');
			$value = array(
				'time' => $time,
				'studentid' => $studentId,
				'name' => $name,
				'phone' => $phone,
				'college' => $college,
				'major' => $major,
				'class' => $class,
				'birthday' => $birth,
				'QQ' => $qq,
				'email' => $email,
				'introduce' => $introduce,
				);
			$result = $recruitModel->saveRecruitInfo($value);
			if($result){
				session('msgcode', null);
				session('token', null);
				return $this->success('招新报名成功，请留意短信通知');
			}else{
				return $this->error('系统错误，请稍候再试');
			}
		}else{
			return $this->error('非法请求');
		}
	}

	public function sendCode()
	{	
		/**
		 * 发送短信验证码
		 * 招新这个页面需要各种防注入，所以权限限制的相当死了
		 * @author efan_MouBo <efan_large@163.com>
		 */
		if(IS_POST){
			// 查询允许的报名时间范围 避免之前的报名数据对本次报名有影响
			$recruitTimeModel = new RecruitTimeModel();
			$recruitTime = $recruitTimeModel->findNowInfo();
			$recruitModel = new RecruitModel();
			$token = I('token');
			$timeLimit = time()-session('token.time');
			if($token != session('token.token') && $timeLimit > 600){
				session('token', null);
				return $this->error('非法操作，刷新当前页面之后重新尝试');
			}
			$time = I('time');
			if($time < $recruitTime['recruit_time_start'] || $time > $recruitTime['recruit_time_end']) return $this->error('当前不在允许的报名时间');
			$studentId = I('student_ID');
			if(!empty($studentId)){
				$countStudentId = $recruitModel->countRowsByStudentId($studentId,$recruitTime['recruit_time_start']);
				if($countStudentId != 0){
					return $this->error('此学号已经报名，请耐心等待通知');
				}
			}else{
				return $this->error('学号不能为空');
			}
			$phone = I('phone');
			if(empty($phone)){
				return $this->error('电话不能为空');
			}else{
				$countPhone = $recruitModel->countRowsByPhone($phone,$recruitTime['recruit_time_start']);
				if($countPhone != 0){
					return $this->error('此手机号已经报名，请耐心等待通知');
				}
			}
			// 在function中定义了一些全局的函数，这里直接引用了
			if(make_msgcode()){
				$name = I('name');
				if(empty($name)){
					return $this->error('姓名不能为空');
				}
				$tpl_value = array('operate' => '招新报名', 'name' => $name, 'code' => session('msgcode.code'));
				$type = 1;
				$result = send_msg($phone ,$tpl_value, $type);
				if($result['code'] == 0){
					return $this->success('发送成功');
				}else{
					return $this->error($result['msg']);
				}
			}else{
				return $this->error('短信验证码获取失败，请尝试重新发送或者稍后再试');
			}
		}else{
			return $this->error('非法访问');
		}
	}
}