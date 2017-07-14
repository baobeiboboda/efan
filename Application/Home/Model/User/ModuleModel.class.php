<?php

namespace Home\Model\User;

use Think\Model;

/**
 * 员工管理中用到的功能模块模型
 * Class ModuleModel
 * @package Home\Model\User
 */
class ModuleModel extends Model
{
    /**
     * 根据url和key查询module数量
     * @param $url 请求的url
     * @param $key 标识
     * @return mixed 返回module数量
     */
    public function getCountByUrlAndKey($url, $key)
    {
        $where = array('url' => $url, 'key' => $key, 'hide' => 0);
        return $this->where($where)->count();
    }

    /**
     * 根据功能标识，查询hide＝0,type=1的菜单信息并按sort升序查找module
     * @param array $moduleKeys 功能模块标识集合
     * @return mixed
     */
    public function getMenuByModuleKeys(array $moduleKeys)
    {
        return $this->where(array('key' => array('in', $moduleKeys), 'hide' => 0, 'type' => 1))->order('sort asc')->field('title,url,key,pid,pic')->select();
    }


    /**
     * 根据功能模块标识集合和父标识查询菜单
     * @param array $moduleKeys 功能模块标识集合
     * @param $parent 父标识
     * @return mixed
     */
    public function getMenuByModuleKeysAndParent(array $moduleKeys, $parent)
    {
        $where = array('key' => array('in', $moduleKeys), 'pid' => $parent, 'hide' => 0, 'type' => 1);
        return $this->where($where)->order('sort asc')->field('title,url,key')->select();
    }

    /**
     * 根据父key查询操作信息
     * @param $parent 父key
     * @return mixed
     */
    public function getActionsByParent($parent)
    {
        return $this->where(array('hide' => 0, 'pid' => $parent, 'type' => 2))->order('sort asc')->field('url,key')->select();
    }

    /**
     * 根据key查询模块信息
     * @param $key
     * @return Model
     */
    public function getModuleByKey($key)
    {
        return $this->where(array('key' => $key, 'hide' => 0))->find();
    }
}