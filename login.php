<?php 
$page = 'login';
$title = 'Login';
include_once "includes/header.php";
?>

<!-- LOGIN -->

<br>
<h2 class="text-center">Login</h2>
<div class="container">
    <form action="includes/login_process.php" method="post">
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username/Email...">
            <label for="username">Username/Email...</label>
        </div>
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
            <label for="password">Password...</label>
        </div>
        <div class="mx-auto d-grid">
            <button type="submit" class="mx-auto btn btn-dark col-2" name="submit" id="submit">Login</button>
        </div>
</form>
</div>
<br><br>

    <!-- ERROR HANDLERS -->

    <?php
    if (isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Fill in all fields!</strong></div>";
        }
        if($_GET["error"]=="wrongLogin"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Incorrect login information!</strong></div>";
        }
    }
    ?>

    <!-- ERROR HANDLERS END -->

<!-- LOGIN END -->

<?php include_once "includes/footer.php" ?>