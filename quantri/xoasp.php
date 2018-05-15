<?php 
	ob_start();
	session_start();
	include_once('./ketnoi.php');
	if (isset($_SESSION['email'])&&isset($_SESSION['mk'])) {
		$id_sp=$_GET['id_sp'];
		$sql="DELETE FROM sanpham WHERE id_sp='$id_sp'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=danhsachsp");
	}
	else{
		header("location:index.php");
	}
?>