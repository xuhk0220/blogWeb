<?php
/*
 * 用户个人主页
 */
?>

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
                <h1 align = "center" style = "color: #2b669a">个人主页</h1>
            </ul>

            <ul class = "nav navbar-nav navbar-right">
                <h3><a href = "user_home.php">返回</a></h3>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

</body>
</html>


<?php
include '../other/check.php';

//该主页用户
$author = $input -> get('author');

//每页显示4条
$pageNum = 4;
$search = "";
$k = "`author` = '$author'";

//找出该用户所有微博
$sql = "select * from `page` where $k";
$rs = $db -> query($sql);//查询结果为一个记录
$num = $rs -> num_rows;//总记录数

if($num == 0) {
    echo "没有这个搜索";
}
else {
    $totalPage = ceil($num / $pageNum);//向上取整

    if (empty($_GET['Page'])) {
        $Page = 1;//如果没有接收到page变量，则默认显示第一页
    }
    else {
        $Page = $_GET['Page'];
    }
    if ($Page > $totalPage) {
        $Page = $totalPage;
    }
    $rStart = ($Page - 1) * $pageNum;

    //按时间降序排列
    $sql = "select * from `page` where `author` = '$author' and $k order by `uptime` desc limit $rStart,$pageNum";
    $result = $db->query($sql);

    if(empty($result)) {
        echo "没有此记录!"."<br>";
    }
    else {
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
                        <p align = "center">作者：<?php echo $rs['author']; ?></a>
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


<!--个人主页界面></!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <!--加载包含bootstrap里css和javascript里的文件></!-->
    <?php include('../other/ornament.php');?>
</head>

<body>

<!--底部的分页1效果></!-->
<nav aria-label = "Page navigation">
    <ul class = "pagination">
        <li>
            <span aria-hidden = "true">&laquo;</span>
        </li>

        <?php
        for ($i = 1; $i <= $totalPage; $i ++){

            $hrefTpl = "<li><a href = blog_personal.php?author=".$author."&Page=".$i."&title=".$search.">".$i."</a></li>";
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

        <li><a href = "blog_personal.php?author=<?php echo $author ?>&Page=1&title=<?php echo $search; ?>">首页</a></li>
        <li><a href = "blog_personal.php?author=<?php echo $author ?>&Page=<?php echo $Page-1;?>&title=<?php echo $search; ?>">上一页</a></li>
        <li><a href = "blog_personal.php?author=<?php echo $author ?>&Page=<?php echo $Page+1;?>&title=<?php echo $search; ?>">下一页</a></li>
        <li><a href = "blog_personal.php?author=<?php echo $author ?>&Page=<?php echo $totalPage; ?>&title=<?php echo $search; ?>">尾页</a></li>

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

