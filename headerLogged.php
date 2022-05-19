 <?php
include('session.php');
?>
<div class="header whiteBackground ">
    <div class="inline flex">
    	<div class="textStyledHome spaceLeft"> 
           <a class = "cursor" onclick="location.reload()"><img id="logo" src="images/taxi.png" alt="logo"></a>
        </div>
        <div class="headerTopSpace textStyledHome nameSession ">
            <?php
                $usernameSession = $_SESSION['customerId'];

                // Echo session variables that were set on previous page
                $query = "SELECT email, firstName FROM customer WHERE customerId = '$usernameSession'";
                  
                    $result = mysqli_query($db, $query);
                    if(mysqli_num_rows($result) > 0){ 
                        while ($row = $result->fetch_assoc()) {
                        $username = ucfirst($row['firstName']);    //first letter uppercase
                        }
                        echo "<p > $username </p>" ;   
                   }
                ?> 
            </div>
    </div>
    <div class="headerTopSpace textStyledHome settings ">
        <button class="textStyledHome hoverButton noBorderButton" onclick="openNav();">Settings</button>
    </div>
</div>







   
