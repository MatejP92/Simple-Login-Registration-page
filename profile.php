<?php 
$page = 'profile';
$title = 'Profile';
include_once "includes/header.php";
include_once "includes/functions.php";
include_once "includes/db_connect.php";
?>
<br>

<h2 class="text-center">Profile page</h2>

<div class="container">

    <table class="table text-white mx-auto w-auto">
        <?php

        $query = "SELECT * FROM users";
        $get_data = mysqli_query($db_connect, $query);
        

        while ($row = mysqli_fetch_assoc($get_data)){
            $user_first_name = $row["user_first_name"];
            $user_last_name = $row["user_last_name"];
            $user_email = $row["user_email"];
            $user_username = $row["user_username"];
            $user_date = $row["user_create_date"];


            echo "<tr>";
            echo "<th class='col-2'>Name</th>";
            echo "<td class='col-10'>{$user_first_name} {$user_last_name}</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Email</th>";
            echo "<td>{$user_email}</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Username</th>";
            echo "<td>{$user_username}</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th>Created</th>";
            echo "<td>{$user_date}</td>";
            echo "</tr>";
        }

        ?>
    </table>

</div>
    
<?php include_once "includes/footer.php" ?>