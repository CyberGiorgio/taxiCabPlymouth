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
        <div class="containerDirection">
          <div>
            <p> Where would you like to go?</p>
          </div>
          <div class="detailsDestination" align="center">
            <div class="address">
              <input type="text" id="addressDestination" placeholder="Destination address" name="">
            </div>
            <div class="number">
              <input type="text" id="numberDestination" placeholder="Destination number" name="">
            </div>
            <div class="city">
              <input type="text" id="cityDestination" placeholder="Destination city" name="">
            </div>
            <div class="submitButton">
              <input type="submit" onclick="checkPlace();" value="Search" name=""></input>
            </div>
          </div>
       </div>
    </div>
  </body>
</html>