<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0"/>
    <title>登入窗口</title>
    <link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_core/Public/css/loginface.css" />
    <link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_core/Public/css/bootstrap.min.css" />
</head>

<body>
<div class="box">
    <div class="login-box">
        <div class="login-title text-center">
                <h1>
                    <small>IT 工作室选课系统</small>
                </h1>
        </div>
        <div class="login-content ">
            <div class="form">
                <form action="checkLogin" method="post">
                    <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 ">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" id="username" name="username" class="form-control" placeholder="用户名">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 ">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
                                <input type="text" id="password" name="studentid" class="form-control" placeholder="学号">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-xs-offset-4 text-center">
                            <button type="submit" class="btn btn-sm btn-info">登录</button>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <div class="col-xs-6 link">
                            <p class="text-center remove-margin"><small>忘记密码？</small> <a href="javascript:void(0)" ><small>找回</small></a>
                            </p>
                        </div>
                        <div class="col-xs-6 link">
                            <p class="text-center remove-margin"><small>还没注册?</small> <a href="javascript:void(0)" ><small>注册</small></a>
                            </p>
                        </div>
                    </div>-->
                </form>
            </div>
        </div>
    </div>
</div>