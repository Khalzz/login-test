<?php
    session_start(); // we init the session itself

    if (!isset($_SESSION['user_id']) && !strpos($_SERVER['REQUEST_URI'], 'login.php')) {
        header("Location: ./views/login.php");
        exit;
    } else {
        header("location: ./views/home.php");
    }
?>