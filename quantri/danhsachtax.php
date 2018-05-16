<?php 
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else
    {
        $page=1;
    }
    $rowsPerPage=10;
    $perRow=($page-1)*$rowsPerPage;
    $sql="SELECT * FROM tax ORDER BY tax_id ASC LIMIT $perRow,$rowsPerPage";
    $query=mysqli_query($db_con,$sql);
    $totalRow=mysqli_num_rows(mysqli_query($db_con,"SELECT * FROM tax"));
    $totalPage=ceil($totalRow/$rowsPerPage);

    $listPage=" ";
    for ($i=1; $i <=$totalPage ; $i++) { 
        if ($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachtax&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=danhsachtax&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Quản lý thuế</h1>
    </div>
</div><!--/.row-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">                   
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themtax" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm loại thuế mới</a>                
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>                                
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Loại thuế</th>
                            <th data-sortable="true">Tỷ lệ(%)</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row=mysqli_fetch_array($query)){
                        ?>
                        <tr style="height: 200px;">
                            <td data-checkbox="true"><?php echo $row['tax_id'];?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suatax&tax_id=<?php echo $row['tax_id'] ?>"><?php echo $row['tax_type'];?></a></td>
                            <td data-checkbox="true"><?php echo $row['tax_percent'];?></td>

                            </td>                               
                            <td>
                                <a href="quantri.php?page_layout=suatax&tax_id=<?php echo $row['tax_id'] ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>

                            <td>
                                <a onclick="return xoatax()" href="xoatax.php?tax_id=<?php echo $row['tax_id'] ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>           
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
</div>