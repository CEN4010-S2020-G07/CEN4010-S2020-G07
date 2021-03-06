<!-- PHP for Logging users in -->
<?php
        

        
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
             
  
            // Redirect browser 
            $_SESSION["loginAttempt"] = "Fail";
            header("Location: https://lamp.cse.fau.edu/~cen4010s2020_g07/GatherPLUS/index.php");
            exit;
                        
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
                        
                $userID = $row["userID"];
                $email = $row["email"];
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $blurb = $row["blurb"];
                            
                // Sets session cookie for user     
                $_SESSION["username"] = $username;
                $_SESSION["loginAttempt"] = "Success";     
                // Welcome Message
                       
            } 
                    
            // Error Message if passwords Did Not Match
            else 
            {
                // Redirect browser 
                $_SESSION["loginAttempt"] = "Fail";
                header("Location: https://lamp.cse.fau.edu/~cen4010s2020_g07/GatherPLUS/index.php"); 

                exit;
                
            }
                            
        }
    }

    else if (isset($_POST["logout"]))
    {
        unset($_SESSION["username"]);
        $_SESSION["loginAttempt"] = "logout";
        header("Location: https://lamp.cse.fau.edu/~cen4010s2020_g07/GatherPLUS/index.php");
        exit; 
        
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
                        
        $userID = $row["userID"];
        $email = $row["email"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $blurb = $row["blurb"];
                    
        
    }

?>
