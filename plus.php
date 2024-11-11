<?php

require "DB.php";

require "game_counter.php";

$conn = new DB;

$gc = new game_counter($conn->pdo);

if (isset($_GET['id'])) {
    $gc->plus($_GET['id']);

    header("location: index.php");
} else {
    header("location: index.php");
}