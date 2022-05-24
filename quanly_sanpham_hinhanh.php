     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
 include_once("dbconnect.php");
 if(isset($_GET['ma'])){
	 $sp_ma=$_GET['ma'];
	 $sql="SELECT sp_ten FROM sanpham WHERE sp_ma='$sp_ma'";
	 $rs=mysqli_query($conn,$sql);
	 $row=mysqli_fetch_row($rs);
	 $ten=$row[0]; 		
 }
 else{
	 echo '<meta http-equiv="refresh" content="0; URL=quanly_sanpham.php"/>';
 }
 ?>
 <?php
 if(isset($_POST['btnLuu'])){
	 $sp_ma=$_POST['txtMa'];
	 $taptin=$_FILES['fileHinhAnh'];
	 if($taptin['type']=="image/jpg"||$taptin['type']=="image/jpeg"||$taptin['type']=="image/png"||$taptin['type']=="image/gif"){
		 if($taptin['size']<=614400){
			 $tentaptin=$sp_ma."_".$taptin['name'];
			 copy($taptin['tmp_name'], "product-imgs/".$tentaptin);
			 $sqstring="INSERT INTO hinhsanpham(hsp_tentaptin, sp_ma) values('$tentaptin', '$sp_ma')";
			 $rs=mysqli_query($conn,$sqstring);
			 if($rs){
				 echo "<script>alert ('Upload hình ảnh thành công!');</script>";
			 }
			 else{
				 echo "<script>alert ('Upload hình ảnh không thành công!');</script>";
				 echo '<meta http-equiv="refresh" content="0;URL=quanly_sanpham_hinhanh.php?ma='.$sp_ma.'">';
			 }
		 }
		 else{
			 echo "Hình có kích thước quá lớn";
		 }
	 }
	 else{
		 echo "Hình không đúng định dạng";
	 }
 }	 
 ?>
 <?php
 if(isset($_GET["mahinh"])){
	 //Nếu xóa thì lấy mã và tiến hành xóa
	 $mahinh=$_GET["mahinh"];
	 $ketqua=mysqli_query($conn, "SELECT * FROM hinhsanpham WHERE hsp_ma=$mahinh");
	 $row=mysqli_fetch_array($ketqua, MYSQLI_ASSOC);
	 $filecanxoa=$row['hsp_tentaptin'];
	 $sp_ma=$row['sp_ma'];
	 
	 unlink("product-imgs/".$filecanxoa);
	 mysqli_query($conn, "DELETE FROM hinhsanpham WHERE	hsp_ma=$mahinh");
	 echo '<meta http-equiv="refresh" content="0;URL=quanly_sanpham_hinhanh.php?ma='.$sp_ma.'"/>';
 }
 ?>
 	<h2>Quản lý hình ảnh sản phẩm</h2>
		<div class="container">
			 	<form  id="frmHinhAnh" class="form-horizontal" name="frmHinhAnh" method="post" action="" enctype="multipart/form-data" role="form">
					<div class="form-group">
                        <label for="txtTen" class="col-sm-2 control-label">Mã sản phẩm(*):  </label>
						<div class="col-sm-10">
							<input type="text" name="txtMa" id="txtMa" class="form-control" placeholder="Mã sản phẩm" value='<?php echo $sp_ma;?>' readonly="readonly"/>
						</div>
            		</div>	
                    <div class="form-group">    
                        <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
						<div class="col-sm-10">
						     <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $ten; ?>' readonly="readonly"/> 
						</div>
                    </div>    
                     <div class="form-group">    
                        <label for="" class="col-sm-2 control-label">Hình ảnh(*):  </label>
						<div class="col-sm-10">
							<input type="file" name="fileHinhAnh" id="fileHinhAnh" class="form-control"/>
                            <input type="submit"  class="btn btn-primary" name="btnLuu" id="btnLuu" value="Lưu hình ảnh"/>        
						</div>
                     </div>       
 
                    <!--Danh sach hinh anh-->
                     <div class="col-sm-offset-2 col-sm-12">
						<div class="col-sm-1">
                        	<label class="control-label">STT</label>
                        </div>
                        <div class="col-sm-2">
                        	<label class="control-label">Hình ảnh</label>
                        </div>
                        <div class="col-sm-1">
                        	<label class="control-label">Xóa</label>
                        </div>
                    </div> <!-- <div class="col-sm-offset-2 col-sm-12">1 hang bang hinh anh-->
                   <!--Row du lieu-->
                   <?php
		  				$query="SELECT hsp_ma, hsp_tentaptin FROM hinhsanpham WHERE sp_ma=".$sp_ma;
						$result=mysqli_query($conn, $query) or die(mysqli_error($conn));
						$stt=1;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								
					?>
							<div class='col-sm-offset-2 col-sm-12'>
							  <div class='col-sm-1'>
								<?php echo $stt;?>
								</div>
							  <div class='col-sm-2'>
								<img src="product-imgs/<?php echo $row['hsp_tentaptin'];?>" width="100px"/>
							  </div>
							  <div class='col-sm-3'>
								  <a onclick="return deleteConfirm()" 
                                  href="quanly_sanpham_hinhanh.php?mahinh=<?php echo $row['hsp_ma'];?>">
								  <img src='images/delete.png' border='0' /></a>
							  </div>
                              
							</div>
                            <div class='col-sm-offset-2 col-sm-4'>
                           		<div><hr /></div>
                           </div>
                    <?php
						$stt++;
							}
		  			?>
				<!-- <div class="form-group"> -Danh sach hinh anh-->

                   <div class="col-sm-offset-2 col-sm-12">
                   		<div class="col-sm-1">
						     <a href="index.php"> Đóng</a>
                        </div>
              		</div>
                    
				</form>
		</div><!--<div class="container">-->


