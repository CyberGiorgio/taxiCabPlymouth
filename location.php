 <?php
   $holderName = mysqli_real_escape_string($db,$_POST['holderName']);
   $holderSurname = mysqli_real_escape_string($db,$_POST['holderSurname']);
   $address = mysqli_real_escape_string($db,$_POST['address']);
   $number = mysqli_real_escape_string($db,$_POST['number']);
   $expireDate = date('Y-m-d', strtotime($_POST['expireDate'])); 
   $cvv = mysqli_real_escape_string($db,$_POST['cvv']);
   $credit = mysqli_real_escape_string($db,$_POST['credit']);

  if(isset($_POST['pay'])){

   $sql = "UPDATE card SET credit='$credit' WHERE customerId='$usernameSession'";
   $result = mysqli_query($db,$sql);
   }
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="#">
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
  
    <link type="text/css" rel="stylesheet" href="css/location.css"/>
    <script type="text/javascript" src="js/location.js" ></script>
    
  </head>
  
  <body style="border: 0; margin: 0;">
    <div>
      <div id="map" style="width: 100%; height: 400px; z-index: 0;"></div>
      <div class="containerDestination"  align="center">
      <div>
        <p> Where would you like to go?</p>
        <p> Type your postcode destination below</p>
      </div>
      <div class="detailsDestination">
        <div class="inline ">
          <div class="postcode1 ">
            <input type="text" id="postcodeDestination1" size="3" maxlength="3" placeholder="PL1" name="" required>
          </div>
           <div class="postcode1">
            <input type="text" id="postcodeDestination2" size="3" maxlength="3" placeholder="1AA" name="" required>
          </div>
        </div>
        <div class=" button">
          <button id="buttonSearch" type="submit" onclick="checkPlace();"  name="">Search</button>
        </div>
        <div class="textError" id="textError"></div>
              
        <div id="myModal8" class="modal">
          <!-- Modal content -->
          <div class="materialContainer">
            <div class="box"  align="center" >
              <div class="title" id="title">
                <span class="close"  onclick="closeModal(8);">&times;</span>
                  <p>Confirm details</p>
              </div>
              <div id="destinationInfo">
              </div>
              <form method="post">
              <div class="button confirmButton" id="buttons">
                <button  name="pay" type="submit" onclick="confirmMessage();" >Confirm</button>
                <button  type="submit" onclick="closeModal(8);">Back</button>
              </div>
            </form>
            </div>
          </div>
        </div>

       </div>
    </div>
  </body>
</html>