<?php
include_once("dbconnect.php");

	function dathang($ma,$conn)
	{
			$ma = $_GET["ma"];
			$resultsql = mysqli_query($conn, "SELECT a.*, b.nsx_ten FROM sanpham a, nhasanxuat b
									WHERE sp_ma = ".$ma);
			$rowsql = mysqli_fetch_row($resultsql);
			if($rowsql[0] >= 1)
			{
				$coroi = false;
				foreach ($_SESSION["giohang"] as $key => $row) 
				{
					if($key==$ma)
					{
						$_SESSION['giohang'][$key]["soluong"] +=  1;
						$coroi = true;
					}
				}
				
				if(!$coroi)
				{
					$ten = $rowsql[1];
					$gia = $rowsql[2];
					$nsx = $rowsql[3];
					
					$dathang = array(
					"ten" => $ten,
					"gia" => $gia,
					"soluong" =>1,
					"hang" => $nsx);
					$_SESSION['giohang'][$ma]=$dathang;
				}
				echo "<script language='javascript'>
				alert('Sản phẩm đã được thêm vào giỏ hàng, truy cập giỏ hàng để xem!'); 
				</script>";
			}
			else
			{
				echo "<script>alert('Số lượng bạn đặt vượt quá số lượng trong kho.');</script>";
			}
	}
	
	if(isset($_GET['func'])&isset($_GET['ma']))
	{
		$ma = $_GET['ma'];
		dathang($ma,$conn);
	}

 ?>  
 
     <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/h4-slide.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide2.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one, get one <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">school supplies & backpacks.*</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide3.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide4.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">& Phone</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bán chạy nhất</h2>
                        <a href="" class="wid-view-more">Xem tất cả</a>
                        <?php
							$sqstr="SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b 
							WHERE a.sp_ma = b.sp_ma LIMIT 0,1) as hsp_tentaptin, 
							(SELECT SUM(sp_dh_soluong) FROM sanpham_dondathang c WHERE a.sp_ma=c.sp_ma) 
							AS soluong FROM sanpham a ORDER BY soluong DESC LIMIT 0,3";
							$result = mysqli_query($conn,$sqstr);
							while($rs=mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
						?>
                        <div class="single-wid-product">
                            <a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'] ?>">
                            <img src="product-imgs/<?php echo $rs['hsp_tentaptin']?>"  class="product-thumb">
                            </a>
                            <h2><a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'] ?>">
							<?php echo $rs['sp_ten']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>                          
                            <div class="product-wid-price">
                                <ins><?php echo $rs['sp_gia'];?></ins> <del><?php echo $rs['sp_giacu']; ?></del>
                            </div>                            
                        </div>
                        <?php
							}
						?>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Đã xem gần đây</h2>
                        <a href="#" class="wid-view-more">Xem tất cả</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Mới nhất</h2>
                        <a href="#" class="wid-view-more">Xem tất cả</a>
                        <?php
							$sqstr="SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b 
							WHERE a.sp_ma = b.sp_ma LIMIT 0,1) as hsp_tentaptin 
							FROM sanpham a ORDER BY sp_ngaycapnhat DESC LIMIT 0,3";
							$result = mysqli_query($conn,$sqstr);
							while($rs=mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
						?>
                        <div class="single-wid-product">
                            <a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'] ?>">
                            <img src="product-imgs/<?php echo $rs['hsp_tentaptin']?>" class="product-thumb"></a>
                            <h2><a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'] ?>">
							<?php echo $rs['sp_ten']; ?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                 <ins><?php echo $rs['sp_gia'];?></ins> <del><?php echo $rs['sp_giacu']; ?></del>
                            </div>                            
                        </div>
                        <?php
							}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
   
  