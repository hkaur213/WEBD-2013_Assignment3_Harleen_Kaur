<?php
require('connect.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $command = $_POST['command'];
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);

    // Initialize an array for validation errors
    $errors = [];

    // Validate title and content
    if (strlen($title) < 1) {
        $errors[] = 'Title must be at least 1 character long.';
    }
    if (strlen($content) < 1) {
        $errors[] = 'Content must be at least 1 character long.';
    }

    if (empty($errors)) {
        try {
            if ($command === "Update") {
                // Update data in the database
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
            echo "Error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    echo "Invalid request."; // Handle non-POST requests
}
?>
