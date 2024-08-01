<?php
require('connect.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $command = $_POST['command'];
    $id = $_POST['id'];

    try {
        if ($command === "Update") {
            // Update data in the database
            $title = $_POST["title"];
            $content = $_POST["content"];

            $sql = "UPDATE blog SET title = :title, content = :content WHERE blog_id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redirect to home page after update
            header("Location: index.php");
            exit();
        } elseif ($command === "Delete") {
            // Delete data from the database
            $sql = "DELETE FROM blog WHERE blog_id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redirect to home page after deletion
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid command."; // Handle unexpected command
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request."; // Handle non-POST requests
}
?>
