<?php
include 'connection.php';
session_Start();
$adminname = $_SESSION['adminname'];

$querys = "select * from adminlogin where AdminName = '$adminname'";
$run1 = mysqli_query($con , $querys);
$row = mysqli_fetch_assoc($run1);
$id_session = $row['AdminId'];

$name_session = $row['AdminName'];
$password_session = $row['Password'];


if(!isset($name_session)){
mysqli_close($connection); // Closing Connection
header('Location: admin.php');
} 
?>