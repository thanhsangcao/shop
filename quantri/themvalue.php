<?php 
	ob_start();
    session_start();
    include_once './ketnoi.php';
	$value_name=$_GET['value_name'];
	$att_id=$_GET['att_id'];
	$sql="INSERT INTO giatri_thuoctinh(value_name,att_id) VALUES ('$value_name','$att_id')";

	$query=mysqli_query($db_con,$sql);
	header('location:quantri.php?page_layout=danhsachtt&att_id='.$att_id);
?>