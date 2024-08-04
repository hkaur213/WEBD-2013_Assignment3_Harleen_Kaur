<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize user input
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $errors = [];

    // Validate title
    if (strlen($title) < 1) {
        $errors[] = 'Title must be at least 1 character long.';
    }

    // Validate content
    if (strlen($content) < 1) {
        $errors[] = 'Content must be at least 1 character long.';
    }

    if (empty($errors)) {
        // Proceed with saving the post to the database
        // For example, include database connection and insertion logic here
        require('connect.php'); // Assuming this file establishes a database connection

        $sql = "INSERT INTO blog (title, content, time_stamp, USERID) VALUES (:title, :content, NOW(), :user_id)";
        $stmt = $db->prepare($sql);

        // Replace `:user_id` with actual user ID
        $user_id = 1; // Example static user ID; replace with actual logic

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':user_id', $user_id);
        
        if ($stmt->execute()) {
            echo "<p>Post created successfully!</p>";
        } else {
            echo "<p>Error saving the post. Please try again.</p>";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Stung Eye - New Post</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Stung Eye - New Post</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="create.php" class="active">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <form action="process_post.php" method="post">
                <fieldset>
                    <legend>New Blog Post</legend>
                    <p>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" required />
                    </p>
                    <p>
                        <label for="content">Content</label>
                        <textarea name="content" id="content" required></textarea>
                    </p>
                    <p>
                        <input type="submit" name="command" value="Create" />
                    </p>
                </fieldset>
            </form>
        </div>
        <div id="footer">
            Copywrong 2024 - No Rights Reserved
        </div>
    </div>
</body>
</html>
