<!-- NAVBAR -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"> <!--  Set current page on browser as active with php code -->
                <a class="nav-link <?php if($page == 'home'){echo "active";}?>" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if($page == 'test'){echo "active";}?>" href="test.php">Test</a>
                </li>
            </ul>
            
            <ul class="navbar-nav d-flex">
                <?php
                
                // if the user is logged in display these pages
                if(isset($_SESSION["user_username"])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link ";
                    if ($page == 'profile'){echo "active";};
                    echo "' href='profile.php'> Profile</a></li>";

                    echo "<li class='nav-item'><a class='nav-link' href='includes/logout_process.php'> Log out</a></li>";
                } else {
                    // If the user is logged out display these pages
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link ";
                    if ($page == 'register'){echo "active";};
                    echo "' href='register.php'> Register</a></li>";

                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link ";
                    if ($page == 'login'){echo "active";};
                    echo "' href='login.php'> Login</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR END -->