<?php 
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
		$att_id=$_GET['att_id'];
		$sql="DELETE FROM giatri_thuoctinh WHERE att_id='$att_id'";
		$query=mysqli_query($db_con,$sql);
		$sql="DELETE FROM thuoctinh WHERE att_id='$att_id'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=danhsachtt");

?>