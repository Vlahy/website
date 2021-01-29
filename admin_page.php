<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Page</title>
    <?php 
        session_start();
        include('dbconn.php');
        include('functions.php');
        if($_SESSION['user_type']!="admin"){
            die("Not authorised!" . header("Location: home.php"));
        }
    ?>
</head>
<body>
    <a href="addNewsPage.php"><button class="btn">Add News</button></a>
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
            getNewsAdmin($conn);
        ?>
    
    </div><!-- End of #readNews -->

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
        getCommentsAdmin($conn);
    ?>

</body>
</html>