function formValidation()
{
    var password1 = document.signup.user_pass;
    var password2 = document.signup.user_pass_check;
    var username = document.signup.user_name;
    var email = document.signup.user_email;
    if (username.value == "")                                  
    { 
        
        window.alert("Please enter your name."); 
        return false; 
    } 
    if(UsernameValidation(username))
    {
        if(EmailValidation(email))
        {
            if(PasswordValidation(password1))
            {   
                if (MatchPassword(password1, password2)) 
                {
                    return true;
                }
            } 
        }
    } 
    return false;
}

function EmailValidation(email)
{
    var mailform = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.value.match(mailform))
    {
        return true;
    }
    else
    {
        window.alert("You have entered an invalid email address!");
        return false;
    }
}




function PasswordValidation(password1)
{
    var password_len = password1.value.length;
    if (password_len == 0 )
    {
        window.alert("Password should not be empty");
        return false;
    }
    return true;
}


function UsernameValidation(username)
{ 
    var letters = /^[A-Za-z]+$/;
    if(username.value.match(letters))
    {
        return true;
    }
    else
    {
        window.alert('Username must have alphabet characters only');
        return false;
    }
}
    

function MatchPassword(password1, password2)
{
    if (password1.value !== password2.value)
    {
        window.alert('Password does not match');
        return false;
    }
    else
    {
        window.alert("GOOD JOB!!!");
        return true;
    }
}	


function formValidation2()
{
    var password1 = document.check2.password;
    var username = document.check2.username;
    if (username.value == "")                                  
    { 
        window.alert("Please enter your name.");  
        return false; 
    } 
    if(UsernameValidation(username))
    {
        if(PasswordValidation(password1))
        {   
            return true;
        } 
    } 
    return false;
}















