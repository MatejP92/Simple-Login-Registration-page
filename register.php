<?php 
$page = 'register';
$title = 'Register';
include_once "includes/header.php";
?>
<?php include_once "includes/db_connect.php" ?>
<br>

<!-- REGISTRATION FORM -->

<h2 class="text-center">Register</h2>
<div class="container">
    <form action="includes/register_process.php" method="post">
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name...">
            <label for="name">First Name...</label>
        </div>
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name...">
            <label for="name">Last Name...</label>
        </div>
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
            <label for="email">Email...</label>
        </div>
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username...">
            <label for="username">Username...</label>
        </div>
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
            <label for="password">Password...</label>
        </div>
        <div class="mx-auto form-floating mb-3 mt-3 col-4">
            <input type="password" class="form-control" name="password_2" id="password_2" placeholder="RepeatPassword...">
            <label for="password_2">Repeat Password...</label>
        </div>
        <div class="mx-auto d-grid">
            <button type="submit" class="mx-auto btn btn-dark col-2" name="submit" id="submit">Register</button>
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
        if($_GET["error"]=="invalidUsername"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Choose a proper username!</strong></div>";
        }
        if($_GET["error"]=="invalidEmail"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Choose a proper email!</strong></div>";
        }
        if($_GET["error"]=="passwordsDontMatch"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Passwords don't match!</strong></div>";
        }
        if($_GET["error"]=="stmtfailed"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Something went wrong, try again!</strong></div>";
        }
        if($_GET["error"]=="usernameTaken"){
            echo "<div class='mx-auto alert alert-danger alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Username or email already taken!</strong></div>";
        }
        if($_GET["error"]=="none"){
            echo "<div class='mx-auto alert alert-success alert-dismissible fade show col-5 text-center'>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
            echo "<strong>Registration successful!</strong></div>";
        }
    }
    ?>

    <!-- ERROR HANDLERS END -->


<!-- REGISTRATION FORM END -->

<?php include_once "includes/footer.php" ?>