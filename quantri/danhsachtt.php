<?php
	$sql="SELECT * FROM thuoctinh";
    $query=mysqli_query($db_con,$sql);
?>
<script type="text/javascript">
    function xoasp(){
        var conf=confirm("Bạn có chắc chắn muốn xóa");
        return conf;
    }
</script>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Quản lý thuộc tính sản phẩm</h2>
    </div>
</div>

<div class="row">
	<!-- tab -->
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
            	<span>Danh sách thuộc tính</span>
            	<button onclick="document.getElementById('att').style.display='block'" style="width:auto;" class="btn btn-primary">Thêm mới</button> 
            </div>
            <div class="panel-body">
                <div>
                	<ul class="nav menu">
                		<?php 
                			while ($row=mysqli_fetch_array($query)){
                		?>
		                <li ><a href="quantri.php?page_layout=danhsachtt&att_id=<?php echo $row['att_id'] ?>"> <?php echo $row['att_name'];?></a></li>
		                <?php 
                            }
                        ?>    
		            </ul>
                </div>
            </div>
        </div>
    </div>
	<!-- end tab -->
    <?php 
    	if(isset($_GET['att_id'])){
    		$att_id=$_GET['att_id'];
	    	$sql="SELECT * FROM thuoctinh WHERE att_id=$att_id";
	    	$query=mysqli_query($db_con,$sql);
	    	$row=mysqli_fetch_array($query);

    ?>
    <!-- grid -->
    <div class="col-md-9">
    	<div class="panel panel-default">
            <div class="panel-heading"> <h3><?php echo $row['att_name'];?></h3>
            	<a href="xoatt.php?att_id=<?php echo $row['att_id']?>" onClick="return xoasp();"><button class="btn btn-danger">Xóa</button></a>
            </div>
            <div class="panel-body" style="position: relative;">
                <a onclick="document.getElementById('value_att').style.display='block'" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm giá trị</a>

                <!-- add value -->
                <div id="value_att" class="modal">
				  <form class="modal-content animate" action="themvalue.php">
				    <div class="form-login">
				    	<h2 class="title">Thêm giá trị <?php echo $row['att_name'];?></h2>
						<label for="uname"><b>Nhập giá trị</b></label>
						<input type="text" placeholder="Value" name="value_name" required>
						<input type="hidden" name="att_id" value="<?php echo $row['att_id']?>">
						<button type="submit" class="btn btn-primary">OK</button>
						<button type="button" onclick="document.getElementById('value_att').style.display='none'" class="btn btn-default">Cancel</button>
				    </div>
				  </form>
				</div>
				<!-- end add value -->

                <table data-toggle="table"   data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                	<thead>
                        <tr>                                
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Giá trị thuộc tính</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    <tbody>
                        <?php
                        	if (isset($_GET['att_id'])) {
                        		$att_id=$_GET['att_id'];
						    	$sql="SELECT * FROM giatri_thuoctinh WHERE att_id=$att_id";
						    	$query=mysqli_query($db_con,$sql);
                        	}
                            while($row=mysqli_fetch_array($query)){
                         ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['value_id'];?></td>
                            <td data-checkbox="true"><a href="#"><?php echo $row['value_name'];?></a></td>
                            <td>
                                <a onClick="return xoasp();" href="xoavalue.php?att_id=<?php echo $row['att_id']?>&value_id=<?php echo $row['value_id']?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- end grid -->
    <?php 
    	}
    ?>
</div><!-- /.row -->

<!-- add attribute -->
<div id="att" class="modal">
  <form class="modal-content animate" action="themtt.php">
    <div class="form-login">
    	<h2 class="title">Thêm mới thuộc tính</h2>
		<label for="uname"><b>Tên thuộc tính</b></label>
		<input type="text" placeholder="Name" name="att_name" required>
		<button type="submit" class="btn btn-primary">OK</button>
		<button type="button" onclick="document.getElementById('att').style.display='none'" class="btn btn-default">Cancel</button>
    </div>
  </form>
</div>
<!-- end add attribute -->

