<?php
namespace ItTeam\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $course = $this->getCourse();
        if (!empty($_SESSION[C('USER_AUTH_KEY')])) {
            $name = I('session.username');
            $course = $this->pushChoose($course, I('session.studentId'));
            $enrollNum = I('session.enrollnum');
        } else {
            $course = $this->pushChoose($course, 0);
            $name = '';
            $enrollNum = 0;
        }
        $this->assign("username", $name);
        $this->assign("enrollnum", $enrollNum);
        $this->assign("course", $course);
        $this->display();
    }

    public function table()
    {
        $course = $this->getCourse();
        $elective = $this->getElective();
        if (!empty($_SESSION[C('USER_AUTH_KEY')])) {
            $name = I('session.username');
            $course = $this->pushChoose($course, I('session.studentId'));
            $enrollNum = I('session.enrollnum');
        } else {
            $course = $this->pushChoose($course, 0);
            $name = '';
            $enrollNum = 0;
        }
        $this->assign('elective', $elective);
        $this->assign("username", $name);
        $this->assign("enrollnum", $enrollNum);
        $this->display();
    }

    private function getElective()
    {
        $array = D('Course')->where('type=1')->order('courseDate desc')->select();
        $array = $this->pushElectiveArray($array);
        return $array;
    }

    private function pushElectiveArray($arr)
    {
        $i = 0;
        foreach ($arr as $key => $values) {
            $array = array('courseId' => $arr[$key]['courseid']);
                $arrT = D('Student')->field('studentId')->where($array)->select();
            foreach ($arrT as $keyT => $valuesT) {
                $userName = D('User')->where(array('studentId' => $arrT[$keyT]['studentid']))->getField('userName');
                $arrT[$keyT]['username'] = $userName;
            }
            $arr[$key]['electivearray'] = $arrT;
    }
        return $arr;
    }

    private function getCourse()
    {
        $array = D('Course')->order('courseDate desc')->select();
        $array = pushCourseArray($array);
        return $array;
    }

    private function pushChoose($arr, $studentId)
    {
        foreach ($arr as $key => $values) {
            $arr[$key]['choose'] = checkEnroll($values['courseid'], $studentId);
        }
        return $arr;
    }

    public function createEnroll()
    {
        $courseId = I('post.courseid');
        $this->checkLogin();
        $studentId = $_SESSION['studentId'];
        if (checkEnroll($courseId, $studentId) == 0) {
            if (getEnrollNum($studentId) < 2) {
                $Enroll = array(
                    'studentId' => $studentId,
                    'courseId' => $courseId,
                );
                D('Student')->add($Enroll);
                $_SESSION['enrollnum'] = getEnrollNum($studentId);
                $this->redirect('Index/index');
            } else
                $this->error('选课数量不能多于两项');
        } else
            $this->error('不要重复选择');
    }

    public function deleteEnroll()
    {
        $courseId = I('post.courseid');
        $studentId = $_SESSION['studentId'];
        if (checkEnroll($courseId, $studentId) == 1) {
            $Enroll = array(
                'studentId' => $studentId,
                'courseId' => $courseId,
            );
            D('Student')->where($Enroll)->delete();
            $_SESSION['enrollnum'] = getEnrollNum($studentId);
            $this->redirect('Index/index');
        } else
            $this->error('还未选择课程');
    }

    private function checkLogin()
    {
        if (!isset($_SESSION['username'])) {
            $this->error('还未登入！', '../User/login');
        }
    }

    public function _empty()
    {
        //未找到时重定向至首页
        $this->redirect('Index/index');
    }
}