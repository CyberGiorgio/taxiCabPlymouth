<?php
   include('session.php');
   include('logicWelcome.php');
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Welcome</title>
      <link rel="shortcut icon" href="#">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      ciaoo
      <?php 
         $usernameSession = $_SESSION['user'];        //session checker
         $query = "SELECT email FROM customer WHERE email = '$usernameSession'";
         $result = mysqli_stmt_get_result($query);
         $result = mysqli_query($db, $query);
         if(mysqli_num_rows($result) > 0){ 
            while ($row = $result->fetch_assoc()) {
            $email = ucfirst($row['email']);    //first letter uppercase
            }
            echo "<div id='welcome'>
                     <p>Welcome $email </p>     
                  </div>" ;   ?>
      </div>      
   </body>
</html>