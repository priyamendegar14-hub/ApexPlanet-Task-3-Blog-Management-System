<?php
include "db.php";

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "uploads/".$image);

    mysqli_query($conn,
    "INSERT INTO posts(title, content, image)
    VALUES('$title','$content','$image')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Add Blog Post</h1>

<form method="POST" enctype="multipart/form-data">

    <input type="text"
           name="title"
           placeholder="Enter Title"
           required>

    <br><br>

    <textarea name="content"
              placeholder="Write Content Here..."
              rows="6"
              required></textarea>

    <br><br>

    <input type="file"
           name="image"
           required>

    <br><br>

    <button type="submit" name="submit">
        Add Post
    </button>

</form>

</body>
</html>