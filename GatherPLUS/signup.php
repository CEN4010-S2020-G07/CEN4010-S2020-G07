<!DOCTYPE html>
<html lang="en">
    <head>
       <!-- Global site tag (gtag.js) - Google Analytics -->
       <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174550610-1"></script>
       <script>
           window.dataLayer = window.dataLayer || [];

           function gtag() {
               dataLayer.push(arguments);
           }
           gtag('js', new Date());

           gtag('config', 'UA-174550610-1');
       </script>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Gather+ Sign-Up</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/prototype.css"> 
        <link rel="stylesheet" type="text/css" href="css/global.css"> 
        
        <!--FONT-->
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
    </head>

    <body>
        
        <!--NAVIGATION-->
        <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">
            <a href="index.php" class="navbar-brand nav-link-active gBrand">Gather+</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
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
        
        <!-- Header Title -->
        <h3 class="mt-5">Signup Page</h3>
        
        <!-- PHP for Sign-up -->
        <?php include 'php/signup.php'; ?>  
        
        
        <!-- Sign-up Form -->
        <section class="container">
            <div class="card card-default">
            
                <!-- Back Home Button -->
                <div class="card-header">
                    <form id="Back" method="post" class="text-center" action="index.php">
                        <input type="submit" class="btn btn-info" value="Back to Home">
                    </form>
                </div>
                    
                <form id="input" method="post" action="signup.php">
                    <div class="card-body text-center padded">
                        
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                            </div>                                       
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                            </div>                                       
                            <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password (Case-Sensitive)">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address">
                            </div> 
                            <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control datepicker" name="month" placeholder="Date of Birth (Month : MM)"/>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control datepicker" name="day" placeholder="Date of Birth (Day : DD)"/>
                            </div> 
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control datepicker" name="year" placeholder="Date of Birth (Year : YYYY)"/>
                            </div> 
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <textarea type="textarea" class="form-control" id="blurb" name="blurb" placeholder="Biography (Optional)"></textarea>
                            </div> 
                        </div>
                        
                    </div>
                    
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success center-block" value="Create Account">
                    </div>
                </form>
                
            </div>
        </section>

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
                                                <label for="password">Password</label>
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
                                                <label for="password">Password</label>
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
        <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>

        <!--BOOTSTRAP SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
