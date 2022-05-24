<?php
include_once('dbconnect.php');

//Insert data for table
$cdgy_ma = $_POST['cdgy_ma'];
$cdgy_ten= $_POST['cdgy_ten'];
$sql = "INSERT INTO `chudegopy`(`cdgy_ma`,`cdgy_ten`) VALUES('$cdgy_ma','$cdgy_ten')";
if(!mysqli_query($conn, $sql))
{
    echo "Not insert";
}else
{
   function redirect($url){
       if(!empty($url))
       header("Location:{$url}");
   }
    redirect("chudegopy.php");
}
?>

