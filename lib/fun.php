<?php
// 数据库连接初始化
function mysqlInit($host,$username,$password,$dbName)
{
	$con = mysql_connect($host,$username,$password);
	
	if(!$con){
		return false;
	}
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	
	return $con;
}
?>