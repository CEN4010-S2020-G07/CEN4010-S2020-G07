<!-- PHP for Joining Communities -->
<?php

    if (isset($_SESSION["username"]))
    {
        $username = $_SESSION["username"];
            
        echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
               
        // Checks if user is attempting to join community
        if (isset($_POST["join"]))
        {
            // Connects to Gather+ SQL Database
            $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                
            // Retrieves All User's Information from Database
            $sql = "SELECT * FROM user_accounts WHERE username='$username'";
            $result = $database->query($sql);
            $row = $result->fetch_assoc();
                
            $userID = $row["userID"];
                
            $newCommunity = $_POST["join"];
            
            $placardName = $_POST["placardName"];
                    
            // Retrieves Messageboard list from communityMembers
            $sql = "SELECT Messageboard FROM communityMembers WHERE userID='$userID'";
                    
            $result = $database->query($sql);
                    
            // Checks if user is not a member of any communities
            if ($result->num_rows == 0) 
            {
                // Adds User to CommunityMembers list
                $sql = "INSERT INTO communityMembers (userID, Messageboard, placardName) VALUES ('$userID', '$newCommunity', '$placardName')";
                
                if ($database->query($sql))
                {
                    echo "<h4 class=\"alert alert-success\">Successfully Joined Community</h4>";
                }
                        
                else
                {
                    echo "<h4 class=\"alert alert-danger\">ERROR with Joining Community</h4>";
                }
            }
            
            // Runs if user is a member of 1 or more communities
            else
            {
                $check = 0;
                    
                // Exits if user is already a member of the community
                while ($row = $result->fetch_assoc()) 
                {   
                    if($row["Messageboard"] == $newCommunity)
                    {                        
                        $check = 1;
                    }
                }
                    
                if ($check != 1)
                {
                    // Attempts to insert user into communityMembers table
                    $sql = "INSERT INTO communityMembers (userID, Messageboard, placardName) VALUES ('$userID', '$newCommunity', '$placardName')";
                
                    if ($database->query($sql))
                    {
                        echo "<h4 class=\"alert alert-success\">Successfully Joined Community</h4>";
                    } 
                        
                    else
                    {
                        echo "<h4 class=\"alert alert-danger\">ERROR with Joining Community</h4>";  
                    } 
                }
                
                else
                {
                    echo "<h4 class=\"alert alert-warning\">You are already a member of this community</h4>";
                }
            }
        }
                    
    }
        
    else
    {
        echo "<h4 class=\"alert alert-warning\">Please Sign-In To Join The Community</h4>";  
    }
    
?>
