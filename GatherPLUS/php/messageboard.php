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
                            $sql = "SELECT * FROM user_accounts WHERE username='$username'";
                            $result = $database->query($sql);
                            $row = $result->fetch_assoc();
                
                            $books = $row["books"];
                            
                            if ($books != 1)
                            {
                                echo "<h4 class=\"alert alert-warning text-center\">Join the Community before Submitting</h4>";
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
                
                                echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
                            }
            
                        }
                    ?>