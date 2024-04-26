<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../dist/assets/brand.svg" type="image/x-icon">
    <link rel="stylesheet" href="../style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container m-5">
        <h1 class="text-light">Login</h1>
        <form action="process_login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label text-light">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-light">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn-home__navbar btn-home__login text-light">Login</button>
        </form>
        <p class="text-light">Don't have an account? <a href="register.php">Sign up</a></p>
        <a href="../index.php">
            <button class="btn-home__navbar btn-home__register">Back</button>
        </a>
    </div>
</body>

</html>