<?php
/**
 * Created by PhpStorm.
 * User: wengshenshun
 * Date: 2015/11/1
 * Time: 14:37
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
    public function index(){
//        echo "user.index";
//        $this->redirect('edit','',2,'纯跳转');
//        $this->success('成功跳转',U('User/login'),3);
//        $this->error('出错了,出错了',U('User/login'),3);
//        $this->ajaxReturn(getTestData(),'json');
        $server=I('server.HTTP_HOST');
        dump($server);
    }
    public function edit(){
        echo "user.edit";
    }
    public function login(){
        $user=I('get.user'.null);

        if($user==='shenshun'){
            $this->success('你好沈顺',U('User/index'),3);
        }
        else{
            $this->error('你没有权限',U('User/index'),3);
        }
    }
}