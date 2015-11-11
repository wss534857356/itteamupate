<?php
function getWeek($date)
{
    $date = str_replace('/', '-', $date);
    $dateArr = explode("-", $date);
    switch (date("N", mktime(0, 0, 0, $dateArr[1], $dateArr[2], $dateArr[0]))) {
        case 1:
            $week = "一";
            break;
        case 2:
            $week = "二";
            break;
        case 3:
            $week = "三";
            break;
        case 4:
            $week = "四";
            break;
        case 5:
            $week = "五";
            break;
        case 6:
            $week = "六";
            break;
        case 7:
            $week = "日";
            break;
        default:
            $week = "一";
            break;
    }
    return $week;
}

function getProgressBar($Data, $DataMax)
{
    return $Data / $DataMax * 100;
}

function getFollowNum($courseid)
{
    $num = D('Student')
        ->where(
            array(
                'courseId' => $courseid,
            )
        )
        ->count();
    return $num;
}

function pushCourseArray($arr)
{
    foreach ($arr as $key => $values) {
        $arr[$key]['week'] = getWeek($values['courseDate']);
        $arr[$key]['coursecountnum'] = getFollowNum($values['courseid']);
        $arr[$key]['progressbar'] = getProgressBar($arr[$key]['coursecountnum'], $values['coursemaxnum']);
    }
    return $arr;
}
function getEnrollNum($studentId){
    $arr=array(
        'studentId'=>$studentId,
    );
    $EnrollNum=D('Student')->where($arr)->count();
    return $EnrollNum;
}
function checkEnroll($courseId,$studentId){
    $checkEnroll=D('Student')
        ->where(
            array(
                'courseId'=>$courseId,
                'studentId'=>$studentId,
            )
        )
        ->count();
    return $checkEnroll;
}