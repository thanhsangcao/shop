<?php 
    if(isset($_POST['submit'])){
        if (!isset($_GET['id_kh'])) {
            $ten_kh=$_POST['ten_kh'];
            $sdt=$_POST['sdt'];
            $sql="INSERT INTO khachhang(ten_kh,sdt) VALUES ('$ten_kh','$sdt')";
            $query=mysqli_query($db_con,$sql);
            $id_kh= mysqli_insert_id($db_con);
            header('location:quantri.php?page_layout=themdc&id_kh='.$id_kh);
        }else{
            $id_kh=$_GET['id_kh'];
            header('location:quantri.php?page_layout=themdc&id_kh='.$id_kh);
        }
        

    }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm khách hàng mới</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Bước 1: Nhập thông tin chung</h3></div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="col-md-6">     
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" required="" name="ten_kh">
                                
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" required="" name="sdt">
                            </div>                                                                                  
                            <button type="submit" class="btn btn-primary" name="submit">Tiếp tục</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->