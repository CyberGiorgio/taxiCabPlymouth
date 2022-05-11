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
                     
                     <div class="textError"><?php echo $errorRegister; ?></div>   <!-- error message -->
                       <div>
                         <div class="button login noPadding" >
                            <button type="submit" name="register" value="Register">Update</button>  <!-- hide the other container -->
                         </div>
                        </div>
                   </form>
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
                   <form method = "post">
                        <div class="input">
                         <label for="holderName"class="labelLogin">Holder Name</label><input class="regist" type="text"  id="holderName" name="holderName" class="box" size="15" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                             <label for="holderSurame"class="labelLogin">Holder Surname</label><input class="regist" type = "text" id="holderSurname" name="holderSurname" class="box" size="15" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                          <label for="number" class="labelLogin">CardNumber</label><input class="regist" type="number" name="number" type="date" class="box" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                          <label for="expireDate" class="labelLogin">Expire Date</label><input class="regist" type="text"  id="expireDate" name="expireDate" class="box" size="40" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                          <label for="cvv" class="labelLogin">CVV</label><input class="regist" type = "number" id="cvv" name="cvv" class="box" size="30" required="" /><span class="spin"></span>
                        </div>
                        <div class="input">
                         <label for="credit" class="labelLogin">Credit</label><input class="regist" id="credit" type = "number" name="credit" class="box" size="20" required="" /><span class="spin"></span>
                        </div>
                     
                        <div class="textError"><?php echo $errorRegister; ?></div>   <!-- error message -->
                        
                            <div class="button login noPadding" >
                                <button type="submit" name="Update" value="Update">Update</button>  <!-- hide the other container -->
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>


                                  <!-- The Modal   Support -->
      <button  class="noBorderButton myBtn" onclick="openModal(3),closeNav()">Support</button>
        <div id="myModal3" class="modal">
          <!-- Modal content -->
            <div class="materialContainer">
                <div class="box"  align="center" >
                    <div class="title">
                         <p>Support</p>
                         <span class="close"  onclick="closeModal(3);">&times;</span>
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
                                     <label class="labelLogin" for="subject">Subject   </label>
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
                                        <button type="submit" name="Update" value="Update">Update</button>  <!-- hide the other container -->
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button class="noBorderButton "><a id="textLogout" href="login.php">Log out</a></button>
    </div>
</div>