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
        <link rel="stylesheet" type="text/css" href="style.css" />
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
        
        <!-- PHP for -->
        <?php include 'php/join.php'; ?>
        
        <h3 class="mt-5">Book Placard Page</h3>
            <div class="container placard">
                <div class="row full_thing">
                    <div class="col-md-4 mt-3 full_plac_image">
                    <img src="books/covers/NatureFixCover.png" alt="Cover: The Nature Fix" class="img-fluid"> 
                    </div>
                    <div class="col-md-8 mt-3 full_feature">
                        <h3 class="mt-3">The Nature Fix</h3>
                        <p class="text-left full_describe">An intrepid investigation into nature's restorative benefits by a prize-winning author.
                        For centuries, poets and philosophers extolled the benefits of a walk in the woods: Beethoven drew inspiration from rocks and trees; Wordsworth composed while tromping over the heath; Nikola Tesla conceived the electric motor while visiting a park. Intrigued by our storied renewal in the natural world, Florence Williams sets out to uncover the science behind nature's positive effects on the brain.
                        From forest trails in Korea, to islands in Finland, to groves of eucalyptus in California, Williams investigates the science at the confluence of environment, mood, health, and creativity.
                        </p> 
                        <div class="d-flex flex-row button_row">
                            <button type="button" class="btn btn-secondary ml-4 mr-3 view_button" ONCLICK="ShowAndHide()">Click to Read</button>
                            <form method="post" action="bookplacard.php" id="chatForm">
                                <div class="form-check">
                                    <input type="hidden" name="join" value="1">
                                    <button type="submit" class="btn btn-secondary comm_button" ONCLICK="ShowAndHide()">Join the Community!</button>
                                </div>                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container col-sm-12 col-md-8 seeDiv" id="eReader" style="display:none">
                <div class="card">
                    <div class="card-body text-center"><iframe id="viewerPro" style="width:600px; height: 500px;" src="books/TheNatureFix.pdf"></iframe></div>
                </div>
            </div>
        
            <div class="container col-sm-12 col-md-8 book_board seeDiv" style="display:none">
                
                <!-- Message Board -->
                <div class="card card-default">
            
                <!-- Header -->
                <div class="card-header text-center">
                    <span><strong>Message Board</strong></span>
                </div>
                
                <!-- Body -->
                <div class="card-body">
                    
                    <?php include 'php/messageboard.php'; ?>
                    
                </div>
                
                <!-- Footer -->
                <div class="card-footer text-center">
                    <div class="chatBottom">
		              <form method="post" action="bookplacard.php" id="chatForm">
                          <input type="text" name="text" id="text" class="form-control" placeholder="type your message" />
                          <br>
                          <input type="submit" class="btn btn-success center-block" value="Send">
		              </form>
	               </div>
                </div>
                <br>
                <br>
                
            </div>
            </div>
        
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
        

    <footer class="footer text-center"> &copy;2020 FunkyTech</footer>
    
    <!--button script-->
    <script>
        function ShowAndHide() {
        var x = document.getElementByClassName('seeDiv');
        if (x.style.display == 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }</script>

    <!--BOOTSTRAP SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>