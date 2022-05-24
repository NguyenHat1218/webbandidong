    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <!--datatable-->
    <script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
   
    
    
<script language="javascript"> 
	function deleteConfirm(){
		if(confirm("Bạn có chắc chắn muốn xóa")){
			return true;
		}
		else{
			return false;
		}
	}
</script>
		<?php 
		include_once'dbconnect.php';
		if(isset($_POST['btnXoa'])&&isset($_POST['checkbox'])){
			for($i = 0;$i < count($_POST['checkbox']);$i++){
				$masanpham=$_POST['checkbox'][$i];
				mysqli_query($conn, "DELETE FROM loaisanpham WHERE lsp_ma=$masanpham");
			}
		}			
		?>


        <form name="frmXoa" method="post" action="">
        <h1>Danh sách loại sản phẩm</h1>
        <p>
        <a href="index.php?khoatrang=quanly_loaisanpham_themmoi">
        <img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn</strong></th>
                    <th><strong>Mã loại sản phẩm</strong></th>
                    <th><strong>Tên loại sản phẩm</strong></th>
                     <th><strong>Mô tả</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
				//kiểm tra xem có truyền mã cần xóa
				if(isset($_GET["ma"]))
				{
					//nếu xóa thì lấy mã và tiến hành xóa
				$maloai = $_GET["ma"];
				mysqli_query($conn, "DELETE FROM loaisanpham WHERE lsp_ma=$maloai");
				}
			$stt=1;
			$result = mysqli_query($conn, "SELECT * FROM loaisanpham");
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			?>	
			<tr>
              <td class="cotCheckbox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["lsp_ma"]?>"></td>
              <td class="cotCheckbox"><?php echo $stt;?></td>
              <td><?php echo $row['lsp_ten']?></td>
              <td><?php echo $row['lsp_mota']?></td>
             
              <td align='center' class='cotNutChucNang'>
              <a href="quanly_loaisanpham_capnhat.php?ma=<?php echo $row['lsp_ma'];?>">        
              <img src='images/edit.png' border='0'  /></a></td>
              
              <td align='center' class='cotNutChucNang'>
              <a href="quanly_loaisanpham.php?ma=<?php echo $row['lsp_ma'];?>" onclick="return deleteConfirm()">
              <img src='images/delete.png' border='0' /></a></td>
            </tr>
			<?php 
			$stt++;
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
   