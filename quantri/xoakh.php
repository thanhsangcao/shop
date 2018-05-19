<?php 
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
		$id_kh=$_GET['id_kh'];
		$sql="DELETE FROM khachhang WHERE id_kh='$id_kh'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=danhsachkh");
?>