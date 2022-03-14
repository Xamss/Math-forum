<?php
include 'header.php';
?>
<div id ="page__inner">
<div id = "content-account">
    <div class = "welcome-header">
        <h3>Join us</h3>
    </div>
<?php
if(isset($_SESSION['signed_in']))
{
    echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {

        ?>
        <form method="post" action="login.php" onsubmit = "return formValidation2()" name="check2">
        <label for = "user_name" >USERNAME</label> <input id = "user_name" type="text" name="username" />
        <label for = "user_pass" >PASSWORD</label> <input id = "user_pass" type="password" name="password">
        <div class="d-grid gap-2"><input class="btn btn-primary" type="submit" value="Sign in" /></div>
        </form>
        <script src="validation.js"></script>
        <?php
    }
    else
    {
        $errors = array(); 
        if(!isset($_POST['username']))
        {
            $errors[] = 'The username field must not be empty.';
        }
        if(!isset($_POST['password']))
        {
            $errors[] = 'The password field must not be empty.';
        }
        if(!empty($errors)) 
        {
            echo 'Some fields are filled incorrectly:';
            echo '<ul>';
            foreach($errors as $key => $value)
            {
                echo '<li>' . $value . '</li>'; 
            }
            echo '</ul>';
        }
        else
        {
            $username = $_POST['username'];
            $user_pass = $_POST['password'];
            $sql = "SELECT user_id, user_name, user_level FROM users WHERE user_name = '$username' AND user_pass = '$user_pass'";
            $result = mysqli_query($conn, $sql);
            if(!$result)
            {
                echo 'Something went wrong while signing in. Please try again later.';
            }
            else
            {
                if(mysqli_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                }
                else
                {
                    $_SESSION['signed_in'] = "";
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }
                    echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.';
                }
            }
        }
    }
}

include 'footer.php';
?>