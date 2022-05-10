<?php
session_start();
include 'connection.php';
$plantId = $_GET['plant_id'];
$userEmail = $_SESSION['username'];

$getUserDetails = $con->query("select * from users where user_mail='$userEmail'");
$userDetails = $getUserDetails->fetch_array();


$addOrder = $con->query("insert into plant_orders(user_id,plant_id) values ('$userDetails[0]','$plantId')");
if($addOrder)
{
    $reduceQty = $con->query("update addplants set plantcount = (plantcount - 1) where plantid='$plantId'");
    if($reduceQty)
    {
        echo "<script>alert('Order added successfully...')</script>";
        echo "<script>window.location='userPlants.php'</script>";
    }
}