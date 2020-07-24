                    <?php
        
                        // Error Handler
                        set_error_handler("errorHandler");
        
                        function errorHandler()
                        {
                            echo " ";
                        }
                    
                        // Getting these lousy messages
                        $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
        
                        if ($_POST["text"] == "")
                        {
                            
                        }
                    
                        else if (!isset($_SESSION["username"]))
                        {   
                            echo "<h4 class=\"alert alert-danger text-center\">please Sign-in To Use Board</h4>";
                        }
        
                        else
                        {
                            // Retrieves All User's Information from Database
                            $sql = "SELECT userID FROM user_accounts WHERE username='$username'";
                            $result = $database->query($sql);
                            $row = $result->fetch_assoc();
                            
                            $userID = $row["userID"];
                            $
                            
                            // Retrieves All User's Information from Database
                            $sql = "SELECT Messageboard FROM communityMembers WHERE userID='$userID' AND Messageboard='books'";
                            $result = $database->query($sql);
                            
                            // Error Message if username Not Found in Database
                            if ($result->num_rows == 0) 
                            {
                                echo "<h4 class=\"alert alert-warning text-center\">Please Join Community Before Posting</h4>";
                            }
                            
                            
                            else
                            {
                                $firstname = $_SESSION["username"];
                                $message = $_POST["text"];
            
                                $sql = "INSERT INTO Messageboard (Firstname, Message) VALUES ('$firstname', '$message')";
            
                                if($database->query($sql))
                                {
                                    echo "<h4 class=\"alert alert-success text-center\">Success</h4>";
                                }
                                
                                else
                                {
                                    echo "<h4 class=\"alert alert-danger text-center\">Could Not Submit Comment</h4>";
                                }
                            }
                            
                        }
            
                        //Get messages
                        $sql = "SELECT * FROM Messageboard";
                        $result = $database->query($sql);
        
                        // Error Message if Site is Unable to Retrieve Information
                        if (!$result)
                        {
                            die("Error: Unable to Connect to Database");
                        }
        
                        else
                        {   
                            // Creates array of message Info
                            while ($row = $result->fetch_assoc())
                            {
                                $name = $row['Firstname'];
                                $message = $row['Message'];
                                $userImage = "";
                                
                                $sql = "SELECT userImage FROM user_accounts WHERE username='$name'";
                                $result2 = $database->query($sql);
                                
                                if ($result->num_rows != 0)
                                {
                                    $row2 = $result2->fetch_assoc();
                                    
                                    $userImage = $row2["userImage"];
                                    $userImage = base64_encode($userImage);
                                }
                                
                                // echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
                                
                                echo "<div class=\"media border p-3\">";
                                
                                if ($userImage != "")
                                {
                                    echo "<img src=\"data:image/jpg;charset=utf8; base64, $userImage \" alt=\"$name\" class=\"mr-3 mt-3 rounded-circle\" style=\"width:60px; height:60px;\" />";
                                }
                                
                                else
                                {
                                    echo "<img src=\"images/blank.png\" alt=\"John Doe\" class=\"mr-3 mt-3 rounded-circle\" style=\"width:60px; height:60px;\">";
                                }
                                 
                                echo "<div class=\"media-body\">";
                                
                                echo "<h4>$name</h4>";
                                
                                echo "<p>$message</p>";      
                                    
                                echo "</div>";
                                
                                echo "</div>";
                            }
            
                        }
                    ?>