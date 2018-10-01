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

// 对密码进行加密处理
function createPassword($password)
{
	if(!$password)
	{
		return false;
	}
	return md5(md5($password).'IMOOC');
}

// 提示页面封装

/**
* 消息提示
* @param int $type 1:成功 2:失败
* @param null $msg
* @param null $url
*/
function msg($type,$msg=null,$url=null)
{
	$toUrl = "Location:msg.php?type={$type}";
	// 当msg为空时,toUrl不写入
	$toUrl.= $msg?"&msg={$msg}":'';
	// 当url为空时，toUrl不写入
	$toUrl.=$url?"$url={$url}":'';
	header($toUrl);
	exit;
}

?>