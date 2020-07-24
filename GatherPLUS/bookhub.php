<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
    <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Beta Launch</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/books.css">

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
                <li class=""><a class="nav-link" href="profile.php">My Profile</a></li>
            </ul>
        </div>
    </nav>
    <h3 class="mt-5">Book Hub</h3>
    <div id="book_carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#book_carousel" data-slide-to="0" class="active"></li>
            <li data-target="#book_carousel" data-slide-to="1"></li>
            <!-- <li data-target="#book_carousel" data-slide-to="2"></li>-->
        </ol>

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
    <!--ROW 1-->
    <div class="container" id="bookhub">
        <div class="d-flex justify-content-around">
            <div class="card" style="width: 16rem;">
                <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
                <div class="card-body text-center">
                    <h5 class="card-title">The Nature Fix</h5>
                    <p class="text-left">Florence Williams sets out to uncover the science behind nature's positive effects on the brain.</p>
                    <form method="post" action="bookplacard.php">
                        <div class="form-check">
                            <input type="hidden" name="placardName" value="TheNatureFix">
                            <button type="submit" class="btn btn_R">Read Now</button>
                        </div>                        
                    </form>
                </div>
            </div>

        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">The Guardian</h5>
                <p class="text-center">Julie Barenson's young husband left her two unexpected gifts before he died - a Great Dane puppy named Singer and the promise that he would always be watching over her. </p>
                <form method="post" action="bookplacard.php">
                    <input type="hidden" name="placardName" value="TheGuardian">
                    <button type="submit" class="btn btn_R">Read Now</button>
                </form>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>
      <!--<div class="card" style="width: 16rem;">
            <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>-->
        </div>

    <!--ROW 2-->
    <div class="d-flex justify-content-around">
        <div class="card" style="width: 16rem;">
            <div class="container"><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="bookplacard.html" class="btn btn_R">Read Now</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>
      <!--<div class="card" style="width: 16rem;">
            <div><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>-->
        </div>

        <!--ROW 3-->
        <!--   <div class="d-flex justify-content-around">
        <div class="card" style="width: 16rem;">
            <div class="container"><img class="card-img-top" id = "books" src="images/book.png" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="bookplacard.html" class="btn btn_R">Read Now</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" src="images/book.png" id = "books" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" src="images/book.png" id = "books" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>
        <div class="card" style="width: 16rem;">
            <div><img class="card-img-top" src="images/book.png" id = "books" alt="Card image cap"></div>
            <div class="card-body text-center">
                <h5 class="card-title">Book Title</h5>
                <p class="text-center">Brief Description</p>
                <a href="#" class="btn btn_R">Read Now</a>
            </div>
        </div>
    </div>-->

    </div>
<br>
<br>

    <footer class="footer text-center">&copy;2020 FunkyTech</footer>



    <!--BOOTSTRAP SCRIPTS-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>