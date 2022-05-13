  <div class="header whiteBackground footer spaceBetween">
   
                                     <!-- The Modal   Support -->
      <button  class="noBorderButton  textStyledHome marginLeft hoverButton"
        onclick="openModal(4),closeNav()"> <p id="supportButton"> Support</p>   </button>

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
                                           <!-- The Modal   Policies -->
      <button  class="noBorderButton hoverButton textStyledHome"
        onclick="openModal(7),closeNav()"> <p id="supportButton"> policies</p>   </button>
        <div id="myModal7" class="modal">
          <!-- Modal content -->
            <div class="materialContainer">
                <div class="box"  align="center" >
                    <div class="title">
                         <p>Policies</p>
                         <span class="close"  onclick="closeModal(7);">&times;</span>
                     <div>
                           
                     </div>
                     </div>
               </div>
            </div>
         </div>
         <div class="textStyledHome marginRight"> 
            <p class="g">&copy; ginux Co.</p>     
         </div>
      </div>