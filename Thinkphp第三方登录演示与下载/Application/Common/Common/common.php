<?php

function getRefundState($fuhao) {
    if ($fuhao == 0) {
        $word = "<b class='red'>支出</b>";
    } else {
        $word = "<b class='green'>收入</b>";
    }
    return $word;
}

function get_extension($file) {
    $fileArr = explode("?", $file);
    $type = strtolower(substr(strrchr($fileArr[0], '.'), 1));
    return $type;
}

function getFilePrev($name) {
    $arr = explode(".", $name);
    return $arr[0];
}

function getModalsDemo($name, $id, $file = 'modals', $suffix = '') {
    
    return __APP__ . "/" . C("" . $file . "_file.demo") . getFileBei($id).$id . "/demo";
}

function getModalsDemoFile($id, $file = 'modals') {
    return C("" . $file . "_file.demo") . getFileBei($id).$id . "/";
}

function getModalsZipFile($id, $file = 'modals') {
    return C("" . $file . "_file.zip") . getFileBei($id).$id . "/";
}

function getModalsZip($name, $id, $file = 'modals') {
    return __APP__ . "/" . C("modals_file.zip") . getFileBei($id).$id . "/" . $name;
}

function getModalsLogo($id, $thumb = 'middle', $file = 'modals') {
    return __APP__ . "/" . C("" . $file . "_file.logo") .getFileBei($id). $id . "/" . $thumb . ".jpg";
}

function getPointsState($type) {
    if ($type == 0) {
        $word = "<span style='color:#333'>待审核</span>";
    } elseif ($type == 5) {
        $word = "<span style='color:#FF6600'>已完成</span>";
    } elseif ($type == 1) {
        $word = "<span style='color:red'>已审核</span>";
    } else {
        $word = "<span style='color:#FF0000'>审核失败</span>";
    }
    return $word;
}

function addPoints($mtype, $money, $uid, $title, $status, $fuhao) {
    $data['addtime'] = time();
    $data['uid'] = $uid ? $uid : session("userid");
    $data['mtype'] = $mtype;
    $data['money'] = $money;
    $data['title'] = $title;
    $data['status'] = $status ? $status : 0;
    $data['fuhao'] = $fuhao ? $fuhao : 0;
    $lastid = M("points")->add($data);
    if ($lastid > 0) {
        if ($fuhao == 1) {
            M('user')->where("id=" . $data['uid'] . "")->setInc('money', $data['money']); //setInc加
        } else {
            M('user')->where("id=" . $data['uid'] . "")->setDec('money', $data['money']); //setInc加
        }
    }
    return $lastid;
}

//公共函数
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
    if (function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif (function_exists('iconv_substr')) {
        $slice = iconv_substr($str, $start, $length, $charset);
        if (false === $slice) {
            $slice = '';
        }
    } else {
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
    }
    $fix = '';
    if (strlen($slice) < strlen($str)) {
        $fix = '...';
    }
    return $suffix ? $slice . $fix : $slice;
}

function getUserAvatar($id) {
    $logo_default = __APP__ . "/Public/images/avatar.jpg";
    $logo_rs = '';
    if ($id) {
        $logo = C("files.avatar") . $id . ".jpg";
        $arr = array("jpg","png","gif","jpeg");
        foreach($arr as $v){
             $logo = C("files.avatar") . $id . ".".$v;
            if(file_exists($logo)){
                $logo_rs = __APP__ . "/" . $logo;
                break;
            }
        }
        if($logo_rs == ''){
            $logo_rs = $logo_default;
        }
    } else {
        $logo_rs = $logo_default;
    }
    return $logo_rs;
}

function threeLogin() {
    $arr = array(
        0 => array(
            "code" => "qq",
            "logo" => "qq"
        ),
        1 => array(
            "code" => "renren",
            "logo" => "qq"
        ),
        2 => array(
            "code" => "sina",
            "logo" => "qq"
        ),
    );
    return $arr;
}

function getChecked($ids, $id) {
    if (!empty($ids)) {
        $ids = explode(",", $ids);
        if (in_array($id, $ids)) {
            return "checked";
        }
    }
}

function getSingleField($id, $table, $field, $word) {
    $info = M($table)->field($field)->where("id = " . $id . "")->find();
    if ($info[$field] != '') {
        return $info[$field];
    } else {
        return $word;
    }
}

function getEqual($a, $b, $rs, $fuhao = 'eq') {
    if ($fuhao > 0) {
        if ($a % $fuhao == $b) {
            return $rs;
        }
    } else {
        if ($fuhao == 'eq') {
            if ($a == $b) {
                return $rs;
            }
        } elseif ($fuhao == 'gt') {
            if ($a > $b) {
                return $rs;
            }
        } elseif ($fuhao == 'in') {
            $arr = explode(",", $b);
            if (in_array($a, $arr)) {
                return $rs;
            }
        }
    }
}

function getStar($star) {
    $span = "<span class='c-value-no c-value-4d" . intval($star) . "'><em></em></span>";
    return $span;
}

function getThreeField($three, $big, $small) {
    $detail = json_decode($three[$big], true);
    return $detail[$small];
}

function getTableFile($table) {
    $commonTable = array("accounts", "friends");
    $ordTable = array("dictionary", "modals_tags");
    if (in_array($table, $commonTable)) {
        $ord = "ord ASC";
        $where = "is_check=1";
    } elseif (in_array($table, $ordTable)) {
        $ord = "ord ASC,id DESC";
    }
    $lists = F('' . $table . '/data');
    if (empty($lists)) {
        $lists = M($table)->where($where)->order($ord)->select();

        F('' . $table . '/data', $lists);
    }
    return $lists;
}

function getTableConfig() {
    $config = F('config/data');
    if (empty($config)) {
        $config = M("config")->where("id = 1")->find();
        F('config/data', $config);
    }
    return $config;
}

function getTempalteState($state, $name_short, $reason) {
    if ($state == 1) {
        $word = "<b class='green'>审核通过 <a href='" . __APP__ . "/website/" . $name_short . "'></a></b>";
    } else if ($state == 2) {
        $word = "<b class='red'>采集成功 <a href='" . __APP__ . "/website/" . $name_short . "'></a></b>";
    } else if ($state == -1) {
        $word = "<b style='color:#666'>审核未通过：" . $reason . "</b>";
    } else {
        $word = "<b style='color:#ccc'>待审核</b>";
    }
    return $word;
}

function getGb2312($file) {
    return iconv('UTF-8', 'GB2312', $file);
}

function getUtf8($file) {
    return iconv('GB2312', 'UTF-8', $file);
}
function getFileBei($id){
    return intval($id/100)."/";
}
function getJqueryDemo($id) {
    
    return __APP__ . "/" . C("js_file.demo") . getFileBei($id).$id;
}

function getJqueryDemoImages($id,$type='big') {
        $img = "/jquery/logo/" . getFileBei($id).$id . "/".$type.".jpg";
    return __APP__ . $img;
}

function getTableInfo($mtype, $field = 'table') {
    switch ($mtype) {
        case "1":
            $table = 'modals';
            break;
        case "2":
            $table = 'js';
            break;
        case "3":
            $table = 'sites';
            break;
        case "4":
            $table = 'psd';
            break;
        case "12":
            $table = 'tools';
            break;
        case "21":
            $table = 'answer';
            break;
    }
    $arr = array("table" => $table);
    return $arr[$field];
}

function getFileInfo($mtype) {
    switch ($mtype) {
        case "1":
            $table = 'modals';
            break;
        case "2":
            $table = 'jquery';
            break;
        case "3":
            $table = 'sites';
            break;
        case "4":
            $table = 'psds';
            break;
        case "5":
            $table = 'answers';
            break;
    }
    return $table;
}

function getUrlJson($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回  
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true); // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
    return $output = curl_exec($ch);
}

function getHighlight($keywords, $keyword) {
    if ($keyword) {
        $keywords = preg_replace("/($keyword)/i", "<b style=\"color:red\">\\1</b>", $keywords);
    }
    return $keywords;
}

function getTan($id) {
    if ($id > 0) {
        $comment = M("comment")->field("uid")->where("id = " . $id . "")->find();
        return "回复 ".getUidUrl($comment['uid'])."";
    }
}
function getUidUrl($uid){
    return "<a class='blue'  target='_blank' href='" . __APP__ . "/space/uid/" . $uid . "' >" . getUserName($uid) . "</a> ";
}
?>
