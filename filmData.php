<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <link rel="shortcut icon" href="./dist/assets/brand.svg" type="image/x-icon">
    <script src="./dist/js/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var film_id = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;
            if (film_id != null) {
                $.getJSON('./data/film.json', function(films) {
                    if (film_id >= 0 && film_id < films.length) {
                        $('title').text(films[film_id].title);
                    } else {
                        $('title').text("Invalid Film ID");
                    }
                });
            } else {
                $('title').text("Invalid Request");
            }
        });
    </script>
    <title>Details Film</title>
</head>

<body>
    <button class="btn-back">
        <a href="index.php">Back</a>
    </button>
    <?php

    $film_id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($film_id != null) {
        $film_data = file_get_contents('./data/film.json');
        $films = json_decode($film_data, true);

        if ($film_id >= 0 && $film_id < count($films)) {
            $film = $films[$film_id];
    ?>
            <h1 class="film-title"><?php echo $film['title']; ?></h1>
            <div class="film-details">
                <img src="<?php echo $film['image'] ?>" alt="<?php $film['title'] ?>">
                <div>
                    <p><?php echo $film['sinopsis']; ?></p>
                    <p><?php echo $film['release']; ?></p>
                    <p><?php echo $film['sutradara']; ?></p>
                    <p><?php echo $film['rating']; ?></p>
                    <p><?php echo $film['duration']; ?></p>
                    <p><?php echo implode(", ", $film['genre']); ?></p>
                    <a href="">
                        <button class="btn-book">Book Film</button>
                    </a>
                </div>
            </div>
        <?php
        } else {
        ?>
            <p>Invalid Film id.</p>
        <?php
        }
    } else {
        ?>
        <p>Invalid Request</p>
    <?php
    }
    ?>

</body>

</html>