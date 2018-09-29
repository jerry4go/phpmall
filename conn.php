<?php
	include_once './lib/fun.php';
	$username='lucy';
	//Êý¾Ý¿â²Ù×÷
	$con = mysqlInit('127.0.0.1','root','root','imooc_mall');
	
	if(!$con){
		echo mysqli_errno();
		exit;
	}
	echo '<pre>';
	//var_dump($con);
	$sql = "select * from im_user";
	//$sql = "select `username` from `im_user`";
	echo "$sql</br>";
	$obj = mysqli_query($con,$sql) or die(mysqli_error($con));
	var_dump($obj);
    $result= mysqli_fetch_assoc($obj);

    var_dump($result);die;
	echo '<pre>';
?>