<?php 
$page = 'home';
$title = 'My Page';
include_once "includes/header.php";
?>
<br>

<?php
    // If the user is logged in display these messages
    if(isset($_SESSION["user_username"])) {
        echo "<h2 class='text-center'>Home Page</h2><br>";
        echo "<h2 class='text-center'>Hello there<br><strong>" . $_SESSION["user_username"] . "</strong></h2>";
        
    // If the user is logged out display these messages
    } else {
        echo "<h2 class='text-center'>Home Page</h2><br>";
        echo "<h2 class='text-center'>You are not logged in!</h2>";
    }
?>



    
<?php include_once "includes/footer.php" ?>