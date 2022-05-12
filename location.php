<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="#">
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/location.css"/>
    <script type="text/javascript" src="js/location.js" ></script>
    <script src="https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.js"></script>
<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.css"/>
  </head>
  
  <body style="border: 0; margin: 0;">
    <div>
        <div id="map" style="width: 100%; height: 400px; z-index: 0;"></div>
        <div class="destinationDiv" align="center" style="z-index: 0;">
          <div><p> Where would you like to go?</p></div>
          <div class="formDestination">
            <form method="post">
              <div class="">
                   <input type="search" id="place-search-input" placeholder="Start Searching..."/>
                 </div>
            </form>
          </div>
        </div>
      </div>
       </div>
  </body>
</html>