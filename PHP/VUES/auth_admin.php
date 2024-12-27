<?php
session_start();

function checkAdmin() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

    if ($_SESSION['user']['Role'] !== 'Admin') {
        header('Location: login.php');
        exit();
    }
}

checkAdmin();
?>