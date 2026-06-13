<?php
include "db.php";
session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){

            $_SESSION['username'] = $username;

            header("Location:index.php");
            exit();

        } else {
            echo "<h3>Wrong Password!</h3>";
        }

    } else {
        echo "<h3>User Not Found!</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Login</h1>

<form method="POST">

    <input type="text"
           name="username"
           placeholder="Enter Username"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Enter Password"
           required>

    <br><br>

    <button type="submit"
            name="login"
            class="btn">
        Login
    </button>

</form>

<br>

<a href="register.php" class="btn">
    Register
</a>

</body>
</html>