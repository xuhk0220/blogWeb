<?php

include "../other/check.php";

//初始化该微博
$mm = array(
    'title'   => '',
    'content' => '',
);

if($input -> get('do') == 'add'){
    $title = $input -> post('title');
    $content = $input -> post('content');

    if (empty($title) || empty($content)) {
        echo "未添加内容";
    }
    else {
        $author = $session_user['username'];
        date_default_timezone_set("Asia/Shanghai");
        $sql = "INSERT INTO `page`(`pid`, `title`, `content`, `author`, `intime`, `uptime`) VALUES ('null','$title','$content','$author',now(),now())";

        //用单引号表示当前是字符串,并且外部有双引号
        //执行sql语句
        $s = $db -> query($sql);
        if ($s == false) {
            echo "插入失败";
        }
        else {
            echo "添加成功";
            header("location:blog_manage.php");
        }
    }
}
?>


<html lang = "en">
<head>
    <meta http-equiv = "Content-Type" content = "text/html;charset=UTF-8">
    <title>微型博客系统</title>
    <?php include('../other/ornament.php');?>

    <!--加载simiditor编辑器的文件></!-->
    <link rel = "stylesheet" type = "text/css" href = "../theme/simditor/styles/simditor.css" />
    <script type = "text/javascript" src = "../theme/simditor/scripts/module.js"></script>
    <script type = "text/javascript" src = "../theme/simditor/scripts/hotkeys.js"></script>
    <script type = "text/javascript" src = "../theme/simditor/scripts/uploader.js"></script>
    <script type = "text/javascript" src = "../theme/simditor/scripts/simditor.js"></script>

</head>

<body>

<?php include('user_behind_inc.php');?>

<div class = "container">
    <h2> 添加内容 <small class = "pull-right"><a class = 'btn btn-default' href = "blog_manage.php">返回</a></small></h2>
    <hr/>
    <div class = "rows">
        <form class = "form-horizontal" role = "form" action = "blog_add.php?do=add" method = "post">
            <div class = "form-group">
                <label for = "inputEmail3" class = "col-sm-2 control-label">标题</label>
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" name = "title" placeholder = "请输入标题" value = '<?php echo $mm['title'];?>'>
                </div>
            </div>


            <div class = "form-group">
                <label for = "inputPassword3" class = "col-sm-2 control-label">正文</label>
                <div class = "col-sm-8">
                    <textarea id = "content" name = "content" class = "form-control"><?php echo $mm['content'];?></textarea>
                </div>
            </div>

            <div class = "form-group">
                <div class = "col-sm-offset-2 col-sm-6">
                    <button type = "submit" name = 'sub' class = "btn btn-default">提交</button>
                </div>
            </div>
        </form>

    </div>
</div>

</body>
</html>
