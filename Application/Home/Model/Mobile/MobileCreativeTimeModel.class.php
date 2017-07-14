<?php

namespace Home\Model\Mobile;

use Think\Model;

class MobileCreativeTimeModel extends Model
{
	public function findNowInfo()
	{
		return $this->order('creative_time_start desc')->find();
	}

	public function findInfoByTime($time)
	{
		return $this->where(array('creative_time_start' => array('elt', $time),'creative_time_end' => array('egt', $time)))->field('info')->find();
	}
}