<?php
namespace Recruit\Model;

use Think\Model;

class RecruitModel extends Model
{
	public function saveRecruitInfo($info)
	{
		return $this->add($info);
	}

	public function findStudentInfoByStudentId($studentId)
	{
		return $this->where(array('studentid' => $studentId))->select();
	}

	public function countRowsByPhone($phone,$startTime)
	{
		return $this->where(array('phone' => $phone, 'time' => array('egt',$startTime)))->count();
	}

	public function countRowsByStudentId($id,$startTime)
	{
		return $this->where(array('studentid' => $id, 'time' => array('egt',$startTime)))->count();
	}


}