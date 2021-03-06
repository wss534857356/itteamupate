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
<?php if(is_array($elective)): $i = 0; $__LIST__ = $elective;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$elective): $mod = ($i % 2 );++$i; if($elective['status'] == 1 ): ?><div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title title">
                    <strong class="elective"><?php echo ($elective['coursename']); ?></strong>
                    <a class="btn  disabled">导师-<?php echo ($elective['courseteacher']); ?></a>
                </h3>
            </div>
            <?php if(is_array($elective["choose"])): $i = 0; $__LIST__ = $elective["choose"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$choose): $mod = ($i % 2 );++$i;?><div class="accordion-inner">
                    <ul class="list-group media-list">
                        <li class="list-group-item media">
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a type="submit" class="pull-right btn btn-default" data-toggle="collapse"
                                       data-parent="#accordion2" href="#<?php echo ($choose['chooseid']); ?>">展开名单</a>

                                    <p>时间:<?php echo ($choose["choosedate"]); ?> 周<?php echo ($choose['week']); ?></p>

                                    <p>备注信息:<?php echo ($choose['choosetext']); ?></p>

                                    <p>
                                        开始时间:<?php echo ($choose['choosestarttime']); ?>-
                                        结束时间:<?php echo ($choose['chooseendtime']); ?>
                                    </p>

                                </h4>
                            </div>
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
                                    </div><?php endif; endif; ?>
                        </li>
                    </ul>
                </div>
                <div id="<?php echo ($choose['chooseid']); ?>" class="accordion-body collapse" style="height: 0px;">
                    <?php if($choose['choosenum'] > 0): ?><div class="accordion-inner">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <td>学生学号</td>
                                    <td>学生姓名</td>
                                </tr>
                                </thead>
                                <?php if(is_array($choose["electivearray"])): $i = 0; $__LIST__ = $choose["electivearray"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$array): $mod = ($i % 2 );++$i;?><tbody>
                                    <tr>
                                        <td><?php echo ($array['studentid']); ?></td>
                                        <td><?php echo ($array['username']); ?></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div><?php endif; ?>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
<!--
<?php if(is_array($elective)): $i = 0; $__LIST__ = $elective;if( count($__LIST__)==0 ) : echo "暂无课程" ;else: foreach($__LIST__ as $key=>$elective): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
        <a class="panel-title" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo ($elective['coursename']); ?>">
            <div class="panel-heading">
                <span class="pull-right"><?php echo ($elective['coursedate']); ?></span><?php echo ($elective['coursename']); ?>
            </div>
        </a>


    </div><?php endforeach; endif; else: echo "暂无课程" ;endif; ?>
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