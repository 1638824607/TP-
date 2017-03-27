<?php

$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') { //本地配置
    $DB_USER = 'root';
    $DB_PWD = '';
    $SITE_URL = "http://localhost/sucai/";
} else { //服务器配置
    $DB_USER = '';
    $DB_PWD = '';
    $SITE_URL = "http://www.erdangjiade.com/";
    $version = "";
}
$arr = array(
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'sdk',
    'DB_USER' => $DB_USER,
    'DB_PWD' => $DB_PWD,
    'DB_PORT' => 3306,
    'DB_PREFIX' => 'sucai_',
    'DB_CHARSET' => 'utf8',
    'MODULE_ALLOW_LIST' => array(
        'Home',
    ),
    'URL_MODEL' => 2,
    'LOAD_EXT_FILE' => 'common',
    'SHOW_PAGE_TRACE' => false,
   
);
return $arr;
