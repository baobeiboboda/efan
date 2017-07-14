<?php
namespace Home\Model\Daily;

use Think\Model;

class DailyModel extends Model
{
	public function findDailyTodayByTimeStampAndUid($time,$uid)
	{
		return $this->where(array('time' => array('EGT',$time),'uid' => $uid))->find();
	}

	public function insertDailyToday($value)
	{
		return $this->data($value)->add();
	}

	public function updateDailyToday($id,$info,$time)
	{
		return $this->where(array('id' => $id))->data(array('info' => $info, 'time' => $time))->save();
	}

	public function selectAllDaily()
	{
		return $this->order('id desc')->select();
	}

	public function findDailyById($id)
	{
		return $this->where(array('id' => $id))->find();
	}

	public function countOneWeekDailyByUidStartEndTime($uid,$startTime,$endTime)
	{
		return $this->where(array('time' => array('BETWEEN',array($startTime,$endTime)), 'uid' => $uid))->count();
	}

	public function selectOneWeekDailyByUidStartEndTime($uid,$startTime,$endTime)
	{
		return $this->where(array('time' => array('BETWEEN',array($startTime,$endTime)), 'uid' => $uid))->find();
	}

	public function selectAllPrivateDaily($uid)
	{
		return $this->where(array('uid' => $uid))->order('id desc')->select();
	}

	
}