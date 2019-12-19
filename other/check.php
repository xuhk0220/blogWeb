<?php
/*
 * 验证该页面是否属于用户登录状态
 */

/*启动sesssion*/
session_start();

/*导入整体配置文件*/
include('config.php');

/*目前登陆用户的id */
$session_userid = $input -> session('userid');

/*调用input输入类的session方法，来验证是否已登录*/
if($session_userid === false){
    /*若没登录返回总入口页面*/
    header("index.php");
}

/*取出登录成功的用户信息*/
$sql = "select * from `user` where `userid` = '{$session_userid}'";
$session_user_result = $db -> query($sql);
$session_user = $session_user_result -> fetch_array( MYSQLI_ASSOC );

?>



