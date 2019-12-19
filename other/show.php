<html>
<body>
<!--导航栏-->
<nav class = "navbar navbar-default" role = "navigation">
    <div class = "container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#bs-example-navbar-collapse-1" aria-expanded = "false">
                <span class = "sr-only">Toggle navigation</span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav">
                <h1 align = "center" style = "color: #2b669a">微博广场</h1>
            </ul>

            <ul class = "nav navbar-nav navbar-right">

                <?php
                include "check.php";
                if( ($author = $session_user['username']) != null)
                    echo '<h3><a href = "../user/user_home.php">返回</a></h3>';
                else
                    echo '<h3><a href = "../admin/admin_home.php">返回</a></h3>';
                ?>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

</body>
</html>

<?php

//每页显示4条
$pageNum=4;

//查询每个用户的最新微博并显示，最新微博作为管理员的推荐微博
$sql = "select * from `page` group by `author` having max(uptime)";

//查询结果为一个记录
$rs = $db -> query($sql);

if(empty($rs)) {
    echo "没有这个搜索";
}
else {
    $num = $rs -> num_rows;//得到总记录数
    $totalPage = ceil($num / $pageNum);//向上取整
    if (empty($input -> get('Page'))){
        $Page = 1;//如果没有接收到page变量,则默认显示第一页
    }
    else {
        $Page = $input->get('Page');
    }
    if ($Page > $totalPage) {
        $Page = $totalPage;
    }

    $rStart = ($Page - 1) * $pageNum;
    //取出的微博按时间降序排列
    $sql = "select * from `page` group by author having max(uptime) order by `pid` desc limit $rStart,$pageNum";
    $result = $db -> query($sql);

    if(empty($result)) {
        echo "没有此记录!" . "<br>";
    }
    else{
        //循环输出数据
        while($rs = $result -> fetch_array(MYSQLI_ASSOC)) {
            ?>
            <form class = "form-horizontal">
                <div class = "form-group">

                    <!--标题></!-->
                    <div class = "col-sm-2">
                        <h3 align = "center">标题：<?php echo $rs['title']; ?></h3>
                    </div>

                    <!--背景信息></!-->
                    <div class = "col-sm-3">
                        <p align = "center">作者：<a href = "../user/blog_personal.php?author=<?php echo $rs['author'];?>"><?php echo $rs['author']; ?></a>
                            <br><br>发表时间：<?php echo $rs['intime']; ?></p>
                    </div>

                    <!--内容></!-->
                    <div class = "col-sm-4">
                        <p align = "center">内容：<br><br><?php echo $rs['content']; ?></p>
                    </div>

                </div>
                <hr>
            </form>

            <?php
        }
    }
}
?>

<!--微博广场界面></!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <!--加载包含bootstrap里css和javascript里的文件></!-->
    <?php include('ornament.php');?>

</head>

<body>


<!--底部的分页1效果></!-->
<nav aria-label = "Page navigation">
    <ul class = "pagination">
        <li>
            <span aria-hidden = "true">&laquo;</span>
        </li>

        <?php
        $hrefTpl = "<li><a href = 'show.php?Page=%d'>%s</a></li>";
        for ($i = 1; $i <= $totalPage; $i ++){
            echo sprintf($hrefTpl,$i,"第{$i}页" );
        }
        ?>
        <li>
            <span aria-hidden = "true">&raquo;</span>
        </li>
    </ul>

</nav>

<!--底部的分页2效果></!-->
<nav aria-label = "Page navigation">
    <ul class = "pagination">
        <li>
            <span aria-hidden = "true">&laquo;</span>
        </li>

        <li><a href = "show.php">首页</a></li>
        <li><a href = "show.php?Page=<?php echo $Page-1;?>">上一页</a></li>
        <li><a href = "show.php?Page=<?php echo $Page+1;?>">下一页</a></li>
        <li><a href = "show.php?Page=<?php echo $totalPage; ?>">尾页</a></li>

        <li>
            <span aria-hidden = "true">&raquo;</span>
        </li>
    </ul>
</nav>


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

