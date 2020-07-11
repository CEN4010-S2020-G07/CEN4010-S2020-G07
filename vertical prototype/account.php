<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Vertical Prototype Template</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/prototype.css">      
    </head>

    <body>
        
        <!--NAVIGATION-->
        <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">

            <a href="#" class="navbar-brand">Gather+</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookhub.html">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class=""><a class="nav-link" href="account.php">My Profile</a></li>
                </ul>
            </div>
            
            <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><button type="button" class="btn log bg-success" data-toggle="modal" data-target="#modal1">Login</button></li>
                </ul>
            </div>
            
        </nav>  
        
        <!-- Body Sections -->
        <div id="about" class="container-fluid">
            <br>
            
            <!-- PHP for Displaying Weather Information And/Or Login Confirmation -->
            <?php
        
                session_start();
        
                // Error Handler
                set_error_handler("errorHandler");
        
                function errorHandler()
                {
                    echo "";
                }
        
                // Runs if user entered login information
                if (isset($_POST["username"]) && isset($_POST["password"]))
                {
                
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                
                    // Connects to MySQL Database
                    $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
 
                    // Outputs Error if Connection Not Established With SQL
                    if ($database->connect_errno) 
                    {
                        die("Error: Failed to connect to Database");
                    }
                
                    // Retrieves username and Hashed password from SQL Database
                    $sql = "SELECT username, password FROM user_accounts WHERE username='$username'";
                    $result = $database->query($sql);
                
                    // Error Message if Site is Unable to Retrieve Information
                    if (!$result)
                    {
                        die("Error: Unable to Connect to Database");
                    }
                
                    // Error Message if username Not Found in Database
                    else if ($result->num_rows == 0) 
                    {
                        echo "<h4 class=\"alert alert-danger\">Incorrect username or password</h4>";
                        
                        $username = "";
                        $password = "";
                    }
                
                    // Runs if username is Found in Database
                    else 
                    {
                        // Creates array of User's Info
                        $row = $result->fetch_assoc();

                        // Checks if password Entered Matches User's Hashed password    
                        if ((password_verify($password, $row["password"])))
                        {
                            // Retrieves All User's Information from Database
                            $sql = "SELECT * FROM user_accounts WHERE username='$username'";
                            $result = $database->query($sql);
                            $row = $result->fetch_assoc();
                        
                            $email = $row["email"];
                            $firstname = $row["firstname"];
                            $lastname = $row["lastname"];
                            $books = $row["books"];
                            
                            // Sets session cookie for user if they selected to make the zip code the default zip       
                            $_SESSION["username"] = $username;
                        
                            // Welcome Message
                            echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
                        
                        } 
                    
                        // Error Message if passwords Did Not Match
                        else 
                        {
                            echo "<h4 class=\"alert alert-danger\">Incorrect username or password</h4>";
                        }
                            
                    }
                }
            
                // Runs if user signed in earlier
                else if(isset($_SESSION["username"]))
                {
                    $username = $_SESSION["username"];
                    
                    // Connects to MySQL Database
                    $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                    
                    // Retrieves All User's Information from Database
                    $sql = "SELECT * FROM user_accounts WHERE username='$username'";
                    $result = $database->query($sql);
                    $row = $result->fetch_assoc();
                        
                    $email = $row["email"];
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $books = $row["books"];
                    
                    echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
                }

            ?>
            
            <!-- News Articles -->
            <!-- Row 1 -->
            <div class="row">
                
                <!-- Card 1 -->
                <div class="col-sm-4">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="images/blank.png" alt="Card image">
                        <div class="card-body">
                            <?php
                            
                                if ($username != "")
                                {
                                    echo "<h4 class=\"card-title text-center\">$username</h4>";
                                }
                            
                                else
                                {
                                    echo "<h4 class=\"card-title text-center\">Username</h4>";
                                }
                            
                            ?>
                        </div>
                        <div class ="card-footer text-center">
                            <a class="btn btn-info" href="editProfile.php" role="button">Edit Profile</a> 
                        </div>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="col-sm-7">
                    <br>
                    <br>
                    <div class="card">
                        
                        <div class="card-header text-center">
                            <span><strong>About Me</strong></span>
                        </div>
                        
                        <div class="card-body">
                            <?php
                            
                                if ($username != "")
                                {
                                    echo "<ul><li>Name: $firstname $lastname </li><li>E-mail: $email </li></ul>";
                                }
                            
                                else
                                {
                                    echo "<ul><li>Name: </li><li>E-mail: </li></ul>";
                                }
                            
                            ?>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <br>
            <br>
            
            <!-- Guidelines List -->
            <div class="row">
                <div class="col-sm-3">
                    
                    <div class="card">
                        <div class="card-header text-center">
                            <span><strong>My Communities</strong></span>
                        </div>
                        
                        <div class="card-body">
                            <?php
                                if ($books != 0)
                                {
                                    echo "<ul><li>Books</li></ul>";
                                }
                            
                                else
                                {
                                    echo "<ul><li>No Communities Joined Yet</li></ul>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <br>
        <br>
        
        <!--Modal-->
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
                                    <form id="loginForm" method="post" action="account.php">
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
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    
                    </div>     
                </div>
            </div>  
        </div>
        
        <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>
    
        <!--BOOTSTRAP SCRIPTS-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
    
</html>
