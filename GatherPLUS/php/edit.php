<!-- PHP for Editing User Profiles -->
<?php
        
    session_start();
        
    // Error Handler
    set_error_handler("errorHandler");
        
    function errorHandler()
    {
        echo "";
    }
            
    // Runs if user signed in earlier
    if($_POST["newUsername"] != "")
    {
        $username = $_SESSION["username"];
                    
         // Connects to MySQL Database
        $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                    
         // Retrieves All User's Information from Database
        $sql = "SELECT * FROM user_accounts WHERE username='$username'";
        $result = $database->query($sql);
        $row = $result->fetch_assoc();
                        
        $userID = $row["userID"];
                    
        $username = $_POST["newUsername"];
        $email = $_POST["newEmail"];
        $firstname = $_POST["newFirstname"];
        $lastname = $_POST["newLastname"];
        $blurb = $_POST["blurb"];
                    
        $sql = "UPDATE user_accounts SET username='$username', email='$email', firstname='$firstname', lastname='$lastname', blurb='$blurb' WHERE userID = '$userID'";
                    
        // Displays message if successfully updated user account
        if ($database->query($sql))
        {
            echo "<h4 class=\"alert alert-success\">Successfully Updated User Account</h4>";
                        
            $_SESSION["username"] = $username;
        }
                    
        // Removes user from communities they selected to remove
        if (isset($_POST["communities"]))
        {                      
            foreach ($_POST["communities"] as $community)
            {
                $sql = "DELETE FROM communityMembers WHERE userID='$userID' AND placardName='$community'";
                            
                if($database->query($sql))
                {
                    echo "<h4 class=\"alert alert-success\">Successfully left $community community</h4>";
                }
            }
        }
                     
        $status = $statusMsg = '';
                        
        $status = 'error'; 
                    
        // If user opted to delete their profile picture
        if (isset($_POST["remove"]))
        {
            // Deletes profile picture from user account
            $sql = "UPDATE user_accounts SET userImage='' WHERE userID='$userID'";
            
            if ($database->query($sql))
            {
                echo "<h4 class=\"alert alert-success\">Profile Picture Successfully Removed</h4>";
            }
            
            else
            {
                echo "<h4 class=\"alert alert-danger\">Error with Picture Deletion</h4>";
            }
        }
                        
        else if(!empty($_FILES["image"]["name"])) 
        { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
             // Allow certain file formats 
            $allowTypes = array('jpg','PNG','jpeg','gif', 'png'); 
                            
            if(in_array($fileType, $allowTypes))
            { 
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
         
                // Insert image content into database 
                $insert = $database->query("UPDATE user_accounts SET userImage=\"$imgContent\" WHERE userID=\"$userID\""); 
             
                if($insert)
                { 
                    $status = 'Success'; 
                    $statusMsg = "File Uploaded Successfully."; 
                }
                                
                else
                { 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }
                            
            else
            { 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }
                        
        else
        { 
            $statusMsg = 'Please select an image file to upload.'; 
        }
                    
        // Display status message 
        echo $statusMsg; 
    } 
            
     // Runs if user signed in earlier
    else if (isset($_SESSION["username"]))
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
                    
        echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
    }
?>
