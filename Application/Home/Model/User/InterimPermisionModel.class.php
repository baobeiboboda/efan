<?php
namespace Home\Model\User;

use Think\Model;

/**
 * 组和功能模块之间的关系表
 * Class AuthGroupModuleModel
 * @package Home\Model\User
 */
class InterimPermisionModel extends Model
{
	public function getUserInterimPermisionByUid($uid)
	{
		$time = time();
		return $this->where(array('uid' => $uid, 'time' => array('gt',$time)))->field('interimpermision')->select();
	}

	public function selectUserInterimPermisionByUid($uid)
	{
		return $this->where(array('uid' => $uid))->select();
	}

	public function selectUserInterimPermisionById($id)
	{
		return $this->where(array('id' => $id))->find();
	}

	public function updateUserInterimpermisionById($id,$value)
	{
		return $this->where(array('id' => $id))->data($value)->save();
	}
	public function insertInterimpermision($value)
	{
		return $this->data($value)->add();
	}

	public function deleteUserInterimPermisionById($id)
	{
		return  $this->where(array('id' => $id))->delete();
	}
}