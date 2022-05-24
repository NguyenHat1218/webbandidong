<!--<link rel="stylesheet" type="text/css" href="style.css"/>-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">

<script src="js/jquery-3.2.0.min.js" />
</script>
<script src="js/jquery.dataTables.min.js" />
</script>
<script src="js/dataTables.bootstrap.min.js" />
</script>


<?php 
//Nhúng file kết nối với database
include_once'dbconnect.php';

if(isset($_POST['btnLogin'])){
	$tendangnhap = trim($_POST["txtTenDangNhap"]);
	$matkhau = trim($_POST["txtMatKhau"]);
	
	$loi="";
	if($tendangnhap==""){
		$loi.="<li>Vui lòng nhập tên đăng nhập!</li>";
	}
	if($matkhau==""){
		$loi.="<li>Vui lòng nhập mật khẩu!</li>";
	}
	if($loi!=""){
		echo "<ul class='cssLoi'>".$loi."</ul>";
	}
	else{
		$tendangnhap = mysqli_real_escape_string($conn,$tendangnhap);
		$matkhau = md5($matkhau);
		$result = mysqli_query($conn, "SELECT * FROM khachhang WHERE kh_tendangnhap ='" . $tendangnhap . "' AND kh_matkhau='" . $matkhau ."' AND kh_trangthai= 0 ") or die(mysqli_error($conn));
		if(mysqli_num_rows($result)==1){
			$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
			$_SESSION["tendangnhap"]=$tendangnhap;
			$_SESSION["quantri"]=$row["kh_quantri"];
			echo "<script language='javascript'>window.location='index.php'</script>";
		}
		else{
			echo 'Đăng nhập không thành công';
		}
	}
}
?>
<div class="container">
<h1>Đăng nhập</h1>
<form id="form1" name="form1" method="POST" action="" class="form-horizontal" role="form">
    <div class="row">
        <div class="form-group">
            <label for="txtTenDangNhap" class="col-sm-2 control-label">Tài khoản(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control"
                    placeholder="Tên đăng nhập" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="txtMatKhau" class="col-sm-2 control-label">Mật khẩu(*): </label>
            <div class="col-sm-10">
                <input type="password" name="txtMatKhau" id="txtMatKhau" class="form-control" placeholder="Mật khẩu"
                    value="" />
            </div>
        </div>

        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="btnLogin" class="btn btn-primary" id="btnLogin" value="Đăng nhập" />
            <label><input name="chkRemember" type="checkbox" id="chkRemember" value="1" class="checkbox-inline" /> Ghi
                nhớ đăng nhập</label>
        </div>

        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <p><a href="#">Quên mật khẩu?</a>
        </div>


    </div>
    </div>

</form>