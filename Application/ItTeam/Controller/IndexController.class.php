<?php
namespace ItTeam\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        if (I('session.type') == 2) {
            $this->redirect('Index/admin');
        } else
            $this->redirect('Index/student');
    }

    public function admin()
    {

    }

    public function student()
    {
        $obligatory = $this->getCourse(1);
        $compulsory = $this->getCourse(2);
        $name = I('session.username');
        $this->assign("username", $name);
        $this->assign("obligatory", $obligatory);
        $this->assign("compulsory", $compulsory);
        $this->display();
    }

    public function table()
    {
        $elective = $this->getElective();
        $name = I('session.username');
        $this->assign('elective', $elective);
        $this->assign("username", $name);
        $this->display();
    }

    private function getElective()
    {
        $array = D('Course')->where('type=1')->select();
        $array = $this->pushElectiveArray($array);
        return $array;
    }

    private function pushChooseTableArray($arr)
    {
        foreach ($arr as $key => $values) {
            $arrK = D('Choose')->where(
                array(
                    'chooseId' => $arr[$key]['chooseid']
                )
            )->find();
            $arrK['week'] = getWeek($arrK['choosedate']);
            $arrK['choosenum'] = getFollowNum($arrK['chooseid']);
            $arrK['progressbar'] = getProgressBar($arrK['choosenum'], $arrK['choosemaxnum']);
            $arr[$key] = $arrK;
            $arrT = D('Student')->field('studentId')->where('chooseId =' . $arr[$key]['chooseid'])->select();
            foreach ($arrT as $keyT => $valuesT) {
                $userName = D('User')->where(array('studentId' => $arrT[$keyT]['studentid']))->getField('userName');
                $arrT[$keyT]['username'] = $userName;
            }
            $arr[$key]['electivearray'] = $arrT;
        }
        return $arr;
    }

    private function pushElectiveArray($arr)
    {
        foreach ($arr as $key => $values) {
            //$array = array('courseId' => $values['courseid']);
            $arrT = D('Choose')->field('chooseId')->where('courseId =' . $values['courseid'])->select();
            $arrT = $this->pushChooseTableArray($arrT);
            $arr[$key]['choose'] = $arrT;
        }
        return $arr;
    }

    private
    function getCourse($type)
    {
        $array = D('Course')->where(array('type' => $type))->select();
        $array = $this->pushCourseArray($array);
        return $array;
    }

    public
    function createEnroll()
    {
        $chooseId = I('post.chooseid');
        //echo $chooseId;
        $this->checkLogin();
        $studentId = $_SESSION['studentId'];
        if ($this->checkEnroll($chooseId, $studentId) == 0) {
            if (getEnrollNum($studentId) < 2) {
                $Enroll["studentId"] = $studentId;
                $Enroll["chooseId"] = $chooseId;
                $m = D();
                $sql = "INSERT into itteam_student (studentId,chooseId) VALUES ('" . $studentId . "','" . $chooseId . "')";
                $m->execute($sql);
                $_SESSION['enrollnum'] = getEnrollNum($studentId);
                $this->redirect('Index/index');
            } else $this->error('选课数量不能多于两项');
        } else $this->error('不要重复选择');
    }

    function deleteEnrol($studentId, $chooseId)
    {

    }

    public
    function deleteEnroll()
    {
        $chooseId = I('post.chooseid');
        $studentId = $_SESSION['studentId'];
        if ($this->checkEnroll($chooseId, $studentId) == 1) {
            $Enroll = array(
                'studentId' => $studentId,
                'chooseId' => $chooseId,
            );
            D('Student')->where('studentId ='.$studentId.' AND chooseId ='.$chooseId)->delete();
            $_SESSION['enrollnum'] = getEnrollNum($studentId);
            $this->redirect('Index/index');
        } else
            $this->error('还未选择课程');
    }

    private
    function checkLogin()
    {
        if (!isset($_SESSION['username'])) {
            $this->redirect('User/login');
        }
    }

    private
    function getCourseChooseArray($courseId)
    {
        $array = D('Choose')->where(
            array(
                'courseId' => $courseId
            )
        )->select();
        foreach ($array as $key => $values) {
            $array[$key]['week'] = getWeek($values['choosedate']);
            $array[$key]['choosenum'] = getFollowNum($values['chooseid']);
            $array[$key]['progressbar'] = getProgressBar($array[$key]['choosenum'], $values['choosemaxnum']);
            if (!empty(I('session.studentId')))
                $array[$key]['ifchoose'] = $this->checkEnroll($values['chooseid'], I('session.studentId'));
            if ($array[$key]['ifchoose'] != 1 && $array[$key]['progressbar'] >= 100)
                $array[$key]['ifchoose'] = 3;
            $time = $values['choosedate'] . ' ' . $values['choosestarttime'];
            $result = strtotime(date("Y-m-d H:i:s")) - strtotime($time);
            if ($result > 0)
                $array[$key]['ifchoose'] = 5;
        }
        return $array;
    }

    private
    function checkEnroll($chooseId, $studentId)
    {
        $checkEnroll = D('Student')
            ->where('chooseId =' . $chooseId . ' AND studentId =' . $studentId)
            ->count();

        if ($checkEnroll == 0) {
            $parentId = D('Choose')
                ->field('courseId')
                ->where(
                    array(
                        'chooseId' => $chooseId
                    )
                )
                ->select();
            $son = D('Choose')
                ->field('chooseId')
                ->where($parentId)
                ->select();
            $isRepeat = 0;
            foreach ($son as $key => $value) {
                //$sonAll['chooseId'] = $value['chooseid'];$sonAll['studentId'] = $studentId;
                $isRepeat += D('Student')
                    ->where(
                        'chooseId =' . $value['chooseid'] . ' AND studentId =' . $studentId
                    )
                    ->count();
            }
            if (getEnrollNum($studentId) >= 2)
                $checkEnroll = 2;
            if ($isRepeat > 0)
                $checkEnroll = 4;
        }
        return $checkEnroll;
    }

    private
    function pushCourseArray($arr)
    {
        foreach ($arr as $key => $values) {
            $arr[$key]['choose'] = $this->getCourseChooseArray($values['courseid']);
        }
        return $arr;
    }

    public
    function _empty()
    {
        //未找到时重定向至首页
        $this->redirect('Index/index');
    }

}