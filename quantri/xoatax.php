<?php 
	ob_start();
	session_start();
	include_once ('./ketnoi.php');
	// if (isset($_SESSION['email'])&&isset($_SESSION['mk'])) {
		$tax_id=$_GET['tax_id'];
		$sql="DELETE FROM tax WHERE tax_id='$tax_id'";
		$query=mysqli_query($db_con,$sql);
		header("location:quantri.php?page_layout=danhsachtax");
	// }
?>