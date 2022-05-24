<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A18059_Samuel</title>
</head>

<body>
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
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="latest-product">
                    <h2 class="section-title">Sản phẩm</h2>
                    <div class="product-carousel">

                        <!--Load san pham tu DB -->
                        <?php
		  				   	$result = mysqli_query($conn, "SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma = b.sp_ma LIMIT 0,1) as sp_hinhdaidien FROM sanpham a" );
			
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
                        <!--Một sản phẩm -->
                        <div class="container">
                            <div class="col-md-3">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="product-imgs/<?php echo $row['sp_hinhdaidien']?>"
                                            title="product-imgs">
                                        <div class="product-hover">
                                            <a href="?func=dathang&ma=<?php echo $row['sp_ma']?>"
                                                class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>"
                                                class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>"><?php echo  $row['sp_ten']?></a>
                                    </h2>

                                    <div class="product-carousel-price">
                                        <ins><?php echo $row['sp_gia']?></ins> <del><?php echo $row['sp_giacu']?></del>
                                    </div>
                                   
                                </div>
                            </div>
							</div>
                            <?php
				}
				?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>