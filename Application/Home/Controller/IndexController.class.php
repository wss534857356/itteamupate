<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->listActionUrl();
    }
    public function listActionUrl(){
        echo "当前URL模式为：".C('URL_MODEL');
        echo "<hr/>";

        echo "User控制器index操作方法的URL为：<a href=\"".U('Home/User/index')."\">".U('Home/User/index').'</a>';
        echo "<hr/>";

        echo "User控制器edit操作方法的URL为：<a href=\"".U('Home/User/edit')."\">".U('Home/User/edit').'</a>';
        echo "<hr/>";

        echo "User控制器Login操作方法的URL为：<a href=\"".U('Home/User/login')."\">".U('Home/User/login').'</a>';
        echo "<hr/>";
    }
}