 <?php
include('session.php');
?>
<div class="header whiteBackground ">
    <div class="inline flex">
    	<div class="textStyledHome spaceLeft"> 
            <img id="logo" src="images/taxi.png" alt="logo">
        </div>
        <div class="headerTopSpace textStyledHome nameSession ">
            <?php
                $usernameSession = $_SESSION['user'];

                // Echo session variables that were set on previous page
                $query = "SELECT email, firstName FROM customer WHERE email = '$usernameSession'";
                    $result = mysqli_stmt_get_result($query);
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
        <button class="textStyledHome noBorderButton" onclick="openNav();">Settings</button>
    </div>
</div>
 <?php
include('navigationBar.php');
?>






   
