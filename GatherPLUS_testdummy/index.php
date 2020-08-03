<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
    <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- TITLE -->
    <title>Gather+ Main</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    
    <!--Animate Hero Section-->
</head>

<body id="fmain_body">

    <!--NAVIGATION-->
    <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">
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
                <li class="nav-item nl"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                <li class="nav-item nl"><a class="nav-link" href="my_profile.php">My Profile</a></li>
            </ul>
        </div>

        <!-- Login Button -->
        <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active">
                        <form id="logout" method="post" action="my_profile.php">
                            <input type="hidden" name="logout" value="1">
                            <button type="submit" class="btn log">Logout</button>
                        </form> 
                    </li>
                </ul>
               
        </div>
    </nav>

    <!-- PHP for Welcoming (new) user -->
    <?php
            session_start();
        
            // Error Handler
            set_error_handler("errorHandler");
        
            function errorHandler()
            {
                echo "Error";
            }
        ?>

    <!-- Header Title -->
    
    <!--   <div id="well_carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#well_carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#well_carousel" data-slide-to="1"></li>
                    <li data-target="#well_carousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">

                    </div>
                    <div class="carousel-item"></div>
                    <div class="carousel-item"></div>
                    <div class="carousel-item"></div>
                </div>
            </div>-->

    <!-- Greeting Message -->
    <div class="headerMain">
    <video src="images/InkedTogether_LI_Trim.mp4" poster="images/InkedTogether_LI.jpg" height="80%" width="103%" autoplay></video>
    <div class="container col-md-12 mt-0 section text-center"> 
        <div class="col-md-8" id="welcome">
            <p class="greeting" id="g1">We may be miles apart in real life, or maybe just six feet...</p>
            <p class="greeting">But online we are side by side. We gather together over fascinating books or the latest podcasts. We talk about the news that matters most to us or play games,
                no matter how old we are! All of our content is free, and the communities we form are priceless.</p>
            <p class="greeting" id="g3">Welcome to Gather Plus.</p>
        </div>
        <!-- Sign-Up/Login Buttons -->
        <div class="btn-group" role="group">
            <a class="btn" id="signN" href="signup.php" role="button">Sign Up</a>
            <a class="btn" id="logN" data-toggle="modal" data-target="#modal1">Log In</a>
        </div>
    </div>
    </div>
    
    


    <div class="container col-md-12 mt-3">
        <?php
        // Welcomes User if they are Logged-in
            if (isset($_SESSION["username"]))
            {
                $username = $_SESSION["username"];
            
                echo "<h5 class=\"alert alert-success text-center\" style=\"width:50%; margin-left:25%;\">Welcome $username</h5>";
            } else {
                
                echo "<h5 class=\"alert alert-warning text-center mt-5\" style=\"width:50%; margin-left:25%;\">Please sign in for full access</h5>";
            }
        ?>
    </div>
    <!-- Hubs Catelog -->
    <div class="container col-md-6 text-center" id="cat_hubs">

        <h4 style="color:#283954">Select a Category, &nbsp;Join a Community!</h4>
        <br>

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
    <div class="container-fluid text-center section" id="learnmore"> Gather+ Backstory and Information about FunkyTech (site link)
    </div>

    <!-- Login Modal -->
    <div class="modal" id="modal1" role="dialog">
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
                                        <label for="password">Password</label>
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
    </div>

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