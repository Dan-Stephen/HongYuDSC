<?php
/**
 * HongYuDSC
 * ============================================================================
 * Copyright © 2015-2018 HongYuKeJi.Co.Ltd. All rights reserved.
 * Http://www.hongyuvip.com
 * ----------------------------------------------------------------------------
 * 仅供学习交流使用，如需商用请购买商用版权。
 * 堂堂正正做人，踏踏实实做事。
 * ----------------------------------------------------------------------------
 * Author: Shadow  QQ: 1527200768  Time: 2018/2/26 17:49
 * E-mail: admin@hongyuvip.com
 * ============================================================================
 */

require __DIR__ . '/config/app.php';

$check = array();

// 检查php版本 $check['php_version']
$check['php_version']['info'] = array(
    'name' => 'PHP',
    'version' => substr(PHP_VERSION, 0, 3),
);
if ($check['php_version']['info']['version'] == APP_PHP_VERSION) {
    $check['php_version']['status'] = true;
} else {
    $check['php_version']['status'] = false;
    $check['tips'][] = 'PHP版本不对，请切换PHP版本为：php' . APP_PHP_VERSION . '。请注意如果不切换为php'.APP_PHP_VERSION.'，程序将无法正常使用！';
}

// PHP扩展检查 $check['php_extensions']
$extensions_list = array(
    'openssl',
    'pdo',
    'mbstring',
    'tokenizer',
    //'fileinfo',
);
foreach ($extensions_list as $extensions) {
    $check['php_extensions']['info'][$extensions] = true;

    if (!extension_loaded($extensions)) {
        $check['php_extensions']['info'][$extensions] = false;
        $check['tips'][] = $extensions . '扩展没有安装' . '请安装' . $extensions . '扩展';
    }
}

// php.ini参数检查 $check['php_parameter']
//$php_parameter_list = array(
//    'php_mysqli',
//    'always_populate_raw_post_data',
//);
if (ini_get('always_populate_raw_post_data') == '-1' || ini_get('always_populate_raw_post_data') == 'on') {
    $check['php_parameter']['info']['always_populate_raw_post_data'] = true;
} else {
    $check['php_parameter']['info']['always_populate_raw_post_data'] = false;
    $check['tips'][] = 'always_populate_raw_post_data 参数没有开启，请在php.ini中去掉 always_populate_raw_post_data 前面的分号(;)';
}

// 文件夹权限检查 $check['folder_permissions']
$folder_list = array(
    'admin',
    'cert',
    'data',
    'images',
    'install',
    'themes',
);
foreach ($folder_list as $folder) {
    $folder_path = '../' . $folder;
    $permissions = substr(base_convert(@fileperms($folder_path), 10, 8), -4);

    if (is_dir($folder_path)) {
        if ($permissions >= '0755') {
            $check['folder_permissions']['info'][$folder] = array(
                'name' => $folder,
                'status' => true,
                'permissions' => $permissions,
            );
        } else {
            $check['folder_permissions']['info'][$folder] = array(
                'status' => false,
                'permissions' => $permissions,
            );
            $check['tips'][] = $folder . '文件夹权限出错，请设置为0755或07777';
        }
    } else {
        $check['tips'][] = $folder . '文件夹不存在，请检查程序是否完整';
    }
}

// 处理检测结果和友好提示
if (!empty($check['tips']) && count($check['tips']) > 0) {
    $check['tips'][] = "<a href=\"http://www.fuwuweb.com/article/88\" target=\"_blank\">鸿宇商城安装教程</a> <a href=\"http://www.fuwuweb.com\" target=\"_blank\">鸿宇社区</a>";
}


include("views/requirement.html");