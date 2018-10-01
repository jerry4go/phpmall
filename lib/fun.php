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
	$toUrl.=$url?"&url={$url}":'';
	header($toUrl);
	exit;
}

/*
* 图像上传
* @param $file
* @return string
*/

function imgUpload($file)
{	
	//检查上传文件是否合法
	if(!is_uploaded_file($file['tmp_name']))
	{
		msg(2,'请上传符合规范的图片');
	}
	
	$type = $file['type'];
	
	if(!in_array($type,array("image/png","image/gif","image/jpeg")))
	{
		msg(2,'请上传png,git,jpg图像');
	}
	
	
	//上传目录
	$uploadPath = './static/file/';
	//上传目录访问url
	$uploadUrl = '/static/file/';
	//上传文件夹
	$fileDir = date('Y/md/',$_SERVER['REQUEST_TIME']);
	
	//检查上传目录是否存在
	if(!is_dir($uploadPath.$fileDir))
	{
		mkdir($uploadPath.$fileDir,0755,true);//递归创建目录
	}
	//文件名转换为小写
	$ext = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
	
	//上传图像名称
	$img = uniqid().mt_rand(1000,9999).'.'.$ext;
	//物理地址
	$imgPath = $uploadPath.$fileDir.$img;
	//URL地址
	$imgUrl = 'http://127.0.0.1'.$uploadUrl.$fileDir.$img;
	
	//var_dump($imgPath,$imgUrl);
	
	//var_dump($imgUrl);
	if(!move_uploaded_file($file['tmp_name'],$imgPath))
	{
		msg(2,'服务器繁忙，请稍后再试');
	}
	
	return $imgUrl;
}

























?>