<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../public/style.css">
    <title>Register</title>
</head>
<body>
    <form action="" method="POST" id="registro">
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="password">Password</label>
        <input type="password" name="password">

        <?php include("./../controllers/user/register_user.php") ?>

        <input type="submit" id="submitForm" value="register" name="register">
    </form>
    <p>Already have an account? <a href="./login.php">Login</a></p>
</body>
</html>