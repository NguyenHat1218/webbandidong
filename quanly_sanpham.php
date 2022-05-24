    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--datatable-->
    <script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>

        <script language="javascript">
            function deleteConfirm(){
                if(confirm("Bạn có chắc chắn muốn xóa!")){
                    return true;
                }
                else{
                    return false;
                }
            }
        </script>
        <?php
			include_once 'dbconnect.php';
			if(isset($_POST['btnXoa'])&&isset($_POST['checkbox'])){
			for($i = 0;$i < count($_POST['checkbox']);$i++){
				$masanpham=$_POST['checkbox'][$i];
				mysqli_query($conn, "DELETE FROM sanpham WHERE sp_ma=$masanpham");
			}
		}
		?>
        <form name="frmXoa" method="post" action="">
        <h1>Quản lý sản phẩm</h1>
        <p>
        	<a href="index.php?khoatrang=quanly_sanpham_themmoi">
            <img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn</strong></th>
                    <th><strong>Mã sản phẩm</strong></th>
                    <th><strong>Tên sản phẩm</strong></th>
                    <th><strong>Giá</strong></th>
                    <th><strong>Số lượng</strong></th>
                    <th><strong>Loại sản phẩm</strong></th>
                    <th><strong>Nhà sản xuất</strong></th>
                    <th><strong>Hình ảnh</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
					
				$result = mysqli_query($conn, "SELECT sp_ma, sp_ten, sp_mota_ngan, sp_gia, sp_ngaycapnhat, sp_soluong,lsp_ten, nsx_ten FROM sanpham a JOIN loaisanpham b ON a.lsp_ma = b.lsp_ma JOIN nhasanxuat c ON a.nsx_ma = c.nsx_ma ORDER BY sp_ma DESC");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			?>
			<tr>
            	 <td class="cotCheckbox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["sp_ma"]?>"></td>
              	 <td ><?php echo $row["sp_ma"] ?></td>
             	 <td><?php echo $row["sp_ten"] ?></td>
              	 <td><?php echo $row["sp_gia"] ?></td>
              	 <td ><?php echo $row["sp_soluong"] ?></td>
             	 <td><?php echo $row["lsp_ten"] ?></td>
             	 <td><?php echo $row["nsx_ten"] ?></td>
              
              
             	<td align='center' class='cotNutChucNang'>
             	<a href="quanly_sanpham_hinhanh.php?ma=<?php echo $row['sp_ma']?>">
             	<img src='images/image_edit.png' border='0'  /></a>
             	</td>
             	
             	<td align='center' class='cotNutChucNang'>
                <a href="quanly_sanpham_capnhat.php?ma=<?php echo $row['sp_ma'] ?>">
              	<img src='images/edit.png' border='0'/></a>
              	</td>
              
              	<td align='center' class='cotNutChucNang'>
              	<a onclick="return deleteConfirm()" href="quanly_sanpham.php?ma=<?php echo $row['sp_ma'] ?>">
              	<img src='images/delete.png' border='0' /></a>
              	</td>
          </tr>
            <?php
				}
				?>
			</tbody>
        
        </table>  
<!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            
            <input type="submit" value="Xóa mục chọn" name="btnXoa" id="btnXoa" onclick='return deleteConfirm()' class="btn btn-primary" />
            
    <script language="javascript">
		$(document).ready(function() {
    var table = $('#tablesalomon').DataTable( {
        responsive: true,
		"language": {
                "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
                "info": "Hiển thị từ dòng _START_ trong tổng số _TOTAL_ dòng dữ liệu",
                "infoEmpty": "Dữ liệu rỗng",
                "emptyTable": "Chưa có dữ liệu nào",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "loadingRecords": "Đang load dữ liệu...",
                "zeroRecords": "không tìm thấy dữ liệu",
                "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
                "paginate": {
                    "first": "|<",
                    "last": ">|",
                    "next": ">>",
                    "previous": "<<"
                }
            },
            "lengthMenu": [[2, 5, 10, 15, 20, 25, 30, -1], [2, 5, 10, 15, 20, 25, 30, "Tất cả"]]
    } );
    new $.fn.dataTable.FixedHeader( table );
} );		
    </script> 
                
         <div>
         </div><!--Nút chức nang-->
 </form>
 
 <?php 


?>