<?php
include "db.php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";

    if(mysqli_query($conn,$sql)){
        echo "<h3>Registration Successful!</h3>";
    } else {
        echo "<h3>Error!</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Create Account</h1>

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
            name="register"
            class="btn">
        Register
    </button>

</form>

<br>

<a href="login.php" class="btn">
    Login
</a>

</body>
</html>