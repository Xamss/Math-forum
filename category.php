<?php
include 'header.php';

?>
<div id="page__inner">
<div id = "content1">
    <div id = "subcontent1">
        <div class="title">
            Int
        </div>    
    </div>
    <div id="subcontent2">
<?php
$mysqli = new mysqli("localhost","root","","forum");



if(isset($_GET['search'])){
    $search = $_GET['search'];

    $search_string = "SELECT topics.topic_id, topics.topic_subject, topics.topic_date, users.user_name FROM topics LEFT JOIN users on topics.topic_by = users.user_id WHERE ";
    $display_words = "";


    $keywords = explode(' ', $search);			
    foreach ($keywords as $word){
        $search_string .= "topic_subject LIKE '%".$word."%' OR ";
        $display_words .= $word.' ';
    }

    $search_string = substr($search_string, 0, strlen($search_string)-4);
    $display_words = substr($display_words, 0, strlen($display_words)-1);




    $query = mysqli_query($conn, $search_string);
    $result_count = mysqli_num_rows($query);

    echo '<div class="right">Only <b>'.number_format($result_count).'</b> results found</div>';
    echo '<div class = "left">You searched for <i>"'.$display_words.'"</i></div><div class = "nofloat"></div><hr>';




    if ($result_count > 0){

  
        echo '<table class="search">';

        while ($row = mysqli_fetch_assoc($query)){
            echo '<table><tr>';
            echo '<td class="leftpart Lmaintable">';
                echo '<a class ="important" href="topic.php?topic_id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a> <div class = "symbols"> <i class="far fa-bookmark"></i><i class="far fa-flag"></i><i class="fas fa-exclamation-circle"></i><div>';
            echo '</td>';
            echo '<td class="middlepart">posted by<a class="important"> ' . $row['user_name'] . ' </a></td>';
                echo '<td class="rightpart Rmaintable">' . date('d-m-Y', strtotime($row['topic_date'])) . '</td>';
            echo '</td>';
            echo '</tr></table><hr>';
            
    	}
    }
    else{
        echo '<i class ="errorD">We could not find any topic related to your request. Try to paraphrase it.</i>';
    }

}
else{
    $catid = $mysqli -> real_escape_string($_GET['cat_id']);
    $sql = "SELECT cat_id, cat_name, cat_description FROM categories WHERE cat_id ='$catid'";
    $result = mysqli_query($conn, $sql);


    if(!$result)
    {
        echo 'The category could not be displayed, please try again later.' . mysqli_error();
    }
    else
    {
        if(mysqli_num_rows($result) == 0)
        {
            echo 'This category does not exist.';
        }
        else
        {
            while($row = mysqli_fetch_assoc($result))
            {
                
            }
            $topicid = $mysqli -> real_escape_string($_GET['cat_id']);
            $sql = "SELECT  
                        topics.topic_id,
                        topics.topic_subject,
                        topics.topic_date,
                        topics.topic_cat,
                        users.user_name
                    FROM
                        topics
                    LEFT JOIN
                        users
                    on
                        topics.topic_by = users.user_id
                    WHERE
                        topic_cat = '$topicid' ";
            
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
                    echo '<table >
                        <tr>
                            <th>Newest Topics</th>
                            <th ><i class="fas fa-sync-alt"></i></th>
                            
                        </tr></table>'; 
                    while($row = mysqli_fetch_assoc($result))
                    {               
                        echo '<table><tr>';
                            echo '<td class="leftpart Lmaintable">';
                                echo '<a class ="important" href="topic.php?topic_id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a> <div class = "symbols"> <i class="far fa-bookmark"></i><i class="far fa-flag"></i><i class="fas fa-exclamation-circle"></i><div>';
                            echo '</td>';
                            echo '<td class="middlepart">posted by<a class="important"> ' . $row['user_name'] . ' </a></td>';
                                echo '<td class="rightpart Rmaintable">' . date('d-m-Y', strtotime($row['topic_date'])) . '</td>';
                            echo '</td>';
                        echo '</tr></table><hr>';
                    }
                }
            }
        }
    }
}
?>
</div>
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