<?php
session_start();
include 'connection.php';
$plantId = $_GET['plant_id'];
$userEmail = $_SESSION['username'];

$getUserDetails = $con->query("select * from users where user_mail='$userEmail'");
$userDetails = $getUserDetails->fetch_array();


$addCart = $con->query("delete from plant_cart where user_id = '$userDetails[0]' and plant_id = '$plantId'");
if($addCart)
{
    echo "<script>alert('deleted from cart successfully...')</script>";
    echo "<script>window.location='userCart.php'</script>";
    
}
?>