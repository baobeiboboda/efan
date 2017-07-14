<?php
namespace Recruit\Controller;

use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->redirect(RECRUIT_PATH_NAME . 'Recruit/index');
    }
}