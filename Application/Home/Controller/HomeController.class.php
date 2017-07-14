<?php

namespace Home\Controller;

use Think\Controller;
use Home\Model\User\ModuleModel;
use Home\Model\User\AuthGroupModuleModel;
use Home\Model\User\AuthGroupAccessModel;
use Home\Model\User\UserModel;
use Home\Model\User\InterimPermisionModel;

/**
 * 首页控制器
 * @author efan_MouBo <efan_large@qq.com>
 */

class HomeController extends Controller
{	
	/**
     * 控制器初始化
     */
	protected function _initialize()
	{
		// 获取当前用户ID，如果获取不到证明其没有登陆则返回登陆
        session('user.uid', 18);
        session('user.permision', 10);
        define('UID', is_login());
        define('PERMISION', what_permision());
        define('URL', what_url());
        if (!UID) {// 还没登录 跳转到登录页面
            $this->redirect(INDEX_PATH_NAME . 'Login/Public/login');
        }
        // $config = api('Config/lists');
        //判断是否设置IP拦截
        if (C('ADMIN_ALLOW_IP')) {
            // 检查IP地址访问
            if (!in_array(get_client_ip(), explode(',', C('ADMIN_ALLOW_IP')))) {
            	$this->error('403:禁止访问');
            }
        }
        $access = $this->accessControl();
        if ($access === false) {
            $this->error('403:禁止访问');
        } elseif ($access === null) {
            $key = I('request.key');
            if (!$this->isExe($key)) {
                $this->error('您没有权限执行该操作');
            }
        }
        // 获取用户左侧菜单
        $key = I('get.key');
        $menu = $this->getMenus();
        $actions = $this->getMenuActions($key);
        $actionInfos = [];
        foreach ($actions as $action) {
            $actionInfos[$action['key']] = $action;
        }
        // 获取顶部导航栏的用户信息
        $userInfos = $this->getUserInfo();
        foreach ($userInfos as $value) {
            $userInfo = $value;
        }
        $this->assign('__URL__', URL);
        $this->assign('__MENU__', $menu);
        $this->assign('__INFO__', $userInfo);
        $this->assign('actions', $actionInfos);
        $this->assign('TMPL_FOOTER',C('TMPL_FOOTER')); //获取页脚信息
        $this->assign('TMPL_TITLE',C('TMPL_TITLE')); //获取网页标题
    }

	/**
     * action访问控制,在 **登陆成功** 后执行的第一项权限检测任务
     *
     * @return boolean|null  返回值必须使用 `===` 进行判断
     *
     *   返回 **false**, 不允许任何人访问(超管除外)
     *   返回 **true**, 允许任何管理员访问,无需执行节点权限检测
     *   返回 **null**, 需要继续执行节点权限检测决定是否允许访问
     * @author efan_MouBo  <efan_large@163.com>
     */
    final protected function accessControl()
    {
        $allow = C('ALLOW_VISIT');
        $deny = C('DENY_VISIT');
        $check = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
        if (!empty($deny) && in_array_case($check, $deny)) {
            return false;//非超管禁止访问deny中的方法
        }
        if (!empty($allow) && in_array_case($check, $allow)) {
            return true;
        }
        return null;//需要检测节点权限
    }

    /**
     * 获取登录人员导航信息
     * @return array|mixed
     */
    protected function getMenus()
    {   
        //查询登陆的用户的权限
        if(PERMISION == -1){
            $userModel = new UserModel();
            $userPermision = $userModel->getUserPermisionByUid(UID);
            define('PERMISION', $userPermision['permision']);
        }
        if (PERMISION != 0 && (PERMISION <= 9 || PERMISION == 10)) {
            $group_ids = [];
            foreach ($authGroupAccess as $item) {
                $group_ids[] = $item['group_id'];
            }
            //查询角色常规模块所管理的菜单模块
            $authGroupModuleModel = new AuthGroupModuleModel();
            $authGroupModules = $authGroupModuleModel->getModuleKeyByPermision(PERMISION);
            //查询角色是否拥有临时权限
            $interimPermisionModel = new interimPermisionModel();
            $userInterimPermision = $interimPermisionModel->getUserInterimPermisionByUid(UID);
            //若有临时权限获取临时权限对应的菜单模块
            if($userInterimPermision && count($userInterimPermision) >0){
                foreach($userInterimPermision as $value){
                    $authInterimPersion = $authGroupModuleModel->getInterimModuleKeyByPermision($value['interimpermision']);
                    //将获取到的临时权限对应的菜单模块附加到整体的菜单模块中
                    $authGroupModules = array_merge($authGroupModules, $authInterimPersion);
                }
            }
            if (empty($authGroupModules)) return [];
            $moduleIds = [];
            foreach ($authGroupModules as $value) {
                $moduleIds[] = $value['module_key'];
            }
            $moduleModel = new ModuleModel();
            //查询模块信息
            $modules = $moduleModel->getMenuByModuleKeys($moduleIds);
            if (empty($modules)) return [];
            $menu = [];
            foreach ($modules as $key => $value) {
                if ($value['pid'] === '0') {
                    $menu[$value['key']] = $value;
                    unset($modules[$key]);
                }
            }
            foreach ($modules as $svalue) {
                $menu[$svalue['pid']]['childs'][] = $svalue;
            }
            return $menu;
        } else {
            return [];
        }
    }

    /**
     * 根据功能标识判断是否可以执行
     * @param $key
     * @return bool
     */
    protected function isExe($key)
    {
        $url = $this->getRequestUrl();
        if (strtolower('/' . MODULE_NAME . '/') === strtolower(INDEX_PATH_NAME)) {
            if (strtolower($url) === strtolower('main/index/main')) {
                return true;
            } else {
                if (is_null($key)) return false;
                /*查询功能模块是否存在*/
                $moduleModel = new ModuleModel();
                $moduleCount = $moduleModel->getCountByUrlAndKey($url, $key);
                if ($moduleCount == 0) return false;
                /*查询功能模块是否分配给role*/
                $authGroupModuleModel = new AuthGroupModuleModel();
                $authGroupModules = $authGroupModuleModel->getInfosByModuleKey($key);
                $groupIds = [];
                foreach ($authGroupModules as $item) {
                    $groupIds[] = $item['group_id'];
                }
                if (empty($authGroupModules)) return false;
                /*查询当前key所属权限*/
                $keyPermision = $authGroupModuleModel->getPermisionByKey($key);
                $interimPermisionModel = new interimPermisionModel();
                $userInterimPermision = $interimPermisionModel->getUserInterimPermisionByUid(UID);
                foreach($keyPermision as $value){
                    if($userInterimPermision && count($userInterimPermision) >0){
                        if(deep_in_array($value['permision'], $userInterimPermision)) return true;
                    }
                    if($value['permision'] > PERMISION) return false;
                }
                return true;
            }
        } else {
            return false;
        }

    }

    /**
     * 根据$key获取操作功能信息
     * @param $key
     * @return mixed 
     */
    protected function getModuleByKey($key)
    {
        $moduleModel = new ModuleModel();
        return $moduleModel->getModuleByKey($key);
    }

    /**
     * 获取请求路径ControllerName/ActionName
     * @return string
     */
    private function getRequestUrl()
    {
        $actionName = str_replace('.' . C(URL_HTML_SUFFIX), '', ACTION_NAME);

        $rule = CONTROLLER_NAME . '/' . $actionName;
        return $rule;
    }

    /**
     * 根据父key获取有权限操作按钮
     * @param $key
     * @return array|mixed
     * @author efan_MouBo <efan_large@163.com>
     */
    protected function getMenuActions($key)
    {
        $moduleModel = new ModuleModel();
        $actions = $moduleModel->getActionsByParent($key);
        if (empty($actions)) return [];
        // 根据用户权限查询基本的操作
        $authGroupModuleModel = new AuthGroupModuleModel();
        $moduleKeys = $authGroupModuleModel->getModuleKeyByPermision(PERMISION);
        //查询角色是否拥有临时权限
        $interimPermisionModel = new interimPermisionModel();
        $userInterimPermision = $interimPermisionModel->getUserInterimPermisionByUid(UID);
        if($userInterimPermision && count($userInterimPermision) >0){
            foreach($userInterimPermision as $value){
                $authInterimPersionModuleKey = $authGroupModuleModel->getInterimModuleKeyByPermision($value['interimpermision']);
                //将获取到的临时权限对应的菜单模块附加到整体的菜单模块中
                $moduleKeys = array_merge($moduleKeys, $authInterimPersionModuleKey);
            }
        }
        if (empty($moduleKeys)) return [];
        $moduleIds = [];
        foreach ($moduleKeys as $item) {
            $moduleIds[] = $item['module_key'];
        }
        foreach ($actions as $key => $value) {
            if (!in_array($value['key'], $moduleIds)) unset($actions[$key]);
        }
        return $actions;
    }

    /**
     * 根据用户UID查询用户的简单信息供顶部菜单使用
     * @return array|mixed
     * @author efan_MouBo <efan_large@163.com>
     */
    public function getUserInfo()
    {
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfoByUid(UID);
        return $userInfo;
    }
}