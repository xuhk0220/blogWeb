<!--后台管理界面的上方标题></!-->
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
            <a class = "navbar-brand" href = "admin_home.php">ADMIN</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav">
                <li ><a href = "../other/show.php">微博广场 <span class = "sr-only">(current)</span></a></li>
                <li><a href = "manage_blog.php">微博管理 <span class = "sr-only">(current)</span></a></li>
                <li><a href = "manage_user.php">用户管理</a></li>
            </ul>

            <ul class = "nav navbar-nav navbar-right">

                <li class = "dropdown">
                    <!--输出此时登录的账户名></!-->
                    <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false"> 管理员 <span class = "caret"></span></a>
                    <ul class = "dropdown-menu">
                        <li><a href = "../other/login_out.php">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>