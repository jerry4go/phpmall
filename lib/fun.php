<?php
// 数据库连接初始化
function mysqlInit($host,$username,$password,$dbName)
{
	$con = mysqli_connect($host,$username,$password);
	
	if(!$con){
		return false;
	}
	mysqli_select_db($con,$dbName);
	//var_dump($db);
	mysqli_set_charset($con,'utf8');
	
	return $con;
}
?>