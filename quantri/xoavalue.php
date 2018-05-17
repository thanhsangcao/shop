<?php 
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
		$value_id=$_GET['value_id'];
		$att_id=$_GET['att_id'];
		$sql="DELETE FROM giatri_thuoctinh WHERE value_id='$value_id'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=danhsachtt&att_id=".$att_id);

?>