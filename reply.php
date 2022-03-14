
<?php
include 'header.php';
?>
<div id="page__inner">
<div id="content">
<?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo 'This file cannot be called directly.';
}
else
{
    if(!isset($_SESSION['signed_in']))
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        $mysqli = new mysqli("localhost","root","","forum");
        $id = $_GET['topic_id'];
        $content = $_POST['reply-content'];
        $userid = $_SESSION['user_id'];
        $sql = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES ('$content', NOW(),'$id','$userid')";         
        $result = mysqli_query($conn, $sql);          
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topic.php?topic_id='. $_GET['topic_id'] . '">the topic</a>.';
        }
    }
}
include 'footer.php';
?>