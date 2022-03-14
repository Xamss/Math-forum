<?php
include 'header.php';
?>
<div id="page__inner">
<div id="content1">
<?php
if(isset($_SESSION['signed_in']) && $_SESSION['user_level'] == 1)
{
if($_SERVER['REQUEST_METHOD'] != 'POST') 
{
?>  
<form class = "submit-cat" method='post' action=''>
    <label for = "cat-name">Category name</label> <input placeholder ="New topic" id = "cat-name" type='text' name='cat_name'/>
    <label for = "cat-descript">Category description</label><textarea  placeholder = "Write description only releated to the category" style = "height: 150px;" id= "cat-descript"name='cat_description'/></textarea>
    <input class = "sub-btn" type='submit' value='Add category' />
</form> 
<?php
}
else
{

    $mysqli = new mysqli("localhost","root","","forum");
    $catname = $mysqli -> real_escape_string($_POST['cat_name']);
    $catdescript = $mysqli -> real_escape_string($_POST['cat_description']);
    $sql = "INSERT INTO categories(cat_name, cat_description) VALUES('$catname', '$catdescript')";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {

        echo 'Error' . mysqli_error();
    }
    else
    {
        echo 'New category successfully added.';
    }
}
}
else{
    echo 'Sorry, you don\'t have privilege to create a category.';
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