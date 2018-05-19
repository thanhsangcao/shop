<?php 
    $id_kh=$_GET['id_kh'];
    //thêm customer
    if (isset($_POST['submit'])) {
        $dia_chi=$_POST['dia_chi'];
        $sql_add="INSERT INTO diachi(dia_chi,id_kh) VALUES ('$dia_chi','$id_kh')";
        $query_add=mysqli_query($db_con,$sql_add);
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
    $sql="SELECT * FROM diachi WHERE id_kh=$id_kh ORDER BY id_diachi ASC LIMIT $perRow,$rowsPerPage";
    $query=mysqli_query($db_con,$sql);
    $totalRow=mysqli_num_rows(mysqli_query($db_con,"SELECT * FROM diachi WHERE id_kh=$id_kh"));
    $totalPage=ceil($totalRow/$rowsPerPage);

    $listPage=" ";
    for ($i=1; $i <=$totalPage ; $i++) { 
        if ($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=themdc&id_kh='.$id_kh.'&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=themdc&id_kh='.$id_kh.'&page='.$i.'">'.$i.'</a></li>';
        }
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
        <h1 class="page-header">Thêm khách hàng mới</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Bước 2: Nhập địa chỉ</h3></div>
            <div class="panel-body" style="position: relative;">
                <div class="col-md-7">
                    <form method="post">
                        <div class="col-md-9">
                            <label>Địa chỉ:</label><input type="text" name="dia_chi" required="" class="form-control">
                        </div>
                        <div class="col-md-2" style="margin-top: 32px;">
                            <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        </div>
                        
                    </form>
                </div>                
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
                            while ($row=mysqli_fetch_array($query)){
                        ?>
                        <tr style="height: 200px;">
                            <td data-checkbox="true"><?php echo $row['id_diachi'];?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suatax&tax_id=<?php echo $row['id_diachi'] ?>"><?php echo $row['dia_chi'];?></a></td>
                            

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
                                        <button type="submit" class="btn btn-primary">OK</button>
                                        <button type="button" onclick="document.getElementById('edit<?php echo $row['id_diachi']?>').style.display='none'" class="btn btn-default">Cancel</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /edit address -->
                            </td>

                            <td>
                                <a onclick="return xoatax()" href="xoadc.php?id_diachi=<?php echo $row['id_diachi'] ?>&id_kh=<?php echo $row['id_kh'] ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>           
                    </tbody>
                </table>
                <div class="col-md-3" style="margin-top: 25px;">
                        <!-- <a href="#" class="btn btn-default "  >Quay lại</a> -->
                        <a href="quantri.php?page_layout=danhsachkh" class="btn btn-primary "  >Hoàn thành</a>
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

