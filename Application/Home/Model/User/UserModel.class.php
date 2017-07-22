<?php
namespace Home\Model\User;

use Think\Model;

class UserModel extends Model
{
	/**
	 * 根据团队编号查询用户权限
	 * @param  int $uid 团队编号
	 * @return int 权限代码
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function getUserPermisionByUid($uid)
	{
		return $this->where(array('uid' => $uid))->select();
	}

	/**
	 * 根据团队编号获取用户菜单信息
	 * @param  int $uid 团队编号
	 * @return array|mixed
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function getUserInfoByUid($uid)
	{
		return $this->where(array('uid' => $uid))->field('id,name,uid,url')->select();
	}

	/**
	 * 获取在籍人员团队负责人电话
	 * @return array|mixed
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function getGroupLeaderPhone()
	{
		return $this->where(array('state' => 1,'permision' => 5))->field('phone')->select();
	}

	/**
	 * 使用团队编号登陆
	 * @param  int $uid 团队编号
	 * @param  strint $pass md5加密后的密码
	 * @return array|mixed
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function loginByUid($uid,$pass)
	{
		// return $this->where(array('uid' => $uid, 'password' => $pass))->getField('id,uid,permision');
		return $this->where(array('uid' => $uid, 'password' => $pass))->field('uid,permision,state,url,passwordstate,infostate')->find();
	}

	/**
	 * 根据团队编号获取姓名
	 * @param  int $uid 团队编号
	 * @return array|mixed
	 * @author efan_MouBo <efan_large@163.com>
	 */
	public function findNameByUid($uid)
	{
		return $this->where(array('uid' => $uid))->field('name')->find();
	}

	public function selectStudentLists()
	{
		return $this->field('id,uid,name,phone,major,permision,state')->select();
	}

	public function getAllUidEnable()
	{
		return $this->where(array('state' => 1))->field('uid')->select();
	}

	public function countRowsByUid($uid)
	{
		return $this->where(array('uid' => $uid))->count();
	}

	public function countRowsByName($name)
	{
		return $this->where(array('name' => $name))->count();
	}

	public function insertNewUser($uid,$name,$password)
	{
		return $this->data(array('uid' => $uid,'name' => $name,'password' => $password))->add();
	}

	public function changePassFirst($uid,$pass)
	{
		return $this->where(array('uid' => $uid))->data(array('password' => $pass, 'passwordstate' => 0))->save();
	}

	public function submitInfoFirst($uid,$data)
	{
		return $this->where(array('uid' => $uid))->data($data)->save();
	}

	public function loginByStudentID($studentID,$pass)
	{
		return $this->where(array('student_ID' => $studentID, 'password' => $pass))->field('uid,permision,state,url,passwordstate,infostate')->find();
	}

	public function loginByPhone($phone,$pass)
	{
		return $this->where(array('phone' => $phone, 'password' => $pass))->field('uid,permision,state,url,passwordstate,infostate')->find();
	}

	public function selectAllStudent()
	{
		return $this->field('id,name')->select();
	}

	public function findPhoneById($id)
	{
		return $this->where(array('id' => $id))->field('phone')->find();
	}

	public function findStudentInfoById($id)
	{
		return $this->where(array('id' => $id))->field('id,student_ID,name,college,major,class,phone,qq,IDcard,email,wechat')->find();
	}
	public function editInfoById($id,$data)
	{
		return $this->where(array('id' => $id))->data($data)->save();
	}

	public function findUidById($id)
	{
		return $this->where(array('id' => $id))->field('uid')->find();
	}

	public function deleteUserById($id)
	{
		return $this->where(array('id' => $id))->delete();
	}

	public function findUidByName($name)
	{
		return $this->where(array('name' => $name))->field('uid')->find();
	}
}