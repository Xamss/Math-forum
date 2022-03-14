<?php
include 'header.php';
?>
<div class = "email-container">
<button class="btn-email" style="background: white;">
<i class="fab fa-google"></i>
Sign up with Google</button>
<button class="btn-email" style="background: #385499; color: white;">
<i class="fab fa-facebook-square"></i>
Sign up with Facebook</button>
<div id = "content-account1">
<div class="welcome-header">
     <h3>Registration</h3>
</div>
<?php

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    ?>
    <form name = "signup" method="post" action="signup.php" onsubmit="return formValidation()">
    <label for = "user_name">USERNAME</label><input id = "user_name" type="text" name="user_name"/>
    <label for = "user_pass">PASSWORD</label><input id = "user_pass" type="password" name="user_pass"/>
    <label for = "user_pass2">PASSWORD AGAIN</label><input id = "user_pass2" type="password" name="user_pass_check"/>
    <label for = "user_email">EMAIL</label> <input id ="user_email" type="email" name="user_email"/>
    <div class="d-grid gap-2"><input class="btn btn-primary" type="submit" value="SUBMIT" /></div>
    </form>
    </div>
    <?php
}
else
{
    $errs = array();
    if(isset($_POST['user_name']))
    {
        if(!ctype_alnum($_POST['user_name']))
        {
            $errs[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errs[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errs[] = 'The username field must not be empty.';
    }
    if(isset($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errs[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errs[] = 'The password field cannot be empty.';
    }
     
    if(!empty($errs))
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errs as $key => $value) 
        {
            echo '<li>' . $value . '</li>'; 
        }
        echo '</ul>';
    }
    else
    {
        $Username = $_POST['user_name'];
        $Userpass = $_POST['user_pass'];
        $Useremail = $_POST['user_email'];
        $query = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('$Username', '$Userpass', '$Useremail', NOW(), 0)";
                         
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            echo 'Something went wrong while registering. Please try again later.';
        }
        else
        {
            echo 'Successfully registered. You can now <a href="login.php">sign in</a> and start posting';
        }
    }
}
?>
</div>
<script src="validation.js"></script>
</body>
</html>