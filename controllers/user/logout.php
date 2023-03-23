<?php
    session_start();
    
    $_SESSION = array(); // we take out the data from our session
    
    session_destroy();
    
    header("Location: ../../views/login.php");
    exit;
?>