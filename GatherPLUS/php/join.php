        <?php

            if (isset($_SESSION["username"]))
            {
                $username = $_SESSION["username"];
            
                echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
                
                if (isset($_POST["join"]))
                {
                    // Getting these lousy messages
                    $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                
                    // Retrieves All User's Information from Database
                    $sql = "SELECT * FROM user_accounts WHERE username='$username'";
                    $result = $database->query($sql);
                    $row = $result->fetch_assoc();
                
                    $userID = $row["userID"];
                
                    $books = $_POST["join"];
                
                    // Retrieves All User's Information from Database
                    $sql = "UPDATE user_accounts SET books = '$books' WHERE userID = '$userID'";
                
                    if ($database->query($sql))
                    {
                        echo "<h4 class=\"alert alert-success\">Successfully Joined Community</h4>";
                    }   
                }
            }
        
            else
            {
                echo "<h4 class=\"alert alert-warning\">Please Sign-In To Join The Community</h4>";  
            }
    
        ?>