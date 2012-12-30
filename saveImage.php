<?php
//重新命名文件
date_default_timezone_set("PRC");
$diskname=time().rand(0,9);
//获取flash文件流
$jpg=file_get_contents('php://input');
$headers = apache_request_headers();
if (!empty($jpg))
{
	$file = fopen('pic/'.$diskname,"w");
	fwrite($file,$jpg);
	fclose($file);
	$orname =urldecode($headers["fileName"]);
	$host_sql=$_SERVER['SERVER_NAME'];
	//写入数据库
	include_once 'conn.php';
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	$sql="INSERT INTO `filelist` (`diskname`,`filename`,`host`) VALUES('$diskname','$orname','$host_sql')";
    if(!mysql_query($sql))
    {
      echo mysql_error();
    }
	echo  'http://'.$host_sql. '/pic/' .$diskname;
}
?>