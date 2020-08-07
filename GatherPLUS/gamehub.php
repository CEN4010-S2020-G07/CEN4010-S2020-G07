<?php
    session_start();
    if(isset($_SESSION["loginAttempt"])){
        if($_SESSION["loginAttempt"] == "Fail"){
            echo "<h5 class=\"alert alert-danger\">Incorrect username or password</h5>";
        }else if($_SESSION["loginAttempt"] == "logout"){
            echo "<h5 class=\"alert alert-warning\">You Have Been Logged-Out</h5>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
    <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- TITLE -->
    <title>Gather+ Games</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/global.css">

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

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
                <li class="nav-item"><a class="nav-link" href="wellspace.php">Wellspace</a></li>
                <li class="nav-item"><a class="nav-link" href="my_profile.php">My Profile</a></li>
            </ul>
        </div>

        <!-- Login Button -->
        <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
            <ul class="navbar-nav text-uppercase">
                <?php
                        if(isset($_SESSION["loginAttempt"])){
                            if($_SESSION["loginAttempt"] != "Success"){
                                echo '<li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Login</button></li>';
                            }else if($_SESSION["loginAttempt"] == "Success"){
                                echo '<li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Logout</button></li>';
                            }
                        }else{
                            echo '<li class="nav-item active"><button type="button" class="btn log" data-toggle="modal" data-target="#modal1">Login</button></li>';
                        }
                    ?>
            </ul>
        </div>
    </nav>

    <!-- Hero Image -->
    <div class="container col-md-12"><img src="images/GamesRS.jpg" alt="Games" class="w-100 hero">
    </div>

    <!--Game Placards List-->
    <div class="container mt-5" id="hubBox">

        <!--ROW #1-->
        <div class="d-flex justify-content-around">

            <!-- game Placard #1 -->
            <div class="card h-100" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="games/Sudoku.png" alt="Sudoku">
                <div class="overlay">
                    <div class="text">Sudoku</div>
                </div>
                <div class="card-body placBody">
                    <form method="post" action="gamePlacard.php">
                        <div class="form-check bForm">
                            <input type="hidden" name="placardName" value="Sudoku">
                            <button type="submit" class="btn btn_R">Play Now</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- game Placard #2 -->
            <div class="card h-100" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="games/ClassicPac.jfif" alt="Pacman">
                <div class="overlay">
                    <div class="text">An Updated Version of the Old School Favorite: PACMAN</div>
                </div>
                <div class="card-body placBody">
                    <form method="post" action="gamePlacard.php">
                        <div class="form-check bForm">
                            <input type="hidden" name="placardName" value="ClassicPac">
                            <button type="submit" class="btn btn_R">Play Now</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- game Placard #3 -->
            <div class="card h-100" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="games/Tetris.png" alt="Tetris">
                <div class="overlay">
                    <div class="text">Tetris</div>
                </div>
                <div class="card-body placBody">
                    <form method="post" action="gamePlacard.php">
                        <div class="form-check bForm">
                            <input type="hidden" name="placardName" value="Tetris">
                            <button type="submit" class="btn btn_R">Play Now</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
                <!-- ROW #2 -->
        <div class="d-flex justify-content-around">

            <!-- game Placard #4 -->
            <div class="card h-100" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="games/Roblox.jpg" alt="Roblox">
                <div class="overlay">
                    <div class="text">A World of Fun 3D Games</div>
                </div>
                <div class="card-body placBody">
                    <form method="post" action="gamePlacard.php">
                        <div class="form-check bForm">
                            <input type="hidden" name="placardName" value="Roblox">
                            <button type="button" class="btn btn_R"><a href="https://www.roblox.com/" target="_blank">Go Now</a></button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- game Placard #5 -->
            <div class="card h-100" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="games/Tabletopia.png" alt="Tabletopia">
                <div class="overlay">
                    <div class="text">A Treasure Trove of Online Board Games</div>
                </div>
                <div class="card-body placBody">
                    <form method="post" action="gamePlacard.php">
                        <div class="form-check bForm">
                            <input type="hidden" name="placardName" value="Tabletopia">
                            <button type="button" class="btn btn_R"><a href="https://tabletopia.com/" target="_blank">Go Now</a></button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- game Placard #6 -->
            <div class="card h-100" style="width: 16rem;">
                <img class="card-img-top img-fluid" src="games/Fortnite3.jpg" alt="Fortnite">
                <div class="overlay">
                    <div class="text">Popular Multiplayer Adventure</div>
                </div>
                <div class="card-body placBody">
                    <form method="post" action="gamePlacard.php">
                        <div class="form-check bForm">
                            <input type="hidden" name="placardName" value="Fortnite">
                            <button type="button" class="btn btn_R"><a href="https://www.epicgames.com/fortnite/en-US/home" target="_blank">Go Now</a></button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

        <!--ROW #3-->
    </div>

    <!-- Login/Logout Modal -->
    <?php
    if(isset($_SESSION["loginAttempt"])){//check to see if loginAttempt is defined
        if($_SESSION["loginAttempt"] != "Success"){
            echo '<div class="modal" id="modal1" role="dialog">
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
                                                <label for="password">Password <a href="iforgot.php">(Forgot Password)</a></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password (Case-Sensitive)">
                                            </div>
                                            <button type="submit" class="btn btn-info">Login</button>
                                            <a href="signup.php" class="btn btn-success" role="button">Create An Account</a>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>';
        }else if($_SESSION["loginAttempt"] == "Success"){
            echo '<div class="modal" id="modal1" role="dialog">
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
                                        <form id="logout" method="post" action="my_profile.php">
                                            <input type="hidden" name="logout" value="1">
                                            <button type="submit" class="btn btn-warning">Logout</button>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>';
        }
    }else{//loginAttempt not defined
            echo '<div class="modal" id="modal1" role="dialog">
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
                                                <label for="password">Password <a href="iforgot.php">(Forgot Password)</a></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password (Case-Sensitive)">
                                            </div>
                                            <button type="submit" class="btn btn-info">Login</button>
                                            <a href="signup.php" class="btn btn-success" role="button">Create An Account</a>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>';
    }
    ?>
    <br>
    <br>

    <!-- FOOTER -->
    <footer class="footer text-center">&copy;2020 FunkyTech</footer>

    <!--BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>