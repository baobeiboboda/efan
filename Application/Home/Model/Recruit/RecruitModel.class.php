<?php
namespace Home\Model\Recruit;

use Think\Model;

class RecruitModel extends Model
{
	public function findStudentInfoByStudentId($student, $time_start, $time_end)
	{
		return $this->where(array('studentid' => $student, 'time' => array('egt', $time_start), 'time' => array('elt', $time_end)))->order('time desc')->select();
	}

	public function changeStudentPhoneById($id,$phone)
	{
		return $this->where(array('id' => $id))->save(array('phone' => $phone));
	}

	public function countRowsByPhone($phone,$startTime)
	{
		return $this->where(array('phone' => $phone, 'time' => array('egt',$startTime)))->count();
	}

	public function findStudentInfoById($id)
	{
		return $this->where(array('id' => array('in',$id)))->select();
	}

	public function findAuditionList()
	{
		return $this->order('id desc')->select();
	}

	public function findSendInfoByIds($id)
	{
		return $this->where(array('id' => array('in',$id)))->field('id,name,phone,auditiontime,rotation')->select();
	}

	public function updateMessageState($id,$message)
	{
		return $this->where(array('id' => $id))->data(array('message' => $message))->save();
	}

	public function studentOutById($id)
	{
		return $this->where(array('id' => $id))->data(array('state' => 1))->save();
	}

	public function studentInById($id)
	{
		return $this->where(array('id' => $id))->data(array('state' => 0))->save();
	}

	public function changeStudentRotationById($id,$rotation)
	{
		return $this->where(array('id' => $id))->data(array('rotation' => $rotation))->save();
	}

	public function findStudentInfoByIdUseFind($id)
	{
		return $this->where(array('id' => array('in',$id)))->find();
	}

	public function updateStudentInfoById($id,$value)
	{
		return $this->where(array('id'=>$id))->data($value)->save();
	}

	public function changeAuditionTimeById($id,$time)
	{
		return $this->where(array('id' => $id))->data(array('auditiontime' => $time))->save();
	}

	public function countAllRecruit()
	{
		return $this->count();
	}
	
}