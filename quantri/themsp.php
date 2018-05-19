<?php 
    if(isset($_POST['submit'])){
        if (isset($_POST['ten_sp'])&&isset($_POST['gia_sp'])) {
            $ten_sp=$_POST['ten_sp'];
            $gia_sp=$_POST['gia_sp'];
            $bao_hanh=$_POST['bao_hanh'];
            $phu_kien=$_POST['phu_kien'];
            $tinh_trang=$_POST['tinh_trang'];
            $anh_sp=$_FILES['anh_sp']['name'];
            $khuyen_mai=$_POST['khuyen_mai'];
            $trang_thai=$_POST['trang_thai'];
            $dac_biet=$_POST['dac_biet'];
            $chi_tiet_sp=$_POST['chi_tiet_sp'];
            $id_dm=$_POST['id_dm'];
            if($_FILES['anh_sp']['name'] != NULL){ // Đã chọn file
                // Tiến hành code upload file
                if($_FILES['anh_sp']['type'] == "image/jpeg"
                || $_FILES['anh_sp']['type'] == "image/png"
                || $_FILES['anh_sp']['type'] == "image/gif"){
                // là file ảnh
                // Tiến hành code upload    
                    if($_FILES['anh_sp']['size'] > 1048576){
                        echo "File không được lớn hơn 1mb";
                    }else{
                        // file hợp lệ, tiến hành upload
                        $path = "./anh/"; // file sẽ lưu vào thư mục data
                        $tmp_name = $_FILES['anh_sp']['tmp_name'];
                        $name = $_FILES['anh_sp']['name'];
                        
                        // Upload file
                        move_uploaded_file($tmp_name,$path.$name);
                        $sql="INSERT INTO sanpham(ten_sp,gia_sp,bao_hanh,phu_kien,tinh_trang,anh_sp,khuyen_mai,trang_thai,dac_biet,chi_tiet_sp,id_dm) VALUES ('$ten_sp','$gia_sp','$bao_hanh','$phu_kien','$tinh_trang','$anh_sp','$khuyen_mai','$trang_thai','$dac_biet','$chi_tiet_sp','$id_dm')";
                        $query=mysqli_query($db_con,$sql);
                        header('location:quantri.php?page_layout=danhsachsp');
                   }
                }else{
                   // không phải file ảnh
                   $error="<center class='alert alert-danger'> Kiểu file không hợp lệ </center> ";
                }
           }
            
        }
    }
    
?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm sản phẩm mới</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thêm sản phẩm Mới</div>

                        <div class="panel-body">
                            
                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <?php 
                                            if (isset($error)) {
                                                echo $error;
                                            }
                                        ?>   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control"  name="ten_sp" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="text" class="form-control" name="gia_sp" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Bảo hành</label>
                                        <input type="text" class="form-control" name="bao_hanh" value="12 Tháng" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Đi kèm</label>
                                        <input type="text" class="form-control" name="phu_kien" value="Hộp, sách, sạc, cáp, tai nghe" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <input type="text" class="form-control" name="tinh_trang" value="Máy Mới 100%" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh mô tả</label>
                                        <input type="file" name="anh_sp">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Khuyến mãi</label>
                                        <input type="text" class="form-control" name="khuyen_mai" value="Dán Màn hình 3 lớp" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Còn hàng</label>
                                        <input type="text" class="form-control" name="trang_thai" value="Còn hàng" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm đặc biệt</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="dac_biet" id="optionsRadios1" value=1>Có
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="dac_biet" id="optionsRadios2" value=0 checked>Không
                                            </label>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
                                        <select name="id_dm" class="form-control">

                                            <option value="unselect" selected>Lựa chọn nhà cung cấp</option>
                                            <?php 
                                                $sql="SELECT * FROM dmsanpham";
                                                $query=mysqli_query($db_con,$sql);
                                                while ($row=mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $row['id_dm']?>"><?php echo $row['ten_dm']?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin chi tiết sản phẩm</label>
                                        <textarea class="form-control" rows="3" name="chi_tiet_sp"></textarea>
                                    </div>



                                </div>

                                <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                                <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->