<?php
namespace Home\Model\Creative;

use Think\Model;

class CreativeGroupModel extends Model
{
	/**
	 * @param  [type]
	 * @return [type]
	 */
	public function findGroupById($id)
	{
		return $this->where(array('id' => $id))->field('group')->find();
	}

	public function selectAllAbledGroup()
	{
		return $this->where(array('active' => 1))->field('id,group')->select();
	}
}