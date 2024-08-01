<?php
 
require('connect.php');
require('authenticate.php');
 
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    // Redirect user back to index page or handle the error as needed
    header('Location: index.php');
    exit();
}
 
try {
    // Prepare and execute the SQL statement to fetch the blog post
    $stmt = $db->prepare("SELECT * FROM blog WHERE blog_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
   
    // Fetch the blog post
    $post = $stmt->fetch();
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
</head>
<body>
<div id="wrapper">
<div id="header">
<h1><a href="index.php">Stung Eye - Edit Post</a></h1>
</div>
<ul id="menu">
<li><a href="index.php">Home</a></li>
<li><a href="create.php">New Post</a></li>
</ul>
<div id="all_blogs">
<form action="process_edit.php" method="post">
<fieldset>
<legend>Edit Blog Post</legend>
<p>
<label for="title">Title</label>
<input name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>" />
</p>
<p>
<label for="content">Content</label>
<textarea name="content" id="content"><?php echo htmlspecialchars($post['content']); ?></textarea>
</p>
<p>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="submit" name="command" value="Update" />
<input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you want to delete this post?');" />
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
