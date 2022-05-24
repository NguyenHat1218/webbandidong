<?php
include_once('dbconnect.php');

//Insert data for table
$gy_ma = $_POST['gy_ma'];
$gy_hoten = $_POST['gy_hoten'];
$gy_email = $_POST['gy_email'];
$gy_diachi = $_POST['gy_diachi'];
$gy_dienthoai = $_POST['gy_dienthoai'];
$gy_tieude = $_POST['gy_tieude'];
$gy_noidung = $_POST['gy_noidung'];
$gy_ngaygopy = $_POST['gy_ngaygopy'];
$cdgy_ma = $_POST['cdgy_ma'];

$sql = "INSERT INTO `gopy`(`gy_ma`,`gy_hoten`,`gy_email`,`gy_diachi`,`gy_dienthoai`,`gy_tieude`,`gy_noidung`,`gy_ngaygopy`,`cdgy_ma`) 
VALUES('$gy_ma','$gy_hoten','$gy_email','$gy_diachi','$gy_dienthoai','$gy_tieude','$gy_noidung','$gy_ngaygopy','$cdgy_ma')";
if(!mysqli_query($conn, $sql))
{
    echo "Not insert";
}else
{
   function redirect($url){
       if(!empty($url))
       header("Location:{$url}");
   }
    redirect("index.php");
}
?>