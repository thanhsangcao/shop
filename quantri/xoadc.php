<?php 
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
		$id_diachi=$_GET['id_diachi'];
		$id_kh=$_GET['id_kh'];
		$sql="DELETE FROM diachi WHERE id_diachi='$id_diachi'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=themdc&id_kh=".$id_kh);

?>