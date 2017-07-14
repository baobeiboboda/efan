<?php

namespace Home\Model\User;

use Think\Model;

/**
 * 员工和组的关系
 * @package Home\Model\User
 */
class AuthGroupAccessModel extends Model
{
	/**
     * 根据用户id和组ids查询数量
     * @param $uid
     * @param array $groupIds
     * @author efan_MouBo <efan_large@163.com>
     */
    public function getCountByUidAndGroupIds($uid, array $groupIds)
    {
        return $this->where(array('uid' => $uid, 'group_id' => array('in', $groupIds)))->count();
    }

    /**
     * 根据uid查询用户所属分组
     * @param $uid
     * @return mixed
     * @author efan_MouBo <efan_large@163.com>
     */
    public function getAuthGroupAccessByUid($uid)
    {
        return $this->where(array('uid' => $uid))->select();
    }

    /**
     * 把用户添加到用户组,支持批量添加用户到用户组
     * @return boolean
     * @author efan_MouBo <efan_large@163.com>
     */
    public function addToGroup($uid, $gid)
    {
        $uid_arr = array_diff($uid, array(C('USER_ADMINISTRATOR')));
        $add = array();
        foreach ($uid_arr as $u) {
            $count = $this->getCountByGroupIdAndUid($gid, (int)$u);
            if ($count == 0) {
                $add[] = array('group_id' => $gid, 'uid' => (int)$u);
            }
        }
        $flag = true;
        if (!empty($add)) {
            $flag = $this->addAll($add);
        }
        if ($flag) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * 根据groupId和uid进行查询
     * @param $groupId 组id
     * @param $uid 用户id
     * @author efan_MouBo <efan_large@163.com>
     */
    public function getCountByGroupIdAndUid($groupId, $uid)
    {
        return $this->where(array('group_id' => $groupId, 'uid' => $uid))->count();
    }

    /**
     * 将用户从用户组中移除
     * @param int|string|array $gid 用户组id
     * @param int|string|array $cid 分类id
     * @author efan_MouBo <efan_large@163.com>
     */
    public function removeFromGroup($uid, $gid)
    {
        return $this->where(array('uid' => $uid, 'group_id' => $gid))->delete();
    }
}