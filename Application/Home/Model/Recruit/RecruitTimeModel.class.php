<?php
namespace Home\Model\Recruit;

use Think\Model;

class RecruitTimeModel extends Model
{
	public function findNowInfo()
	{
		return $this->order('recruit_time_start desc')->find();
	}

	public function findRecruitInfoByTime($time)
	{
		return $this->where(array('recruit_time_start' => array('ELT', $time),'recruit_end_time' => array('EGT', $time)))->field('info')->find();
	}
}