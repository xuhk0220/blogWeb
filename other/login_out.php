<?php
/*
 * 退出登录状态
 */

include('check.php');

/*session清空*/
$_SESSION = array();
header("location:index.php");

?>