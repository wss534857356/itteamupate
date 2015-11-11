<?php
/**
 * Created by PhpStorm.
 * User: wengshenshun
 * Date: 2015/11/1
 * Time: 16:17
 */
function getTestData(){
    $data = array();
    for($i=0;$i<10;$i++){
        $data[$i]['name'] = 'user-'.$i;
        $data[$i]['age'] = rand(18,90);
    }
    return $data;
}