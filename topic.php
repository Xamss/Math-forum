<?php
include 'header.php';
?>
<div id="page__inner">
<div id="content1">
<?php
$mysqli = new mysqli("localhost","root","","forum");
$topicid = $mysqli -> real_escape_string($_GET['topic_id']);
$sql = "SELECT topic_id, topic_subject FROM topics WHERE topic_id ='$topicid'";
$result1 = mysqli_query($conn, $sql);
if(!$result1)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error();
}
else
{
    if(mysqli_num_rows($result1) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        $postoid = $mysqli -> real_escape_string($_GET['topic_id']);
        $sql = "SELECT posts.post_topic, posts.post_content, posts.post_date, posts.post_by, users.user_id, users.user_name FROM posts LEFT JOIN users ON posts.post_by = users.user_id WHERE posts.post_topic = '$postoid' ";
        $result = mysqli_query($conn, $sql);
         
        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {

                while($row1 = mysqli_fetch_assoc($result1)){
                    echo '<table>
                    <tr>
                      <th colspan="2">' . $row1['topic_subject'] . '</th>
                    </tr>';  
                
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo '<tr>';
                        echo '<td class="leftpart"><img class = "profile" src = "profiles\man-profile-cartoon_18591-58484.jpg">';
                            echo '<h5 class = "User-info">' . $row['user_name'] . '<br><i>User<i><h5>';
                        echo '</td>';
                        echo '<td class="rightpart">'. $row['post_date'];
                            echo '<p class = "right-content">'. $row['post_content'];
                        echo '</p></td>';
                    echo '</tr>';
                }   
                    echo '  <tr>
                                <th class = "comm" colspan="2">
                                    <form method="post" action="reply.php?topic_id='.$row1['topic_id'].'">
                                        <textarea placeholder = "Comment on the topic" name="reply-content"></textarea>
                                        <input class ="sub-btn" type="submit" value="Submit reply"/>
                                    </form>
                                </th>
                            </tr>
                        </table>';
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
</body>
</html>