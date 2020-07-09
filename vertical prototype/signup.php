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
                    <li class="nav-item active"><a class="nav-link" href="featuremain.html">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookhub.html">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class=""><a class="nav-link" href="account.php">My Profile</a></li>
                </ul>
            </div>
        </nav>  
        
        <h3 class="mt-5">Signup Page</h3>
        
        <!-- PHP for Sign-up -->
        <?php
        
            session_start();
        
            // Error Handler
            set_error_handler("errorHandler");
        
            function errorHandler()
            {
                echo " ";
            }
        
            // Error message if user did not fill in all fields
            if($_POST["username"] == "" || $_POST["password"] == "" || $_POST["email"] == "")
            {
                echo "<h4 class=\"alert alert-warning text-center\">Please Fill In All Fields to Create Account</h4>";
            }
        
            // Error message if passwords do not match
            else if ($_POST["password"] != $_POST["password2"])
            {
                echo "<h4 class=\"alert alert-danger text-center\">Passwords Did Not Match</h4>";
            }
        
            // Runs if User Filled all Fields
            else if ($_POST["username"] != "")
            {                   
                // Connects to SQL Database
                $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                    
                // Error Message if Connection Failed
                if ($database->connect_errno) 
                {
                    die("Failed to connect to MySQL: ($mysqli->connect_errno) $mysqli->connect_error");
                }
                    
                $username = $_POST["username"];
                $email = $_POST["email"];
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $books = 0;
                
                // Checks if Any Usernames in Database Matches Username Entered
                $sql = "SELECT username FROM user_accounts WHERE username='$username'";
                $result = $database->query($sql);
                
               // Error Message if SQL Connection Failed
                if (!$result)
                {
                    die("");
                }
                
                // Error Message if Username Already Taken
                else if ($result->num_rows != 0) 
                {
                    echo "<h4 class=\"alert alert-danger text-center\">Username Already Taken. Please Enter a Different Name</h4>";
                }
                
                // Runs if Username is Available
                else 
                {
                    // Hashes Password
                    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);     
                    
                    // Inserts Values into SQL Database
                    $sql = "INSERT INTO user_accounts (username, password, email, firstname, lastname, books) VALUES ('$username', '$password', '$email', '$firstname', '$lastname', '$books')";
                    
                    // Message if Account Successfully Created
                    if ($database->query($sql)) 
                    {
                        echo "<h4 class=\"alert alert-success text-center\">Your Account has Been Created</h4>";
                    }
                    
                    // Error Message if Account Not Created
                    else 
                    {
                        die("Error with Account Creation");
                    }         
                }   
            }
        ?>  
        
        
        <!-- Login Form -->
        <section class="container">
            <div class="card card-default">
            
                <!-- Back Home Button -->
                <div class="card-header">
                    <form id="Back" method="post" class="text-center" action="signup.php">
                        <input type="submit" class="btn btn-info" value="Back to Home">
                    </form>
                </div>
                    
                <form id="input" method="post" action="signup.php">
                    <div class="card-body text-center padded">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                            </div>                                       
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            </div>                                       
                            <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password (Case-Sensitive)">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address">
                            </div> 
                            <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                            </div> 
                        </div>
                        
                    </div>
                    
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success center-block" value="Create Account">
                    </div>
                </form>
                
            </div>
        </section>
        
    </body>


    <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>

    <!--BOOTSTRAP SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>
