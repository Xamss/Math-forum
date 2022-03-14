<!-- <form action="#" method="post">

                <fieldset>
                    <input type="text" placeholder="Mesajınızı Yazın" autofocus>
                    <input type="hidden">
                </fieldset>
</form> -->









<?php
include 'header.php';
?>
<div id="page__inner">
<div id="content1">


<div class="liveChat">
    <div class="accessBox"> <img src="Images/hotNews.png"/></div>

    <div class="sandBox">
        
            <div class="chat-history">
                
                <div class="chat-message clearfix">
                    
                    <img src="profiles/businessman-profile-cartoon_18591-58479.jpg" alt="" width="32" height="32">

                    <div class="chat-message-content clearfix">
                        
                        <span class="chat-time">13:35</span>

                        <h4>John Doe</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, explicabo quasi ratione odio dolorum harum.</p>

                    </div> 

                </div> 

                <hr>

                <div class="chat-message clearfix">
                    
                    <img src="profiles/woman-profile-cartoon_18591-58476.jpg" alt="" width="32" height="32">

                    <div class="chat-message-content clearfix">
                        
                        <span class="chat-time">13:37</span>

                        <h4>Marco Biedermann</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectusLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectusLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectusLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectusLorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiiss</p>

                    </div> <!-- end chat-message-content -->

                </div> <!-- end chat-message -->

                <hr>

                <div class="chat-message clearfix">
                    
                    <img src="profiles/businessman-profile-cartoon_18591-58479.jpg" alt="" width="32" height="32">

                    <div class="chat-message-content clearfix">
                        
                        <span class="chat-time">13:38</span>

                        <h4>John Doe</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>

                    </div> 
                </div> 
                <hr>

            </div> 

            
    </div>
</div>

<script src="webNotification.js"></script>

<?php
$sql = "SELECT cat_id, cat_name, cat_description FROM categories;";
$result = mysqli_query($conn, $sql);
if(!$result)
{
    echo 'The categories could not be displayed, try again later.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        echo '<table>
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>';   
        while($row = mysqli_fetch_assoc($result))
        {   
            $cat_id = $row['cat_id'];            
            echo '<tr>';
                echo '<td class="leftpart Lmaintable">';
                    echo '<h3><a href="category.php?cat_id=' . $cat_id . '">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
                echo '<td class="rightpart Rmaintable">';
                            echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
                echo '</td>';
            echo '</tr>';
        }
    }
}
?>
</table>
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