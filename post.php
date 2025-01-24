<?php
// Include config file
    require_once "config/db.php";

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = '$id' ");
    $stmt->execute();

    $post = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post app</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="home">Home</a>
            <a href="addpost.php" class="add_post">Add Post</a>
        </nav>
    </header>
    
    <div class="container">
        <h3><?php echo $post['title']  ?></h3>
        <p><?php echo $post['body'] ?></p>
        <small>Created by <?php echo $post['author'] ?> on <?php echo $post['created_at'] ?></small>
        <a href="editpost.php?id=<?php echo $post['id'] ?>">Edit post</a><br><br>
    </div>
</body>
</html>