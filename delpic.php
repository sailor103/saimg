<?php
if(isset($_POST['id']))
{
  include_once 'conn.php';
  $sql="delete from `filelist` where `diskname` = " . $_POST['id'];
  
  if(file_exists('pic/'.$_POST['id']))
  {
	if(unlink('pic/'.$_POST['id']))
	{
		if(!mysql_query($sql))
		{
			echo json_encode(array("status"=>"no","msg"=>"ɾ��ʧ��"));
		}
		else
		{
			echo json_encode(array("status"=>"yes","msg"=>"ɾ���ɹ�"));
		}
	}
	else
	{
		echo json_encode(array("status"=>"no","msg"=>"�ļ�������"));
	}
  } 
}
?>
