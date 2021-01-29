<?php

function addNews($conn){
    if(isset($_POST['addNews'])){
        $newsType = $_POST['addNewsType'];
        $title = $_POST['addTitle'];
        $text = $_POST['addText'];
        $news_date = date("F j, Y, g:i a");

        $querry = "INSERT INTO news (news_type, news_title, news_date, news_text) VALUES ('$newsType','$title','$news_date','$text')";
        mysqli_query($conn,$querry);

        header("Location: admin_page.php");
    }
}

function addComment($conn){
    if(isset($_POST['addComment'])){
        $addCommentText = $_POST['addCommentText'];
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $comment_date = date("F j, Y, g:i a");

        $query = "INSERT INTO comment (user_id,username,comment_date,content) VALUES ('$user_id','$username','$comment_date','$addCommentText')";
        $result = mysqli_query($conn,$query);
    }
}

function getNewsAdmin($conn){
    if(!isset($_POST['newsType'])){
        $news_type_admin = "technology";
    }else{
        $news_type_admin = $_POST['newsType'];   
    }
        $query = "SELECT * FROM news WHERE news_type LIKE '$news_type_admin' ORDER BY news_date DESC";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Error: " . mysqli_error());
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="news-box">';
            echo '<h3 class="news-title">Title: '.$row['news_title'].'</h3>';
            echo '<p class="news-date"><b>Date posted:</b> '.$row['news_date'].'</p>';
            echo '<p class="news-text">'.nl2br($row['news_text']).'</p>';
            echo "<form method='POST' class='delete-form'>
            <input type='hidden' name='newsID' value='".$row['news_id']."'>
            <button type='submit' name='newsDelete'>Delete</button>
            </form></div>";
        }
    }
if(isset($_POST['newsDelete'])){
    $newsID = $_POST['newsID'];

    $queryDelete = "DELETE FROM news WHERE news_id LIKE '$newsID'";
    $resultDelete = mysqli_query($conn,$queryDelete);
}

function getCommentsAdmin($conn){
    $sql = "SELECT * FROM comment ORDER BY comment_date DESC";
    $print = mysqli_query($conn,$sql);
    while($comment = mysqli_fetch_assoc($print)){
        echo '<div class="comment-box">';
        echo '<p class="comment-name">User: '.$comment['username'].'</p>';
        echo '<p class="comment-date">Posted: '.$comment['comment_date'].'</p>';
        echo '<p class="comment-text">'.$comment['content'].'</p>';
        echo "<form method='POST' class='delete-form'>
            <input type='hidden' name='commentID' value='".$comment['comment_id']."'>
            <button type='submit' name='commentDelete'>Delete</button>
            </form>";
        echo '</div>';
    }
}
if(isset($_POST['commentDelete'])){
    $commentID = $_POST['commentID'];

    $queryDelete = "DELETE FROM comment WHERE comment_id LIKE '$commentID'";
    $resultDelete = mysqli_query($conn,$queryDelete);
}

function getComments($conn){
    $sql = "SELECT * FROM comment ORDER BY comment_date DESC";
    $print = mysqli_query($conn,$sql);
    while($comment = mysqli_fetch_assoc($print)){
        echo '<div class="comment-box">';
        echo '<p class="comment-name">User: '.$comment['username'].'</p>';
        echo '<p class="comment-date">Posted: '.$comment['comment_date'].'</p>';
        echo '<p class="comment-text">'.$comment['content'].'</p>';
        if($_SESSION['user_id']==$comment['user_id']){
            echo "<form method='POST' class='delete-form'>
            <input type='hidden' name='commentID' value='".$comment['comment_id']."'>
            <button type='submit' name='commentDelete'>Delete</button>
            </form>";
        }
        echo '</div>';
    }
}

function getNews($conn){
    if(!isset($_POST['newsType'])){
        $news_type = "technology";
    }else{
        $news_type = $_POST['newsType'];   
    }
        
        $query = "SELECT * FROM news WHERE news_type LIKE '$news_type'";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Error: " . mysqli_error());
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="news-box">';
            echo '<h3 class="news-title">Title: '.$row['news_title'].'</h3>';
            echo '<p class="news-date"><b>Date posted: </b>'.$row['news_date'].'</p>';
            echo '<p class="news-text">'.nl2br($row['news_text']).'</p>';
            echo "</div>";
        }
}