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
    <title>Gather+ Wellspace</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/global.css">

    <!--FONT-->
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">

</head>

<body>

    <!--NAVIGATION-->
    <nav id="navigate" class="navbar navbar-expand-xl navbar-fixed-top navbar-light bg-light">
        <a href="index.php" class="navbar-brand nav-item active">Gather+</a>

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

    <div id="well_carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#well_carousel" data-slide-to="0" class="active"></li>
            <li data-target="#well_carousel" data-slide-to="1"></li>
            <li data-target="#well_carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/maskR.jpg" class="img-fluid w-100 carapic" alt="Wellspace">
            </div>
            <div class="carousel-item">
                <img src="images/InkedstopthespreadR_LI.jpg" class="img-fluid w-100 carapic" alt="Stop the Spread">
            </div>
            <div class="carousel-item">
                <img src="images/stayathomeR.jpg" class="img-fluid w-100 carapic" alt="Stay at Home">
            </div>
        </div>
    </div>
    <br>

    <!-- Body Sections -->
    <div class="container-fluid" id="well_div">

        <!-- News Articles -->
        <!-- Row 1 -->
        <div class="row mb-3">

            <!-- Card 1 -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Understanding the Virus</h5>
                        <p>And Its Symptoms</p>
                    </div>

                    <div class="card-body">
                        <p class="text-left">
                            Novel Coronavirus, or SARS-COV-2, is a previously unidentified strain of coronavirus that is part of a larger family of coronaviruses. These viruses cause respiratory illnesses in humans (and animals) that can range from the common cold to more severe conditions such as COVID-19; which is the disease involved in the current outbreak. Coronavirus spreads through droplets that are dispersed into the air when an infected person coughs or sneezes. It is also possible to get the virus by touching a contaminated surface or object and then touching your face.
                            <a href="https://www.pfizer.com/news/hot-topics/what_to_know_about_coronavirus_covid_19_explained"> - Pfizer</a>
                        </p>
                        <img src="images/symptom_list.png" class="img-fluid" alt="symptoms">
                    </div>
                    <!--<div class="card-footer text-center">
                            </div>-->
                </div>
            </div>

            <!-- Mental Health -->
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header text-center">
                        <h5>Be Kind to Your Mind</h5>
                        <p>Body and Soul</p>
                    </div>

                    <div class="card-body">
                        <img src="images/wellness2.jpg" class="img-fluid card-img-top" alt="Mental Wellness">
                        <p class="text-left card_para">
                            Life can be difficult, but the introduction of the COVID-19 pandemic has made this a distressing time for people everywhere. The virus can impact your health and well-being, even if you haven't contracted it. If you are experiencing fear, stress, or anxiety right now, know that there are many resources available to help you manage your mental health. Browse the articles below to see what suits you best.
                        </p>
                        <br>
                        <ul class="list-group anchor_list">
                            <a class="list-group-item btn btn-light" target="blank" role="button" href="https://www.helpguide.org/home-pages/coronavirus-mental-health.htm" target="_blank"> Coronavirus Help | Help Guide Organization</a>

                            <a class="list-group-item btn btn-light" target="blank" role="button" href="https://www.cdc.gov/coronavirus/2019-ncov/daily-life-coping/managing-stress-anxiety.html" target="_blank">Coping with Stress | Center for Disease Control</a>

                            <a class="list-group-item btn btn-light" target="blank" role="button" href="https://www.who.int/campaigns/connecting-the-world-to-combat-coronavirus/healthyathome/healthyathome---mental-health?gclid=EAIaIQobChMIwqyokMu-6gIVD9bACh30CA8BEAAYBCAAEgJJgvD_BwE">Looking After Our Mental Health | World Health Organization</a>

                            <a class="list-group-item btn btn-light" target="blank" role="button" href="https://www.womenshealthmag.com/health/a31958387/free-online-therapy-coronavirus/">Free or Low-Cost Mental Health Care | Women's Health Magazine</a>
                        </ul>
                    </div>

                    <!--<div class="card-footer text-center">
                            </div>-->

                </div>
            </div>
        </div>

        <!-- Row 3 -->
        <!--Middle row removed for now, can be reinstated later as needed
                
                    <div class="row">

                    <!-- Card 3
                    <div class="col-sm-6">
                        <div class="card">

                            <div class="card-header text-center">
                                <span></span>
                            </div>

                            <div class="card-body">
                                <div class="">
                                    <img src="" class="col-sm-4 img-fluid" alt="...">
                                    <p class="text-justify col-sm-8">

                                    </p>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <a href="" target="_blank" class="btn btn-light" role="button">View Article</a>
                            </div>

                        </div>
                    </div>

                    <!-- Card 4
                    <div class="col-sm-6">
                        <div class="card">

                            <div class="card-header text-center">
                                <span></span>
                            </div>

                            <div class="card-body">
                                <div class="">
                                    <img src="" class="col-sm-4 img-fluid" alt="...">
                                    <p class="text-justify col-sm-8">
                                    </p>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <a href="" target="_blank" class="btn btn-info" role="button">View Article</a>
                            </div>
                        </div>
                    </div>
            </div>-->

        <!-- Guidelines List -->
        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-center">
                        <h5>Key Safety Measures You Can Take</h5>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item ">
                                <p></p>
                                <!--this line for spacing only-->
                                Limit local and domestic travel to essential trips only, and avoid large gatherings of people (ten or more individuals).
                            </li>
                            <li class="list-group-item every_other">Maintain a minimum distance of six feet between you and others in public. Nine to fourteen feet is ideal.</li>
                            <li class="list-group-item ">Wear a mask wherever possible when you go out. Even if you don't have access to an N95 respirator mask, you are still helping protect yourself and others. Add disposable or rubber gloves to complete your outfit!</li>
                            <li class="list-group-item every_other">Wash your hands regularly with soap and water for at least 20 seconds, or rub them with a minimum 60% alcohol-based cleanser.</li>
                            <li class="list-group-item">Avoid touching your face.</li>
                            <li class="list-group-item every_other">Cover your mouth and nose when coughing or sneezing.</li>
                            <li class="list-group-item">Stay at home if you feel unwell. If you experience symptoms that may be related to COVID-19, don't panic! Call your physician or find a Health Center. </li>
                            <li class="list-group-item every_other">Refrain from smoking and other activities that weaken the lungs.</li>
                            <li class="list-group-item">Disinfect incoming packages (like Amazon boxes), household items, and articles of clothing as needed. See some recommendations <a href="https://www.healthline.com/health-news/germs-in-the-home-how-to-protect-yourself#Products-to-clean-with">HERE</a>.
                                <p></p>
                                <!--this line for spacing only-->
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer text-center">
                        <small>Guidelines from the CDC, WHO, Florida Department of Health, and other sources.</small>
                    </div>
                </div>
            </div>

            <!-- "Map" -->
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header text-center">
                        <h5>Find a Health Center Near You</h5>
                    </div>

                    <div class="card-body text-left">
                        <img src="images/usmap.png" alt="map" class="img-fluid card-img-top">

                        <p class="mt-2">Health centers are an important component of the national response to the pandemic. Call your nearest health center or health department to discover their availability for COVID-19 screening and testing.
                        </p>
                        <p class="">
                            Health centers can assess whether a patient needs further testing, which may be done over the phone or using telehealth. Additionally, health centers provide services regardless of patients’ ability to pay and charge for services on a sliding fee scale.</p>
                        <ul class="list-group">
                            <a href="https://findahealthcenter.hrsa.gov/" class="list-group-item btn btn-light" target="blank" role="button">Visit the HRSA</a>
                        </ul>


                    </div>

                    <div class="card-footer text-center">
                        <small>The HRSA is an official website of the U.S. Department of Health and Human Services.</small>
                    </div>
                </div>
            </div>
        </div>
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
    <footer class="footer">
        <div class="container text-center"> &copy; 2020 FunkyTech</div>
    </footer>

    <!--BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>