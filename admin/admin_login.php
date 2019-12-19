<?php
/*
 * 后台管理员登录
 */

/* 启动session服务，记录账号登陆的cookies */
session_start();

/*导入整体配置文件*/
include('../other/config.php');

if($input -> get('do') == 'check'){
    /*获取页面提交的用户名和密码数据*/
    $adminname = $input -> post('adminname');
    $adminpass = $input -> post('adminpass');

    /*查询页面提交的数据是否在数据库提供的数据存在的sql语句*/
    $sql = "select * from `admin` where `adminname` = '{$adminname}' and `adminpass` = '{$adminpass}' ";
    /*数据库查询语句返回结果*/
    $mysqli_result = $db -> query($sql);
    /*以数组形式存储数据库查询语句的返回结果*/
    $row = $mysqli_result -> fetch_array( MYSQLI_ASSOC);

    /*如果row确实返回了结果，则将结果的aid存储在session里，并转向admin_home.php文件*/
    if(is_array($row)){
        $_SESSION['aid'] = $row['aid'];
        header("location:admin_home.php");
    }
    else{
        echo("用户名或密码错误");
    }
}

?>



<!--后台管理员登录界面></!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <!--加载包含bootstrap里css和javascript里的文件></!-->
    <?php include('../other/ornament.php');?>


</head>

<body>
<!--最外面的container容器></!-->
<div class = "container">
    <!--bootstrap使用时建议使用一个row表格类，包含12个列></!-->
    <div class = "row" style = "margin-top:200px;">
        <!--距左边3个列></!-->
        <div class = "col-md-3"></div>
        <!--中间部分占据6列></!-->
        <div class = "col-md-6" ">

        <div class = "panel panel-primary">
            <!--登录头部分></!-->
            <div class = "panel-heading">管理员登录</div>
            <!--登录的身体部分></!-->
            <div class = "panel-body">

                <form  class = "form-horizontal" action = "admin_login.php?do=check" method = "post">
                    <!--登录的用户名那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">用户名</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "adminname" id = "adminname" placeholder = "请输入用户名" datatype = "*3-10" errormsg = "请输入长度 范围在3-10之间的昵称">
                        </div>
                    </div>

                    <!--登录的密码那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">密码</label>
                        <div class = "col-sm-9">
                            <input type = "password" class = "form-control" name = "adminpass" id = "adminpass" placeholder = "请输入密码">
                        </div>
                    </div>

                    <!--登录那一行></!-->
                    <div class = "form-group">
                        <div class = "col-sm-5"></div>
                        <!--登录></!-->
                        <div class = "col-sm-6">
                            <input type = "submit" value = "登录" class = 'btn btn-primary'>
                        </div>

                    </div>
                </form>



            </div>
            <!--登录的尾部分></!-->
            <div class = "panel-footer text-right">@xuhk ~ @yangln</div>
        </div>

    </div>
    <!--距离右边三列></!-->
    <div class = "col-md-3"></div>
</div>

<!--窗口背景的script加载></!-->
<script type = "text/javascript">
    window.onload = function() {
        var config = {
            vx : 4,
            vy : 4,
            height : 2,
            width : 2,
            count : 100,
            color : "121, 162, 185",
            stroke : "100, 200, 180",
            dist : 6000,
            e_dist : 20000,
            max_conn : 10
        }
        CanvasParticle(config);
    }
</script>
<script type = "text/javascript" src = "../theme/js/canvas-particle.js"></script>

</body>
</html>
