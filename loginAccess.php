<?php
   include("config.php");
   session_start();
 
   $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
   $lastName = mysqli_real_escape_string($db,$_POST['lastName']);
   $email = mysqli_real_escape_string($db,$_POST['email']);     
   $password = mysqli_real_escape_string($db,$_POST['password']);
   $address = mysqli_real_escape_string($db,$_POST['address']);
   $birthDate = date('Y-m-d', strtotime($_POST['birthDate'])); 

   $customerId = mysqli_real_escape_string($db,$_POST['customerId']);
   $holderName = mysqli_real_escape_string($db,$_POST['holderName']);
   $holderSurname = mysqli_real_escape_string($db,$_POST['holderSurname']);  
   $credit = mysqli_real_escape_string($db,$_POST['credit']); 
   $number = mysqli_real_escape_string($db,$_POST['number']); 
   $cvv = mysqli_real_escape_string($db,$_POST['cvv']); 
   
   if(isset($_POST['login'])) {        //check if credentials are correct

      $stmt = $db->prepare("SELECT * FROM customer WHERE email=? AND password=? LIMIT 1");
      $stmt->bind_param('ss', $email, $password);
      $stmt->execute();
      $stmt->bind_result($email, $password);
      $stmt->store_result();
      if($stmt->num_rows > 0)  //To check if the row exists
         {
         $_SESSION["user"] = $email;
          $sql = "SELECT customerId FROM `customer` WHERE email='$email'";  
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result, MYSQLI_NUM);
         $customerId = $row[0];        //store session
         $_SESSION["customerId"] = $customerId;
       ?>
         <script>
             var jsvar = '<?=$customerId?>';
             sessionStorage.setItem('id',jsvar); 
            window.location.replace("welcome.php");
         </script>
            <?php

          exit();
         }
      else {            //no user found
         $errorLogin = "Your Login Name or Password is invalid";
         }
    $stmt->close();
    $db->close();
   }

   if(isset($_POST['register'])) {           //if the account already exists
     
          //if the account does not exists yet
      $stmt = $db->prepare("SELECT * FROM customer WHERE firstName=? AND lastName=? AND email=? AND password=? AND birthDate=? AND address=? LIMIT 1");
      $stmt->bind_param('ssssss', $firstName, $lastName, $email, $password, $birthDate,  $address);
      $stmt->execute();
      $stmt->bind_result($firstName, $lastName, $email, $password, $birthDate, $address);
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
      $sql = "SELECT customerId FROM `customer` WHERE email='$email'";  
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      $customerId = $row[0];
      $sql = "INSERT INTO `card` (`holderName`, `holderSurname`, `credit`, `number`, `cvv`, `customerId`) VALUES ('$firstName','$lastName',0,0,0,$customerId)";
      $result = mysqli_query($db,$sql);
      $stmt->close();
      $db->close();

       $errorRegister = "Your account is ready";
      }
   }
  
?>