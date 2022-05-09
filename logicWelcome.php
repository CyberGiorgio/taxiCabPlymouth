<?php 
   $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
   $lastName = mysqli_real_escape_string($db,$_POST['lastName']);
   $email = mysqli_real_escape_string($db,$_POST['email']);     
   $password = mysqli_real_escape_string($db,$_POST['password']);
   $address = mysqli_real_escape_string($db,$_POST['address']);
   $birthDate = date('Y-m-d', strtotime($_POST['birthDate'])); 
   $postcode = mysqli_real_escape_string($_POST['postcode']));  
   $usernameSession = $_SESSION['login_user'];
?>