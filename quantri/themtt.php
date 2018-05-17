<?php 
	ob_start();
    session_start();
    include_once './ketnoi.php';
	$att_name=$_GET['att_name'];
	$sql="INSERT INTO thuoctinh(att_name) VALUES ('$att_name')";

	$query=mysqli_query($db_con,$sql);
	header('location:quantri.php?page_layout=danhsachtt');
?>