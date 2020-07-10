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
                    <li class="nav-item"><a class="nav-link" href="bookhub.html">Book Hub</a></li>
                    <li class="nav-item"><a class="nav-link" href="wellspace.html">Wellspace</a></li>
                    <li class=""><a class="nav-link" href="account.php">My Profile</a></li>
                </ul>
            </div>
            
        </nav>  
        
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
                            <img src="images/server.jpg" class="col-sm-12" alt="...">
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
                    <img src="images/newspaper.jpg" class="mx-auto d-block" alt="...">
                </div>
                
                <!-- Footer -->
                <div class="card-footer text-center">
                    <a href="https://covid19.who.int/" target="_blank" class="btn btn-info" role="button">Link To Article</a>
                </div>
                
            </div>
            <br>
            <br>
            
            <div class="card card-default">
            
                <!-- Header -->
                <div class="card-header text-center">
                    <span><strong>Community Board</strong></span>
                </div>
                
                <!-- Body -->
                <div class="card-body">
                    
                    
                    
                    <?php
                    
                        require_once('db.php'); 
                    
                        if(isset($_POST['submit'])) 
                        { 
                            $time = date("g:i:s A"); 
                            $date = date("n/j/Y"); 
                            $msg = $_POST['message']; 
                            $result = ""; 
                        
                            if(!empty($msg)) 
                            { 
                                // name time date message 
                                $query = "INSERT INTO comments ("; 
                                $query .= " name, time, date, comment"; 
                                $query .= ") VALUES ("; 
                                $query .= " '{$name}', '{$time}', '{$date}', '{$msg}' "; $query .= ")"; 
                                $result = mysqli_query($connect, $query); 
                            } 
                        } 
                    
                    ?>
                    
                </div>
                
                <!-- Footer -->
                <div class="card-footer text-center">
                    <a href="https://covid19.who.int/" target="_blank" class="btn btn-info" role="button">Link To Article</a>
                </div>
                
            </div>
        </section>
        
        <footer class="footer text-center"> <div class="container">(c)2020 FunkyTech</div></footer>
    
        <!--BOOTSTRAP SCRIPTS-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
    
</html>
