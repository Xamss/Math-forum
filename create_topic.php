<?php
include 'header.php';
?>
<div id="page__inner">
<div id="content1">

<div hidden="true">
    
</div>

<h1>Create a topic</h1>

<div class = "warn-info">
        <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 0.5rem;"></i>
        <span>We highly recommend you to get familiar with our</span> 
        <a  href="/Project_1/index.php" onclick="return popup(this, 'notes')" style="">guidelines<img src="Images/voice-search.png" style="height: 15px; width: 15px;" onclick="audio[0].play()"></a>
        <span>for posting questions if you haven't yet read the instructions</span>
    
</div>


<script type="text/javascript">
  function popup(mylink, windowname) { 
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href; 
    window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); 
    return false; 
  }
</script>





<?php

if(!isset($_SESSION['signed_in']))
{
    echo 'Sorry, you have to be <a href="login.php">signed in</a> to create a topic.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {   

        $sql = "SELECT
                    cat_id,
                    cat_name,
                    cat_description
                FROM
                    categories";
         
        $result = mysqli_query($conn, $sql);
         
        if(!$result)
        {
            echo 'Error while selecting from database. Please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                if($_SESSION['user_level'] == 1)
                {
                    echo 'You have not created categories yet.';
                }
                else
                {
                    echo 'Before you can post a topic, you must wait for an admin to create some categories.';
                }
            }
            else
            {
         
                echo '<form class = "submit-topic" method="post" action="create_topic.php">
                    <label for = "topicname">Subject</label> <input placeholder = "Please, be specific" id = "topicname" type="text" name="topic_subject" />
                    <label for = "topicselect">Category</label>'; 
                 
                echo '<select id = "topicselect" name="topic_cat">';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select>'; 
                     
                echo '<label for = "topicontent">Message</label> <textarea placeholder="Please, enter your question in more details" id = "topicontent" name="post_content" /></textarea>
                    <input class = "sub-btn" type="submit" value="Create topic" />
                 </form>';
            }
        }
    }
    else
    {
        $query  = "BEGIN WORK;";
        $result = mysqli_query($conn, $query);
         
        if(!$result)
        {
            echo 'An error occured while creating your topic. Please try again later.';
        }
        else
        {
            $mysqli = new mysqli("localhost","root","","forum");
            $topicsubject = $mysqli -> real_escape_string($_POST['topic_subject']);
            $topiccat = $mysqli -> real_escape_string($_POST['topic_cat']);
            $userid = $_SESSION['user_id'];
            $sql = "INSERT INTO topics(topic_subject, topic_date, topic_cat, topic_by) VALUES('$topicsubject', NOW(), '$topiccat','$userid')";        
            $result = mysqli_query($conn, $sql);
            if(!$result)
            {
                echo 'An error occured while inserting your data. Please try again later.' . mysqli_error();
                $sql = "ROLLBACK;";
                $result = mysqli_query($conn, $sql);
            }
            else
            {
                $topicid = mysqli_insert_id($conn);
                $postcontent =$mysqli -> real_escape_string($_POST['post_content']);
                $userid = $_SESSION['user_id'];
                $sql = "INSERT INTO
                            posts(post_content, post_date, post_topic, post_by)
                        VALUES
                            ('$postcontent', NOW(), '$topicid', '$userid' )";
                $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($conn, $sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysqli_query($conn, $sql);
                    echo 'You have successfully created <a href="topic.php?id='. $topicid . '">your new topic</a>.';
                }
            }
        }
    }
}
?>
</div>
<div class = "fixed-part">
<div id = "content2">
    <div class = "Dcontent2_listname"><span class="content2_listname">Useful Links</span></div>
    <a class = "contactlist" href = "http://www.esepterqory.kz">Collection of math books</a>
    <a class = "contactlist" href = "https://math.stackexchange.com">Alternative english forum</a>
    <div class = "Dcontent2_listname"><span class="content2_listname">Respectful members</span></div>
    <a class = "top-account"><img src = "profiles\businessman-profile-cartoon_18591-58479.jpg"> Serik Kozhabaev</a>
    <a class = "top-account"><img src = "profiles\man-profile-cartoon_18591-58483.jpg"> Amanzhol Bakhtiyar</a>
    <a class = "top-account"><img src = "profiles\woman-profile-cartoon_18591-58477.jpg"> Kurban Eldos</a>
    <a class = "top-account"><img src = "profiles\woman-profile-cartoon_18591-58478.jpg"> Tileybai Sagyndyk</a>
    <div class = "Dcontent2_listname"><span class="content2_listname">Rules</span></div>
    <p class = "rules"><i class="fas fa-exclamation"></i>Do not abuse, belittle or act rude towards others.</p>
    <span class = "rules"><i class="fas fa-exclamation"></i>Vulgar language, harassment, bullying, witch hunting, hate speech, etc. is not accepted.</span>
    <div class = "Dcontent2_listname"><span class="content2_listname">Admin contact</span></div>
    Give us feedback:
    <span class = "contactlist"><i class="fas fa-phone-alt"></i> 8 701 624 0999</span>
    <span class = "contactlist"><i class="fas fa-paper-plane"></i> esepterqory@gmail.com</span>
</div>
</div>
</div>
<div id="option4" class="overlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <span class="post-header">What you want to post?</span>
            <a class="btn-post important" href="create_topic.php">Topic</a> 
            <a class="btn-post important" href="create_cat.php">Category</a>
        </div>
</div>
</body>
</html>