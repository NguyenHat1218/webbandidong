<?php
include_once('dbconnect.php');
//Lấy thông tin khách hàng đang đăng nhập
$query = "SELECT kh_email, kh_ten, kh_diachi, kh_dienthoai FROM khachhang WHERE kh_tendangnhap = '".$_SESSION['tendangnhap']."'";
	$result = mysqli_query($conn, $query) or die(mysql_error());
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$tendangnhap = $_SESSION['tendangnhap'];
	$email = $row["kh_email"];
	$hoten = $row["kh_ten"];
	$diachi = $row["kh_diachi"];
	$dienthoai = $row["kh_dienthoai"];
	
	//Cập nhật khách hàng khi nhấn vào nút cập nhật
	if(isset($_POST['btnCapNhat'])){
		if($_POST['txtMatKhau'] !=""){
			$matkhau=$_POST['txtMatKhau1'];
		}
		$hoten = $_POST['txtHoTen'];
		$diachi = $_POST['txtDiaChi'];
		$dienthoai = $_POST['txtDienThoai'];
		
		$kiemtra = kiemTra();
		if($kiemtra==""){
			//Khách hàng có thay đổi mật khẩu
			if($_POST['txtMatKhau1'] !=""){
				mysqli_query($conn, "UPDATE khachhang SET kh_ten='".$hoten."', kh_diachi='".$diachi."', kh_dienthoai='".$dienthoai."', kh_matkhau='".md5($_POST['txtMatKhau1'])."' WHERE kh_tendangnhap = '".$_SESSION['tendangnhap']."'") 
				or die(mysql_error());
			}
			
			//Khách hàng không thay đổi mật khẩu
			else{
				mysqli_query($conn, "UPDATE khachhang SET kh_ten='".$hoten."', kh_diachi='".$diachi."', kh_dienthoai='".$dienthoai."' WHERE kh_tendangnhap='".$_SESSION['tendangnhap']."'")
				or die(mysql_error());
			}
			echo "<script> alert ('Cập nhật thanh công !');window.location='index.php';</script>";
		}
		else{
			echo $kiemtra;
		}
		
		function kiemTra(){
			if($_POST['txtHoTen']==""||$_POST['txtDiaChi']==""){
				return "<p class='cssLoi'>Vui lòng nhập đầy đủ thông tin.</p>";
			}
			elseif($_POST['txtMatKhau1'] != $_POST['txtMatKhau2']){
				return "<p class='cssLoi'>Hai mật khẩu phải trùng nhau.</p>";
			}
			elseif(strlen($_POST['txtMatKhau1']) <=5 && strlen($_POST['txtMatKhau1'])>0){
				return "<p class='cssLoi'>Mật khẩu phải lớn hơn 5 ký tự.</p>";
			}
			else{
				return "";
			}
		}
			
?>

<div class="container">
	
<h2>Cập nhật thông tin cá nhân</h2>

			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">	    
                      <label for="lblTenDangNhap" class="col-sm-2 control-label">Tên đăng nhập(*):  </label>
						<div class="col-sm-10">
						  <label class="form-control" style="font-weight:400"><?php echo $tendangnhap; ?></label>
					     </div>
                     </div>
                           
                         <div class="form-group">   
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							       <label class="form-control" style="font-weight:400"><?php echo $email; ?></label>
							</div>
                          </div>  
                          
                           <div class="form-group"> 
                            <label for="lblMatKhau1" class="col-sm-2 control-label">Mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control"/>
							</div>
                            </div>
                            
                             <div class="form-group"> 
                            <label for="lblMatKhau2" class="col-sm-2 control-label">Nhập lại mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtMatKhau2" id="txtMatKhau2" class="form-control"/>
							</div>
                            </div>
                            
                              <div class="form-group">                         
                            <label for="lblHoten" class="col-sm-2 control-label">Họ tên(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtHoTen" id="txtHoTen" value="<?php echo $hoten; ?>" class="form-control" placeholder="Giá"/>
							</div>
                            </div>
                           
                             <div class="form-group"> 
                             <label for="lblDiaChi" class="col-sm-2 control-label">Địa chỉ(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDiaChi" id="txtDiaChi" value="<?php echo $diachi; ?>" class="form-control" placeholder="Địa chỉ"/>
							</div>
                            </div>
                            
                            <div class="form-group"> 
                            <label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php echo $dienthoai; ?>" class="form-control" placeholder="Điện thoại" />
							</div>
                            </div>

					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                              	
						</div>
					</div>
				</form>
</div>






