<?php 
    if(isset($_POST['submit'])){
        $tax_type=$_POST['tax_type'];
        $tax_percent=$_POST['tax_percent'];
        $sql="SELECT tax_type FROM tax WHERE tax_type LIKE '$tax_type' ";
        $query=mysqli_query($db_con,$sql);
        $num_rows=mysqli_num_rows($query);
        if ($num_rows>0){
            $error= "<center class='alert alert-danger'> Loại thuế này đã tồn tại </center> ";
        }
        else{
            $sql="INSERT INTO tax(tax_type,tax_percent) VALUES ('$tax_type','$tax_percent')";
            $query=mysqli_query($db_con,$sql);
            header('location:quantri.php?page_layout=danhsachtax');
        }

    }
?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới loại thuế</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thêm mới loại thuế</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form role="form" method="post">
                                    <div class="col-md-6">     
                                        <div class="form-group">
                                            <?php if (isset($error)) {
                                                echo $error;
                                                }
                                            ?>
                                            <label>Loại thuế</label>
                                            <input class="form-control" type="text" required="" name="tax_type">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Tỷ lệ(%)</label>
                                            <input class="form-control" type="text" required="" name="tax_percent">
                                        </div>                                                                                  
                                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                                        <button type="reset" class="btn btn-default">Làm mới</button>
                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->