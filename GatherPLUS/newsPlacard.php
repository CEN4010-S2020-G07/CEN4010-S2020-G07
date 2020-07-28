<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
    <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Gather+ News Placard</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/global.css">

</head>

<body>
    
           
      <!--NAVIGATION-->
    <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">

        <a href="index.php" class="navbar-brand nav-item active gBrand">Gather+</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav text-uppercase">
                <li class="nav-item"><a class="nav-link" href="bookhub.php">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                <li class="nav-item"><a class="nav-link" href="newshub.php">News</a></li>
                <li class="nav-item"><a class="nav-link" href="gamehub.php">Games</a></li>
                <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                <li class=""><a class="nav-link" href="my_profile.php">My Profile</a></li>
            </ul>
        </div>
    </nav>  
    
     <h3 class="mt-5">NEWS PLACARD TEMPLATE</h3>
        <div class="container placard">
            <div class="row full_thing">
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
                <div class="col-md-8 mt-3 full_feature">
                            <?php
                                echo "<h3 class=\"mt-3 mb-0\">$placardName</h3>";
                                echo "<p class=\"text-left
                                full_describe\">$placardBio</p>";
                            ?>
                            <div class="d-flex flex-row button_row">
                                     <!-- Button for viewing e-reader -->
                            
                            <button type="button" class="btn btn-secondary ml-4 mr-3 view_button" ONCLICK="ShowContent()">Click to Listen</button>
                            
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
                            
                            <button type="button" class="btn btn-secondary ml-4 mr-3 view_button" ONCLICK="ShowAndHide2()">View The Discussion</button>
                            </div>
                </div>
            </div>
        </div>
        <div class="container col-sm-12 col-md-8" id="embed" style="display:none">
           <div class="test mt-5">
           </div>
            <div class="card">
            <div class="card-body text-center"> 
                        <?php 
                            echo "<blockquote class=\"embedly-card\"><h4><a href=\"$placardLink\"</a></h4>\"></blockquote>";       
                        ?>
                        <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
            </div>
            </div>
        </div>

        <div class="container col-sm-12 col-md-8 book_board" id="talk" style="display:none">
            <div class="card">
            <div class="card-body text-center">message board goes here</div>
            </div>
        </div>
        

    <footer class="footer text-center"> &copy;2020 FunkyTech</footer>
    
    <!--button script-->
    <script>
        
        function ShowContent() {
        var x = document.getElementById('embed');
        if (x.style.display == 'none') {
            x.style.display = 'block';
        } 
        else { x.style.display = 'none';}
        } 
        
        function ShowCommunity(){
        var y = document.getElementById('talk');
        if (y.style.display == 'none') {
            y.style.display = 'block';
        } 
        else { y.style.display = 'none';}
        }     
    </script>

    <!--BOOTSTRAP SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>