<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <!--FOLLOWING LINE IMPORTANT TO ADD FOR BOOTSTRAP-->
    <meta name="viewport" content="width-device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Gather+ Game Placard</title>

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
                <li class="nav-item"><a class="nav-link" href="arcade.php">Games</a></li>
                <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                <li class=""><a class="nav-link" href="my_profile.php">My Profile</a></li>
            </ul>
        </div>
    </nav>  
     <h3 class="mt-5">GAME PLACARD TEMPLATE</h3>
        <div class="container placard">
            <div class="row full_thing">
                <div class="col-md-4 mt-3 full_plac_image">
                   <img src="" alt="Cover:Image" class="img-fluid"> 
                </div>
                <div class="col-md-8 mt-3 full_feature">
                    <h3 class="mt-3">Game Title Here</h3>
                    <p class="text-left full_describe">Game Description Here:
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore numquam magnam quos velit quam tenetur ex eum sunt pariatur ducimus voluptatibus aut, est assumenda qui eligendi nisi, laboriosam quidem fugiat.Lorem
                    </p> 
                    <div class="d-flex flex-row button_row">
                    <button type="button" class="btn btn-secondary ml-4 mr-3 view_button" ONCLICK="ShowContent()">Click to Play</button>
                    <button type="submit" class="btn btn-secondary comm_button" ONCLICK="ShowCommunity()">Join the Community!</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container col-sm-12 col-md-8" id="embed" style="display:none">
            <div class="card">
            <div class="card-body text-center"><iframe id="viewerPro" style="width:600px; height: 500px;" src="">INSERT CONTENT HERE</iframe></div>
            </div>
        </div>
        
        <div class="container col-sm-12 col-md-8 book_board" id="talk">
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