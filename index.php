<?php

/*******w******** 
    
    Name: Harleen Kaur
    Date: 21 June, 2024
    Description: Create a blog using CRUD

****************/

require('connect.php');

// Fetch all blog posts from the database
$sql = "SELECT blog_id, title, content, time_stamp, USERID FROM blog";
$result = $db->query($sql);

// Function to format dates
function formatDate($timestamp) {
    $datetime = new DateTime($timestamp, new DateTimeZone('UTC')); // Assuming timestamps are stored in UTC
    $datetime->setTimezone(new DateTimeZone('America/Winnipeg'));
    return $datetime->format('F d, Y, h:i a');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Welcome to my Blog!</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Stung Eye - Index</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="create.php">New Post</a></li>
        </ul>
        <div id="all_blogs">
            <?php if ($result->rowCount() > 0): ?>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="blog_post">
                        <h2><a href="show.php?id=<?= htmlspecialchars($row['blog_id']) ?>"><?= htmlspecialchars($row['title']) ?></a></h2>
                        <p>
                            Posted on <?= formatDate($row['time_stamp']) ?> by User<?= htmlspecialchars($row['USERID']) ?>
                            <a href="edit.php?id=<?= $row['blog_id'] ?>"> edit</a>
                        </p>
                        <div class="blog_content">
                            <?php
                            $content = htmlspecialchars($row['content']);
                            $maxLength = 200;

                            if (strlen($content) > $maxLength) {
                                $displayContent = substr($content, 0, $maxLength) . '...';
                                $readMoreLink = '<a href="show.php?id=' . $row['blog_id'] . '">Read Full Post</a>';
                            } else {
                                $displayContent = $content;
                                $readMoreLink = '';
                            }
                            ?>
                            <p><?= nl2br($displayContent) ?></p>
                            <?= $readMoreLink ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>0 results</p>
            <?php endif; ?>
        </div>
        <div id="footer">
            <p>&copy; 2024 My Blog</p>
        </div>
    </div>
 
    <script>
        (function(){
            if (!document.body) return;
            var js = "window['__CF$cv$params']={r:'88e21f2b8c20ac33',t:'MTcxNzQ0MzI3OC42NjQwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);
            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function () {};
                document.onreadystatechange = function (e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
</body>
</html>
