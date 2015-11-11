<?php
namespace Models\Controller;

use Think\Controller;
use Think\Model;

class IndexController extends Controller
{
    public function index()
    {
//        $this->createUser();
//        $this->updateUserStatus(1);
//        $this->deleteUser(2);
//        $this->listUsers();

        $userModel = D('User');

        $condition=array(
            'username'=>'沈顺',
            'status'=>1,
        );

        $result=$userModel
            ->where($condition)
            ->order('create_time desc')
            ->page(6,10)
            ->fetchSql(true)
            ->select();

        echo($userModel->getLastSql());

        echo '<hr />';
        echo $result;
    }

    private function lesson_1()
    {

        /*//new
        $user_model = new \Models\Model\UserModel();

        //M
        $user_m_model = M('User');

        //D
        $user_d_model = D('User');

        //空模型
        $empty_model = new \Think\Model();
        $empty_m_model = M();
        $empty_d_model = D();*/
    }

    //新增用户
    private function createUser()
    {
        $userAttribute = array(
            'username' => 'Tom',
            'password' => md5('111'),
            'email' => 'tom@qq.com',
            'create_time' => time(),
            'status' => 1,
        );
        D('User')->add($userAttribute);
    }

    //查询用户
    private function listUsers()
    {
        dump(D('user')->select());
    }

    //变更用户状态
    private function updateUserStatus($userId)
    {
        $userUpdateAttribute = array(
            'id' => $userId,
            'status' => 0,
        );
        D('User')->save($userUpdateAttribute);
    }

    //删除用户
    private function deleteUser($userId)
    {
        D('User')->delete($userId);

    }

    //读取单条数据
    private function showUser($userId)
    {
        dump(D('User')->find($userId));
    }
}