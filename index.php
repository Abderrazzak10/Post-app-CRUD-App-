<?php
// Include config file
    require_once "config/db.php";

    $query = "SELECT * FROM posts ORDER BY created_at DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $posts = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Post App</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.html" class="home" >Home</a>
            <a href="addpost.html"  class="add_post" >Add Post</a>
        </nav>
    </header>
    <?php
    if ($posts) {
        foreach ($posts as $post) {
    ?>
            <div class="container">
                <h3><?php echo $post['title']  ?></h3>
                <p><?php echo substr($post['body'],0,25) ?>.....</p>
                <small>Created by <?php echo $post['author'] ?> on <?php echo $post['created_at'] ?></small>
                <a href="post.php?id=<?php echo $post['id'] ?>">Read More</a>
            </div>
    <?php
    }
        } else {
            echo "<p>No posts found</p>";
        }
    ?>

</body>
</html>
