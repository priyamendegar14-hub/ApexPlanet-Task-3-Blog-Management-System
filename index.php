<?php
include "db.php";

$search = $_GET['search'] ?? '';

$result = mysqli_query($conn,
"SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Blog</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="GET">
    <input type="text" name="search" placeholder="Search Posts">
    <button type="submit">Search</button>
</form>

<h1>Blog Posts</h1>

<a href="add.php" class="btn">Add Post</a>
<a href="dashboard.php" class="btn">Dashboard</a>
<a href="profile.php" class="btn">Profile</a>
<a href="logout.php" class="btn">Logout</a>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<div class="post">
    <h2><?php echo $row['title']; ?></h2>
    <p><?php echo $row['content']; ?></p>
    <img src="uploads/<?php echo $row['image']; ?>" width="250">

    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn">Delete</a>
</div>
<?php } ?>

</body>
</html>