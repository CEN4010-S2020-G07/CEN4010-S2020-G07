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
    </head>

    <body>
        
        <!--NAVIGATION-->
        <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">
            <a href="index.php" class="navbar-brand nav-link-active gBrand">Gather+</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="bookhub.php">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                    <li class="nav-item"><a class="nav-link" href="newshub.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="arcade.php">Games</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class="nav-item"><a class="nav-link" href="my_profile.php">My Profile</a></li>
                </ul>
            </div>
            
            <!-- Login Button -->
         <!-- <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><button type="button" class="btn log bg-success" data-toggle="modal" data-target="#modal1">Login</button></li>
                </ul>
            </div> -->
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

            // Welcomes User if they are Logged-in
            if (isset($_SESSION["username"]))
            {
                $username = $_SESSION["username"];
            
                echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
            }
    
            else
            {
                echo "<h4 class=\"alert alert-warning\">Please Sign-In To Join Communities</h4>";
            }
        ?>
    
        <!-- Header Title -->
        <!-- Carousel Images -->
        <div id="well_carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#well_carousel" data-slide-to="0" class="active"></li>
                <!--<li data-target="#well_carousel" data-slide-to="1"></li>
                <li data-target="#well_carousel" data-slide-to="2"></li>-->
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/scenic.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
        <br>
    
        <!-- Greeting Message -->
        <div class="container-fluid text-center section" id="welcome">
            <p class="text-center greeting">We may be miles apart in real life, or maybe just six feet...but online we are side by side. We gather together over fascinating books or the latest podcasts. We talk about the news that matters most to us or play games 
            (no matter how old we are!). All of our content is free, and the communities we form are priceless. </p>
            <p class="text-center greeting">Welcome to Gather Plus.</p>

            <!-- Sign-Up/Login Buttons -->
            <div class="btn-group" role="group">
                <a class="btn btn-info" href="signup.php" role="button">Sign Up</a>
                <a class="btn btn-success" data-toggle="modal" data-target="#modal1">Log In</a>   
            </div>
        </div>
    
        <!-- Hubs Catelog -->
        <div class="container col-md-6 text-center" id="cat_hubs">
            <?php
                if (isset($_SESSION["username"]))
                {
                    echo "<h5 class=\"text-center mb-3\">Select a Category, Join A Community!</h5>";
                }
        
                else
                {
                    echo "<h5 class=\"text-center mb-3\">Sign-in To Join A Community</h5>";
            
                }
            ?>
        
            <div class="card-group text-center">
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
                    <img src="images/book.png" alt="books" class="img-fluid">
                        <div class="text-nowrap">Books</div>
                        <?php
                            echo "</a>";
                        ?>
                </div>
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
                    <img src="images/sing.png" alt="" class="img-fluid">
                    <div class="text-nowrap">Podcasts</div>
                    <?php
                        echo "</a>";              
                    ?>
                </div>
            </div>
        
            <div class="card-group text-center">
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
                    <img src="images/newspaper.png" alt="news" class="img-fluid">
                    <div class="text-nowrap">Articles</div>
                    <?php
                        echo "</a>";
                    ?>
                </div>
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
                
                    <img src="images/puzzle.png" alt="games" class="img-fluid">
                    <div class="text-nowrap">Games</div>
                    <?php
                        echo "</a>";
                    ?>
                </div>
            </div>
        </div>
        
        <!-- RSS Feed -->
        <div class="container-fluid text-center section" id="weeklynews">    
            <rssapp-list id="0M9op6IRkCD38SCZ"></rssapp-list><script src="https://widget.rss.app/v1/list.js" type="text/javascript" async></script>
        </div>
    
        <!-- Backstory Log -->
        <div class="container-fluid section text-center" id="learnmore"> Gather+ Backstory and Information about FunkyTech (site link) </div>
    
        <!--Modal for Login-->
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
                                            <label for="password">Password <a href="iforgot.php" class="iforgot">(Forgot Password)</a></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password (Case-Sensitive)">
                                        </div>
                                        <button type="submit" class="btn btn-info">Login</button>
                                        <a href="signup.php" class="btn btn-success" role="button">Create An Account</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>     
                </div>
            </div>  
        </div>
        <br>
        <br>
        
        <!-- FOOTER -->
        <footer class="footer">
            <div class="container text-center"> &copy; 2020 FunkyTech</div>
        </footer>
        
        <!--BOOTSTRAP SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
