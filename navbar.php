<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./dist/assets/brand.svg" height="20" alt="MDB Logo" loading="lazy" />
            </a>
            <div class="d-flex gap-2">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                    <button class="btn-home__navbar btn-home__logout"><a href="./auth/logout.php" class="text-white">Logout</a></button>
                <?php } else { ?>
                    <button class="btn-home__navbar btn-home__login">
                        <a href="./auth/login.php">Login</a>
                    </button>
                    <button class="btn-home__navbar btn-home__register">
                        <a href="./auth/register.php">Sign Up</a>
                    </button>
                <?php } ?>
            </div>
        </div>
    </nav>
</body>

</html>