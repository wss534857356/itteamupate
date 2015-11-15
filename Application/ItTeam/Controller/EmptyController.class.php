<?php
/**
 * Created by PhpStorm.
 * User: wengshenshun
 * Date: 2015/10/31
 * Time: 12:26
 */
namespace ItTeam\Controller;

use Think\Controller;

class EmptyController extends Controller
{
    public function index()
    {
        //未找到时重定向至首页
        //$this->redirect('Index/index');
    }
    public function _empty(){
        //未找到时重定向至首页
        //$this->redirect('Index/index');
    }
}