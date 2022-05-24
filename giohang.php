<script language="javascript">
            function confirmDelete(){
                if(confirm("Bạn có chắc chắn muốn xóa!")){
                    return true;
                }
                else{
                    return false;
                }
            }
</script>
<?php
?>
<form id="form1" name="form1" method="post" action="">
	<div class="row">
    	<div class="col-sm-2"><label>Tên sản phẩm</label></div>
        <div class="col-sm-2"><label>Hãng sản xuất</label></div>
        <div class="col-sm-2"><label>Giá</label></div>
        <div class="col-sm-2"><label>Số lượng</label></div>
        <div class="col-sm-2"><label>Thành tiền</label></div>
        <div class="col-sm-2"><label>Xóa</label></div>
    </div>
    <?php
   if($_SESSION["giohang"] != null){
	   $tong=0;
	   foreach($_SESSION["giohang"] as $key => $row){
    ?>
            	<div class="row">
                    <div class="col-sm-2"><?php echo $row['ten'] ?></div>
                    <div class="col-sm-2"><?php echo $row["hang"] ?></div>
                    <div class="col-sm-2"><?php echo number_format($row["gia"], 0, ",", ".") ?></div>
                    <div class="col-sm-2"><input type='text' name='SP<?php echo $key ?>' value='<?php echo $row["soluong"] ?>' size='5' style='text-align:center;' maxlength='3'/></div>
                    <div class="col-sm-2"><?php echo number_format($row["gia"] * $row["soluong"], 0, ",", ".") ?></div>
                    <div class="col-sm-2"><a onclick='return confirmDelete()' href="?khoatrang=giohang&action=xoa&ma=<?php echo $key ?>"><img src='images/delete.png'/></a></div>
                                
                    </div>             
				<?php
	   				$tong += $row["gia"] * $row["soluong"];
	   }
	   echo "<div class='row'><div class='col-sm-12' align='right'>
	   <label> Tổng tiền </label>: <span class='Gia'>".number_format($tong, 0, ",", ".")."</span>đồng </div></div>";
   }else{
		   echo "<div class='row'><div class='col-sm-12'>Chưa có sản phẩm trong giỏ hàng</div></div>";
	   }
	   
                ?>
	<div class='row'>
    	<div class='col-sm-12' align="center">
        	<input type="submit" value="Đồng ý và thanh toán" name="btnDongY" id="btnXoa" class="InputButton"/>
    	</div>
		<?php 
		if(isset($_GET['action'])){
			if($_GET['action'] == "xoa"){
				$id = $_GET["ma"];
				unset($_SESSION["giohang"][$id]);
				echo "<script>window.location='?khoatrang=giohang';</script>";
			}
		}
		if(isset($_POST['btnDongY'])){
			if(isset($_SESSION['tendangnhap'])){
				foreach($_SESSION["giohang"] as $key => $row){
					$_SESSION['giohang'][$key]['soluong'] = $_POST['SP'.$key];
				}
				echo "<script>window.location='?khoatrang=thanhtoan';</script>";
			}else{
					echo "<script> alert ('Vui lòng đăng nhập trước khi thanh toán!');</script>";
				}
			}
		?>
    </div>
</form>
