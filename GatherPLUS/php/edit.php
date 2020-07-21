            <!-- PHP for Displaying Weather Information And/Or Login Confirmation -->
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
                    $books = $_POST["newBooks"];
                    
                    // Retrieves All User's Information from Database
                    $sql = "UPDATE user_accounts SET username='$username', email = '$email', firstname = '$firstname', lastname = '$lastname', books = '$books' WHERE userID = '$userID'";
                    
                    if ($database->query($sql))
                    {
                        echo "<h4 class=\"alert alert-success\">Success</h4>";
                        
                        $_SESSION["username"] = $username;
                    }
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
                        
                    $email = $row["email"];
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $books = $row["books"];
                    
                    echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
                }

            ?>