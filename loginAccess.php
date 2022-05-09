<?php
   include("config.php");
   session_start();
   $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
   $lastName = mysqli_real_escape_string($db,$_POST['lastName']);
   $email = mysqli_real_escape_string($db,$_POST['email']);     
   $password = mysqli_real_escape_string($db,$_POST['password']);
   $address = mysqli_real_escape_string($db,$_POST['address']);
   $birthDate = date('Y-m-d', strtotime($_POST['birthDate']));  
   
   if(isset($_POST['login'])) {        //check if credentials are correct

      $stmt = $db->prepare("SELECT * FROM customer WHERE email=? AND password=? LIMIT 1");
      $stmt->bind_param('ss', $email, $password);
      $stmt->execute();
      $stmt->bind_result($username, $password);
      $stmt->store_result();
      if($stmt->num_rows > 0)  //To check if the row exists
         {
         $_SESSION['login_user'] = $firstName;?>
         <script>window.location.replace("welcome.php");</script><?php
          exit();
         }
      else {
         $errorLogin = "Your Login Name or Password is invalid";
         }
    $stmt->close();
    $db->close();
   }

   if(isset($_POST['register'])) {           //if the account already exists
      $birthDate = date('Y-m-d', strtotime($_POST['birthDate'])); 
          //if the account does not exists yet
      $stmt = $db->prepare("SELECT * FROM customer WHERE firstName=? AND lastName=? AND email=? AND password=? AND address=? LIMIT 1");
      $stmt->bind_param('sssss', $firstName, $lastName, $email, $password,  $address);
      $stmt->execute();
      $stmt->bind_result($firstName, $lastName, $email, $password, $address);
      $stmt->store_result();
      if($stmt->num_rows > 0)  //To check if the row exists
         {
         $errorRegister = "This account already exists";
         $stmt->close();
         $db->close();
      } else {          //if the account does not exists yet
      $sql = "INSERT INTO `customer` (`firstName`, `lastName`, `email`, `password`, `birthDate`, `address`) VALUES (?,?,?,?,?,?)";
      $stmt = $db->prepare($sql);
      $stmt->bind_param('ssssss', $firstName, $lastName, $email, $password, $birthDate, $address);
      $stmt->execute();
      $stmt->close();
      $db->close();
       $errorRegister = "Your account is ready";
      }
   }
?>