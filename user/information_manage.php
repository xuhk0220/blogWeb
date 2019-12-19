<?php
/*
 * 后台用户个人信息管理界面
 */

include('../other/check.php');

?>

<!--后台用户个人信息管理界面<>/!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <?php include('../other/ornament.php');?>
</head>

<body>

<?php include('user_behind_inc.php');?>

<div class = "container">
    <h2> 个人信息管理 <small class = "pull-right"><a class = 'btn btn-default' href = "information_change.php">修改信息</a></small></h2>
    <hr/>

    <div class = "rows">
        <mailTable :tableData = "tableData" :tableStyle = "{ width:'600px' }"></mailTable>
        <table class="table table-bordered table-hover">

            <tbody>
            <tr>
                <th>用户名</th>
                <td><?php echo $session_user['username'];?></td>
            </tr>
            <tr>
                <th>密码</th>
                <td><?php echo $session_user['password'];?></td>
            </tr>
            <tr>
                <th>性别</th>
                <td><?php echo $session_user['sex'];?></td>
            </tr>
            <tr>
                <th>年龄</th>
                <td><?php echo $session_user['age'];?></td>
            </tr>
            <tr>
                <th>手机号</th>
                <td><?php echo $session_user['phone'];?></td>
            </tr>
            <tr>
                <th>QQ</th>
                <td><?php echo $session_user['qq'];?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $session_user['email'];?></td>
            </tr>
            </tbody>

        </table>

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


