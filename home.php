<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to home page</title>
    <?php
        session_start();
        include('dbconn.php');
        include('functions.php');
        if($_SESSION['user_type']!="user" && $_SESSION['user_type']!="admin"){
            die("Not authorised!" . header("Location: index.php"));
        }
    ?>
</head>
<body>
    <a href="logout.php"><button class="btn">Log Out</button></a>
    <br />
    <div id="readNews">
        <form method="POST">
            <select name="newsType" class="showNews">
                <option value="technology">Technology</option>
                <option value="science">Science</option>
                <option value="sport">Sport</option>
                <option value="politics">Politics</option>
            </select>
            <input type="submit" class="btn" value="Show">
        </form>
    
    <?php 
        getNews($conn);
    ?>
    </div>
    <div class="addComments">
        <div class="add-comments-header">
            <h3>Post your comment</h3>
        </div>
        <form method="POST" action="<?php addComment($conn); ?>">
            <textarea name="addCommentText" class="comment-text-area" required></textarea>
            <br />
            <button type="submit" class="btn" name="addComment">Post comment</button>
        </form>
    </div>

    <?php
        getComments($conn);
    ?>

</body>
</html>