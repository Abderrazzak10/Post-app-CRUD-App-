<?php

require 'config/db.php';

if(isset($_POST['submit'])){

    // Prepare and bind
    $id = $_POST['id'];
    $title = $_POST['title'];
    $img = $_POST['img'];
    $author = $_POST['author'];
    $body = $_POST['body'];

    if(isset($title) && isset($img) && isset($author) && isset($body)){
        $query = "UPDATE posts SET title = :title, author = :author, body = :body WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':body', $body);

        if($stmt->execute()){
            echo "
            <script>
                window.location.href = 'index.php';
                alert('Post updated Successfully!!!');
            </script>
            ";
        } else {
            echo "
            <script>
                alert('The updating didn't go well!!!');
            </script>
            ";
        }
    } else {
        echo"
        <script>
            alert ('Be careful to fill all the blanks.');
        </script>
        ";
    }
}

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$post){
    die ("Error. User Not Found!!!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addpost</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $post['id'] ?>" ><br>
            <label for="title">title: </label><br>
            <input type="text" name="title" id="title" value="<?php echo $post['title'] ?>" ><br>
            <label for="author">Author: </label><br>
            <input type="text" name="author" id="author"value="<?php echo $post['author'] ?>" required><br>
            <label for="body">body: </label><br>
            <input type="text" name="body" id="body" cols="30" rows="10" value="<?php echo $post['body'] ?>" required><br><br>
            <label for="image URL">image URL: </label><br>
            <input type="file" name="img" id="img"value="<?php //echo $post['img'] ?>"  required><br>
            <input type="submit" name="submit" id="submit" value="Modifier"><br>
        </form>
    </div>
</body>
</html>
