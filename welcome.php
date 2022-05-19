<?php
include('session.php');       //page for user logged
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <script src="js/jsWelcome.js"></script> 
      <title>Welcome</title>
      <link rel="shortcut icon" href="#">
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'>
      <link rel="stylesheet" href="css/loginStyle.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/menu.css">
      <script type="text/javascript">     
        function redirect(){
            window.location.replace("login.php");
        }
       </script>
       <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   
   <body>
         <?php
         include('headerLogged.php');
         include('navigationBar.php');
         include('location.php');
         include('footer.php');
           ?>
   </body>
</html>