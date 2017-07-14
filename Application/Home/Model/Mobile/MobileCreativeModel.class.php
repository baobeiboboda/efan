<?php

namespace Home\Model\Mobile;

use Think\Model;

class MobileCreativeModel extends Model
{
	public function insertMobileCreative($value)
	{
		return $this->data($value)->add();
	}

	public function countRowsByUid($uid,$startTime)
	{
		return $this->where(array('uid' => $uid ,'time' => array('egt',$startTime)))->count();
	}

	public function selectAllMobileCreative()
	{
		return $this->select();
	}
}