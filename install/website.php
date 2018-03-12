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

require __DIR__ . '/../data/config.php';
require __DIR__ . '/config/app.php';

if (is_post()) {

    // 获取表单信息
    $website_name = $_POST['website_name']; // 网站名称
    $website_title = $_POST['website_title'];   // 网站标题
    $website_admin_name = $_POST['website_admin_name']; // 管理员用户名
    $website_admin_email = $_POST['website_admin_email'];   // 管理员邮箱
    $website_admin_pass = $_POST['website_admin_pass']; // 登录密码

    // 执行sql语句，更新数据库配置
    $db_explode = explode(':', $db_host);

    $database_host = $db_explode[0];
    $database_port = $db_explode[1];
    $database_username = $db_user;
    $database_password = $db_pass;
    $database_name = $db_name;

    $conn = new mysqli($database_host, $database_username, $database_password, $database_name, $database_port);

    $db_site_name_sql = 'update dsc_shop_config set value="' . APP_VERSION . '" where code="dsc_version"';
    $db_site_name_sql = 'update dsc_shop_config set value="' . time() . '" where code="install_date"';

    $db_site_name_sql = 'update dsc_shop_config set value="' . $website_name . '" where code="shop_name"';
    $db_site_title_sql = 'update dsc_shop_config set value="' . $website_title . '" where code="shop_title"';

    $db_site_admin_name_sql = 'update dsc_admin_user set user_name="' . $website_admin_name . '" where user_id="1"';
    $db_site_admin_email_sql = 'update dsc_admin_user set email="' . $website_admin_email . '" where user_id="1"';

    $salt = mt_rand(1000, 9999);
    $new_password = md5(md5($website_admin_pass) . $salt);
    $db_site_admin_salt_sql = 'update dsc_admin_user set ec_salt="' . $salt . '" where user_id="1"';
    $db_site_admin_pass_sql = 'update dsc_admin_user set password="' . $new_password . '" where user_id="1"';

    $result = array();

    if ($conn->query($db_site_name_sql) == false) {
        $result['errors'][] = '网站名称设置失败';
    }
    if ($conn->query($db_site_title_sql) == false) {
        $result['errors'][] = '网站标题设置失败';
    }
    if ($conn->query($db_site_admin_name_sql) == false) {
        $result['errors'][] = '管理员用户名设置失败';
    }
    if ($conn->query($db_site_admin_email_sql) == false) {
        $result['errors'][] = '管理员邮箱设置失败';
    }
    if ($conn->query($db_site_admin_salt_sql) == false) {
        $result['errors'][] = '管理员salt设置失败';
    }
    if ($conn->query($db_site_admin_pass_sql) == false) {
        $result['errors'][] = '管理员密码设置失败';
    }

    //$conn->close();

    if (!empty($result['errors']) && count($result['errors']) > 0) {
        $result = [
            'status' => false,
            'code' => '1',  // 导入配置失败
            'message' => "配置失败",
            'errors' => json_encode($result['errors'], JSON_UNESCAPED_UNICODE),
        ];
        exit(json_encode($result, JSON_UNESCAPED_UNICODE));
    } else {
        //$conn->close();
        $result = [
            'status' => true,
            'code' => '0',  // 导入配置成功
            'message' => "配置成功",
        ];
        exit(json_encode($result, JSON_UNESCAPED_UNICODE));
    }

} else {
    include("views/website.html");
}