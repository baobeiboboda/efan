<?php
return array(
	/* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . $Think.MODULE_NAME . '/js',
        'PUBLIC_FONT' => __ROOT__ . '/Public/assets/font',
        'PUBLIC_CSS' => __ROOT__ . '/Public/assets/css',
        'PUBLIC_JS' => __ROOT__ . '/Public/assets/js',
        'PUBLIC_IMAGES' => __ROOT__ . '/Public/assets/images',
    ),
);