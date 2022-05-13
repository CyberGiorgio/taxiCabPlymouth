 <?php
   $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
   $lastName = mysqli_real_escape_string($db,$_POST['lastName']);
   $email = mysqli_real_escape_string($db,$_POST['email']);     
   $password = mysqli_real_escape_string($db,$_POST['password']);
   $address = mysqli_real_escape_string($db,$_POST['address']);
   $birthDate = date('Y-m-d', strtotime($_POST['birthDate'])); 

   $holderName = mysqli_real_escape_string($db,$_POST['holderName']);
   $holderSurname = mysqli_real_escape_string($db,$_POST['holderSurname']);
   $address = mysqli_real_escape_string($db,$_POST['address']);
   $number = mysqli_real_escape_string($db,$_POST['number']);
   $expireDate = date('Y-m-d', strtotime($_POST['expireDate'])); 
   $cvv = mysqli_real_escape_string($db,$_POST['cvv']);
   $credit = mysqli_real_escape_string($db,$_POST['credit']);

   $date = date('Y-m-d', strtotime($_POST['date'])); 
   $fromPlace = mysqli_real_escape_string($db,$_POST['fromPlace']);
   $toPlace = mysqli_real_escape_string($db,$_POST['toPlace']);
   $approved = mysqli_real_escape_string($db,$_POST['approved']);

   if(isset($_POST['updateAccount'])){
   $sql = "UPDATE customer SET firstName='$firstName', lastName='$lastName',  address='$address', birthDate='$birthDate', email='$email', password='$password' WHERE customerId='$usernameSession'";
   $result = mysqli_query($db,$sql);
   
   }

  if(isset($_POST['updateCard'])){
   $sql = "UPDATE card SET holderName='$holderName', holderSurname='$holderSurname', number='$number', expireDate='$expireDate', cvv='$cvv' , credit='$credit' WHERE customerId='$usernameSession'";
   $result = mysqli_query($db,$sql);
   }

   if(isset($_POST['deleteAccount'])){
   $sql = "DELETE FROM customer WHERE customerId='$usernameSession'" ;
   $result = mysqli_query($db,$sql);
   $sql = "DELETE FROM card WHERE customerId='$usernameSession'" ;
   $result = mysqli_query($db,$sql);
    header("Location: login.php");
    die();

   } 

?>
<div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


                                    <!-- The Modal   Account -->
   <button  class="noBorderButton myBtn" onclick="openModal(1),closeNav()">Account</button>
    <div id="myModal1" class="modal">
      <!-- Modal content -->
         <div class="materialContainer">
            <div class="box"  align="center" >
                <div class="title">
                     <p>Account</p>
                     <span class="close"  onclick="closeModal(1);">&times;</span>
                </div>
                <?php
                  $query = "SELECT * FROM customer WHERE customerId='$usernameSession'";
                  $result = mysqli_query($db, $query);
                   if (mysqli_num_rows($result) > 0) 
                        {
                        while($row = mysqli_fetch_assoc($result)) 
                             {
                          ?>
                     <div class="formContainer">
                   
                   <form method = "post">
                      <div class="input">
                         <label class="labelLogin">First Name</label><input class="regist box" type="text" name="firstName" size="15" value="<?php echo $row['firstName']; ?>" required="" /><span class="spin"></span>
                      </div>
                      <div class="input">
                         <label class="labelLogin">Surname</label><input class="regist box" type="text" name="lastName" size="15" value="<?php echo $row['lastName']; ?>" required="" /><span class="spin"></span>
                      </div>
                        <div class="input">
                         <label class="labelLogin">Date of Birth</label><input class="regist box" type="date" name="birthDate" type="date" value="<?php echo $row['birthDate']; ?>" required="" /><span class="spin"></span>
                      </div>
                        <div class="input">
                         <label class="labelLogin">Address</label><input class="regist box" type="text" name="address" value="<?php echo $row['address']; ?>" size="40" required="" /><span class="spin"></span>
                      </div>
                        <div class="input">
                         <label class="labelLogin">Email</label><input class="regist box" type="email" name="email" size="30"  value="<?php echo $row['email']; ?>" required="" /><span class="spin"></span>
                      </div>
                      <div class="input">
                         <label class="labelLogin">Password</label><input class="regist box" type = "password" name="password" size="20" value="<?php echo $row['password']; ?>" required="" /><span class="spin"></span>
                      </div>
                     
                     <div class="textError"><?php echo $errorUpdate; ?></div>   <!-- error message -->
                       <div>
                            <div class="button login noPadding" >
                                <button type="submit" name="updateAccount" value="Update">Update</button>  <!-- hide the other container -->
                            </div>
                        </div>
                   </form>
                    <?php
                    }
                 }?>    
                </div>
            </div>
        </div>
    </div>


                                    <!-- The Modal   Credit Card -->
    <button  class="noBorderButton myBtn"  onclick="openModal(2),closeNav()">Credit Card</button>
    <div id="myModal2" class="modal">
      <div class="materialContainer">
            <div class="box"  align="center" >
                <div class="title">
                     <p>Credit Card</p>
                     <span class="close"  onclick="closeModal(2);">&times;</span>
                </div>
                <div class="formContainer">
                     <?php
                  $query = "SELECT * FROM card WHERE customerId='$usernameSession'";
                  $result = mysqli_query($db, $query);
                   if (mysqli_num_rows($result) > 0) 
                      {
                      while($row = mysqli_fetch_assoc($result)) 
                      {
                      ?>
                   <form method = "post">
                        <div class="input">
                         <label for="holderName"class="labelLogin">Holder Name</label><input class="regist" type="text"  id="holderName" name="holderName" class="box" size="15" value="<?php echo $row['holderName']; ?>" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                             <label for="holderSurame"class="labelLogin">Holder Surname</label><input class="regist" type = "text" id="holderSurname" name="holderSurname" class="box" size="15" value="<?php echo $row['holderSurname']; ?>" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                          <label for="number" class="labelLogin">CardNumber</label><input class="regist" type="number" name="number" type="date" class="box" value="<?php echo $row['number']; ?>" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                          <label for="expireDate" class="labelLogin">Expire Date</label><input class="regist" type="date"  id="expireDate" name="expireDate" class="box" value="<?php echo $row['expireDate']; ?>" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                          <label for="cvv" class="labelLogin">CVV</label><input class="regist" type = "number" id="cvv" name="cvv" class="box" size="3" value="<?php echo $row['cvv']; ?>" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                         <label for="credit" class="labelLogin">Credit</label><input class="regist" id="credit" type = "number" name="credit" class="box" size="20" value="<?php echo $row['credit']; ?>" required="" /><span class="spin"></span>
                        </div>
                     
                        <div class="textError"><?php echo $errorRegister; ?></div>   <!-- error message -->
                        
                            <div class="button login noPadding" >
                                <button type="submit" name="updateCard" value="Update">Update</button>  <!-- hide the other container -->
                            </div>
                       </form>
                           <?php
                        }
                     }else{
                        echo "No records yet";
                     }
                     ?>
                    </div>
                </div>
            </div>
        </div>
                                   <!-- The Modal   History -->

        <button  class="noBorderButton myBtn" onclick="openModal(3),closeNav()">History</button>
        <div id="myModal3" class="modal">
      <!-- Modal content -->
            <div class="materialContainer">
                <div class="box"  align="center" >
                    <div class="title">
                         <p>History</p>
                         <span class="close"  onclick="closeModal(3);">&times;</span>
                    </div>

                    <div class="formContainer">
                               <?php
                  $query = "SELECT * FROM request WHERE customerId='$usernameSession'";
                  $result = mysqli_query($db, $query);
                   if (mysqli_num_rows($result) > 0) 
                      {
                      while($row = mysqli_fetch_assoc($result)) 
                      {
                      ?>
           
                       <table>
                            <tr>
                                <td>
                                    <label class="labelLogin">From</label>
                                </td>
                                <td>
                                    <label class="labelLogin">To</label>
                                </td>
                                <td>
                                    <label class="labelLogin">Date</label>
                                </td>
                                 <td>
                                    <label class="labelLogin">Approved</label>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <label class="labelLogin" value="<?php echo $row['fromPlace']; ?>"></label>
                                </td>
                                <td>
                                    <label class="labelLogin" value="<?php echo $row['toPlace']; ?>"></label>
                                </td>
                                <td>
                                    <label class="labelLogin" value="<?php echo $row['date']; ?>"></label>
                                </td>
                                 <td>
                                    <label class="labelLogin" value="<?php echo $row['approved']; ?>"></label>
                                </td>
                            </tr>
                        </table>
                         <?php
                        }
                     }else{
                        echo "No records yet";
                     }
                     ?>
                    </div>
                </div>
            </div>
        </div>
        


                                  <!-- The Modal   Support -->
      <button  class="noBorderButton myBtn" onclick="openModal(4),closeNav()">Support</button>
        <div id="myModal4" class="modal">
          <!-- Modal content -->
            <div class="materialContainer">
                <div class="box"  align="center" >
                    <div class="title">
                         <p>Support</p>
                         <span class="close"  onclick="closeModal(4);">&times;</span>
                    </div>

                    <div class="formContainer">
                        <table>
                        <form method="post">
                            <tr>
                               <td>
                                  <label class="labelLogin" for="firstName">First Name</label>
                               </td>
                                <td>
                                   <input class="formInput" type="text" id="firstName" name="firstName" placeholder="Your name">
                              </td>
                            </tr>
                            <tr>
                                <td>
                                   <label class="labelLogin" for="lastName">Last Name</label>
                                </td>
                                <td>
                                    <input class="formInput" type="text" name="lastName" placeholder="Your last name..">
                               </td>
                            </tr>
                            <tr>
                                <td>
                                   <label class="labelLogin" for="email">Email</label>
                                </td>
                                <td>
                                    <input class="formInput" id="email" type="email" name="email" placeholder="Your email">
                               </td>
                            </tr>
                            <tr>
                                <td>
                                     <label class="labelLogin" for="subject">Subject</label>
                                </td> 
                                 <td>
                                    <textarea id="subject" name="subject" placeholder="Write your question..." style="height:200px; width: 100%;"></textarea>
                                 </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <div class="button login noPadding" >
                                        <button type="submit" name="submit" value="Submit">Submit</button>  <!-- hide the other container -->
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
                </div>
            </div>
        </div>


                                <!-- The Modal   logout -->
    <div>
        <button class="noBorderButton "><a id="textLogout" href="login.php" >Log out</a></button>
    </div>

                                <!-- The Modal   Delete Account -->
      <button id="deleteAccount" class="noBorderButton myBtn deleteAccountColor" onclick="openModal(6),closeNav()">Delete Account</button>
        <div id="myModal6" class="modal">
          <!-- Modal content -->
            <div class="materialContainer">
                <div class="box"  align="center" >
                    <div class="title">
                         <p>Delete Account</p>
                         <span class="close"  onclick="closeModal(6);">&times;</span>
                    </div>

                    <div class="formContainer">
                        <p>Are you sure you want to delete your account?</p>
                    </div><br>
                    <form method ="post">
                    <div>
                        <button class="noBorderButton myBtn deleteAccountColor deleteAccountPaddingButton" type="submit" name="deleteAccount" onclick="redirect();"> YES </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    

</div>