<?php
	$id_thanhvien=$_GET['id_thanhvien']; 
	$sql="SELECT * FROM thanhvien WHERE id_thanhvien='$id_thanhvien'";
	$query=mysqli_query($db_con,$sql);
	$row=mysqli_fetch_array($query);
	if (isset($_POST['submit'])) {
		$email=$_POST['email'];
		$mk=$_POST['mk'];
		$quyen_truy_cap=$_POST['quyen_truy_cap'];
		if($email!=$row['email']){
			$error="<center class='alert alert-danger'> Không được thay đổi trường này </center> ";
		}
		else{
			$sql="UPDATE thanhvien SET mat_khau='$mk',quyen_truy_cap='$quyen_truy_cap' WHERE id_thanhvien='$id_thanhvien'";
			$query=mysqli_query($db_con,$sql);
			header("location:quantri.php?page_layout=danhsachtv");
		}
	}

?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa thành viên</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sửa thành viên</div>
                        <div class="panel-body">

                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control"  name="email" required="" value="<?php echo $row['email'];?>">
                                        <?php if (isset($error)) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="text" class="form-control" name="mk" required="" value="<?php echo $row['mat_khau'];?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Quyền truy cập</label>
                                        <input type="text" class="form-control" name="quyen_truy_cap" required="" value="<?php echo $row['quyen_truy_cap'];?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
    
                                </div>

                                

                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
