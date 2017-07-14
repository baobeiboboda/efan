<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	header('Content-Type:text/html; charset=utf-8');
        $this->redirect(INDEX_PATH_NAME . 'Main/Index/index/key/WELCOMEINDEX');
    }
}