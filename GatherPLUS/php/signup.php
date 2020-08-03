<!-- PHP for Sign-up -->
<?php
        
    session_start();
        
    // Error Handler
    set_error_handler("errorHandler");
        
    function errorHandler()
    {
        echo "";
    }
        
    $currMonth = date('m');
    $currDay = date('d');
    $currYear = date('Y');

    // Error message if user did not fill in all fields
    if($_POST["username"] == "" || $_POST["password"] == "" || $_POST["email"] == "")
    {
        echo "<h4 class=\"alert alert-warning text-center\">Please Fill In All Fields to Create Account</h4>";
                
        echo "<ul class=\"alert alert-warning text-center\">";
        echo "<li>Password Must Be At Least 8 Characters in Length</li>";
        echo "<li>Must Be 16 Years or Older to Sign-Up</li>";
        echo "</ul>";
    }

    else if (!(checkdate($_POST["month"], $_POST["day"], $_POST["year"])))
    {
        echo "<h4 class=\"alert alert-danger text-center\">Invalid Date of Birth Entered</h4>";
    }

    else if (($currYear - $_POST["year"]) == 16 && $currMonth <= $_POST["month"] && $currDay < $_POST["day"])
    {
        echo "<h4 class=\"alert alert-danger text-center\">Must Be 16 Years or Older to Sign-Up</h4>";
    }

    else if ($currYear - $_POST["year"] < 16)
    {
        echo "<h4 class=\"alert alert-danger text-center\">Must Be 16 Years or Older to Sign-Up</h4>";
    }

    else if (strlen($_POST["password"]) < 8)
    {
        echo "<h4 class=\"alert alert-danger text-center\">Password Must Be At Least 8 Characters in Length</h4>";
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
        $blurb = $_POST["blurb"];
                
        // Checks if Any Usernames in Database Matches Username Entered
        $sql = "SELECT username FROM user_accounts WHERE username='$username'";
        $result = $database->query($sql);
                
        // Error Message if SQL Connection Failed
        if (!$result)
        {
            die("ERROR with Account Creation");
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
            $sql = "INSERT INTO user_accounts (username, password, email, firstname, lastname, blurb) VALUES ('$username', '$password', '$email', '$firstname', '$lastname', '$blurb')";
                    
            // Message if Account Successfully Created
            if ($database->query($sql)) 
            {
                echo "<h4 class=\"alert alert-success text-center\">Your Account has Been Created</h4>";
                        
                $_SESSION["username"] = $username;
            }
                    
            // Error Message if Account Not Created
            else 
            {
                die("Error with Account Creation");
            }         
        }   
    }
?>
