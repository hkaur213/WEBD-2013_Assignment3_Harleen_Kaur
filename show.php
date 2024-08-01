<?php
require('connect.php'); // Assuming this file establishes a database connection

// Ensure blog_id is provided and numeric
$blog_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$blog_id) {
    // Handle invalid or missing blog_id, e.g., redirect or show an error
    header('Location: index.php');
    exit;
}

// Retrieve the full content based on blog_id
$sql = "SELECT title, content, time_stamp FROM blog WHERE blog_id = :blog_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':blog_id', $blog_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    // Handle case where blog post with given ID doesn't exist
    header('Location: index.php');
    exit;
}

// Display full content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title><?= htmlspecialchars($row['title']) ?></title>
</head>
<body>

    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Harleen's Blog</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="create.php">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <div id="blog_post">
                <h2><?= htmlspecialchars($row['title']) ?></h2>
                <p>
                    <small>
                        <?= date('F d, Y, h:i A', strtotime($row['time_stamp'])) ?> -
                        <a href="edit.php?id=<?= $blog_id ?>">edit</a>
                    </small>
                </p>
                <div class="blog_content">
                    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                </div>
            </div>
        </div>
        <div id="footer">
            Copywrong 2024 - No Rights Reserved
        </div>
    </div>
</body>
</html>
