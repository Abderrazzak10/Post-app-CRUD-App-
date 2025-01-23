<?php

    require 'config/db.php';

    if(isset($_POST['submit'])){
        // PDO::quote() prevents any hacking stuff...

        $title = $_POST['title'];
        $img = $_POST['img'];
        $author = $_POST['author'];
        $body = $_POST['body'];
    
        if(isset($title) && isset($img) && isset($author) && isset($body)){
    
            $query = "INSERT INTO posts (title, author, body) VALUES (:title, :author, :body)";
        
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':body', $body);
            
            if ($stmt->execute()) {
                echo "Post added Successfully";
                echo "
                <script>
                    window.location.href = 'index.php';
                    alert('Post added Successfully');
                </script>
                ";
            } else {
                echo "Error adding post";
            }

            // Close the connection
            $pdo = null;
            
            // header('location:index.php');

        } else {
            echo "
            <script>
                alert('Be careful to fill all the blanks.');
            </script>";
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Add New Post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="home" >Home</a>
            <a href="addpost.php"  class="add_post" >Add Post</a>
        </nav>
    </header>
    <div class="container"> 
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"> 
            <label for="title">title: </label> 
            <input type="text" name="title" id="title" required> 
            <label for="author">Author: </label> 
            <input type="text" name="author" id="author" required> 
            <label for="body">body: </label> 
            <textarea type="text" name="body" id="body" cols="30" rows="10" required></textarea> 
            <label for="image URL">image URL: </label> 
            <input type="file" name="img" id="img" required> 
            <input type="submit" name="submit" id="submit" value="Ajouter"> 
        </form> 

    </div>
</body>
</html>