<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>登入测试</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">
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
        <a class="navbar-brand" href="#">Thinkphp-demo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link</a></li>
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

<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>新主题</strong> 新的主题
</div>

<div class="container">
    <table class="table table-hover">
        <tbody>
        <tr>
            <td>用户名</td>
            <td><?php echo ($user["user"]); ?></td>
        </tr>
        <tr>
            <td>电子邮件</td>
            <td><?php echo ($user["mail"]); ?></td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><?php echo ($user["age"]); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>