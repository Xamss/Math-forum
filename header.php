<!DOCTYPE>
<html>
<head>
	<?php 
    // connection to the database
	$conn = mysqli_connect('localhost', 'root','','forum');
	session_start();
	?>
    <title>ULY DALA MATEMATIKTERI</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


    

    <script src="dist/js/bootstrap.js"></script>

</head>

<body>
	<header>
        <ul id = "topmenu">
		    <nav>
                
                    <li>
                        <a id="logo-img" href="index.php" ><img src = "Images/Logo.svg"/></a>
                    </li>

                    <li>
                        <a class="baritem main-text" href="ForumInfo.php">About</a>
                    </li>
                    <li>
                        <a class="baritem main-text" href="collab.php">Collaboration</a>
                    </li>
                    <li>
                        <a class="baritem main-text" href="FAQ.php">FAQ</a>
                    </li>
                    <li>

                        <form action = "category.php" method = "GET" name = "">
                            <div class = "search">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" name = "search" class="searchTerm" placeholder="What are you looking for?">
                            </div>
                        </form>
                        
                    </li>

                            <?php if(isset($_SESSION['signed_in']))
                            {
                                echo '
                                <li>
                                    <div class="account-profile">
                                        <img src = "profiles/man-profile-cartoon_18591-58482.jpg">
                                    </div>
                                </li>
                                <div class="aut-btn dropdown">
                                    <div class="option title pointerCursor" id = "qwerty">'. $_SESSION['user_name'] .'</div>
                                    <div class="menu pointerCursor hide">
                                        <a href ="logout.php" class="btn-out option" id="option1">Log out<i class="fas fa-sign-out-alt"></i></a>
                                        <a class="option" id="option2">Profile<i class="far fa-newspaper"></i></a>
                                        <a class="option" id="option3">Activity<i class="fas fa-book"></i></a>
                                        <a class="option" href="#option4">Post<i class="far fa-clipboard"></i></a>
                                    </div>
                                </div>
                                ';
                            }
                            else
                                {
                                    echo '<div class = "dout aut-btn"><a class ="baritem" href="login.php">Sign in</a>';
                                
                            ?>
                    
                    <?php
                        echo '<a class ="baritem" href="signup.php">New account</a></div>';
                    }
                    ?>
                
			</nav>
		</ul>	
    </header>

    <div id="option4" class="overlay">
	    <div class="popup">
            <a class="close" href="#">&times;</a>
		    <span class="post-header">What you want to post?</span>
            <a class="btn-post important" href="create_topic.php">Topic</a> 
            <a class="btn-post important" href="create_cat.php">Category</a>
	    </div>
    </div>

    <div class = "head-line"></div>

    <script src="menu.js"></script>

   
    