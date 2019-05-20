<?php
include 'connection.php';
session_Start();
$user_check = $_SESSION['email'];

$querys = "select * from login where CustEmail = '$user_check'";
$run1 = mysqli_query($con , $querys);
$row = mysqli_fetch_assoc($run1);
$custid_session = $row['CustId'];
$email_session =$row['CustEmail'];
$name_session = $row['CustName'];
$address_session=$row['CustAddress'];
$clientpassword_session = $row['CustPassword'];
$phone_session = $row['CustPhoneNumber'];
$counter_session = $row['CustCounter'];

if(!isset($email_session)){
mysqli_close($connection); // Closing Connection
header('Location: login.php');
} 
?>