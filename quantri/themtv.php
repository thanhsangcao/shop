<?php 

    if (isset($_POST['submit'])) {
        $email=$_POST['email'];
        $check_email=strstr($email, "@",true);
        $sql="SELECT email FROM thanhvien WHERE email LIKE '$check_email%' ";
        $query=mysqli_query($db_con,$sql);
        $num_rows=mysqli_num_rows($query);
        if ($num_rows>0){
            $error= "<center class='alert alert-danger'> Tài khoản đã tồn tại </center> ";
        }
        else{
            $mk=$_POST['mk'];
            $quyen_truy_cap=$_POST['quyen_truy_cap'];
            $sql="INSERT INTO thanhvien(email,mat_khau,quyen_truy_cap) VALUES ('$email','$mk','$quyen_truy_cap')";
            $query=mysqli_query($db_con,$sql);
            header("location:quantri.php?page_layout=danhsachtv");
        }
    }
?>



            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm thành viên mới</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thêm thành viên mới</div>
                        <div class="panel-body">

                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control"  name="email" required="">
                                        <?php if (isset($error)) {
                                            echo $error;
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" name="mk" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Quyền truy cập</label>
                                        <input type="text" class="form-control" name="quyen_truy_cap" required="">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
    
                                </div>

                                

                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->