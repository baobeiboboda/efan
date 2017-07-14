<?php
namespace Home\Model\Daily;

use Think\Model;

class OtherModel extends Model
{
	public function findDailyThisWeekByTimeStampAndUid($time,$uid)
	{
		return $this->where(array('time' => array('EGT',$time),'uid' => $uid))->find();
	}

	public function updateOtherThisWeek($id,$value,$submitTime)
	{
		return $this->where(array('id' => $id))->data($value)->save();
	}

	public function insertOtherThisWeek($value)
	{
		return $this->data($value)->add();
	}

	public function findDailyByUidAndStartTime($uid,$startTime,$endTime)
	{
		return $this->where(array('uid' => $uid, 'time' => array('between', array($startTime,$endTime))))->select();
	}
}