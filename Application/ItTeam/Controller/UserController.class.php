<?php
namespace ItTeam\Controller;

use Think\Controller;

class UserController extends Controller
{
// 用户登录页面
    public function login()
    {
        if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    // 用户登出
    public function logout()
    {
        if (isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION);
            session_destroy();
            $this->redirect('Index/index');
        } else {
            $this->error('已经登出！');
        }
    }

    public function checkLogin()
    {
        if (empty(I('post.username'))) {
            $this->error('请输入用户名');
        } else if (empty(I('post.password'))) {
            $this->error('请输入密码');
        }
        //生成认证条件
        $map = array(
        );
        // 支持使用绑定帐号登录
        $map['userName'] = I('post.username');
        $map['password'] = MD5(I('post.password'));
        $map["type"] = array('gt', 0);
        $authInfo = D('User')->where($map)->find();
        //使用用户名、密码和状态的方式进行认证
        if (empty($authInfo)) {
            $this->error('用户名或密码错误！');
        }
        if ($authInfo['password'] != md5(I('post.password'))) {
            $this->error('密码错误！');
        }
        $_SESSION[C('USER_AUTH_KEY')] = $authInfo['username'];
        $_SESSION['username'] = $authInfo['username'];
        $_SESSION['studentId'] = $authInfo['studentid'];
        $_SESSION['status'] = $authInfo['status'];
        $_SESSION['type'] = $authInfo['type'];
        $_SESSION['enrollnum']=getEnrollNum($authInfo['studentid']);
        if ($authInfo['type'] == 2) {
            $_SESSION['administrator'] = true;
        }
        //保存登录信息
        $User = M('User');
        $ip = get_client_ip();
        $time = time();
        $data = array();
        $data['username'] = $authInfo['username'];
        $data['last_login_time'] = $time;
        $data['login_count'] = array('exp', 'login_count+1');
        $data['last_login_ip'] = $ip;
        $User->save($data);
        // 缓存访问权限
        $this->redirect('Index/index');
    }

    private function createUser($username, $password)
    {
        $userAdd = array(
            'studentId' => $password,
            'userName' => $username,
            'password' => md5($password),
            'status' => 1,
            'type' => 1,
        );
        D('User')->add($userAdd);
        $authInfo = D('User')->where($userAdd)->find();
        return $authInfo;
    }
    public function _empty(){
        //未找到时重定向至首页
        $this->redirect('Index/index');
    }
}