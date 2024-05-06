<?php
$isUserLoggedIn = isset($_SESSION['username']);
$user = $isUserLoggedIn ? $_SESSION['username'] : '';
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>

<body>
    <header>
        <?php if ($isUserLoggedIn) {
        ?> <h2 class="welcome-user">Welcome, <?php echo htmlspecialchars($user) ?></h2>
        <?php }
        ?>
        <h1 class="header-text">Now Showing</h1>
        <div class="list-film">
            <?php
            $film_count = file_get_contents('./data/film.json');
            $films = json_decode($film_count, true);

            foreach ($films as $i => $film) {
            ?>
                <div class="film-container">
                    <a href="./filmData.php?id=<?php echo $i ?>">
                        <img src="./dist/assets/image<?php echo $i + 1 ?>.jpeg" alt="" />
                        <div class="film-info">
                            <p><?php echo $film['title'] ?></p>
                            <p><?php echo $film['rating'] ?>/10</p>
                            <?php $random_num = mt_rand(1, 89) ?>
                            <p><?php echo $random_num ?>K Votes</p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </header>
    <form action="" class="centered-form">
        <input type="text" placeholder="Search Film Here..." />
        <button type="submit">Cari</button>
    </form>

    <div class="divider">
        <a href="#footer">
            <i data-feather="arrow-down" style="color: white"></i>
            <p>See the Schedule</p>
        </a>
    </div>

    <section class="body__section">
        <h2>BOOK A TICKET HERE</h2>
        <div>
            <img src="./dist/assets/Home cinema-amico.svg" alt="" width="380px" height="380px" />
        </div>
    </section>

    <script>
        feather.replace();
    </script>
</body>