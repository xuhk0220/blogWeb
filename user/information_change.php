<?php
/*
 * 用户个人信息修改
 */

include('../other/check.php');

$sql = "select * from `user` where `userid` = $session_userid ";
$res = $db -> query($sql); //询问
$mm = $res -> fetch_array(MYSQLI_ASSOC);

if($input -> post('sub') == 'submit') {

    $username = $input -> post('username');
    $password = $input -> post('password');
    $sex = $input -> post('sex');
    $age = $input -> post('age');
    $phone = $input -> post('phone');
    $qq = $input -> post('qq');
    $email = $input -> post('email');

    //更新SQL语句
    $sql = "UPDATE `user` SET `username` = '$username',`password` ='$password',`sex` = '$sex',`age` = '$age',`phone` = '$phone',`qq` = '$qq',`email` = '$email' where `userid` = '$session_userid'";
    $is = $db -> query($sql);
    if($is){
        header("location:information_manage.php");
    }
    else{
        echo "执行失败";
    }
}
?>


<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <?php include('../other/ornament.php');?>

    <!--加载simiditor编辑器的文件></!-->
    <link rel = "stylesheet" type = "text/css" href = "theme/simditor/styles/simditor.css" />
    <script type = "text/javascript" src = "theme/simditor/scripts/module.js"></script>
    <script type = "text/javascript" src = "theme/simditor/scripts/hotkeys.js"></script>
    <script type = "text/javascript" src = "theme/simditor/scripts/uploader.js"></script>
    <script type = "text/javascript" src = "theme/simditor/scripts/simditor.js"></script>

</head>
<body>

<?php include('user_behind_inc.php');?>

<div class = "container">
    <h2> 修改个人信息 <small class = "pull-right"><a class = 'btn btn-default' href = "information_manage.php">返回</a></small></h2>
    <hr/>
    <div class = "rows">
        <form class = "form-horizontal" role = "form" action = "information_change.php" method = "post">
            <div class = "form-group">
                <label for = "inputEmail3" class = "col-sm-2 control-label">用户名</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" name = "username" placeholder = "<?php $mm['username'] ?>" value = "<?php echo $mm['username'];?>">
                </div>
            </div>
            <div class = "form-group">
                <label for = "inputEmail3" class = "col-sm-2 control-label">密码</label>
                <div class = "col-sm-6">
                    <input type="text" class = "form-control" name = "password" placeholder = "<?php $mm['password'] ?>" value = "<?php echo $mm['password'];?>">
                </div>
            </div>
            <div class = "form-group">
                <label for = "inputEmail3" class = "col-sm-2 control-label">性别</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" name = "sex" placeholder = "<?php $mm['sex'] ?>" value = "<?php echo $mm['sex'];?>">
                </div>
            </div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">年龄</label>
			    <div class="col-sm-6">
			        <input type="text" class="form-control" name="age" placeholder="<?php $mm['age'] ?>" value = "<?php echo $mm['age'];?>">
			    </div>
			</div>
			<div class = "form-group">
			    <label for = "inputEmail3" class = "col-sm-2 control-label">手机号</label>
			    <div class = "col-sm-6">
			        <input type = "text" class = "form-control" name = "phone" placeholder = "<?php $mm['phone'] ?>" value = "<?php echo $mm['phone'];?>">
			    </div>
			</div>
			<div class = "form-group">
			    <label for = "inputEmail3" class = "col-sm-2 control-label">QQ</label>
			    <div class = "col-sm-6">
			        <input type = "text" class = "form-control" name = "qq" placeholder = "<?php $mm['qq'] ?>" value = "<?php echo $mm['qq'];?>">
			    </div>
			</div>
			<div class = "form-group">
			    <label for = "inputEmail3" class = "col-sm-2 control-label">邮箱</label>
			    <div class = "col-sm-6">
			        <input type = "text" class = "form-control" name = "email" placeholder = "<?php $mm['email'] ?>" value = "<?php echo $mm['email'];?>">
			    </div>
			</div>
            <div class = "form-group">
                <div class = "col-sm-offset-2 col-sm-6">
                    <button type = "submit" name = "sub" value = "submit" class = "btn btn-default">提交</button>
                </div>
            </div>
        </form>

    </div>
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

