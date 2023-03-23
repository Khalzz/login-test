<?php
    session_start(); // we init the session itself

    require_once(dirname(__FILE__) .'/../../configuration/db.php');

    if (isset($_SESSION['user_id'])) {
        header("location: ./home.php");
        exit;
    }

    if (!empty($_POST["login"])) { // this will be checked when the user press the "submit" button (the "name" of the button is "register")
        if (empty($_POST["username"]) or empty($_POST["password"])) { // if some data are empty
            // we show an error
            echo "<h4 id='error-log'>The data needs to be filled</h4>";
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // preparamos nuestro "statement (stmt)"
            $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE username = ?");
            $stmt->bind_param("s", $username); // con esto asignamos el $name a nuestro stmt
            $stmt->execute();

            $result = $stmt->get_result(); // we get the data of the statement
            $user = $result->fetch_assoc(); // and we transform the data to a "user" itself

            // make sure that the length of the password value on the database is long enough for this hashed password
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: ./home.php');
            } else {
                echo "<p id='error-log'>The username or password is incorrect</p>";
            }

            $stmt->close();
            $conn->close();
        }
    }
?>
