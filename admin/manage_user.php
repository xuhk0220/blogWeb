<?php
/*
 * 用户管理：系统管理员能够浏览、删除用户
 */

include('../other/config.php');


/*删除功能*/
if($input -> get('do') == 'delete'){
    /*先获取userid*/
    $userid = $input -> get('userid');

    $sql = "delete from `user` where `userid` = '{$userid}' ";
    $is = $db -> query($sql);
    if($is){
        header("location:manage_user.php");
    }
    else{
        die("删除失败");
    }
}

/*每页显示5个用户*/
$pageNum = 5;

/*获取数据库用户总量*/
$sql = "select count(*) AS total from `user`";
$total = $db -> query($sql) -> fetch_array(MYSQLI_ASSOC)['total'];
/*分页的页码总数*/
$maxPage = ceil($total / $pageNum);

/*获得当前page的参数*/
$page = (int)$input -> get('page');
$page = $page <1 ? 1 : $page;

/*当前页码的偏移量*/
$offset = ($page - 1) * $pageNum;

/*取出当前数据库列表中的信息并为实现分页效果*/
$sql = "select * from `user` order by `userid` asc limit {$offset},{$pageNum}";
$result = $db -> query($sql);

$rows = array();
while($row = $result -> fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}


?>
<!--后台管理员用户管理界面<>/!-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <?php include('../other/ornament.php');?>
</head>
<body>
<?php include('admin_behind_inc.php');?>
<div class = "container">
    <h2> 用户管理</h2>
    <hr/>
    <div class = "rows">

        <table class = "table table-striped">

            <thead>
            <tr>
                <th>USERID</th>
                <th>用户名</th>
                <th>密码</th>
                <th>性别</th>
                <th>年龄</th>
                <th>手机号</th>
                <th>QQ</th>
                <th>Email</th>
                <th>管理</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($rows as $row) :?>
                <tr>
                    <td><?php echo $row['userid'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><?php echo $row['sex'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['qq'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td>
                        <!--删除操作，传输动作和被删除用户的userid></!-->
                        <a onclick = 'return confirm("你确定要删除吗？")' href = "manage_user.php?do=delete&userid=<?php echo $row['userid'];?> ">删除</a>
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
                $hrefTpl = "<li><a href = 'manage_user.php?page=%d'>%s</a></li>";
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
