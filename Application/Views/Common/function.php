<?php
/**
 * Created by PhpStorm.
 * User: wengshenshun
 * Date: 2015/11/2
 * Time: 20:21
 */
function getAge($year)
{
    $now = date('Y');
    if ($year > $now) {
        return "数据错误";
    }
    return $now - $year;
}

function get_user_friends()
{
    $friends = array(
        array(
            'username' => "沈顺",
            'avatar' => null,
            'age' => 18,
            'tags' => array('游泳', '羽毛球', '程序员')
        ),
        array(
            'username' => '颜正浩',
            'avatar' => '1.jpg',
            'age' => 19,
            'tags' => array('看电影', '约会', '程序员')
        ),
        array(
            'username' => '朱佳杰',
            'avatar' => '2.jpg',
            'age' => 19,
            'tags' => array('逛街', '土豪', '土豪女朋友')
        )
    );
    return $friends;
}

function arrayEncode(array $arr,$in_charset='GB2312',$out_charset='UTF-8'){
    return eval('return ' . iconv($in_charset, $out_charset, var_export($arr, 1)) . ';');
}