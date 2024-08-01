<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $errors = [];

    if (strlen($title) < 1) {
        $errors[] = 'Title must be at least 1 character long.';
    }

    if (strlen($content) < 1) {
        $errors[] = 'Content must be at least 1 character long.';
    }

    if (empty($errors)) {
        // Proceed with saving the post to the database
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Stung Eye - New Post Wootly Grins</title>
<link rel="stylesheet" href="main.css" type="text/css">
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
<input name="title" id="title" />
</p>
<p>
<label for="content">Content</label>
<textarea name="content" id="content"></textarea>
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
