<?php

require "DB.php";

require "game_counter.php";

$conn = new DB;

$gc = new game_counter($conn->pdo);

$heros = $gc->select();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <a href="AddHero.php" class="btn btn-primary">Add Hero</a>
        </div>
        <div class="row mt-5">
            <table class="table table-primary table-striped-columns" border="1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Count of games</th>
                        <th scope="col">- | +</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($heros as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $value['id'] ?></th>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['count_of_games'] ?></td>
                            <td><a href="plus.php?id=<?= $value['id'] ?>" class="btn btn-info">+</a> <a href="minus.php?id=<?= $value['id'] ?>" class="btn btn-secondary">-</a></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>