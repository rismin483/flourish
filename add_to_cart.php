<?php
session_start();
include 'connection.php';
$plantId = $_GET['plant_id'];
$userEmail = $_SESSION['username'];

$getUserDetails = $con->query("select * from users where user_mail='$userEmail'");
$userDetails = $getUserDetails->fetch_array();


$addCart = $con->query("insert into plant_cart(user_id,plant_id) values ('$userDetails[0]','$plantId')");
if($addCart)
{
    echo "<script>alert('added to cart successfully...')</script>";
    echo "<script>window.location='userPlants.php'</script>";
    
}
?>