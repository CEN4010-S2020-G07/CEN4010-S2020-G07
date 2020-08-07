<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Gather+: Edit Profile</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="style.css" />
        
        <link rel="stylesheet" type="text/css" href="css/global.css"> 
        
        <!--FONT-->
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
    </head>

    <body class="profileB">
        
        <!--NAVIGATION-->
        <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">

            <a href="index.php" class="navbar-brand nav-item active gBrand">Gather+</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="bookhub.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                    <li class="nav-item"><a class="nav-link" href="newshub.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="gamehub.php">Games</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.php">Wellspace</a></li>
                    <li class="nav-item"><a class="nav-link" href="my_profile.php">My Profile</a></li>
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
        
        <!-- Edit Profile Section -->
        <div id="about" class="container-fluid">
            <br>
            
            <!-- PHP for editing/updating a User's Profile -->
            <?php include 'php/edit.php'; ?>
            
            <!-- Account Information -->
            <form id="input" method="post" action="account_view.php" enctype="multipart/form-data">
                <div class="row">
                
                    <!-- Card for Profile Picture/username -->
                    <div class="col-md-3">
                        <div class="card">
                            <?php
                        
                                // Checks if user is logged-in
                                if (isset($_SESSION["username"]))
                                {
                                    // Retrieves a User's profile picture from the user_accounts database
                                    $sql = "SELECT userImage FROM user_accounts WHERE userID='$userID'";
                                    $result = $database->query($sql);
                                    $row = $result->fetch_assoc();
                        
                                    // Displays a user's profile picture if it is uploaded
                                    if($row["userImage"] != "")
                                    {
                                        $userImage = $row["userImage"];
                                        $userImage = base64_encode($userImage);
                                    
                                        echo "<img src=\"data:image/jpg;charset=utf8; base64, $userImage \" class=\"card-img-top img-fluid\" />";
                                    }
                                
                                    // Displays generic profile picture if user does not have a profile picture
                                    else
                                    {
                                        echo "<img class=\"card-img-top img-fluid\" src=\"images/blank.png\" alt=\"Card image\">";
                                    }
                                }
                        
                                // Displays generic profile picture if user is not logged-in
                                else
                                {
                                    echo "<img class=\"card-img-top\" src=\"images/blank.png\" alt=\"Card image\">";
                                }
                            ?>
                        
                            <!-- PHP for displaying username -->
                            <div class="card-body">
                                <?php
                            
                                    if ($username != "")
                                    {
                                        echo "<input type=\"text\" class=\"form-control\" value=\"$username\" name=\"newUsername\">";
                                    }
                            
                                    else
                                    {
                                        echo "<h4 class=\"card-title text-center\">Username</h4>";
                                    }
                            
                                ?>
                            </div>
                        
                            <!-- Input for uploading a profile picture -->
                            <div class="card-footer text-center">
                                <label class="text-center">Select Image File:</label>
                                <input type="file" name="image">
                                <br>
                                <br>
                                
                                <!-- Checkbox for deleting a profile picture -->
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remove"> Just Remove Current Profile Picture</label>
                                </div>
                            </div>
                        </div> 
                    </div>
                
                    <!-- Card for editing profile information-->
                    <div class="col-md-9">
                        <div class="card">
                        
                            <!-- Biography header -->
                            <div class="card-header text-center">
                                <span><strong>About Me</strong></span>
                            </div>
                        
                            <!-- Biography Body -->
                            <div class="card-body">
                                <?php
                            
                                    // Displays information if user is logged-in
                                    if ($username != "")
                                    {
                                        echo "<ul>";
                                    
                                        echo "<li>First Name: <input type=\"text\" class=\"form-control\" value=\"$firstname\" name=\"newFirstname\"></li>";
                                        echo "<li>Last Name: <input type=\"text\" class=\"form-control\" value=\"$lastname\" name=\"newLastname\"></li>";                                    
                                        echo "<li>E-mail: <input type=\"text\" class=\"form-control\" value=\"$email\" name=\"newEmail\"></li>";
                                    
                                        echo "</ul>";
                                    
                                        echo "<li>Biography: <textarea type=\"textarea\" class=\"form-control\" id=\"blurb\" name=\"blurb\">$blurb</textarea></li>";
                                    }
                                
                                    // Displays if user is not logged-in
                                    else
                                    {
                                        echo "<h5 class=\"alert alert-danger\">Sign-in to edit account</h5>";
                                    }
                                ?> 
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- User Communities List -->
                <div class="row">
                    <div class="col-md-3">
                    
                        <!-- Card for Communities list -->
                        <div class="card">
                            <div class="card-header text-center">
                                <span><strong>My Communities</strong></span>
                            </div>
                            
                            <!-- PHP for listing communities -->
                            <div class="card-body">
                                <p class="text-center"><strong>Check the Communities You Wish To Leave</strong></p>
                                <br>
                                <?php
                                
                                    // Retrieves List of communities a user is a member of from communityMembers table
                                    $sql = "SELECT placardName FROM communityMembers WHERE userID='$userID'";
                                    $result = $database->query($sql);
                            
                                    // Displays message if user is not a member of any communities
                                    if ($result->num_rows == 0)
                                    {
                                        echo "<ul><li>No Communities Joined Yet</li></ul>";
                                    }
                            
                                    // Displays a list of communities
                                    else
                                    {                              
                                        while($row = $result->fetch_assoc())
                                        {
                                            $community = $row['placardName'];
                                        
                                            echo "<div class=\"checkbox\"><label><input type=\"checkbox\" name=\"communities[]\" value=\"$community\"> $community</label></div>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>   
                </div>
                
                <!-- Commit Changes/Delete Account Button -->
                <div class="row">
                    <div class="col-md-3 text-center">
                        <input type="submit" class="btn btn-info center-block" value="Commit Changes">
                        <button type="button" class="btn log bg-warning" data-toggle="modal" data-target="#modal2">Delete Account</button>
                    </div>            
                </div>
        
            </form>
        </div>
        <br>
        <br>
        
        
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
        
        <!-- Delete Account Confirmation Modal -->
        <div class="modal" id="modal2" role="dialog">
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
                                    <p class="text-center"><strong>Are You Sure You Wish to Delete Your Gather+ Account?</strong></p>
                                    <form class="text-center" id="loginForm" method="post" action="account_view.php">
                                        <button type="submit" class="btn btn-info">Cancel</button>
                                        <a class="btn btn-warning" href="deleteProfile.php" role="button">Delete Account</a>
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
        
        <!-- FOOTER -->
        <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>
    
        <!--BOOTSTRAP SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
