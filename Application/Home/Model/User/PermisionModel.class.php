<?php
namespace Home\Model\User;

use Think\Model;

class PermisionModel extends Model
{
	public function getPermisionList()
	{
		return $this->where(array('class' => 1))->select();
	}

	public function getInterimPermisionList()
	{
		return $this->where(array('class' => 2))->select();
	}

	public function findPermisionById($id)
	{
		return $this->where(array('id' => $id))->field('permision')->find();
	}
}
