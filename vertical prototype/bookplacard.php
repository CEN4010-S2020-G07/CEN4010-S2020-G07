<?php
    session_start();
?>

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
                    <li class="nav-item active"><a class="nav-link" href="featuremain.php">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookplacard.php">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class=""><a class="nav-link" href="account.php">My Profile</a></li>
                </ul>
            </div>
            
            <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><button type="button" class="btn log bg-success" data-toggle="modal" data-target="#modal1">Login</button></li>
                </ul>
            </div>
            
        </nav>
        
        <!-- PHP for Displaying Weather Information And/Or Login Confirmation -->
        <?php

            if (isset($_SESSION["username"]))
            {
                $username = $_SESSION["username"];
            
                echo "<h4 class=\"alert alert-success\">Welcome $username</h4>";
            }
    
        ?>
        
        <h3 class="mt-5">Book Placard Demo</h3>
        
        <!-- Placard -->
        <section class="container container-fluid">
            <div class="card card-default">
            
                <!-- Header -->
                <div class="card-header text-center">
                    <span><strong>Book Title</strong></span>
                </div>
                
                <!-- Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="images/newspaper.png" class="col-sm-12" alt="...">
                        </div>
                        <div class="col-sm-8">
                            <p class="text-justify">
                                From the 31 December 2019 to the 21 March 2020, WHO collected the numbers of confirmed COVID-19 cases and deaths through official communications under the International Health Regulations (IHR, 2005), complemented by monitoring the official ministries of health websites and social media accounts. Since 22 March 2020, global data are compiled through WHO region-specific dashboards (see links below), and/or aggregate count data reported to WHO headquarters daily.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="card-footer text-center">
                    <a href="https://covid19.who.int/" target="_blank" class="btn btn-info" role="button">Link To Article</a>
                </div>
                
            </div>
            <br>
            <br>
            
            <!-- E-Reader -->
            <div class="card card-default">
            
                <!-- Header -->
                <div class="card-header text-center">
                    <span><strong>E-Reader</strong></span>
                </div>
                
                <!-- Body -->
                <div class="card-body">
                    <img src="images/newspaper.png" class="mx-auto d-block" alt="...">
                </div>
                
                <!-- Footer -->
                <div class="card-footer text-center">
                    <a href="https://covid19.who.int/" target="_blank" class="btn btn-info" role="button">Link To Article</a>
                </div>
                
            </div>
            <br>
            <br>
            
            <!-- Message Board -->
            <div class="card card-default">
            
                <!-- Header -->
                <div class="card-header text-center">
                    <span><strong>Message Board</strong></span>
                </div>
                
                <!-- Body -->
                <div class="card-body">
                    
                    <?php
        
                        // Error Handler
                        set_error_handler("errorHandler");
        
                        function errorHandler()
                        {
                            echo " ";
                        }
                    
                        // Getting these lousy messages
                        $db = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
        
                        if ($_POST["text"] == "")
                        {
                            
                        }
                    
                        else if (!isset($_SESSION["username"]))
                        {   
                            echo "<h4 class=\"alert alert-danger text-center\">please Sign-in To Use Board</h4>";
                        }
        
                        else
                        {
            
                            $firstname = $_SESSION["username"];
                            $message = $_POST["text"];
            
                            $sql = "INSERT INTO Messageboard (Firstname, Message) VALUES ('$firstname', '$message')";
            
                            if($db->query($sql))
                            {
                                echo "<h4 class=\"alert alert-success text-center\">Success</h4>";
                            }
                            
                        }
            
                        //Get messages
                        $sql = "SELECT * FROM Messageboard";
                        $result = $db->query($sql);
        
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
                    
                </div>
                
                <!-- Footer -->
                <div class="card-footer text-center">
                    <div class="chatBottom">
		              <form method = "post" action="bookplacard.php" id="chatForm">
                          <input type="text" name="text" id="text" class="form-control" placeholder="type your message" />
                          <br>
                          <input type="submit" class="btn btn-success center-block" value="Send">
		              </form>
	               </div>
                </div>
                <br>
                <br>
                
            </div>
    
        </section>
        
        <!--Modal-->
        <div class="modal" id="modal1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Gather+</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 text-center" id="mod"></div>
                                <div class="col-md-8">
                                    <form id="loginForm" method="post" action="account.php">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password (Case-Sensitive)">
                                        </div>
                                        <button type="submit" class="btn btn-info">Login</button>
                                        <a href="signup.php" class="btn btn-success" role="button">Create An Account</a>
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    
                    </div>     
                </div>
            </div>  
        </div>
        
        <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>
    
        <!--BOOTSTRAP SCRIPTS-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
    
</html>
