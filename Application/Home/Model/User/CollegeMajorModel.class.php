<?php

namespace Home\Model\User;

use Think\Model;

class CollegeMajorModel extends Model
{
	public function selectCollege()
	{
		return $this->where(array('cid' => 0))->select();
	}

	public function selectMajorByCid($cid)
	{
		return $this->where(array('cid' => $cid))->field('id,title')->select();
	}

	public function findClassById($id)
	{
		return $this->where(array('id' => $id))->field('class')->find();
	}
}