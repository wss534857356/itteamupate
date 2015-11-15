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
        
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">选课列表</h3>
    </div>
    <ul class="list-group media-list">
        <!--volist循环-->
        <?php if(is_array($course)): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "暂无相关时间安排" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i; if($course['status'] == 1 ): ?><li class="list-group-item media">
                    <div class="media-body">
                        <h4 class="media-heading">
                            <strong id="coursename"><?php echo ($course['coursename']); ?></strong>(<?php echo ($course['coursedate']); ?>
                            <!--本周周<?php echo ($course['week']); ?>-->
                            )
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
                            <span class="label label-warning">导师-<?php echo ($course['courseteacher']); ?></span>

                            <!--if else-->
                            <!--如果人数大于最大人数，则输出课程人满-->
                            <?php if($course['type'] == 1): if($course['choose'] == 1): ?><form action="<?php echo U('Index/deleteEnroll');?>" method="post" class="form">
                                        <input name="courseid" class="sr-only" type="text"
                                               value="<?php echo ($course['courseid']); ?>"/>
                                        <button type="submit" class="pull-right btn btn-danger btn-up">取消报名</button>
                                    </form>
                                    <?php else: ?>
                                    <?php if($course['coursemaxNum'] < $course['coursenum']): ?><button type="submit" class="pull-right btn btn-warning disabled">人数已满</button>
                                        <!--否则输出按钮-->
                                        <?php elseif($enrollnum != 2): ?>
                                            <form action="<?php echo U('Index/createEnroll');?>" method="post">
                                                <input name="courseid" class="sr-only" type="text"
                                                       value="<?php echo ($course['courseid']); ?>"/>
                                                <button type="submit"
                                                        class="pull-right btn btn-success btn-up">点击报名</button>
                                            </form>
                                            <?php else: ?>
                                            <a type="submit" class="pull-right btn btn-success disabled">项目过多</a><?php endif; endif; ?>
                                <?php else: ?>
                                <a href="#" class="pull-right btn btn-default disabled">
                                    必修课程
                                </a><?php endif; ?>
                        </h4>
                        <p>
                            开始时间:<?php echo ($course['coursestarttime']); ?>-
                            结束时间:<?php echo ($course['courseendtime']); ?>
                        </p>
                        <?php if($course['type'] == 1): if($course['progressbar'] < 100): ?><div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar"
                                         aria-valuenow="<?php echo ($course['progressbar']); ?>"
                                         aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        <span><?php echo ($course['coursecountnum']); ?>/<?php echo ($course['coursemaxnum']); ?></span>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="<?php echo ($course['progressbar']); ?>"
                                         aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        <span><?php echo ($course['coursecountnum']); ?>/<?php echo ($course['coursemaxnum']); ?>(人数已满！)</span>
                                    </div>
                                </div><?php endif; endif; ?>
                        <div>
                            注释：
                            <!--Volist循环嵌套输出tags标签-->
                            <?php if(is_array($friend['tags'])): $i = 0; $__LIST__ = $friend['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><span class="label label-success"><?php echo ($tag); ?></span><?php endforeach; endif; else: echo "暂无相关时间安排" ;endif; ?>
                        </div>
                    </div>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
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