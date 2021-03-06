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
<link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_core/Public/css/bootstrap.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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
        <a class="navbar-brand" href="#">Thinkphp-demo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">主页</a></li>
            <li><a href="#">Link</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
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
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<div class="container">
    <div class="col-md-2 list-group">
        <a class="list-group-item" href="<?php echo U('index');?>">主页</a>
        <a class="list-group-item" href="<?php echo U('friends');?>">好友</a>
    </div>
    <div class="col-md-10">
        ﻿
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">好友列表</h3>
        </div>
        <ul class="list-group media-list">
            <!--volist循环-->

            <?php if(is_array($friends)): $i = 0; $__LIST__ = $friends;if( count($__LIST__)==0 ) : echo "难道这就是所谓的强大到没朋友吗？" ;else: foreach($__LIST__ as $key=>$friend): $mod = ($i % 2 );++$i;?><li class="list-group-item media">
                    <a class="pull-left" href="#">
                        <!--empty判断头像是否为空-->
                        <?php if(empty($friend['avatar'])): ?><!--为空则输出default.jpg-->
                            <img width="120" height="120" class="media-object" src="/thinkphp_3.2.3_core/Uploads/avatar/default.jpg"
                                 alt="<?php echo ($friend['username']); ?>"/>
                            <?php else: ?>
                            <!--不为空时输出用户的头像-->
                            <img width="120" height="120" class="media-object" src="/thinkphp_3.2.3_core/Uploads/avatar/<?php echo ($friend['avatar']); ?>"
                                 alt="<?php echo ($friend['username']); ?>"/><?php endif; ?>
                    </a>

                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo ($friend['username']); ?>(今年<?php echo ($friend["age"]); ?>岁)
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
                            <!--eq,判断年龄是否是19岁-->
                            <?php if(($friend['age']) == "19"): ?><span class="label label-warning">你转眼都要奔20了！</span><?php endif; ?>

                            <!--if else-->
                            <!--如果年龄小于17岁-->
                            <?php if($friend['age'] < 17): ?><span class="pull-right">因为未成年所以不显示了</span>
                                <?php else: ?>
                                <!--否则输出按钮-->
                                <a href="#" class="pull-right btn btn-warning">
                                    这项操作需要满18岁
                                </a><?php endif; ?>
                        </h4>
                        <p>
                            <!--比较标签-->

                            <!--lt方式比较年龄-->
                            <?php if(($friend['age']) < "18"): ?>未成年<?php endif; ?>
                            <!--compare方式比较-->
                            <?php if(($friend['age']) < "18"): ?><span class="text-danger">
                                注意，compare标签也表示：<?php echo ($friend['username']); ?>未成年!
                            </span><?php endif; ?>
                            <!--egt方式比较年龄-->
                            <?php if(($friend['age']) >= "35"): ?>中年人<?php endif; ?>
                            <!--between方式判断年龄区间-->
                            <?php $_RANGE_VAR_=explode(',',"18,34");if($friend['age']>= $_RANGE_VAR_[0] && $friend['age']<= $_RANGE_VAR_[1]):?>青年<?php endif; ?>
                        </p>
                        <div>
                            标签：
                            <!--Volist循环嵌套输出tags标签-->
                            <?php if(is_array($friend['tags'])): $i = 0; $__LIST__ = $friend['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><span class="label label-success"><?php echo ($tag); ?></span><?php endforeach; endif; else: echo "难道这就是所谓的强大到没朋友吗？" ;endif; ?>
                        </div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

    </div>
</div>
<!--&lt;!&ndash; jQuery &ndash;&gt;-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--&lt;!&ndash; Bootstrap JavaScript &ndash;&gt;-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--load-->
<script type="text/javascript" src="/thinkphp_3.2.3_core/Public/js/jquery-1.11.3.js"></script>

<!--js-->
<script type="text/javascript" src="/thinkphp_3.2.3_core/Public/js/bootstrap.min.js"></script>
</body>
</html>