<?php
include "../other/check.php";

if(!empty($input -> get('pid'))){
    $pid = $input -> get('pid');
	$content = $input -> get('content');
    $sql = "select * from `page` where `pid` = '$pid'";
    //询问
    $res = $db -> query($sql);
    $mm = $res -> fetch_array(MYSQLI_ASSOC);
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
    <h2> 添加内容 <small class = "pull-right"><a class = 'btn btn-default' href = "blog_manage.php">返回</a></small></h2>
    <hr/>
    <div class = "rows">
        <form class = "form-horizontal" method = "post" action = "blog_change.php" >
            <div class = "form-group">
                <label for = "inputEmail3" class = "col-sm-2 control-label">标题</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" name = "title" placeholder = "<?php $mm['title'] ?>" value = "<?php echo $mm['title'];?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">正文</label>
                <div class="col-sm-8">
                <textarea id="content" name="content" class="form-control" placeholder=" <?php echo $mm['title'];?>"  value="<?php echo $mm['title'];?>"><?php echo $mm['content'];?></textarea>
                </div>
            </div>

            <div class = "form-group">
                <div class = "col-sm-offset-2 col-sm-6">
					<input type = "hidden" name = "pid" value = "<?php echo $mm['pid']; ?>">
                      <input name = 'sub' type = "submit" value = '提交' class = "btn btn-default">
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

<?php
}

if(!empty($input -> post('sub'))){

    //修改后接收到的
    $uptime = time();
    $title = $input -> post('title');
    $content = $input -> post('content');
	$pid = $input -> post('pid');
	$author = $session_user['username'];

    $sql = "UPDATE `page` set `title` = '$title',`author` = '$author',`content` = '$content',`uptime` = '$uptime' where `pid` = '$pid'";
    $is = $db -> query($sql);
    if($is){
		header("location:blog_manage.php");
    }
    else{
        echo "执行失败";
    }
}
?>
