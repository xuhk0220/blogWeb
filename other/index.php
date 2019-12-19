<?php

/*导入整体配置文件*/
include('config.php');

?>

<!-- 总入口 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8">
    <title>微型博客系统</title>
    <!--加载包含bootstrap里css和javascript里的文件></!-->
    <?php include('ornament.php');?>
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
            <!--头部分></!-->
            <div class = "panel-heading">总 入 口 ~ 给 你 的 生 活 加 点 阳 光 ~</div>
            <!--身体部分></!-->
            <div class = "panel-body">
                <form class = "form-horizontal" action = "index.php">

                    <!--两个按钮模块></!-->
                    <div class = "form-group">
                        <div class = "col-sm-3"></div>

                        <!--管理员入口></!-->
                        <div class = "col-sm-4">
                            <a href = "../admin/admin_login.php"><input type = "button" value = "管理员入口" class = "btn btn-primary"> </a>
                        </div>
                        <!--用户入口></!-->
                        <div class = "col-sm-4">
                            <a href = "../user/user_login.php"><input type = "button" value = "用户入口" class = "btn btn-primary"> </a>
                        </div>
                    </div>
                </form>

            </div>
            <!--尾部分></!-->
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

