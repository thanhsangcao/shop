<?php 
	$db_con=mysqli_connect('localhost','root','','vietproshop');
	if(isset($db_con)){
		mysqli_query($db_con,"SET NAMES 'utf8' ");
	}
	else{
		die('Kết nối Database thất bại'.mysqli_connect_error()) ;
	}

?>