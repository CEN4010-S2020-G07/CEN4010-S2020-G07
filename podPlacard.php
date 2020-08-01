<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Gather+ Pod Placard</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/global.css">
    </head>

    <body>
 
        <!--NAVIGATION-->
        <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">

            <a href="index.php" class="navbar-brand nav-item active gBrand">Gather+</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="bookhub.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                    <li class="nav-item"><a class="nav-link" href="newshub.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="gamehub.php">Games</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class="nav-item"><a class="nav-link" href="my_profile.php">My Profile</a></li>
                </ul>
            </div>
            
            <!-- Login Button -->
            <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Login/Logout</button></li>
                </ul>
            </div>
        </nav>
        
        <!-- PHP for joining communities -->
        <?php include 'php/join.php'; ?>
        
        <!-- Book Placard Information -->
            <div class="container placard">
                <div class="row full_thing" id="podRow">
                    
                    <!-- PHP for Retrieving Placard information -->
                    <div class="col-md-4 mt-3 full_plac_image">
                            <?php
                                
                                // Sets placard name as the name of the link
                                if (isset($_POST["placardName"]))
                                {
                                    $placardName = $_POST["placardName"];
                                }
                        
                                // Sets placard name as current session placard
                                else
                                {
                                    $placardName = $_SESSION["placardName"];
                                }
                        
                                $database = new mysqli("localhost", "cen4010s2020_g07", "faueng2020", "cen4010s2020_g07");
                        
                                $sql = "SELECT * FROM placards WHERE placardName='$placardName'";
                                $result = $database->query($sql);
                                $row = $result->fetch_assoc();
                        
                                $placardName = $row["placardName"];
                                $placardBio = $row["placardBio"];
                                $placardLink = $row["placardLink"];
                                $placardImageLink = $row["placardImageLink"];
                        
                                $_SESSION["placardName"] = $placardName;
                        
                                echo "<img src=\"$placardImageLink\" alt=\"$placardName\" class=\"img-fluid\">";
                            ?>
                    </div>
                    
                    <!-- PHP for filling in book placard information -->
                    <div class="col-md-8 mt-3 full_feature pFeature">
                            <?php
                                echo "<h3 class=\"mt-3 mb-0\">$placardName</h3>";
                                echo "<p class=\"text-left
                                full_describe\">$placardBio</p>";
                            ?>
                        
                        <!-- Placard Buttons -->
                        <div class="d-flex flex-row button_row">
                            
                            <!-- Button for viewing e-reader -->
                            
                            <button type="button" class="btn btn-secondary ml-4 mr-2 view_button" ONCLICK="ShowContent()">Click to Listen</button>
                            
                            <!-- PHP Form for joining a community -->
                            <form method="post" action="podPlacard.php" id="chatForm">
                                <div class="form-check">
                                    <?php
										$placardNoSpace = str_replace(" ", "" , $placardName);
										
                                        echo "<input type=\"hidden\" name=\"placardName\" value=\"$placardName\">";
                                        echo "<input type=\"hidden\" name=\"join\" value=\"$placardNoSpace\">";
                                    ?>
                                    
                                    <!-- Join Button -->
                                    <button type="submit" class="btn btn-secondary comm_button">Join the Community!</button>
                                </div>                        
                            </form>
                            
                            <a href="#board"><button type="button" class="btn btn-secondary ml-4 mr-3 view_button" ONCLICK="ShowAndHide2()">View The Discussion</button></a>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- PHP for viewing book PDF file -->
            <div class="container col-sm-12 col-md-8" id="embed" style="display:none">
                <div class="card">
                    <div class="card-body text-center">
                        <?php       
                            echo "<iframe id=\"viewerPro\" style=\"width:600px; height: 200px;\" src=\"$placardLink\"></iframe>";          
                        ?>
                    </div>
                </div>
            </div>
        
            <!-- Message Board Card -->
            <div class="container col-sm-12 col-md-8 book_board" id="board">
                <div class="card card-default">
            
                    <!-- Header -->
                    <div class="card-header text-center">
                        <h5>Message Board</h5>
                    </div>
                
                    <!-- PHP for displaying messageboard -->
                    <div class="card-body" style="max-height: 500px; height: auto; overflow: scroll;">
                        <?php include 'php/messageboard.php'; ?>
                    </div>
                
                    <!-- Footer -->
                    <div class="card-footer text-center">
                        <div class="chatBottom">
		                  <form method="post" action="podPlacard.php" id="chatForm">
                            <?php
                                echo "<input type=\"hidden\" name=\"placardName\" value=\"$placardName\">";
                            ?>
                            <input type="text" name="text" id="text" class="form-control" placeholder="Enter Your Message Here" />
                            <br>
                            <input type="submit" class="btn btn-success center-block" value="Send">
		                  </form>
	                   </div>
                    </div>
                    <br>
                    <br>
                
                </div>
            </div>
        
            <!--Modal for Login-->
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
                                        <form id="loginForm" method="post" action="my_profile.php">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <a href="iforgot.php" class="iforgot">(Forgot Password)</a></label>
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
            <br>
            <br>
        
            <!-- FOOTER -->
            <footer class="footer text-center"> &copy;2020 FunkyTech</footer>
    
            <!--button script-->
            <script>
                function ShowAndHide2() {
                var x = document.getElementById('board');
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                } else {
                    x.style.display = 'none';
                    }
                }
                
                function ShowContent() {
                    var x = document.getElementById('embed');
                    if (x.style.display == 'none') {
                        x.style.display = 'block';
                    } else {
                        x.style.display = 'none';
                    }
                }
            </script>

        <!--BOOTSTRAP SCRIPTS-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
