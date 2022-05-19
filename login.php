<?php
   include("config.php");
   require_once("loginAccess.php");
?>
<!DOCTYPE html>
<html lang="en">
      <head>
         <meta charset="utf-8">
         
         <title>Login Page</title>
         <link rel="shortcut icon" href="#">
         <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'>
         <link rel="stylesheet" href="css/menu.css">
         <link rel="stylesheet" href="css/loginStyle.css">
         <link rel="stylesheet" href="css/style.css">
         <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <script async src="https://www.google.com/recaptcha/api.js"></script>
         <link rel="preconnect" href="https://www.google.com">
         <link rel="preconnect" href="https://www.gstatic.com" crossorigin>
         <script type="text/javascript"src="js/jsLogin.js"></script> 
         <script type="text/javascript">     

             function sessionKiller(){       //kill any previous sessions
            sessionStorage.removeItem('id');
            sessionStorage.removeItem('user');
         }
         function openModal(index) {
           var modal = document.getElementById("myModal"+index);
           modal.style.display = "block";
         }

         // When the user clicks on <span> (x), close the modal
         function closeModal(index) {
           var modal = document.getElementById("myModal"+index);
           modal.style.display = "none";
         }

         </script>
   </head>
   
   <body bgcolor = "#FFFFFF" onload="sessionKiller();"> <!-- kill the session every time the page is loaded -->
      <div class="header whiteBackground ">
         <div class="textStyledHome spaceLeft cursor">
             <img id="logo" src="images/taxi.png" alt="logo">
         </div>
      </div>

      <div class="materialContainer">
         <div class="box" id="boxLogin"  align="center">
            <div class="title">
               <p>Login</p>
            </div>
            <div class="formContainer">
               <form method = "post">
                 <div class="input">
                      <label class="labelLogin">Email</label>
                      <input for="email" type = "email" id="email" name="email" size="30" required="" >
                      <span class="spin"></span>
                 </div>
                  <div class="input">
                      <label for="pass" class="labelLogin">Password</label>
                      <input type = "password" id="pass" name="password" size="20" required="" >
                         <span class="spin"></span>
                  </div>
                 
                   <div class="textError"><?php echo $errorLogin; ?> <?php echo $errorRegister; ?></div>   <!-- error message -->
                  <div>
                     <div class="button login" >
                        <button align="center" type="submit" name="login" onclick ="sessionStored();" value="Log in"> Log in </button>
                           <!-- store session every time the button is clicked if user is verified -->
                     </div>
                     <div class="button login">
                           <button type="button" value="Register"  onclick="hide('boxLogin'), show('boxRegister'), hideError('textError');"> Register</button>
                     </div>
                    
                  </div>
               </form>
           
            </div>

         </div>
   
         <div class="box" id="boxRegister"  align="center" style="display: none;">
            <div class="title">
               <p>Register</p>
            </div>
            <div class="formContainer">
               <form method = "post">
                  <div class="input">
                     <label class="labelLogin">First Name</label><input class="regist" type = "text" name="firstName" class="box" size="15" required="" /><span class="spin"></span>
                  </div>
                  <div class="input">
                     <label class="labelLogin">Surname</label><input class="regist" type = "text" name="lastName" class="box" size="15" required="" /><span class="spin"></span>
                  </div>
                    <div class="input">
                     <label class="labelLogin">Date of Birth</label><input class="regist" type="date" name="birthDate" type="date" class="box" required="" /><span class="spin"></span>
                  </div>
                    <div class="input">
                     <label class="labelLogin">Address</label><input class="regist" type = "text" name = "address" class="box" size="40" required="" /><span class="spin"></span>
                  </div>
                    <div class="input">
                     <label class="labelLogin">Email</label><input class="regist" type = "email" name = "email" class="box" size="30" required="" /><span class="spin"></span>
                  </div>
                  <div class="input">
                     <label class="labelLogin">Password</label><input class="regist" type = "password" name="password" class="box" size="20" required="" /><span class="spin"></span>
                  </div>
                  <div id="checkDiv">
                     <input class="" type="checkbox" id="checkbox" name="checkbox" required="">
                     <label for="checkbox" class="labelLogin">accept terms and conditions</label>
                   </div>
                 <div class="textError"></div>   <!-- error message -->
                  <div>
                     <div class="button login" >
                        <button type="submit" name="register" value="Register">Register</button> 
                     </div> <!-- hide the other container -->
                     <div class="button login" >
                        <button type="button" onclick="hide('boxRegister'), show('boxLogin');"> Back to Log in </button>
                     </div>
                     
                   </div>
               </form>
              
            </div>
         </div>
      </div><br>
   </div>
      <?php include('footer.php');
      ?>
   </body>
</html>