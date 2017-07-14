<?php
namespace Home\Model\Mobile;

use Think\Model;

class MobileGroupModel extends Model
{
	public function selectMobileGroupActive()
	{
		return $this->where(array('active' => 1))->select();
	}

	public function selectAllMobileGroup()
	{
		return $this->select();
	}
}