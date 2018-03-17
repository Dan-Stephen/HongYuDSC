<?php

header("content-Type: text/html; charset=Utf-8"); // 设置字符的编码是utf-8
date_default_timezone_set('PRC'); //设置中国时区
error_reporting(0); // 不显示所有提示  7-只显示严重错误提示 255-显示所有提示

define('APP_NAME', 'HongYuDSC');
define('APP_VERSION', 'v8.1.5');
define('APP_UPDATE_TIME', '2018-03-18');
define('APP_CHINESE_NAME', '鸿宇大商创');
define('APP_DESCRIBE', '运营安装版');
define('APP_SITE_NAME', '鸿宇科技');
define('APP_SITE_URL', 'http://www.hongyuvip.com');
define('APP_SHOP_URL', 'http://buy.hongyuvip.com');
define('APP_BBS_URL', 'http://bbs.hongyuvip.com');
define('APP_COMMUNITY_URL', 'http://www.fuwuweb.com');
define('APP_AUTHOR', '鸿宇科技');
define('APP_DATABASE', 'hongyudsc.sql');
define('APP_PHP_VERSION', '5.6');

// 判断是否安装
$site_url = $_SERVER['PHP_SELF'];
$site_url_name = substr($site_url, strrpos($site_url, '/') + 1);
if ($site_url_name !== 'error.php') {
    if (file_exists('../data/install.lock.php') && file_exists('install.lock.php')) {
        errorHandle();
    }
}

function errorHandle()
{
    header("Location: ./error.php\n");
    exit();
}

function is_post()
{
    return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
}

function is_get()
{
    return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'GET';
}

function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST';
}