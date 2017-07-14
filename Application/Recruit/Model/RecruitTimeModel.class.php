<?php
namespace Recruit\Model;

use Think\Model;

class RecruitTimeModel extends Model
{
	public function findNowInfo()
	{
		return $this->order('recruit_time_start desc')->find();
	}
}