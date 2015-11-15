<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
<head>
    <title>登入测试</title>
<meta charset="UTF-8">
<meta name=description content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--&lt;!&ndash; Bootstrap CSS &ndash;&gt;-->
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
<!--css-->
<link rel="stylesheet" type="text/css" href="/itteam/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/itteam/Public/css/font.css" />

    <link rel="shortcut icon" href="/itteam/Public/img/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">IT工作室选课系统</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">主页</a></li>
            <!--<li><a href="#">Link</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <?php if($username == null): ?><a href="login.html">游客</a>
                    <?php else: ?>
                    <a><?php echo ($username); ?>,你好</a><?php endif; ?>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">设置<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php if($username == null): ?><li><a href="<?php echo U('User/login');?>">登入</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo U('User/logout');?>">注销用户</a></li><?php endif; ?>
                </ul>
            </li>
        </ul>
        <!--<form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">主题<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('index',array('t'=>'default'));?>">默认主题</a></li>
                    <li><a href="<?php echo U('index',array('t'=>'newtheme'));?>">新主题</a></li>
                </ul>
            </li>
        </ul>-->
    </div>
    <!-- /.navbar-collapse -->
</nav>
<div class="container">
    <div class="col-md-2 list-group">
        <a class="list-group-item" href="<?php echo U('index');?>">课程内容</a>
        <a class="list-group-item" href="<?php echo U('table');?>">报名汇总</a>
    </div>
    <div class="col-md-10">
        
<link rel="stylesheet" type="text/css" href="/itteam/Public/css/supplement.css" />
<div class="panel panel-default">
    <div class="panel-heading">
        <a class="panel-title menu" data-toggle="collapse" data-parent="#accordion2" href="#compulsory">
            <span class="pull-right min_font">收起菜单</span>
        </a>

        <h3 class="panel-title title">必修课程</h3>
    </div>
    <div id="compulsory" class="accordion-body collapse in">
        <div class="accordion-inner">
            <ul class="list-group media-list">
                <!--volist循环-->
                <?php if(is_array($compulsory)): $i = 0; $__LIST__ = $compulsory;if( count($__LIST__)==0 ) : echo "暂无课程" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i; if($course['status'] == 1 ): ?><li class="list-group-item media">
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <p>
                                        <strong class="coursename"><?php echo ($course['coursename']); ?></strong>
                                        <a class="btn  disabled">导师-<?php echo ($course['courseteacher']); ?></a>
                                    </p>

                                    <p>课程介绍:<?php echo ($course['coursetext']); ?></p>
                                    <?php if(is_array($course["choose"])): $i = 0; $__LIST__ = $course["choose"];if( count($__LIST__)==0 ) : echo "暂无相关时间安排" ;else: foreach($__LIST__ as $key=>$choose): $mod = ($i % 2 );++$i;?><hr/>
                                        <p>时间:<?php echo ($choose['choosedate']); ?> 周<?php echo ($choose['week']); ?></p>

                                        <p>备注信息:<?php echo ($choose['choosetext']); ?></p>

                                        <p>
                                            开始时间:<?php echo ($choose['choosestarttime']); ?>-
                                            结束时间:<?php echo ($choose['chooseendtime']); ?>
                                        </p><?php endforeach; endif; else: echo "暂无课程" ;endif; ?>
                                </h4>
                            </div>
                        </li><?php endif; endforeach; endif; else: echo "暂无相关时间安排" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">选课列表</h3>
    </div>
    <ul class="list-group media-list">
        <!--volist循环-->
        <?php if(is_array($obligatory)): $i = 0; $__LIST__ = $obligatory;if( count($__LIST__)==0 ) : echo "暂无相关时间安排" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i; if($course['status'] == 1 ): ?><li class="list-group-item media">
                    <div class="media-body">
                        <h4 class="media-heading">
                            <p>
                                <strong class="coursename"><?php echo ($course['coursename']); ?></strong>
                                <a class="btn  disabled">导师-<?php echo ($course['courseteacher']); ?></a>
                            </p>
                            <!--if else-->
                            <!--如果人数大于最大人数，则输出课程人满-->
                            <p>课程介绍:<?php echo ($course['coursetext']); ?></p>

                            <?php if(is_array($course["choose"])): $i = 0; $__LIST__ = $course["choose"];if( count($__LIST__)==0 ) : echo "暂无相关时间安排" ;else: foreach($__LIST__ as $key=>$choose): $mod = ($i % 2 );++$i;?><hr/>
                                <?php switch($choose["ifchoose"]): case "1": ?><form action="<?php echo U('Index/deleteEnroll');?>" method="post">
                                            <input name="chooseid" class="sr-only" type="text"
                                                   value="<?php echo ($choose['chooseid']); ?>"/>
                                            <button type="submit" class="pull-right btn btn-danger">取消报名</button>
                                        </form><?php break;?>
                                    <?php case "2": ?><button type="submit"
                                                class="pull-right btn disabled">全报好啦</button><?php break;?>
                                    <?php case "3": ?><button type="submit"
                                                class="pull-right btn btn-success disabled">人数已满</button><?php break;?>
                                    <?php case "4": ?><button type="submit"
                                                class="pull-right btn btn-warning disabled">重复项目</button><?php break;?>
                                    <?php case "5": ?><button type="submit"
                                                class="pull-right btn disabled">项目过时</button><?php break;?>
                                    <?php default: ?>
                                    <form action="<?php echo U('Index/createEnroll');?>" method="post">
                                        <input name="chooseid" class="sr-only" type="text"
                                               value="<?php echo ($choose['chooseid']); ?>"/>
                                        <button type="submit"
                                                class="pull-right btn btn-success">点击报名</button>
                                    </form>
                                    <a class="pull-right btn disabled">报名时间截至周五</a><?php endswitch;?>
                                <p>时间:<?php echo ($choose['choosedate']); ?> 周<?php echo ($choose['week']); ?></p>
                                <p>备注信息:<?php echo ($choose['choosetext']); ?></p>
                                <p>
                                    开始时间:<?php echo ($choose['choosestarttime']); ?>-
                                    结束时间:<?php echo ($choose['chooseendtime']); ?>
                                </p>
                                <?php if($choose['type'] == 1): if($choose['progressbar'] < 100): ?><div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                 aria-valuenow="<?php echo ($choose['progressbar']); ?>"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                <span><?php echo ($choose['choosenum']); ?>/<?php echo ($choose['choosemaxnum']); ?></span>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="<?php echo ($choose['progressbar']); ?>"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                                <span><?php echo ($choose['choosenum']); ?>/<?php echo ($choose['choosemaxnum']); ?></span>
                                            </div>
                                        </div><?php endif; endif; endforeach; endif; else: echo "暂无相关时间安排" ;endif; ?>
                        </h4>
                    </div>
                </li><?php endif; endforeach; endif; else: echo "暂无相关时间安排" ;endif; ?>
    </ul>
</div>

<!--
 eq      :   ==
 neq     :   !=
 gt      :   >
 egt     :   >=
 lt      :   <
 elt     :   <=
 heq     :   ===
 nheq    :   !==
 -->
    </div>
</div>
<!--&lt;!&ndash; jQuery &ndash;&gt;-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--&lt;!&ndash; Bootstrap JavaScript &ndash;&gt;-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--load-->
<script type="text/javascript" src="/itteam/Public/js/jquery-1.11.3.js"></script>

<!--js-->
<script type="text/javascript" src="/itteam/Public/js/bootstrap.min.js"></script>

<!--layer-->
<script type="text/javascript" src="/itteam/Public/js/layer/layer.js"></script>
<script type="text/javascript" src="/itteam/Public/js/supplement.js"></script>

</body>
</html>