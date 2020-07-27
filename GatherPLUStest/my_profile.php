<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Gather+: My Profile</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/prototype.css">
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
                    <li class="nav-item active"><a class="nav-link" href="index.php">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookhub.php">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                    <li class="nav-item"><a class="nav-link" href="newshub.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="arcade.php">Games</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class="nav-item"><a class="nav-link" href="my_profile.php">My Profile</a></li>
                </ul>
            </div>
            
            <!-- Login Button -->
            <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><button type="button" class="btn log bg-success" data-toggle="modal" data-target="#modal1">Login/Logout</button></li>
                </ul>
            </div>
        </nav>  
        
        <!-- Account Information -->
        <div id="about" class="container-fluid">
            <br>
            
            <!-- PHP for Login Functionality -->
            <?php include 'php/login.php'; ?>
            
            <!-- Cards for Account Information -->
            <div class="row">
                
                <!-- Username/Image Card -->
                <div class="col-sm-4">
                    <div class="card text-center" style="width:400px">
                        
                        <!-- PHP for Displaying User Profile Picture -->
                        <?php
                            
                            // Checks if User is Logged-In
                            if (isset($_SESSION["username"]))
                            {
                                // Retrieves the User's Profile Picture From the user_accounts database
                                $sql = "SELECT userImage FROM user_accounts WHERE userID='$userID'";
                                $result = $database->query($sql);
                                $row = $result->fetch_assoc();
                        
                                // Encodes and displays User's profile picture if it is in database
                                if($row["userImage"] != "")
                                {                                 
                                    $userImage = $row["userImage"];
                                    $userImage = base64_encode($userImage);
                                    
                                    echo "<img src=\"data:image/jpg;charset=utf8; base64, $userImage \" width=\"400\" height=\"250\" />";
                                }
                                
                                // Displays generic profile picture if user does not have an uploaded profile
                                else
                                {
                                    echo "<img class=\"card-img-top\" src=\"images/blank.png\" alt=\"Card image\">";
                                }
                            }
                        
                            // Displays generic profile picture if User is not logged-in
                            else
                            {
                                echo "<img class=\"card-img-top\" src=\"images/blank.png\" alt=\"Card image\">";
                            }
                        ?>
                        
                        <!-- Unused Card Body Section -->
                        <div class="card-body">
                        </div>
                        
                        <!-- Card footer that displays a username if the user is logged-in -->
                        <div class ="card-footer text-center">
                            <?php
                            
                                if ($username != "")
                                {
                                    echo "<h4 class=\"card-title text-center\"><strong>$username</strong></h4>";
                                }
                            
                                else
                                {
                                    echo "<h4 class=\"card-title text-center\"><strong>Username</strong></h4>";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- User Blurb/Biography Card -->
                <div class="col-sm-7">
                    <br>
                    <br>
                    <div class="card">
                        
                        <!-- Card Header -->
                        <div class="card-header text-center">
                            <span><strong>About Me</strong></span>
                        </div>
                        
                        <!-- PHP to insert user bio into the card -->
                        <div class="card-body text-justify">
                            <?php
                                echo "$blurb";
                            ?> 
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- User Communities Card -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        
                        <!-- Card Header -->
                        <div class="card-header text-center">
                            <span><strong>My Communities</strong></span>
                        </div>
                        
                        <!-- PHP to display the communities the user has joined -->
                        <div class="card-body">
                            <?php
                                
                                // Checks if user is logged-in
                                if (isset($_SESSION["username"]))
                                {
                                    // Retrieves a list of messageboards from the communityMembers table that the user has joined
                                    $sql = "SELECT placardName FROM communityMembers WHERE userID='$userID'";
                                    $result = $database->query($sql);
                            
                                    // Displays message if user has not joined any communities
                                    if ($result->num_rows == 0)
                                    {
                                        echo "<ul><li>No Communities Joined Yet</li></ul>";
                                    }
                            
                                    // Displays a list of the communities the user has joined
                                    else
                                    {
                                        echo "<ul>";
                                    
                                        while($row = $result->fetch_assoc())
                                        {
                                            $community = $row['placardName'];
                                        
                                            echo "<li>$community</li>";
                                        }
                                    
                                        echo "</ul>";
                                    }
                                }
                            
                                // Displays if user is not logged-in
                                else
                                {
                                    echo "<ul><li>No Communities Joined Yet</li></ul>";
                                }
                            ?>
                        </div>
                    </div>
                </div> 
            </div>
            
            <!-- Link to the Edit Profile Page -->
            <div class="row">
                <div class="col-sm-3 text-center">
                    <a class="btn btn-info" href="account_view.php" role="button">Edit Profile</a>
                </div>
            </div>
            
        </div>
        <br>
        <br>
        
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
                                    <form id="logout" method="post" action="my_profile.php">
                                        <input type="hidden" name="logout" value="1">
                                        <button type="submit" class="btn btn-warning">Logout</button>
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
        <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>
    
        <!--BOOTSTRAP SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body> 
</html>