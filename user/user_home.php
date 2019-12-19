<?php
/*
 * 后台用户登录之后的界面
 */

include('../other/check.php');

?>

<!--后台用户登录之后的界面<>/!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang =　"en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <?php include('../other/ornament.php');?>  <!--所有的页面都需加载这个文件></!-->
</head>

<body>

<!--用户登录页面的标题部分></!-->
<?php include('user_behind_inc.php');?>

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