<?php 
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else {
        $page=1;
    }
    $rowsPerPage=10;
    $perRow=($page-1)*$rowsPerPage;
    $sql="SELECT * FROM khachhang ORDER BY id_kh ASC LIMIT $perRow,$rowsPerPage";
    $query=mysqli_query($db_con,$sql);
    $totalRow=mysqli_num_rows(mysqli_query($db_con,"SELECT * FROM khachhang"));
    $totalPage=ceil($totalRow/$rowsPerPage);

    $listPage=" ";
    for ($i=1; $i <=$totalPage ; $i++) { 
        if ($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachkh&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=danhsachkh&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>
<script type="text/javascript">
    function Xoadm(){
        var conf=confirm("Bạn có chắc chắn muốn xóa");
        return conf;
    }
</script>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý Khách hàng</h1>
                </div>
            </div><!--/.row-->
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body" style="position: relative;">
                            <a href="quantri.php?page_layout=themkh" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm khách hàng mới</a>
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>						        
                                        <th data-sortable="true">ID</th>
                                        <th data-sortable="true">Họ tên</th>
                                        <th data-sortable="true">SĐT</th>
                                        <th data-sortable="true">Xem chi tiết</th>
                                        <th data-sortable="true">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row=mysqli_fetch_array($query)){?>
                                    <tr>
                                        <td data-checkbox="true"><?php echo $row['id_kh'];?></td>
                                        <td data-checkbox="true"><a href="quantri.php?page_layout=suakh&id_kh=<?php echo $row['id_kh'];?>"><?php echo $row['ten_kh'];?></a></td>
                                        <td data-checkbox="true">0<?php echo $row['sdt'];?></td>						        
                                        <td>
                                            <a href="quantri.php?page_layout=suakh&id_kh=<?php echo $row['id_kh'];?>"><span><svg class="glyph stroked eye" style="width: 20px;height: 20px;"><use xlink:href="#stroked-eye"/></svg></span></a>
                                        </td>

                                        <td>
                                            <a onClick="return Xoadm();" href="xoakh.php?id_kh=<?php echo $row['id_kh'];?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                        </td>
                                    </tr>
                                    <?php }?>    
                                </tbody>
                            </table>
                            <ul class="pagination" style="float: right;">
                                <?php
                                    echo $listPage;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->	