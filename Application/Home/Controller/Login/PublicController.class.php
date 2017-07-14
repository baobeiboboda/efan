<?php
namespace Home\Controller\Login;

use Think\Controller;
use Home\Model\User\UserModel;
use Home\Model\User\CollegeMajorModel;



class PublicController extends Controller
{
    public function index()
    {
        if (UID) {
            $this->meta_title = '管理首页';

            $this->redirect(INDEX_PATH_NAME . 'Main/Index/index/key/WELCOMEINDEX');
        } else {
            $this->redirect('Login/Public/login');
        }
    }

    /**
     * 后台用户登录
     * @author efan_MouBo <efan_large@163.com>
     */
    public function login()
    {
        if (IS_POST) {
            /* 检测验证码 TODO: */
            $verify = I('code');
            $codeResult = $this->check_verify($verify);
            if(!$codeResult){
                return $this->error('验证码输入错误');
            }
            $username = I('username');
            $passwd = I('passwd');
            $passwd = md5($passwd);
            /* 调用UC登录接口登录 */
            $len = strlen($username);
            $userModel = new UserModel();
            switch ($len) {
                case 2:
                    $uidAndPermision = $userModel->loginByUid($username,$passwd);
                    break;
                case 9:
                    $uidAndPermision = $userModel->loginByStudentID($username,$passwd);
                    break;
                case 11:
                    $uidAndPermision = $userModel->loginByPhone($username,$passwd);
                    break;
                default:
                    return $this->error('用户名或密码错误！');
                    break;
            }
            if(empty($uidAndPermision)){
                $uid = -2;
            } elseif ($uidAndPermision['state'] != 1) {
                $uid = -1;
            } elseif ($uidAndPermision['passwordstate'] == 1) {
                $uid = -3;
            } elseif ($uidAndPermision['infostate'] == 1) {
                $uid = -4;
            }
             else {
                $uid = $uidAndPermision['uid'];
                $permision = $uidAndPermision['permision'];
                $url = $uidAndPermision['url'];
            }
            session('user.uid', $uid);
            if (0 < $uid) {

                if (UID) { //登录用户
                    session('user.permision', $permision);
                    session('user.url', $url);
                    //TODO:跳转到登录前页面
                    return $this->success('登录成功！', U(INDEX_PATH_NAME . 'Main/index/index/key/WELCOMEINDEX/'));
                } else {
                    return $this->error($loginMemberModel->getError());
                }

            } else { //登录失败
                switch ($uid) {
                    case -1:
                        $error = '用户被禁用！';
                        session('user', null);
                        break; //系统级别禁用
                    case -2:
                        $error = '用户名或密码错误！';
                        session('user', null);
                        break;
                    case -3:
                        $error = '密码弱，需要修改密码';
                        session('user', null);
                        $url = U(INDEX_PATH_NAME . 'Login/Public/changePass/id/' . urlsafe_b64encode(authcode($uidAndPermision['uid'],'ENCODE')));
                        break;
                    case -4:
                        $error = '需要完善个人信息';
                        session('user', null);
                        $url = U(INDEX_PATH_NAME . 'Login/Public/submitInfo/id/' . urlsafe_b64encode(authcode($uidAndPermision['uid'],'ENCODE')));
                        break;
                    default:
                        $error = '未知错误！';
                        break; // 0-接口参数错误（调试阶段使用）
                }
                return $this->error($error,$url);
            }
        } else {
            if (is_login()) {
                $this->redirect(INDEX_PATH_NAME . 'Main/Index/index/key/WELCOMEINDEX/');
            } else {
                $this->display();
            }
        }
    }

    /* 退出登录 */
    public function logout()
    {
        if (is_login()) {
            D('Member')->logout();
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }

    public function verify()
    {
        $verify = new \Think\Verify();
        $verify->codeSet = '0123456789';
        $verify->entry();
    }

    /**
     * 欢迎窗口
     */
    public function windows()
    {
        if (UID) {
            $this->display();
        } else {
            $this->redirect(INDEX_PATH_NAME . '/Login/Public/login');
        }
    }

    public function changePass()
    {
        if(IS_POST){
            $uid = I('id');
            $uid = authcode(urlsafe_b64decode($uid), 'DECODE');
            if(empty($uid)){
                $url = INDEX_PATH_NAME . '/Login/Public/login';
                $url = U($url);
                return $this->error('非法操作！请重新登录再试',$url);
            }
            $token = I('token');
            $time = time() - session('token.time');
            if(($token != session('token.token')) || ($time > 600) ){
                return $this->error('非法操作！刷新页面再试');
            }
            $userModel = new UserModel;
            $pass = I('password');
            $pass = md5($pass);
            $result = $userModel->changePassFirst($uid,$pass);
            if($result){
                return $this->success('修改密码成功，请重新登录');
            }else{
                return $this->error('操作失败，请联系系统管理员');
            }
        }else{
            $uid = I('get.id');
            $uid = authcode(urlsafe_b64decode($uid), 'DECODE');
            if(empty($uid)){
                return $this->error('非法操作！请重新登录再试');
            }
            session('token.token', getToken());
            session('token.time', time());
            $token = session('token.token');
            $message = array(
                'uid' => I('get.id'),
                'token' => $token,
                );
            $title = '首次登录修改密码';
            $this->assign('pageTitle', $title);
            $this->assign('title', '逸凡创新团队');
            $this->assign('message', $message);
            $this->display();
        }
    }

    public function submitInfo()
    {
        if(IS_POST){
            $uid = I('uid');
            $uid = authcode(urlsafe_b64decode($uid), 'DECODE');
            if(empty($uid)){
                $url = INDEX_PATH_NAME . '/Login/Public/login';
                $url = U($url);
                return $this->error('非法操作！请重新登录再试',$url);
            }
            $token = I('token');
            $time = time() - session('token.time');
            if(($token != session('token.token')) || $time > 600 ){
                return $this->error('非法操作！刷新页面再试');
            }

            $code = I('code');
            switch (is_msgcode($code)) {
                case 3:
                    return $this->error('验证码已经失效，请重新获取');
                    break;
                case 2:
                    return $this->error('验证码错误，请核对后重新输入，或者重新获取');
                case 1:
                    break;
                case 0:
                    return $this->error('验证码不能为空');
            }
            $name = I('name');
            $student_ID = I('student_ID');
            $phone = I('phone');
            $college = I('college');
            $major = I('major');
            $class = I('classFront') . I('class');
            $email = I('email');
            $qq = I('qq');
            $wechat = I('wechat');
            $IDcard = I('IDcard');
            $data = array(
                'name' => $name,
                'student_ID' => $student_ID,
                'phone' => $phone,
                'college' => $college,
                'major' => $major,
                'class' => $class,
                'email' => $email,
                'qq' => $qq,
                'wechat' => $wechat,
                'IDcard' => $IDcard,
                'infostate' => 0,
                );
            $userModel = new UserModel;
            $result = $userModel->submitInfoFirst($uid,$data);
            if($result){
                $url = INDEX_PATH_NAME . '/Login/Public/login';
                $url = U($url);
                return $this->success('补全成功！',$url);
            }else{
                return $this->error('操作失败，请联系系统管理员');
            }
        }else{
            $uid = I('get.id');
            $uid = authcode(urlsafe_b64decode($uid), 'DECODE');
            if(empty($uid)){
                return $this->error('非法操作！请重新登录再试');
            }
            $collegeMajorModel = new CollegeMajorModel();
            $collegeList = $collegeMajorModel->selectCollege();
            $userModel = new UserModel;
            $name = $userModel->findNameByUid($uid);
            $name = $name['name'];
            session('token.token', getToken());
            session('token.time', time());
            $token = session('token.token');
            $message = array(
                'uid' => I('get.id'),
                'token' => $token,
                'name' => $name,
                );
            $title = '首次登录补全个人信息';
            $this->assign('college',$collegeList);
            $this->assign('message',$message);
            $this->assign('pageTitle', $title);
            $this->display();
        }
    }

    public function sendCode()
    {
        if(IS_POST){
            $phone = I('phone');
            if(make_msgcode()){
                $name = I('name');
                if(empty($name)){
                    return $this->error('姓名不能为空');
                }
                $tpl_value = array('operate' => '首次登录补全个人信息', 'name' => $name, 'code' => session('msgcode.code'));
                $type = 1;
                $result = send_msg($phone ,$tpl_value, $type);
                if($result['code'] == 0){
                    return $this->success('发送成功');
                }else{
                    return $this->error($result['msg']);
                }
            }else{
                return $this->error('短信验证码获取失败，请尝试重新发送或者稍后再试');
            }
        }else{
            return $this->error('非法访问!');
        }
    }

    protected function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function findMajor()
    {
        if(IS_AJAX){
            $cid = I('cid');
            $collegeMajorModel = new CollegeMajorModel();
            $majorList = $collegeMajorModel->selectMajorByCid($cid);
            $result = array(
                'status' => 1,
                'data' => $majorList,
                );
            return $this->ajaxReturn($result,'json');
        }else{
            return $this->error('非法操作');
        }
    }

    public function findClass()
    {
        if(IS_AJAX){
            $id = I('id');
            $collegeMajorModel = new CollegeMajorModel();
            $class = $collegeMajorModel->findClassById($id);
            $class = $class['class'];
            $result = array(
                'status' => 1,
                'data' => $class,
                );
            return $this->ajaxReturn($result,'json');
        }else{
            return $this->error('非法操作');
        }
    }

}