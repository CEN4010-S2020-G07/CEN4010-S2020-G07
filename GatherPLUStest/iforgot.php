<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Gather+: iforgot View</title>

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
        
        <!-- Header Title -->
        <h3 class="mt-5">Forgot Password</h3>

        <!-- PHP for Password Reset -->
        <?php
        
            session_start();
            
            $_SESSION["check"]="1";
        
            // Error Handler
            set_error_handler("errorHandler");
        
            function errorHandler()
            {
                echo " ";
            }
        
            // Error message if user did not fill in all fields
            if($_POST["email"] == "")
            {
                 echo "<h4 class=\"alert alert-warning text-center\">Please Fill In All Fields to Recover Password</h4>";
            }
               
            // Runs if User Filled all Fields
            else if ($_POST["email"] != "")
            {                   
                // Connects to Gather+ SQL Database
                $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                    
                // Error Message if Connection Failed
                if ($database->connect_errno) 
                {
                    die("Failed to connect to MySQL: ($mysqli->connect_errno) $mysqli->connect_error");
                }
                
                $email = $_POST["email"];
                            
                $sql = "SELECT password FROM user_accounts WHERE email='$email'";
                $result = $database->query($sql);
                $row = $result->fetch_assoc();  
                
                // Error Message if SQL Connection Failed
                if (mysqli_num_rows($result) == 0)
                {
                    echo "<h4 class=\"alert alert-danger text-center\">Error Connecting with E-mail</h4>";
                }
                
                // Sends E-mail to user if E-mail is valid
                else
                {
                    // Recipient
                    $to = $_POST["email"];
                    
                    // Subject
                    $subject = "Password Recovery";
                    
                    // Message
                    $message = '<p>We request that you change your password as soon as possible after signing into your account.</p></b><p>Click <a href="https://lamp.cse.fau.edu/~cen4010s2020_g07/vertical_prototype/recovery.php">here</a> to return to Gather+</p>';

                    $headers = "From: The Sender Name <noreply@outlook.com>\r\n";
                    $headers .= "Reply-To: gather.plus@outlook.com\r\n";
                    $headers .= "Content-type: text/html\r\n";

                    mail($to, $subject, $message, $headers);

                    if ($database->query($sql)) 
                    {
                        echo "<h4 class=\"alert alert-success text-center\">Your Email Has Been Sent</h4>";
                        
                        $_SESSION["username"] = $username;
                    }
                }    
            }    
        ?>  
        
        
        <!-- E-mail Form -->
        <section class="container">
            <div class="card card-default">
            
                <!-- Back Home Button -->
                <div class="card-header">
                    <form id="Back" method="post" class="text-center" action="index.php">
                        <input type="submit" class="btn btn-info" value="Back to Home">
                    </form>
                </div>
                    
                <!-- Form for E-mail recovery -->
                <form id="input" method="post" action="iforgot.php">
                    <div class="card-body text-center padded">
                        <p>Please enter your email address and we will send email for you to recover your password</p>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address">
                        </div> 
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success center-block" value="Request Password">
                    </div>
                </form>
                
            </div>
        </section>
        
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
