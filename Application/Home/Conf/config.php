<?php
//'配置项'=>'配置值'
return array(

	/*控制器分级*/
	'CONTROLLER_LEVEL' => 2,

	/*HomeController 中应用的到常量*/
	'ADMIN_ALLOW_IP' => '',  //如果有多个IP中间用逗号隔开

	/*地主的UID*/
	'USER_ADMINISTRATOR' => 18,

    /*网页头信息*/
    'TMPL_TITLE' =>'逸凡创新团队',

	/*招新相关*/
	'3RD_AUDITION_ADDRESS' => '601',
	'1ST_AUDITION_ADDRESS' => '702',

	 /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        'PUBLIC_FONT' => __ROOT__ . '/Public/' . 'assets/font',
        'PUBLIC_CSS' => __ROOT__ . '/Public/' .  'assets/css',
        'PUBLIC_JS' => __ROOT__ . '/Public/' .  'assets/js',
        'PUBLIC_IMAGES' => __ROOT__ . '/Public/' .  'assets/images',
        '__UEDITOR__' => __ROOT__ . '/Public/assets/ueditor',
    ),

    /*测试用上传文件设置*/
    'TEST_UPLOAD_SETTING' => array(
        'maxSize' => 3145728,
        'rootPath' => './Uploads/',
        'savePath' => '',
        'saveName' => array('uniqid',''),
        'exts' => array('txt'),
        'autoSub' => true,
        'subName' => array('date','Y-m-d'),
        ),

    /*发送邮件的设置参数*/
    'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'efan_large@163.com',//你的邮箱名
    'MAIL_FROM' =>'efan_large@163.com',//发件人地址
    'MAIL_FROMNAME'=>'逸凡系统bug提交',//发件人姓名
    'MAIL_PASSWORD' =>'liuyibo880',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

    /* 评论分页默认页数 */
    'REPLY_PAGE' => 10,

    /* 上传新建用户Excel配置文件 */
    'UPLOAD_USER_EXCEL_CONFIG' => array(
        'maxSize' => 0,
        'rootPath' => './UserInfo/',
        'exts' => array('xls', 'xlsx'),
        'autoSub' => false,
        'saveName' => time().mt_rand(),
        ),

    

);