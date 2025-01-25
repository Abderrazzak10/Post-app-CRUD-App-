<?php

require 'config/db.php';

$id = $_GET['id'];

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    if ($count == 1) {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "
        <script>
            window.location.href = 'index.php';
            alert('Post Deleted Successfully!!!');
        </script>
        ";

        $pdo = null;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
