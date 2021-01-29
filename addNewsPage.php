<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
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

    <div id="addNews">
            <div id="header-in-admin">
            <h2 style="font-family: Arial">Add news</h2>
            </div><!-- End of #header -->
            <form id="add-news-form" method="POST" action="<?php addNews($conn); ?>">
                <div class="input-news-group">
                    <label for="addNewsType">News Type: </label>
                    <select name="addNewsType">
                        <option value="technology">Technology</option>
                        <option value="science">Science</option>
                        <option value="sport">Sport</option>
                        <option value="politics">Politics</option>
                    </select>
                </div>
                <div class="input-news-group">
                    <label for="addTitle">Title</label>
                    <input type="text" name="addTitle" id="title" placeholder="Title..." required>
                </div>
                <div class="input-news-group">
                    <label for="addText">News Text</label>
                    <textarea id="news-textarea" name="addText" placeholder="Type some text..."></textarea>
                </div>
                <div class="input-news-group">
                    <input type="submit" name="addNews" class="btn">
                </div>
            </form>

        </div><!-- End of #addNews -->

</body>
</html>