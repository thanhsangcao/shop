<?php
	$tax_id=$_GET['tax_id']; 
	$sql="SELECT * FROM tax WHERE tax_id='$tax_id'";
	$query=mysqli_query($db_con,$sql);
	$row=mysqli_fetch_array($query);
	if (isset($_POST['submit'])) {
		$tax_type=$_POST['tax_type'];
		$tax_percent=$_POST['tax_percent'];
		if($tax_type!=$row['tax_type']){
			$error="<center class='alert alert-danger'> Không được thay đổi trường này </center> ";
		}
		else{
			$sql="UPDATE tax SET tax_percent='$tax_percent' WHERE tax_id='$tax_id'";
			$query=mysqli_query($db_con,$sql);
			header("location:quantri.php?page_layout=danhsachtax");
		}
	}

?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa loại thuế</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sửa loại thuế</div>
                        <div class="panel-body">

                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại thuế</label>
                                        <input type="text" class="form-control"  name="tax_type" required="" value="<?php echo $row['tax_type'];?>">
                                        <?php if (isset($error)) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tỷ lệ(%)</label>
                                        <input type="text" class="form-control" name="tax_percent" required="" value="<?php echo $row['tax_percent'];?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
    
                                </div>

                                

                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
