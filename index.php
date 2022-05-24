<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salo- Siêu thị điện máy</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Tao menu cap -->
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
    <link href="csseshop/main.css" rel="stylesheet">
    <link href="csseshop/responsive.css" rel="stylesheet">

    <link href="css/salomon.css" rel="stylesheet">

    <!--datatable-->
    <script src="js/jquery-3.2.0.min.js" />
    </script>
    <script src="js/jquery.dataTables.min.js" />
    </script>
    <script src="js/dataTables.bootstrap.min.js" />
    </script>

</head>

<body>

    <?php
session_start();
if(!isset($_SESSION["giohang"])){
	$_SESSION["giohang"] = array();
}
include_once("dbconnect.php");
?>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 77 637 5064</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> lnhata18059@cusc.ctu.edu.vn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/profile.php?id=100035508373396"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://myaccount.google.com/?utm_source=chrome-profile-chooser&pli=1"><i
                                            class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->
        <div class="header-middle" style="background-color:#069">
            <!--header-middle-->
            <div class="container">
                <div>
                    <div class="col-sm-6">
                        <div class="logo pull-left">
                            <a href="index.php" style="background-color:#069;color:#FFF">SALO <img
                                    src="images/plus.png"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="?khoatrang=giohang" style="background-color:#069;color:#FFF"><i
                                            class="fa fa-shopping-cart"></i> Giỏ hàng <span
                                            class="badge"><?php if((isset($_SESSION['giohang']))&&count($_SESSION['giohang'])>0) echo count($_SESSION['giohang']); else'';?></span></a>
                                </li>

                                <?php 
                                if(isset($_SESSION['tendangnhap']) && $_SESSION['tendangnhap']!= ""){
                                ?>
                                <li><a style="background-color:#069;color:#FFF" href="?khoatrang=capnhatkhachhang"><i
                                            class="fa fa-lock"></i>Hi <?php echo $_SESSION['tendangnhap']?></a></li>
                                <li><a href="?khoatrang=dangxuat" style="background-color:#069;color:#FFF"><i
                                            class="fa fa-crosshairs"></i>Đăng xuất</a></li>
                                <?php
								}
								else
								{
								?>
                                <li><a href="?khoatrang=dangnhap" style="background-color:#069;color:#FFF"><i
                                            class="fa fa-lock"></i>Đăng nhập</a></li>
                                <li><a href="?khoatrang=dangky" style="background-color:#069;color:#FFF"><i
                                            class="fa fa-star"></i>Đăng ký</a></li>
                                <?php
								}
								?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->
        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Giới thiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?khoatrang=lichsuhinhthanh">Lịch sử hình thành</a></li>
                                        <li><a href="?khoatrang=xetulai">Tin Công Nghệ</a></li>
                                        <li><a href="">Liên hệ</a></li>
                                    </ul>
                                </li>
                                <?php
								if(isset($_SESSION["tendangnhap"])){
									if($_SESSION["tendangnhap"]=="admin"){
								?>
                                <li class="dropdown"><a href="#">Quản lý danh mục<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?khoatrang=quanlyloaisanpham">Loại sản phẩm</a></li>
                                        <li><a href="?khoatrang=quanlysanpham">Sản phẩm</a></li>

                                    </ul>
                                </li>
                                <?php } } ?>
                                <li><a href="?khoatrang=hienthi_sanpham">Mua hàng</a></li>
                                <li><a href="?khoatrang=giohang">Giỏ hàng</a></li>
                                <li class="dropdown"> <a href="#">Chủ Đề Góp Ý <i class="fa fa-angle-dơn"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    <li><a href="?khoatrang=chudegopy">Chủ Đề</a></li>
                                        <li><a href="?khoatrang=Gopy">Góp ý</a></li>  
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->
    <?php
	if(isset($_GET['khoatrang'])){
		$khoatrang = $_GET['khoatrang'];
		if($khoatrang=="giohang"){
			include_once("giohang.php");
		}
		elseif($khoatrang=="dangnhap"){
			include_once("dangnhap.php");
		}
		elseif($khoatrang=="dangky"){
			include_once("dangky.php");
		}
		elseif($khoatrang=="dangxuat"){
			include_once("dangxuat.php");
		}
		elseif($khoatrang=="thanhtoan"){
			include_once("thanhtoan.php");
		}
		elseif($khoatrang=="quanlyloaisanpham"){
			include_once("quanly_loaisanpham.php");
		}
		elseif($khoatrang=="quanlysanpham"){
			include_once("quanly_sanpham.php");
		}
		elseif($khoatrang=="quanly_loaisanpham_themmoi"){
			include_once("quanly_loaisanpham_themmoi.php");
		}
		elseif($khoatrang=="quanly_sanpham_themmoi"){
			include_once("quanly_sanpham_themmoi.php");
		}
		elseif($khoatrang=="danhsachsanpham"){
			include_once("danhsachsanpham.php");
		}
		elseif($khoatrang=="quanly_chitietsanpham"){
			include_once("quanly_chitietsanpham.php");
		}
		elseif($khoatrang=="giohang"){
			include_once("giohang.php");
		}
		elseif($khoatrang=="thanhtoan"){
			include_once("thanhtoan.php");
		}
		elseif($khoatrang=="lichsuhinhthanh"){
			include_once("lichsuhinhthanh.php");
		}
		elseif($khoatrang=="xetulai"){
			include_once("tincongnghe.php");
		}
		elseif($khoatrang=="chudegopy"){
			include_once("Gopy.php");
		}
		elseif($khoatrang=="Gopy"){
			include_once("chudegopy.php");
		}
		elseif($khoatrang=="hienthi_sanpham"){
			include_once("hienthi_sanpham.php");
		}
		elseif($khoatrang=="timkiem"){
			include_once("timkiem.php");
		}
	}
	else{
		include_once("noidungtrangchu.php");
	}
	?>
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>S<span>alo</span></h2>
                        <p>Siêu thị điện máy Salo là một trong những siêu thị điện máy phát triển nhanh và ổn định
                            bất chấp tình hình kinh tế thuận lợi hay khó khăn. Chuỗi siêu thị Salo được thành lập từ
                            2010 chuyên bán lẻ các sản phẩm kỹ thuật số di động bao gồm điện thoại di động, máy tính
                            bảng, laptop và phụ kiện với hơn 100 siêu thị tại 62 tỉnh thành trên khắp Việt
                            Nam.<I>Invented for life</I></p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Người dùng </h2>
                        <ul>
                            <li><a href="#">Hóa đơn</a></li>
                            <li><a href="#">Sở thích</a></li>
                            <li><a href="#">Nhà cung cấp</a></li>
                            <li><a href="#">Thông tin khác</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Phân loại</h2>
                        <?php 
							$sq="SELECT * FROM loaisanpham a WHERE (SELECT count(*) FROM sanpham b WHERE a.lsp_ma=b.lsp_ma)>0";
							$result=mysqli_query($conn,$sq);
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						?>
                        <ul>
                            <li>
                                <a href="?khoatrang=danhsachsanpham&maloai=<?php echo $row['lsp_ma'];?>">
                                    <?php echo $row['lsp_ten'];?>
                                </a>
                            </li>
                        </ul>
                        <?php 
							}
						?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Salo</h2>
                        <p>Chúng tôi tạo ra salo với mục đích thiết thực là phục vụ cho khách hàng khi tiếp cận với công
                            nghệ đặc biệt là điện thoại thông minh.Với những chiếc điện thoại với kiểu dáng bất mắt và
                            không kém phần sang trọng,thể hiện được đẳng cấp và sự sáng tạo trên từng đường nét.</p>
                            <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; lnhat_A18059_Samuel. <a href="https://www.facebook.com/profile.php?id=100035508373396"
                                target="_blank">facebook</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>

    <!--data table - dat dung vi tri nay-->
    <script src="js/jquery.dataTables.min.js" />
    </script>
    <script src="js/dataTables.bootstrap.min.js" />
    </script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>
</body>

</html>