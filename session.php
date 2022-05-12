<?php
   include('config.php');
   session_start();
    $user_check = $_SESSION['email'];
   $ses_sql = mysqli_query($db,"SELECT email,customerId FROM `customer` WHERE email = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session2 = $row['customerId'];
   $login_session = $row['email'];


     
   if(!isset($_SESSION['user'])){
      header('Location:login.php');
      die();
   }
?>