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
                
                    $newCommunity = $_POST["join"];
                    
                    // Retrieves All User's Information from Database
                    $sql = "SELECT Messageboard FROM communityMembers WHERE userID='$userID'";
                    
                    $result = $database->query($sql);
                    
                    // Error Message if username Not Found in Database
                    if ($result->num_rows == 0) 
                    {
                        // Retrieves All User's Information from Database
                        $sql = "INSERT INTO communityMembers (userID, Messageboard) VALUES ('$userID', '$newCommunity')";
                
                        if ($database->query($sql))
                        {
                            echo "<h4 class=\"alert alert-success\">Successfully Joined Community</h4>";
                        }
                        
                        else
                        {
                            echo "<h4 class=\"alert alert-success\">Uh OH</h4>";
                        }
                    }
                    
                    else
                    {
                        $row = $result->fetch_array(MYSQLI_NUM);
                    
                        foreach ($row as $community) 
                        {
                            if($community == $newCommunity)
                            {
                                echo "<h4 class=\"alert alert-warning\">You are already a member of this community</h4>";
                                exit("");
                            }
                        }
                    
                        // Retrieves All User's Information from Database
                        $sql = "INSERT INTO communityMembers (userID, Messageboard) VALUES ('$userID', '$newCommunity)";
                
                        if ($database->query($sql))
                        {
                            echo "<h4 class=\"alert alert-success\">Successfully Joined Community</h4>";
                        } 
                        
                        else
                        {
                            echo "<h4 class=\"alert alert-warning\">Major Error</h4>";  
                        }
                    }
                }
                    
            }
        
            else
            {
                echo "<h4 class=\"alert alert-warning\">Please Sign-In To Join The Community</h4>";  
            }
    
        ?>