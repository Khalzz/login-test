<?php
    require_once(dirname(__FILE__) .'/../../configuration/db.php');
    
    if (isset($_SESSION['user_id'])) {
        header("location: home.php");
        exit;
    }

    if (!empty($_POST["register"])) { // this will be checked when the user press the "submit" button (the "name" of the button is "register")
        if (empty($_POST["username"]) or empty($_POST["password"])) { // if some data are empty
            // we show an error
            echo "<h4 id='error-log'>The data needs to be filled</h4>";
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // this is magic cause the cyphering is made in a way that let us to have 2 passwords that will be stored differently
            // based on the official php docs, the hashed password should be stored on a value with 255 characters or more.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // preparamos nuestro "statement (stmt)"
            $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?,?)");
            $stmt->bind_param("ss", $username, $hashed_password); // con esto asignamos el $name a nuestro stmt

            // Ejecutamos el statement
            if ($stmt->execute()) {
                header("Location: ./login.php");
            } else {
                if ($stmt->errno == 1062) {
                    echo "<p id='error-log'>The username is already in use</p>";
                } else {
                    echo "Error: (" . $stmt->errno . ") " . $stmt->error;
                }
            }

            $stmt->close();
            $conn->close();
        }
    }
?>
