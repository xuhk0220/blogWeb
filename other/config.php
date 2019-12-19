<?php
/*
 * 整体配置文件
 */

/*导入数据库连接类这个文件*/
include('db.php');
/*生成一个db的对象*/
$db = new db();

/*导入一个输入类这个文件*/
include('input.php');
/*生成一个input对象*/
$input = new input();

?>

