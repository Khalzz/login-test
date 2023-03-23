<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../public/style.css">
    <title>Home</title>
</head>
<body>
    
    <form action="../controllers/user/logout.php" method="POST">
        <?php
            session_start(); // we init the session itself

            $username = $_SESSION['username']; // we get the data

            // if the user_id is not set, it means that the user has not loged in, so we send him to the login page
            if (!isset($_SESSION['user_id'])) {
                header("location: ./login.php");
                exit;
            } else {
                echo "<p id='welcome'>Hello " . $username . "!</p>";
            }
        ?>
        <input type="submit" value="Log Out" value="Log out" id="submitForm">
    </form>
</body>
</html>