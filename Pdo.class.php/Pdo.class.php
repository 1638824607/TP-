<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: hainuo<admin@hainuo.info> liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// | change  mysql to mysqli  解决php7没有mysql扩展时数据库存放session无法操作的问题
// +----------------------------------------------------------------------
namespace Think\Session\Driver;
/**
 * 数据库方式Session驱动
 *    CREATE TABLE think_session (
 *      session_id varchar(255) NOT NULL,
 *      session_expire int(11) NOT NULL,
 *      session_data blob,
 *      UNIQUE KEY `session_id` (`session_id`)
 *    );
 */

class Pdo
{

    /**
     * Session有效时间
     */
    protected $lifeTime = '';

    /**
     * session保存的数据库名
     */
    protected $sessionTable = '';

    /**
     * 数据库句柄
     */
    protected $hander = array();

    /**
     * 打开Session
     * @access public
     * @param string $savePath
     * @param mixed $sessName
     */
    public function open($savePath, $sessName)
    {
        $this->lifeTime = C('SESSION_EXPIRE') ? C('SESSION_EXPIRE') : ini_get('session.gc_maxlifetime');
        $this->sessionTable = C('SESSION_TABLE') ? C('SESSION_TABLE') : C("DB_PREFIX") . "session";
        //分布式数据库
        $host = explode(',', C('DB_HOST'));
        $port = explode(',', C('DB_PORT'));
        $name = explode(',', C('DB_NAME'));
        $user = explode(',', C('DB_USER'));
        $pwd = explode(',', C('DB_PWD'));
        if (1 == C('DB_DEPLOY_TYPE')) {
            //读写分离
            if (C('DB_RW_SEPARATE')) {
                $w = floor(mt_rand(0, C('DB_MASTER_NUM') - 1));
                if (is_numeric(C('DB_SLAVE_NO'))) {//指定服务器读
                    $r = C('DB_SLAVE_NO');
                } else {
                    $r = floor(mt_rand(C('DB_MASTER_NUM'), count($host) - 1));
                }
                // 主数据库链接
                $db_host = $host[$w];
                $db_port = (isset($port[$w]) ? $port[$w] : $port[0]);
                $db_name = isset($name[$w]) ? $name[$w] : $name[0];
                $db_user = isset($user[$w]) ? $user[$w] : $user[0];
                $db_pwd = isset($pwd[$w]) ? $pwd[$w] : $pwd[0];
                $dsn = "mysql:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8mb4";
                $hander = new \PDO($dsn,$db_user,$db_pwd,[\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8MB4\'']);
                $this->hander[0]= $hander;
                //从数据库链接
                $db_host = $host[$r];
                $db_port = (isset($port[$r]) ? $port[$r] : $port[0]);
                $db_name = isset($name[$r]) ? $name[$r] : $name[0];
                $db_user = isset($user[$r]) ? $user[$r] : $user[0];
                $db_pwd = isset($pwd[$r]) ? $pwd[$r] : $pwd[0];
                $dsn = "mysql:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8mb4";
                $hander = new \PDO($dsn,$db_user,$db_pwd,[\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8MB4\'']);
                $this->hander[1]= $hander;
                return true;
            }
        }
        //从数据库链接
        $r = floor(mt_rand(0, count($host) - 1));
        //从数据库链接
        $db_host = $host[$r];
        $db_port = (isset($port[$r]) ? $port[$r] : $port[0]);
        $db_name = isset($name[$r]) ? $name[$r] : $name[0];
        $db_user = isset($user[$r]) ? $user[$r] : $user[0];
        $db_pwd = isset($pwd[$r]) ? $pwd[$r] : $pwd[0];
        $dsn = "mysql:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8mb4";
        $hander = new \PDO($dsn,$db_user,$db_pwd,[\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8MB4\'']);
        if (!$hander)
            return false;
        $this->hander = $hander;
        return true;
    }

    /**
     * 关闭Session
     * @access public
     */
    public function close()
    {
        if (is_array($this->hander)) {
            $this->gc($this->lifeTime);
            return $this->hander = null;
        }
        $this->gc($this->lifeTime);
        return $this->hander = null;
    }

    /**
     * 读取Session
     * @access public
     * @param string $sessID
     */
    public function read($sessID)
    {
        $hander = is_array($this->hander) ? $this->hander[1] : $this->hander;
        $res = $hander->query("SELECT session_data AS data FROM " . $this->sessionTable . " WHERE session_id = '$sessID'   AND session_expire >" . time(), \PDO::FETCH_ASSOC);
        if($res = $res->fetch()){
            return $res['data'];
        }
        return "";
    }

    /**
     * 写入Session
     * @access public
     * @param string $sessID
     * @param String $sessData
     */
    public function write($sessID, $sessData)
    {
        $hander = is_array($this->hander) ? $this->hander[0] : $this->hander;
        $expire = time() + $this->lifeTime;
        $count = $hander->exec("REPLACE INTO  " . $this->sessionTable . " (  session_id, session_expire, session_data)  VALUES( '$sessID', '$expire',  '$sessData')");
        if ($count)
            return true;
        return false;
    }

    /**
     * 删除Session
     * @access public
     * @param string $sessID
     */
    public function destroy($sessID)
    {
        $hander = is_array($this->hander) ? $this->hander[0] : $this->hander;
        $count = $hander->exec("DELETE FROM " . $this->sessionTable . " WHERE session_id = '$sessID'");
        if ($count)
            return true;
        return false;
    }

    /**
     * Session 垃圾回收
     * @access public
     * @param string $sessMaxLifeTime
     */
    public function gc($sessMaxLifeTime)
    {
        $hander = is_array($this->hander) ? $this->hander[0] : $this->hander;
        $count = $hander->exec("DELETE FROM " . $this->sessionTable . " WHERE session_expire < " . time());
        return $count;
    }

}
