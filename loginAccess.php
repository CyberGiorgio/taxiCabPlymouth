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
   $options = ['cost' => 10];
   
   if(isset($_POST['login'])) {        //check if credentials are correct
      $sql = "SELECT password FROM `customer` WHERE email='$email'";  
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);    //catch the password
      $hash =  $row[0]; 
      $password = password_verify($password, $hash);     //match the password with database
      if($password > 0){         //if password found value = 1 continue
      $stmt = $db->prepare("SELECT * FROM customer WHERE email=? AND password=? LIMIT 1");
      $stmt->bind_param('ss', $email, $hash);      //prepare statement
      $stmt->execute();
      $stmt->bind_result($email, $hash);
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
           $stmt->close();
          $db->close();
          }
         }
      else {            //no user found or password not valid
         $errorLogin = "Your Login Name or Password is invalid";
      }
   }

   if(isset($_POST['register'])) {           //if the account already exists
    
     $password = password_hash($password,PASSWORD_BCRYPT ,$options); //ecrypted password cost 10
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