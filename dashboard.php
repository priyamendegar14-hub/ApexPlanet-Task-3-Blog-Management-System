<?php
include "db.php";

$postCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM posts"));

$userCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Dashboard</h1>

<div class="post">
    <h2>Total Posts</h2>
    <p><?php echo $postCount; ?></p>
</div>

<div class="post">
    <h2>Total Users</h2>
    <p><?php echo $userCount; ?></p>
</div>

<a href="index.php" class="btn">Home</a>

</body>
</html>