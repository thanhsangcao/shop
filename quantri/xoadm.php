<?php 
	ob_start();
    session_start();
    include_once './ketnoi.php';
    if (isset($_SESSION['email'])&&isset($_SESSION['mk'])) {
		$id_dm=$_GET['id_dm'];
		$sql="DELETE FROM dmsanpham where id_dm=$id_dm";
		$query=mysqli_query($db_con,$sql);
		header('location:quantri.php?page_layout=danhsachdm');
	}
	else{
		header('location:index.php');
	}
?>