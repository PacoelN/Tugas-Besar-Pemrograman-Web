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
                    <p><b>Sinopsis :</b> <br><?php echo $film['sinopsis']; ?></p>
                    <p><b>Release : </b><?php echo $film['release']; ?></p>
                    <p><b>Directed by : </b><?php echo $film['sutradara']; ?></p>
                    <p><b>Rating : </b><?php echo $film['rating']; ?>/10</p>
                    <p><b>Duration : </b><?php echo $film['duration']; ?> Minute</p>
                    <p><b><?php echo implode(", ", $film['genre']); ?></p>
                    <a href="">
                        <button class="btn-book">Book Film</button>
                    </a>
                </div>
            </div>

            <h2 style="color: white; margin:24px;">Other Films</h2>
            <div class="list-film">
                <?php
                foreach ($films as $index => $other_film) {
                    if ($index != $film_id) {
                        $random_num = mt_rand(1, 89); // Generate random votes
                ?>
                        <div class="film-container">
                            <a href="./filmData.php?id=<?php echo $index ?>">
                                <img src="./dist/assets/image<?php echo $index + 1 ?>.jpeg" alt="" />
                                <div class="film-info">
                                    <p><?php echo $other_film['title'] ?></p>
                                    <p><?php echo $other_film['rating'] ?>/10</p>
                                    <p><?php echo $random_num ?>K Votes</p>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
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