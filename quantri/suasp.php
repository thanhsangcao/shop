<?php 
    $id_sp=$_GET['id_sp'];
    $sql="SELECT * FROM sanpham where id_sp=$id_sp";
    $query=mysqli_query($db_con,$sql);
    $row=mysqli_fetch_array($query);
    if(isset($_POST['submit'])){
        $ten_sp=$_POST['ten_sp'];
        $gia_sp=$_POST['gia_sp'];
        $bao_hanh=$_POST['bao_hanh'];
        $phu_kien=$_POST['phu_kien'];
        $tinh_trang=$_POST['tinh_trang'];
        if ($_FILES['anh_sp']['name']==''){
            $anh_sp = $row['anh_sp'];
        }else{
            $anh_sp=$_FILES['anh_sp']['name'];
        }
        
        $khuyen_mai=$_POST['khuyen_mai'];
        $trang_thai=$_POST['trang_thai'];
        $dac_biet=$_POST['dac_biet'];
        $chi_tiet_sp=$_POST['chi_tiet_sp'];
        if (isset($ten_sp)&&isset($gia_sp)) {
            $sql="UPDATE sanpham SET ten_sp='$ten_sp',gia_sp='$gia_sp',bao_hanh='$bao_hanh',phu_kien='$phu_kien',tinh_trang='$tinh_trang',anh_sp='$anh_sp',khuyen_mai='$khuyen_mai',trang_thai='$trang_thai',dac_biet='$dac_biet',chi_tiet_sp='$chi_tiet_sp' where id_sp=$id_sp ";
            $query=mysqli_query($db_con,$sql);
            header('location:quantri.php?page_layout=danhsachsp');
        }

    }
?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa thông tin sản phẩm</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sửa thông tin sản phẩm</div>
                        <div class="panel-body">

                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control"  name="ten_sp" value="<?php echo $row['ten_sp'];?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="text" class="form-control" name="gia_sp" value="<?php echo $row['gia_sp'];?>" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Bảo hành</label>
                                        <input type="text" class="form-control" name="bao_hanh" value="<?php echo $row['bao_hanh'];?>" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Đi kèm</label>
                                        <input type="text" class="form-control" name="phu_kien" value="<?php echo $row['phu_kien'];?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <input type="text" class="form-control" name="tinh_trang" value="<?php echo $row['tinh_trang'];?>" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh mô tả</label>
                                        <input type="file" name="anh_sp">    
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Khuyến mãi</label>
                                        <input type="text" class="form-control" name="khuyen_mai" value="<?php echo $row['khuyen_mai'];?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Còn hàng</label>
                                        <input type="text" class="form-control" name="trang_thai" value="<?php echo $row['trang_thai'];?>" required="">
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
                                                <input type="radio" name="dac_biet" id="optionsRadios2" value=0>Không
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
                                        <select name="id_dm" class="form-control">
                                            <option value="1">iPhone</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin chi tiết sản phẩm</label>
                                        <textarea class="form-control" rows="3" name="chi_tiet_sp"></textarea>
                                    </div>



                                </div>

                                <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                                <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->