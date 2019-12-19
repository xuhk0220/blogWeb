<?php
/*
 * 后台用户博客管理界面
 */

include('../other/check.php');

/*删除功能*/
if($input -> get('do') == 'delete'){
    /*先获取该博客pid*/
    $pid = $input -> get('pid');

    $sql = "delete from `page` where pid = '{$pid}'";
    $is=$db->query($sql);
    if($is){
        header("location:blog_manage.php");
    }
    else{
        die("删除失败");
    }
}

/*每页显示3条博客*/
$pageNum = 3;

/*获取该用户的博客总量*/
$author = $session_user['username'];
$sql = "select count(*) AS total from `page` where `author` = '$author'";
$total = $db -> query($sql) -> fetch_array(MYSQLI_ASSOC)['total'];

/*分页的页码总数*/
$maxPage = ceil($total / $pageNum);

/*获得当前page的参数*/
$page = (int)$input -> get('page');
$page = $page <1 ? 1 : $page;

/*当前页码的偏移量*/
$offset = ($page - 1) * $pageNum;

/*取出当前数据库列表中的信息并为实现分页效果*/
$author = $session_user['username'];
$sql = "select * from `page` where `author` = '$author' order by `pid` asc limit {$offset},{$pageNum}";
$result = $db -> query($sql);

$rows = array();
while($row = $result -> fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}

?>


<!--后台个人博客管理的界面<>/!-->
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
    <h2> 个人博客管理 <small class = "pull-right"><a class = 'btn btn-default' href = "blog_add.php">添加微博</a></small></h2>
    <hr/>
    <div class = "rows">

        <table class = "table table-striped">

            <thead>
            <tr>
                <th>标题</th>
                <th>作者</th>
                <th>正文</th>
                <th>插入时间</th>
                <th>修改时间</th>
                <th>管理</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach($rows as $row) :?>

                <tr>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo $row['content'];?></td>
                    <td><?php echo $row['intime'];?></td>
                    <td><?php echo $row['uptime'];?></td>
                    <td>
                        <!--修改操作传输pid来判断是否是修改操作></!-->
                        <a href = "blog_change.php?pid=<?php echo $row['pid'];?>&do=edit ">修改</a>
                        <!--删除操作，传输动作和pid></!-->
                        <a onclick = 'return confirm("你确定要删除吗？")' href = "blog_manage.php?do=delete&pid=<?php echo $row['pid'];?> ">删除</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

        <!--底部的分页效果></!-->
        <nav aria-label = "Page navigation">
            <ul class = "pagination">
                <li>
                    <a href = '#' aria-label = "Previous">
                        <span aria-hidden = "true">&laquo;</span>
                    </a>
                </li>

                <?php
                $hrefTpl = "<li><a href = 'blog_manage.php?page=%d'>%s</a></li>";
                for ($i = 1; $i <= $maxPage; $i ++){
                    echo sprintf( $hrefTpl,$i,"第{$i}页" );
                }
                ?>
                <li>
                    <a href = '#' aria-label = "Next">
                        <span aria-hidden = "true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

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