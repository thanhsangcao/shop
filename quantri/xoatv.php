<?php 
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
	// if (isset($_SESSION['email'])&&isset($_SESSION['mk'])) {
		$id_thanhvien=$_GET['id_thanhvien'];
		$sql="DELETE FROM thanhvien WHERE id_thanhvien='$id_thanhvien'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=danhsachtv");
	// }
?>