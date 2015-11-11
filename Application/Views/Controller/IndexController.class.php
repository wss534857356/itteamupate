<?php
namespace Views\Controller;
header('Content-type : text/html; Charset=UTF-8');
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $userName = '沈顺';
        $email = '534857356@qq.com';
        $age = 18;
        $birthday_year = 1990;

        $user = array(
            'user' => $userName,
            'mail' => $email,
            'age' => $age
        );
        $this->assign('user', $user);
        $this->assign('birthday_year', $birthday_year);

        $this->assign('friends', get_user_friends());

//        $fetchContent=$this->fetch();
//        $fetchContent=str_replace('qq','shenshun',$fetchContent);
//
//        $this->show($fetchContent);
        /* $this->assign('user',$userName);
        $this->assign('mail',$email);
        $this->assign('age',$age);*/
        $this->display();
    }

    public function friends()
    {
        $this->assign('friends', get_user_friends());
        $this->display();
    }
}