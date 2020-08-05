<?php
        session_start();
            
        // Error Handler
        set_error_handler("errorHandler");
        
        function errorHandler()
        {
            echo "Error";
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!--SEO tag-->
        <meta name="description" content="Gather together with friends, family, and your new online community - even with social distance rules and the Coronavirus/Covid-19 Pandemic. 
    Gather PLUS is the brand new social platform with free access to books, podcasts, games, and more.">

        <!-- NEW SEO TITLE -->
        <title>Gather+ Connect During Coronavirus</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/global.css">

        <!--BRANDING FONT-->
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    </head>

    <body id="fmain_body">

        <!--NAVIGATION-->
        <nav class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">
            <a href="index.php" class="navbar-brand nav-link-active gBrand">Gather +</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item nl"><a class="nav-link" href="bookhub.php">Books</a></li>
                    <li class="nav-item nl"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                    <li class="nav-item nl"><a class="nav-link" href="newshub.php">News</a></li>
                    <li class="nav-item nl"><a class="nav-link" href="gamehub.php">Games</a></li>
                    <li class="nav-item nl"><a class="nav-link" href="wellspace.php">Wellspace</a></li>
                    <li class="nav-item nl"><a class="nav-link" href="my_profile.php">My Profile</a></li>
                </ul>
            </div>

            <!-- Login Button -->
            <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <?php
                            if(isset($_SESSION["loginAttempt"])){
                                if($_SESSION["loginAttempt"] != "Success"){
                                    echo '<li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Login</button></li>';
                                }else if($_SESSION["loginAttempt"] == "Success"){
                                    echo '<li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Logout</button></li>';
                                }
                            }else{
                                echo '<li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Login</button></li>';
                            }
                    ?>
                </ul>

            </div>
        </nav>

        <!-- PHP for Welcoming (new) user -->
        <?php
            if(isset($_SESSION["loginAttempt"])){
                if($_SESSION["loginAttempt"] == "Fail"){
                    echo "<h5 class=\"alert alert-danger\">Incorrect username or password</h5>";
                }else if($_SESSION["loginAttempt"] == "logout"){
                    echo "<h5 class=\"alert alert-warning\">You Have Been Logged-Out</h5>";
                }
            }
        ?>

        <!-- Greeting Message -->

        <video src="images/InkedTogether_LI_New.mp4" poster="images/TogetherR.jpg" height="100%" width="101%" autoplay></video>
        <div class="container col-md-12 text-center">
            <div class="col-md-8" id="welcome">
                <p class="greeting" id="g1"><i>We may be miles apart in real life, or maybe just six feet...</i></p>
                <p class="greeting">But online we are side by side. We gather together over fascinating books or the latest podcasts. We talk about the news that matters most to us or play games, no matter how old we are! All of our content is free, and the communities we form are priceless.</p>
                <p class="greeting" id="g3">Welcome to <span id="handR">Gather Plus</span>.</p>
            </div>
            <!-- Sign-Up/Login Buttons -->
            <div class="btn-group" role="group">
                <a class="btn" id="signN" href="signup.php" role="button">Sign Up</a>
                <a class="btn" id="logN" data-toggle="modal" data-target="#modal1">Log In</a>
            </div>
        </div>

        <div class="container col-md-12 mt-3">
            <?php
        // Welcomes User if they are Logged-in
            if (isset($_SESSION["username"]))
            {
                $username = $_SESSION["username"];
            
                echo "<h5 class=\"alert alert-success text-center mt-1\">Welcome $username</h5>";
            } else {
                
                echo "<h5 class=\"alert alert-warning text-center mt-1\">Please sign in for full access</h5>";
            }
        ?>
        </div>
        <!-- Hubs Catelog -->
        <div class="container col-md-6 text-center" id="cat_hubs">

            <h3 id="cats_head">Select a Category, &nbsp;Join a Community!</h3>

            <div class="row mt-3">
                <div class="card-group col-md-12">
                    <div class="card category">
                        <?php
                            if (isset($_SESSION["username"]))
                            {
                                echo "<a href=\"bookhub.php\">";
                            }
        
                            else
                            {
                                echo "<a href=\"index.php\">";
                            }
                        ?>
                        <img src="images/ReadPR.jpg" alt="Books" class="img-fluid center-block">
                        <div class="text-nowrap cat">BOOKS</div>
                        <?php
                                echo "</a>";
                            ?>
                    </div>
                    <div class="card category">
                        <?php
                            if (isset($_SESSION["username"]))
                            {
                                echo "<a href=\"audiohub.php\">";
                            }
        
                            else
                            {
                                echo "<a href=\"index.php\">";
                            }
                        ?>
                        <img src="images/ListenPR.jpg" alt="Podcasts" class="img-fluid" id="podpeople">

                        <div class="text-nowrap cat">PODCASTS</div>
                        <?php
                            echo "</a>";              
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card-group col-md-12">
                    <div class="card category">
                        <?php
            
                            if (isset($_SESSION["username"]))
                            {
                                echo "<a href=\"gamehub.php\">";
                            }
        
                            else
                            {
                                echo "<a href=\"index.php\">";
                            }
                        ?>

                        <img src="images/GamesPR.jpg" alt="Games" class="img-fluid">
                        <div class="text-nowrap cat">GAMES</div>
                        <?php
                            echo "</a>";
                        ?>
                    </div>
                    <div class="card category">
                        <?php
                                if (isset($_SESSION["username"]))
                                {
                                    echo "<a href=\"newshub.php\">";
                                }
        
                                else
                                {
                                    echo "<a href=\"index.php\">";            
                                }
                
                            ?>
                        <img src="images/NewsNPR.jpg" alt="News" class="img-fluid" style="margin-top:40px;">
                        <div class="text-nowrap cat">ARTICLES</div>
                        <?php
                                echo "</a>";
                            ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- RSS Feed -->
        <div class="container col-md-6 section" id="weeklynews">
            <rssapp-carousel id="JYyMcNqUKFJy2OKH"></rssapp-carousel>
            <script src="https://widget.rss.app/v1/carousel.js" type="text/javascript" async></script>
        </div>

        <!-- Backstory Log -->
        <div class="container col-md-12 text-center">
           <div class="section">
            <p id="p1">About Us</p>
            <p id="p2">Gather Plus is a unique social platform that flies under the banner of "Connection over Content." That means we care more about forming communities than "likes" or ratings. In the midst of an unprecedented pandemic, Gather Plus is here to bridge the gap we're all feeling by giving us great things to talk about and bond over. It also happens to be the term-long software engineering project by Team FunkyTech. Learn more about us and our collaboration on our <a href="https://lamp.cse.fau.edu/~cen4010s2020_g07/"><span id="homelink">Home Page</span></a>.
            </p>
           </div> 
        </div>
        
    <!-- Login/Logout Modal -->
    <?php
    if(isset($_SESSION["loginAttempt"])){//check to see if loginAttempt is defined
        if($_SESSION["loginAttempt"] != "Success"){
            echo '<div class="modal" id="modal1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Gather+</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 text-center" id="mod"></div>
                                    <div class="col-md-8">
                                        <form id="loginForm" method="post" action="my_profile.php">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <a href="iforgot.php">(Forgot Password)</a></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password (Case-Sensitive)">
                                            </div>
                                            <button type="submit" class="btn btn-info">Login</button>
                                            <a href="signup.php" class="btn btn-success" role="button">Create An Account</a>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>';
        }else if($_SESSION["loginAttempt"] == "Success"){
            echo '<div class="modal" id="modal1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Gather+</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 text-center" id="mod"></div>
                                    <div class="col-md-8">
                                        <form id="logout" method="post" action="my_profile.php">
                                            <input type="hidden" name="logout" value="1">
                                            <button type="submit" class="btn btn-warning">Logout</button>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>';
        }
    }else{//loginAttempt not defined
            echo '<div class="modal" id="modal1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Gather+</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4 text-center" id="mod"></div>
                                    <div class="col-md-8">
                                        <form id="loginForm" method="post" action="my_profile.php">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <a href="iforgot.php">(Forgot Password)</a></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password (Case-Sensitive)">
                                            </div>
                                            <button type="submit" class="btn btn-info">Login</button>
                                            <a href="signup.php" class="btn btn-success" role="button">Create An Account</a>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>';
    }
    ?>


        <!-- FOOTER -->
        <footer class="footer" id="footmain">
            <div class="container text-center"> &copy; 2020 FunkyTech</div>
        </footer>

        <!--BOOTSTRAP SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>

    </html>