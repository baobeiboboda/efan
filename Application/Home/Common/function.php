<?php

/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */

/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户UID(即团队编号)
 * @author efan_MouBo <efan_large@163.com>
 */
function is_login()
{
	$user = session('user');
    if (empty($user)) {
        return 0;
    } else {
        return $user['uid'];
    }
}

/**
 * 检测当前用户是否为地主
 * @param  int  $uid  团队编号
 * @return boolean true-地主，false-学生
 * @author efan_MouBo <efan_large@163.com>
 */
function is_administrator($uid = null){
    $uid = is_null($uid) ? is_login() : $uid;
    return $uid && (intval($uid) === C('USER_ADMINISTRATOR'));
}


