<?php
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
	if (isset($_GET['dia_chi'])&&isset($_GET['id_diachi'])) {
		$dia_chi=$_GET['dia_chi'];
		$id_diachi=$_GET['id_diachi'];
		$id_kh=$_GET['id_kh'];
		$sql="UPDATE diachi SET dia_chi='$dia_chi' where id_diachi=$id_diachi ";
		$query=mysqli_query($db_con,$sql);
		if (isset($_GET['page_layout'])) {
			header('location:quantri.php?page_layout=suakh&id_kh='.$_GET['id_kh']);			
		}else{
			header('location:quantri.php?page_layout=themdc&id_kh='.$_GET['id_kh']);	
		}
        
	}
?>