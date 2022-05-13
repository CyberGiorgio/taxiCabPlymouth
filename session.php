<?php
   include('config.php');
   session_start();
    $user_check = $_SESSION['email'];

   $ses_sql = mysqli_query($db,"SELECT email FROM `customer` WHERE email = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $user_check2 = $_SESSION['customerId'];
   $ses_sql2 = mysqli_query($db,"SELECT customerId FROM `customer` WHERE customerId = '$user_check2' ");
  

   $login_session2 = $row['customerId'];
   $login_session = $row['email'];


     
   if(!isset($_SESSION['user'])){
      header('Location:login.php');
      die();
   }
?>