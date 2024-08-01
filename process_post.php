<?php
// Include the database connection
require('connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        // Prepare the SQL statement
        $stmt = $db->prepare("INSERT INTO blog (title, content, time_stamp) VALUES (:title, :content, NOW())");

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        // Execute the statement
        $stmt->execute();

        // Redirect to the home page after processing the form
        header("Location: index.php");
        exit(); // Ensure that no other code is executed after the redirection

    } catch (PDOException $e) {
        // If there's an error, output it (this is for debugging; remove in production)
        echo "Error: " . $e->getMessage();
    }
}

// Close the database connection
$db = null;
?>
