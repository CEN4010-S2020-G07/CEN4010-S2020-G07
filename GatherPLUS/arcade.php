<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
        <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Bookhub</title>

        <!--BOOTSTRAP CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/global.css">      
    </head>

    <body>


        <!--NAVIGATION-->
        <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">
            <a href="index.php" class="navbar-brand">Gather+</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="bookhub.php">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="audiohub.php">Podcasts </a></li>
                    <li class="nav-item"><a class="nav-link" href="newshub.php">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="arcade.php">Games</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class="nav-item"><a class="nav-link" href="account.php">My Profile</a></li>
                </ul>
            </div>
            
            <!-- Login Button -->
            <div class="nav navbar-nav navbar-right" id="navbarSupportedContent">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active"><button type="button" class="btn log bg-success" data-toggle="modal" data-target="#modal1">Login</button></li>
                </ul>
            </div>
        </nav>
        
        <!-- Carousel -->
        <h3 class="mt-5">Book Hub</h3>
        <div id="book_carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#book_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#book_carousel" data-slide-to="1"></li>
                <!-- <li data-target="#book_carousel" data-slide-to="2"></li>-->
            </ol>

            <!-- Carousel images -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/happy_toddler.jpg" class="carapic w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/bookshelf.jpg" class="carapic w-100" alt="...">
                </div>
                <!-- <div class="carousel-item">
                    <img src="images/" class="carapic w-100" alt="...">
                </div>-->
            </div>
        </div>
        
        
        <!--Book Placards List-->
        <div class="container" id="bookhub">
            
            <!-- ROW #1 -->
            <div class="d-flex justify-content-around">

                <!-- Book Placard #1 -->
                <div class="card h-100" style="width: 16rem;">
                    <img class="card-img-top img-fluid" src="books/covers/TheGuardian.jpg" alt="The Guardian by Nicholas Sparks">
                    <div class="card-body placardBody">
                        <form method="post" action="bookplacard.php">
                            <div class="form-check bForm">
                                <input type="hidden" name="placardName" value="TheGuardian">
                                <button type="submit" class="btn btn_R">Read Now</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Book Placard #2 -->
                <div class="card h-100" style="width: 16rem;">
                    <img class="card-img-top img-fluid" src="books/covers/JaneAustenComplete.jpg" alt="The Complete Novels of Jane Austen">
                    <div class="card-body text-center placardBody">
                        <form method="post" action="bookplacard.php">
                            <div class="form-check bForm">
                                <input type="hidden" name="placardName" value="TheCompleteNovelsofJaneAusten">
                                <button type="submit" class="btn btn_R">Read Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Book Placard #3 -->
                <div class="card h-100" style="width: 16rem;">
                    <img class="card-img-top img-fluid" src="books/covers/BornACrime.jpg" alt="Born A Crime by Trevor Noah">
                        <div class="card-body text-center placardBody">
                        <form method="post" action="bookplacard.php">
                            <div class="form-check bForm">
                                <input type="hidden" name="placardName" value="BornACrime">
                                <button type="submit" class="btn btn_R">Read Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>

            <!--ROW #2-->
            <div class="d-flex justify-content-around">
                
                <!-- Book Placard #4 -->
                <div class="card h-100" style="width: 16rem;">
                    <img class="card-img-top img-fluid" src="books/covers/JustMercy.jpg" alt="Just Mercy by Bryan Stevenson">
                    <div class="card-body text-center placardBody">
                        <form method="post" action="bookplacard.php">
                            <div class="form-check bForm">
                                <input type="hidden" name="placardName" value="JustMercy">
                                <button type="submit" class="btn btn_R ">Read Now</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Book Placard #5 -->
                <div class="card h-100" style="width: 16rem;">
                    <img class="card-img-top img-fluid" src="books/covers/ThePelicanBrief.jpg" alt="The Pelican Brief by John Grisham">
                    <div class="card-body text-center placardBody">
                        <form method="post" action="bookplacard.php">
                            <div class="form-check bForm">
                                <input type="hidden" name="placardName" value="ThePelicanBrief">
                                <button type="submit" class="btn btn_R">Read Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Book Placard #6 -->
                <div class="card h-100" style="width: 16rem;">
                    <img class="card-img-top img-fluid" src="books/covers/MurderInMesopotamia.jpg" alt="Murder In Mesopotamia by Agatha Christie">
                    <div class="card-body text-center placardBody">
                        <form method="post" action="bookplacard.php">
                            <div class="form-check bForm">
                                <input type="hidden" name="placardName" value="MurderInMesopotamia">
                                <button type="submit" class="btn btn_R">Read Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>

            <!--ROW #3-->
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
                                    <form id="loginForm" method="post" action="account.php">
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
        <footer class="footer text-center">&copy;2020 FunkyTech</footer>
        
        <!--BOOTSTRAP SCRIPTS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
