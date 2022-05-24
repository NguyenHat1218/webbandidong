<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
</script>
<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>

 
 <?php
include_once('sendMailLib.php');

include_once('dbconnect.php');
	$api_url = 'https://www.google.com/recaptcha/api/siteverify';
	$site_key = '6LcSpMYUAAAAAGlZ3giViLZMv9m8axytpB62YlZ7'; //Sitekey lúc đăng ký reCaptcha
	$secret_key = '6LcSpMYUAAAAAPSSzuQPKTZTzDGlKSbzLgWKJypV'; //Secret lúc đăng ký reCaptcha

if(isset($_POST['btnDangKy'])){	
	$tendangnhap =$_POST['txtTenDangNhap'];
	$matkhau=$_POST['txtMatKhau1'];
	$hoten=$_POST['txtHoTen'];
	$email = $_POST['txtEmail'];
	$diachi = $_POST['txtDiaChi'];
	$dienthoai = $_POST['txtDienThoai'];
	
	if(isset($_POST['grpGioiTinh'])){
		$gioitinh = $_POST['grpGioiTinh'];
	}
	$ngaysinh = $_POST['slNgaySinh'];
	$thangsinh = $_POST['slThangSinh'];
	$namsinh = $_POST['slNamSinh'];
	
	$loi = "";
	//lấy dữ liệu được post lên
    $site_key_post = $_POST['g-recaptcha-response']; 
    //lấy IP của khach
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
	{
        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
    } 
	else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
	{
        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } 
	else 
	{
        $remoteip = $_SERVER['REMOTE_ADDR'];
    }
    //tạo link kết nối
    $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
    //lấy kết quả trả về từ google
    $response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
    $response = json_decode($response);
    if(!($response->success))
    {
         $loi.='<li>Captcha không đúng</li>';
	}
	
	
	if($_POST['txtTenDangNhap']==""||$_POST['txtMatKhau1']==""
	||$_POST['txtMatKhau2']==""||$_POST['txtHoTen']==""
	||$_POST['txtEmail']==""||$_POST['txtDiaChi']==""||!isset($gioitinh)){
		$loi .="<li>Vui lòng nhập đầy đủ thông tin có dấu *</li>";
	}
	
	if($_POST['txtMatKhau1']!=$_POST['txtMatKhau2'])
	{
		$loi .="<li>Hai mật khẩu phải trùng nhau</li>";
	}
	
	if(strlen($_POST['txtMatKhau1'])<=5){
		$loi .="<li>Mật khẩu phải nhiều hơn 5 ký tự. </li>";
	}
	
	if(strpos($_POST['txtEmail'],"@") === false) {
    	$loi .="<li>Địa chỉ email không hợp lệ</li>";
	}
	
	if($_POST['slNamSinh']=="0"){
		$loi .="<li>Chưa chọn năm sinh</li>";
	}

	if($loi!= ""){
		echo "<ul class='cssLoi'>".$loi."</ul>";
	}
	else{
		$randomcode=md5(rand());
		$sq = "SELECT * FROM khachhang WHERE kh_tendangnhap='$tendangnhap' OR kh_email='$email'";
		$ketqua = mysqli_query($conn,$sq);
		if(mysqli_num_rows($ketqua)==0)
		{
			mysqli_query($conn, "INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh,   	kh_diachi,kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri) 
			VALUES ('$tendangnhap', '".md5($matkhau)."', '$hoten', $gioitinh, '$diachi', '$dienthoai', '$email',
		$ngaysinh, $thangsinh, $namsinh, '', '$randomcode', 0, 0)") or die(mysqli_error($conn));
		
			
			
			echo "<script language='javascript'>window.location='index.php'</script>";
		}
		else
		{
			echo "<li class=\"loi\">Tên đăng nhập hoặc email đã được sử dụng</li>";
		}
	}
}

?>
<div class="container">
        <h2>Đăng ký thành viên</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Tên tài khoản(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control" placeholder="Tên đăng nhập" value="<?php if(isset($tendangnhap)) echo $tendangnhap; ?>"/>
							</div>
                      </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control" placeholder="Mật khẩu"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Nhập lại mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtMatKhau2" id="txtMatKhau2" class="form-control" placeholder="Xác nhận mật khẩu"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblHoten" class="col-sm-2 control-label">Họ tên(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtHoTen" id="txtHoTen" value="<?php if(isset($hoten)) echo $hoten; ?>" class="form-control" placeholder="Họ tên"/>
							</div>
                       </div> 
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="<?php if(isset($email)) echo $email; ?>" class="form-control" placeholder="Email"/>
							</div>
                       </div>  
                       
                        <div class="form-group">   
                             <label for="lblDiaChi" class="col-sm-2 control-label">Địa chỉ(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDiaChi" id="txtDiaChi" value="<?php if(isset($diachi)) echo $diachi; ?>" class="form-control" placeholder="Địa chỉ"/>
							</div>
                        </div>  
                        
                         <div class="form-group">  
                            <label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php if(isset($dienthoai)) echo $dienthoai; ?>" class="form-control" placeholder="Điện thoại" />
							</div>
                         </div> 
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="0" id="grpGioiTinh" 
                                        <?php if(isset($gioitinh)&&$gioitinh=="0"){ echo "checked";} ?> />
                                      Nam</label>
                                    
                                      <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="1" id="grpGioiTinh" 
                                      <?php if(isset($gioitinh)&&$gioitinh=="1"){ echo "checked";} ?> />
                                      Nữ</label>

							</div>
                          </div> 
                          
                          <div class="form-group"> 
                            <label for="lblNgaySinh" class="col-sm-2 control-label">Ngày sinh(*):  </label>
                            <div class="col-sm-10 input-group">
                                <span class="input-group-btn">
                                  <select name="slNgaySinh" id="slNgaySinh" class="form-control" >
                						<option value="0">Chọn ngày</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {
                                                 if($i==$ngaysinh){
                                                     echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                                 }
                                                 else{
                                                 echo "<option value='".$i."'>".$i."</option>";
                                                 }
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slThangSinh" id="slThangSinh" class="form-control">
                					<option value="0">Chọn tháng</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                              if($i==$thangsinh){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slNamSinh" id="slNamSinh" class="form-control">
                                    <option value="0">Chọn năm</option>
                                    <?php
                                        for($i=1970;$i<=2010;$i++)
                                         {
                                             if($i==$namsinh){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                                </select>
                                </span>
                           </div> 
                      </div>
                    <div class="form-group"> 
                    	<label for="lblMMaAnToan" class="col-sm-2 control-label">Mã an toàn(*): </label>
                        <div class="col-sm-10">
                        	<div class="g-recaptcha" data-sitekey="<?php echo $site_key?>"></div>
                            </div>
                        </div>
                        	
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnDangKy" id="btnDangKy" value="Đăng ký"/>
                              	
						</div>
                     </div>
				</form>
</div>
    

