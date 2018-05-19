<?php 
    if (isset($_GET['id_kh'])) {
        $id_kh=$_GET['id_kh'];
        $sql="SELECT * FROM khachhang WHERE id_kh=$id_kh";
        $query=mysqli_query($db_con,$sql);
        $row=mysqli_fetch_array($query);

        $sql_address="SELECT * FROM diachi WHERE id_kh=$id_kh";
        $query_address=mysqli_query($db_con,$sql_address);
    }
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Xem chi tiết</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin khách hàng ID:<?php echo $row['id_kh']?></div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" name="ten_kh" value="<?php echo $row['ten_kh']?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="sdt" value="0<?php echo $row['sdt']?>" required="">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                        <div class="col-md-7">
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>                                
                                        <th data-sortable="true">ID</th>
                                        <th data-sortable="true">Địa chỉ</th>
                                        <!-- <th data-sortable="true">Sửa</th> -->
                                        <th data-sortable="true">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while ($row_address=mysqli_fetch_array($query_address)){
                                    ?>
                                    <tr style="height: 200px;">
                                        <td data-checkbox="true"><?php echo $row_address['id_diachi'];?></td>
                                        <td data-checkbox="true"><a id="dia_chi"  style="cursor:pointer;"><?php echo $row_address['dia_chi'];?></a>
                                            <div id="edit" style="display: none;">
                                                <form class="modal-content animate" action="themtt.php">
                                                    <div class="form-login">
                                                        <input type="text" placeholder="Name" name="att_name" required value="<?php echo $row_address['dia_chi'];?>">
                                                        <button type="submit" class="btn btn-primary">OK</button>
                                                        <button type="button" id="cancel" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>    
                                                                      
                                        <!-- <td>
                                            
                                            <a onclick="document.getElementById('edit').style.display='block'" style="cursor:pointer;">
                                                <span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg>
                                                </span>
                                            </a>
                                            
                                        </td> -->

                                        <td>
                                            <a onclick="return xoatax()" href="xoadc.php?id_diachi=<?php echo $row_address['id_diachi'] ?>&id_kh=<?php echo $row_address['id_kh'] ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>           
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#dia_chi").on("click",function(){
        $("#edit").show();
        $("#dia_chi").hide();
        });
        
        $("#cancel").on("click",function(){
        $("#edit").hide();
        $("#dia_chi").show();
        });
    });
</script>

