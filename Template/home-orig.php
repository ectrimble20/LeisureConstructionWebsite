<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description"
          content="Leisure Construction is a Residential & Commercial Construction company building custom luxury homes and commercial properties. Call us today (727) 242-5121">
    <meta name="keywords"
          content="Custom home builder Tampa, Luxury home builder Tampa, Custom home, General contractor, Home builder, Residential construction Tampa, Green construction, Commercial construction Tampa, Home renovations Tampa, Certified general contractor, Leisure Construction">
    <title>Residential and Commercial Construction Tampa | Leisure Construction | Leisure Construction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Web/css/bootstrap.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="Web/css/company-support.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body id="mainpage">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><img src="Web/img/logo-200x54.png"></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
                <li><a href="#projects"><span class="glyphicon glyphicon glyphicon-eye-open"></span> PROJECTS</a></li>
                <li><a href="#about"><span class="glyphicon glyphicon-info-sign"></span> ABOUT</a></li>
                <li><a href="#contact"><span class="glyphicon glyphicon glyphicon-phone"></span> CONTACT</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container bg-grey" id="home">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">&nbsp;</div>
    </div>
    <div id="carousel-main" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?=$gallery_main_screen_content?>
        </div>
    </div>

</div>
<!-- Container (Portfolio Section) -->
<div id="projects" class="container text-center bg-grey">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <h2>Projects</h2><br>

    <div class="row">
        <div class="col-lg-6"><h3>Residential</h3></div>
        <div class="col-lg-6"><h3>Commercial</h3></div>
    </div>
    <div class="row">
        <!-- TODO replace main images with commercial and gallery images -->
        <!-- TODO create working gallery pop-outs or new pages -->
        <div class="col-lg-6"><img src="Web/img/commercial-1.jpg" width="400px" height="300px" id="open-gallery-residential"></div>
        <div class="col-lg-6"><img src="Web/img/commercial-2.jpg" width="400px" height="300px" id="open-gallery-commercial"></div>
    </div>
    <br><br>

    <h2>What our customers say</h2>

    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?=$endorser_content?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
</div>

<!-- Container (About Section) -->
<div id="about" class="container bg-grey ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <h2>About Leisure Construction</h2><br>

            <div class="page-header"><h3 class="text-danger"><?=$about_header?></h3></div>
            <p class="lead"><?=$about_lead_in?></p>
            <?=$about_body?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4"><br><br><br><br>
            <span class="glyphicon glyphicon-send logo"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container bg-grey ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <h2 class="text-center">CONTACT</h2>

    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>

            <p><span class="glyphicon glyphicon-map-marker"></span> 1301 Seminole Blvd, Suite 115<br /> Largo, FL 33770</p>

            <p><span class="glyphicon glyphicon-phone"></span> 727-242-5121</p>

            <p><span class="glyphicon glyphicon-envelope"></span> info@leisureconstruction.com</p>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
</div>
<div class="container bg-grey ">
    <h2 class="text-center">Find Us</h2>

    <div id="googleMap" style="height:400px;width:100%;"></div>
</div>

<!-- spacer -->
<div class="container bg-grey">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">&nbsp;</div>
    </div>


</div>

<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <span><a href="https://twitter.com/LeisureConst99"><img src="Web/img/twitter-48x48.png"
                                                                        class="vcenter"></a></span>
                <span><a href="https://www.facebook.com/LeisureConstructionInc "><img
                            src="Web/img/facebook-48x48.png" class="vcenter"></a></span>
                <span><a href="https://www.linkedin.com/company/leisure-construction-inc-"><img
                            src="Web/img/linkedin-48x48.png" class="vcenter"></a></span>
                <span><a href="http://woundedwarriorproject.org"><img src="Web/img/wwp-485x60.png"
                                                                      class="vcenter"></a></span>
            </div>
            <div class="col-sm-3">
            <span style="color: #000000;">
                Established 2001<br/>
                &copy;Copyright 2013 Leisure Construction<br/>
                License Number: CGC1504092
            </span>
            </div>
        </div>
    </div>
</nav>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    var myCenter = new google.maps.LatLng(27.903932, -82.7865000);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 12,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#mainpage']").on('click', function (event) {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        });

        // Slide in elements on scroll
        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
</body>
</html>
