<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Gather+ Recovery</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/global.css"> 
        
        <!--FONT-->
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
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
                        }                   ?>
                </ul>
            </div>
        </nav> 
        
        <!-- Header Title -->
        <h3 class="mt-5">Recovery Page</h3>
        
        <!-- PHP for Password Recovery -->
        <?php
        
            session_start();
        
            // Error Handler
            set_error_handler("errorHandler");
        
            function errorHandler()
            {
                echo "ERROR";
            }
        
            // Checks if user recovery is valid
            if($_SESSION["check"] == 1)
            {
                
                // Error message if user did not fill in all fields
                if($_POST["password"] != "" && $_POST["email"] != "")
                {
                    // Connects to Gather+ SQL Database
                    $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                    
                    // Checks that entered passwords match
                    if ($_POST["password"] == $_POST["password2"])
                    {
                        // Hashes Password
                        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);     
                        $email = $_POST['email'];
                        
                        // Selects matching e-mail from database
                        $sql = "SELECT email FROM user_accounts WHERE email='$email'";
                        $result = $database->query($sql);
                        
                        // Runs if account e-mail was found
                        if ($result->num_rows != 0)
                        {
                            // Updates Password in SQL Database
                            $sql = "UPDATE user_accounts SET password = '$password' WHERE email = '$email'";
                            
                            if ($database->query($sql))
                            {
                                echo "<h4 class=\"alert alert-success\">Success</h4>";
                            }
                            
                            else
                            {
                                echo "<h4 class=\"alert alert-danger\">Fail</h4>";
                            } 
                        }
                        
                        else
                        {
                            echo "<h4 class=\"alert alert-danger\">Invalid E-mail</h4>";
                        }

                    }
                    
                    else
                    {
                        echo "<h4 class=\"alert alert-danger\">Passwords Did Not Match.</h4>";
                    }      
                }
                
                else
                {
                        echo "<h4 class=\"alert alert-warning text-center\">Please Fill In All Fields To Recover Password</h4>";
                }   
            }
        ?>  
        
        
        <!-- Login Form -->
        <section class="container">
            <div class="card card-default">
            
                <!-- Back Home Button -->
                <div class="card-header">
                    <form id="Back" method="post" class="text-center" action="index.php">
                        <input type="submit" class="btn btn-info" value="Back to Home">
                    </form>
                </div>
                 
                <!-- Reocovery Form -->
                <form id="input" method="post" action="recovery.php">
                    <div class="card-body text-center padded">
                        <div class="row">
                            <p>Enter email and new password inorder to reset your password.</p>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address">
                            </div> 
                        </div>
                        <div class="row">
                                <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password (Case-Sensitive)">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                            </div> 
                        </div>
                    
                    <!-- Submit Button -->
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success center-block" value="Create Account">
                    </div>
                </form>
                
            </div>
        </section>

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
