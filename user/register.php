<?php
/*
 *用户注册
 */

include('../other/config.php');

if($input -> get('do') == 'check'){

    /*获取用户页面注册传来的用户名、密码、性别、年龄、电话（必填）、QQ号、email数据*/
    $username = $input -> post('username');
    $password = $input -> post('password');
    $confirmpassword = $input->post('confirmpassword');//再次输入密码
    $sex = $input -> post('sex');
    $age = $input -> post('age');
    $phone = $input -> post('phone');
    $qq = $input -> post('qq');
    $email = $input -> post('email');

    /*注册时的处理*/
    if($username == null || $password == null){
        echo "必须填用户名/密码";
        exit;
    }
    if($password != $confirmpassword){
        echo "前后两次输入的密码不一致";
        exit;
    }
    if($phone == null){
        echo "必须填手机号";
        exit;
    }
    $sql = "select * from `user` where `username` = '$username'";
    $res = $db -> query($sql); //询问
    $mm = $res -> fetch_array(MYSQLI_ASSOC);
    if(!empty($mm)){
        echo "用户名不能重复";
        exit;
    }

    /*将用户填入的数据插入到数据库的sql语句*/
    $sql = "INSERT INTO `user`(`userid`,`username`,`password`,`sex`,`age`,`phone`,`qq`,`email`) values (null,'$username','$password','$sex','$age','$phone','$qq','$email')";

    /*提交sql语句到数据库处理*/
    $is = $db -> query($sql);

    /*判断是否注册成功*/
    if($is){
        echo "注册成功";
        header("Location:user_login.php");
    }else{
        echo "注册失败";
    }
}
?>



<!--用户注册界面></!-->
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
    <div class = "row" style = "margin-top:100px;">
        <!--距左边3个列></!-->
        <div class = "col-md-3"></div>
        <!--中间部分占据6列></!-->
        <div class = "col-md-6" ">

        <div class = "panel panel-primary">
            <!--注册头部分></!-->
            <div class = "panel-heading">用户注册</div>
            <!--注册的身体部分></!-->
            <div class = "panel-body">

                <form  class = "form-horizontal" action = "register.php?do=check" method = "post">
                    <!--注册的用户名那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">用户名</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "username" id = "username" placeholder = "请输入用户名">
                        </div>
                    </div>

                    <!--注册的密码那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">密码</label>
                        <div class = "col-sm-9">
                            <input type = "password" class = "form-control" name = "password" id = "password" placeholder = "请输入密码">
                        </div>
                    </div>

                    <!--注册的密码确定那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">确认密码</label>
                        <div class = "col-sm-9">
                            <input type = "password" class = "form-control" name = "confirmpassword" id = "confirmpassword" placeholder = "请再次输入密码">
                        </div>
                    </div>

                    <!--注册的性别那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">性别</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "sex" id = "sex" placeholder="请输入性别">
                        </div>
                    </div>

                    <!--注册的年龄那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">年龄</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "age" id = "age" placeholder = "请输入年龄">
                        </div>
                    </div>

                    <!--注册的手机号那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">手机号</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "phone" id = "phone" placeholder = "请输入手机号(必填)">
                        </div>
                    </div>

                    <!--注册的qq那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">QQ</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "qq" id = "qq" placeholder = "请输入qq">
                        </div>
                    </div>

                    <!--注册的email那一行></!-->
                    <div class = "form-group">
                        <label for = "inputEmail3" class = "col-sm-2 control-label">Email</label>
                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "email" id = "email" placeholder = "请输入邮箱">
                        </div>
                    </div>

                    <!--提交注册那一行></!-->
                    <div class = "form-group">
                        <div class = "col-sm-3"></div>
                        <div class = "col-sm-7">
                            <input type = "submit" value = "注册" class = 'btn btn-primary btn-lg btn-block'>
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
</div>.
</body>

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

</html>
