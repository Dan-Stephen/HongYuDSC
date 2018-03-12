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
 * Author: Shadow  QQ: 1527200768  Time: 2018/2/26 20:06
 * E-mail: admin@hongyuvip.com
 * ============================================================================
 */

require __DIR__ . '/config/app.php';

if (is_post()) {

    // 获取表单信息
    //var_dump($_POST);
    $database_host = $_POST['database_host'];
    $database_port = $_POST['database_port'];
    $database_username = $_POST['database_username'];
    $database_password = $_POST['database_password'];
    $database_name = $_POST['database_name'];
    $database_prefix = 'dsc_';
    $is_force = $_POST['is_force'];

    // 创建数据库配置文件
    $TxtFileName = "../data/config.php";
    //以读写方式打写指定文件，如果文件不存则创建
    if (($TxtRes = fopen($TxtFileName, "w+")) === FALSE) {
        exit();
    }
    $StrConents = '<?php' . "\n" .
        '// database host' . "\n" .
        '$db_host   = "' . $database_host . ':' . $database_port . '";' . "\n" .
        '// database name' . "\n" .
        '$db_name   = "' . $database_name . '";' . "\n" .
        '// database username' . "\n" .
        '$db_user   = "' . $database_username . '";' . "\n" .
        '// database password' . "\n" .
        '$db_pass   = "' . $database_password . '";' . "\n" .
        '// table prefix' . "\n" .
        '$prefix    = "' . $database_prefix . '";' . "\n" .
        '$timezone    = "Asia/Shanghai";' . "\n" .
        '$cookie_path    = "/";' . "\n" .
        '$cookie_domain    = "";' . "\n" .
        '$session = "1440";' . "\n" .
        'define(\'EC_CHARSET\', \'utf-8\');' . "\n" .
        'define(\'ADMIN_PATH\',\'admin\');' . "\n" .
        'define(\'SELLER_PATH\',\'seller\');' . "\n" .
        'define(\'STORES_PATH\',\'stores\');' . "\n" .
        'define(\'CACHE_MEMCACHED\',0);' . "\n" .
        'define(\'AUTH_KEY\', \'this is a key\');' . "\n" .
        'define(\'OLD_AUTH_KEY\', \'\');' . "\n" .
        'define(\'API_TIME\', \'\');' . "\n" .
        'define(\'EC_TEMPLATE\', \'ecmoban_dsc2017\');' . "\n" .
        '//define(\'DEBUG_MODE\', 8);' . "\n" .
        '?>' . "\n";
    if (!fwrite($TxtRes, $StrConents)) { //将信息写入文件
        fclose($TxtRes);
        exit();
    }
    fclose($TxtRes);

    // 创建连接 new mysqli("localhost", "username", "password", "", port)
    $connent = new mysqli($database_host, $database_username, $database_password, "", $database_port);

    // 检测连接
    if ($connent->connect_error) {
        //die("数据库连接失败: " . $connent->connect_error);
        $result = [
            'status' => false,
            'code' => '1',  // 数据库连接失败
            'message' => "数据库连接失败：请检查连接参数是否正确？ 数据库返回错误信息：" . $connent->connect_error,
        ];
        exit(json_encode($result, JSON_UNESCAPED_UNICODE));
    }

    // 检查数据库是否存在
    $check_db_sql = "show databases like '" . $database_name . "';";
    $check_result = $connent->query($check_db_sql);
    if ($check_result->num_rows > 0) {
        if (!empty($is_force) && $is_force == true) {
            $drop_sql = "drop database if exists " . $database_name;
            $connent->query($drop_sql);
            $create_db_sql = "create database " . $database_name;
            if ($connent->query($create_db_sql) == true) {
                //$connent->close();  // 关闭连接
                install($database_host, $database_username, $database_password, $database_name);
            } else {
                $result = [
                    'status' => false,
                    'code' => '3',  // 数据库创建失败
                    'message' => "数据库创建失败：" . $connent->error,
                ];
                exit(json_encode($result, JSON_UNESCAPED_UNICODE));
            }
        } else {
            $result = [
                'status' => false,
                'code' => '2',  // 数据库已存在
                'message' => $database_name . "数据库已存在",
            ];
            exit(json_encode($result, JSON_UNESCAPED_UNICODE));
        }
    } else {
        //创建数据库
        $create_db_sql = "create database " . $database_name;
        //$create_result = $connent->query($check_db_sql);
        if ($connent->query($create_db_sql) == true) {
            //$connent->close();  // 关闭连接
            install($database_host, $database_username, $database_password, $database_name);
        } else {
            $result = [
                'status' => false,
                'code' => '3',  // 数据库创建失败
                'message' => "数据库创建失败：" . $connent->error,
            ];
            exit(json_encode($result, JSON_UNESCAPED_UNICODE));
        }
    }
} else {
    include("views/config.html");
}

function install($database_host, $db_user, $db_pass, $database_name)
{
    $db = new DBManage ($database_host, $db_user, $db_pass, $database_name, 'utf8');
    $db->restore(APP_DATABASE);
}

class DbManage
{
    var $db; // 数据库连接
    var $database; // 所用数据库
    var $sqldir; // 数据库备份文件夹
    // 换行符
    private $ds = "n";
    // 存储SQL的变量
    public $sqlContent = "";
    // 每条sql语句的结尾符
    public $sqlEnd = ";";

    /**
     * 初始化
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $charset
     */
    function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'test', $charset = 'utf8')
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
        set_time_limit(0);//无时间限制
        @ob_end_flush();
        // 连接数据库
        $this->db = @mysql_connect($this->host, $this->username, $this->password) or die('<p class="dbDebug"><span class="err">Mysql Connect Error : </span>' . mysql_error() . '</p>');
        // 选择使用哪个数据库
        mysql_select_db($this->database, $this->db) or die('<p class="dbDebug"><span class="err">Mysql Connect Error:</span>' . mysql_error() . '</p>');
        // 数据库编码方式
        mysql_query('SET NAMES ' . $this->charset, $this->db);

    }

    /*
     * 新增查询数据库表
     */
    function getTables()
    {
        $res = mysql_query("SHOW TABLES");
        $tables = array();
        while ($row = mysql_fetch_array($res)) {
            $tables [] = $row [0];
        }
        return $tables;
    }


    /**
     * 导入备份数据
     * 参数：文件路径(必填)
     * @param string $sqlfile
     */
    function restore($sqlfile)
    {
        // 检测文件是否存在
        if (!file_exists($sqlfile)) {
            //$this->_showMsg("sql文件不存在！请检查", true);
            //exit ();
            $result = [
                'status' => false,
                'code' => '5',  // 数据库文件不存在
                'message' => $sqlfile . "文件不存在，请检查！",
            ];
            exit(json_encode($result, JSON_UNESCAPED_UNICODE));
        }
        $this->lock($this->database);
        // 获取数据库存储位置
        $sqlpath = pathinfo($sqlfile);
        $this->sqldir = $sqlpath ['dirname'];
        // 检测是否包含分卷
        $volume = explode("_v", $sqlfile);
        $volume_path = $volume [0];
        if (empty ($volume [1])) {
            // 没有分卷
            if ($this->_import($sqlfile)) {

                $fp = fopen("../data/install.lock.php", "w");
                fputs($fp, 'www.hongyuvip.com');
                fclose($fp);

                //mysql_close($this->db);

                $result = [
                    'status' => true,
                    'code' => '0',  // 数据库导入成功
                    'message' => "数据库导入成功！",
                ];
                exit(json_encode($result, JSON_UNESCAPED_UNICODE));
            } else {
                $result = [
                    'status' => false,
                    'code' => '4',  // 数据库导入失败
                    'message' => "数据库导入失败！",
                ];
                exit(json_encode($result, JSON_UNESCAPED_UNICODE));
            }
        }
    }

    //  及时输出信息
    private function _showMsg($msg, $err = false)
    {
        $err = $err ? "<span class='err'>ERROR:</span>" : '';
        echo "<p class='dbDebug'>" . $err . $msg . "</p>";
        flush();

    }

    /**
     * 将sql导入到数据库（普通导入）
     * @param string $sqlfile
     * @return boolean
     */
    private function _import($sqlfile)
    {
        // sql文件包含的sql语句数组
        $sqls = array();
        $f = fopen($sqlfile, "rb");
        // 创建表缓冲变量
        $create_table = '';
        while (!feof($f)) {
            // 读取每一行sql
            $line = fgets($f);
            // 这一步为了将创建表合成完整的sql语句
            // 如果结尾没有包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)
            if (!preg_match('/;/', $line) || preg_match('/ENGINE=/', $line)) {
                // 将本次sql语句与创建表sql连接存起来
                $create_table .= $line;
                // 如果包含了创建表的最后一句
                if (preg_match('/ENGINE=/', $create_table)) {
                    //执行sql语句创建表
                    $this->_insert_into($create_table);
                    // 清空当前，准备下一个表的创建
                    $create_table = '';
                }
                // 跳过本次
                continue;
            }
            //执行sql语句
            $this->_insert_into($line);
        }
        fclose($f);
        return true;
    }

    //插入单条sql语句
    private function _insert_into($sql)
    {
        if (!mysql_query(trim($sql))) {
            $this->msg .= mysql_error();
            return false;
        }
    }

    /*
     * -------------------------------数据库导入end---------------------------------
     */

    // 关闭数据库连接
    private function close()
    {
        mysql_close($this->db);
    }

    // 锁定数据库，以免备份或导入时出错
    private function lock($tablename, $op = "WRITE")
    {
        if (mysql_query("lock tables " . $tablename . " " . $op))
            return true;
        else
            return false;
    }

    // 解锁
    private function unlock()
    {
        if (mysql_query("unlock tables"))
            return true;
        else
            return false;
    }

    // 析构
    function __destruct()
    {
        if ($this->db) {
            mysql_query("unlock tables", $this->db);
            mysql_close($this->db);
        }
    }

}
