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
                    <li class="nav-item active"><a class="nav-link" href="index.php">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookhub.html">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="audiohub.html">Podcasts </a></li>
                    <li class="nav-item"><a class="nav-link" href="newshub.html">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="arcade.html">Games</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class="nav-item"><a class="nav-link" href="account.php">My Profile</a></li>
                </ul>
            </div>
        </nav>  
        
        <h3 class="mt-5">Signup Page</h3>
        
        <!-- PHP for Sign-up -->
        <?php include 'php/signup.php'; ?>  
        
        
        <!-- Login Form -->
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
                                <textarea type="textarea" class="form-control" id="blurb" name="blurb" placeholder="Biography"></textarea>
                            </div> 
                        </div>
                        
                    </div>
                    
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success center-block" value="Create Account">
                    </div>
                </form>
                
            </div>
        </section>
        
    </body>


    <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>

    <!--BOOTSTRAP SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>
