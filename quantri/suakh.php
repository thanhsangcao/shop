<?php
    //thêm địa chỉ mới
    if (isset($_POST['submit'])) {
        $id_kh=$_GET['id_kh'];
        $dia_chi=$_POST['dia_chi'];
        $sql_add="INSERT INTO diachi(dia_chi,id_kh) VALUES ('$dia_chi','$id_kh')";
        $query_add=mysqli_query($db_con,$sql_add);
    }

    if (isset($_GET['id_kh'])) {
        $id_kh=$_GET['id_kh'];
        $sql="SELECT * FROM khachhang WHERE id_kh=$id_kh";
        $query=mysqli_query($db_con,$sql);
        $row=mysqli_fetch_array($query);
    }
    //danh sách địa chỉ    
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else
    {
        $page=1;
    }
    $rowsPerPage=5;
    $perRow=($page-1)*$rowsPerPage;
    $sql_address="SELECT * FROM diachi WHERE id_kh=$id_kh ORDER BY id_diachi ASC LIMIT $perRow,$rowsPerPage";
    $query_address=mysqli_query($db_con,$sql_address);
    $totalRow=mysqli_num_rows(mysqli_query($db_con,"SELECT * FROM diachi WHERE id_kh=$id_kh"));
    $totalPage=ceil($totalRow/$rowsPerPage);

    $listPage=" ";
    for ($i=1; $i <=$totalPage ; $i++) { 
        if ($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=suakh&id_kh='.$id_kh.'&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=suakh&id_kh='.$id_kh.'&page='.$i.'">'.$i.'</a></li>';
        }
    }
    //update
    if (isset($_POST['update'])) {
        $ten_kh=$_POST['ten_kh'];
        $sdt=$_POST['sdt'];
        $id_kh=$_GET['id_kh'];
        $sql="UPDATE khachhang SET ten_kh='$ten_kh',sdt='$sdt' where id_kh=$id_kh ";
        $query=mysqli_query($db_con,$sql);
        header('location:quantri.php?page_layout=danhsachkh');
    }
?>
<script type="text/javascript">
    function xoatax(){
        var conf=confirm("Bạn có chắc chắn muốn xóa");
        return conf;
    }
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Xem chi tiết</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Thông tin khách hàng ID:<?php echo $row['id_kh']?></h3></div>
            <div class="panel-body" style="position: relative;">
                <div class="col-md-12">
                    <form method="post" id="update-form">
                        <div class="col-md-6">
                            <label>Họ tên:</label><input type="text" name="ten_kh" required="" class="form-control" value="<?php echo $row['ten_kh']?>">
                            
                        </div>
                        <div class="col-md-6">
                            <label>SĐT :</label><input type="text" name="sdt" required="" class="form-control" value="0<?php echo $row['sdt']?>">
                        </div>
                        <!-- <input type="submit" name="update" id="update" class="hide"> -->
                    </form>
                </div>
                <div class="col-md-12">
                    
                        <form method="post">
                            <div class="col-md-5">
                                <label>Thêm địa chỉ:</label>
                                <input type="text" name="dia_chi" required="" class="form-control">
                            </div>
                            <div class="col-md-2" style="margin-top: 32px;">
                                <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                            </div>
                            
                        </form>
                                
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">

                        <thead>
                            <tr>                                
                                <th data-sortable="true">ID</th>
                                <th data-sortable="true">Địa chỉ</th>
                                <th data-sortable="true">Sửa</th>
                                <th data-sortable="true">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while ($row=mysqli_fetch_array($query_address)){
                            ?>
                            <tr style="height: 200px;">
                                <td data-checkbox="true"><?php echo $row['id_diachi'];?></td>
                                <td data-checkbox="true"><a onclick="document.getElementById('edit<?php echo $row['id_diachi']?>').style.display='block'" style="cursor:pointer;"><?php echo $row['dia_chi'];?></a></td>
                                

                                </td>                               
                                <td>
                                    
                                    <a onclick="document.getElementById('edit<?php echo $row['id_diachi']?>').style.display='block'" style="cursor:pointer;">
                                        <span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg>
                                        </span>
                                        </a>
                                    <!-- edit address -->
                                    <div id="edit<?php echo $row['id_diachi']?>" class="modal">
                                      <form class="modal-content animate" action="suadc.php?">
                                        <div class="form-login">
                                            <h2 class="title">Sửa địa chỉ ID:<?php echo $row['id_diachi']?></h2>
                                            <input type="text" placeholder="Name" name="dia_chi" required value="<?php echo $row['dia_chi'];?>">
                                            <input type="hidden" name="id_diachi" value="<?php echo $row['id_diachi']?>">
                                            <input type="hidden" name="id_kh" value="<?php echo $row['id_kh']?>">
                                            <input type="hidden" name="page_layout" value="<?php echo $_GET['page_layout']?>">
                                            <button type="submit" class="btn btn-primary">OK</button>
                                            <button type="button" onclick="document.getElementById('edit<?php echo $row['id_diachi']?>').style.display='none'" class="btn btn-default">Cancel</button>
                                        </div>
                                      </form>
                                    </div>
                                    <!-- /edit address -->
                                </td>

                                <td>
                                    <a onclick="return xoatax()" href="xoadc.php?id_diachi=<?php echo $row['id_diachi'] ?>&id_kh=<?php echo $row['id_kh']?>&page_layout"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>           
                        </tbody>
                    </table>
                </div>   
                <div class="col-md-3" style="margin-top: 25px;">
                        <a href="quantri.php?page_layout=danhsachkh" class="btn btn-default "  >Quay lại</a>
                        <!-- <a href="#" class="btn btn-primary " id="update-btn" >Hoàn thành</a> -->
                        <input type="submit" class="btn btn-primary" name="update" value="Update" form="update-form">
                        </div>
                <ul class="pagination" style="float: right;">
                    <?php 
                        echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->




</script>



