<?php @session_start(); ?>
<!DOCTYPE  html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Summer Work Programs | Besor Associates">
    <?php if(@$viewport){ ?>
    <meta name="viewport" content="width=1024, initial-scale=1, maximum-scale=1">
    <?php } ?>

    <link href="assets/images/favicon/favicon.ico" rel="icon">
    <title>Summer Work Programs | Besor Associates</title>

    <!-- CSS -->
    <!--    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>-->
    <link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen"/>
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css"/>
    <![endif]-->
    <!-- ENDS CSS -->

    <!-- GOOGLE FONTS
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->

    <!-- JS -->

    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!--    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Isotope -->
    <script src="js/jquery.isotope.min.js"></script>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if IE 6]>
    <script type="text/javascript" src="js/DD_belatedPNG.js"></script>
    <script>
        /* EXAMPLE */
        //DD_belatedPNG.fix('*');
    </script>
    <![endif]-->

    <!-- ENDS JS -->


    <!-- Nivo slider -->
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen"/>
    <script src="js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
    <!-- ENDS Nivo slider -->

    <!-- tabs -->
    <link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="js/tabs.js"></script>
    <!-- ENDS tabs -->

    <!-- prettyPhoto -->
    <script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
    <link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen"/>
    <!-- ENDS prettyPhoto -->

    <!-- superfish -->
    <link rel="stylesheet" media="screen" href="css/superfish.css"/>

    <script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
    <script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
    <script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
    <!-- ENDS superfish -->

    <!-- poshytip -->
    <link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css"/>
    <link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css"/>
    <script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
    <!-- ENDS poshytip -->


    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- ENDS Fancybox -->

    <link href="js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="js/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>


    <script type="text/css">
        .datepicker >div:first-of-type{
            display: block ;
        }
    </script>
    <?php if ( @$form_wizard == 1 ): ?>

        <script type="text/javascript" src="js/jquery.smartWizard.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/components.min.css" rel="stylesheet" type="text/css">
    <link href="js/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/smart_wizard.css" rel="stylesheet" type="text/css">

    <?php else: ?>

    <link href="css/form.css" rel="stylesheet" type="text/css">

    <?php endif; ?>
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <style>
        .swal-overlay{
            z-index: 100000;
        }
        .datepicker >div:first-of-type{
            display: block;
        }
    </style>


    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700%7cSource+Sans+Pro:300,300i,400,400i,600,600i,700">

    <link rel="stylesheet" href="assets/css/libraries.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body class="wrapper">

<!-- HEADER -->
<header id="header6" class="header header-6 header-transparent">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="height: auto">
                <img src="assets/images/logo/logo-light.png" class="logo-light" alt="logo">
                <img src="assets/images/logo/logo-dark.png" class="logo-dark" alt="logo">
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav mr-30 ml-auto">
                    <li class="nav__item with-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Home</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item"><a href="index.php" class="nav__item-link">Welcome</a></li>
                            <!-- /.nav-item -->
                            <li class="nav__item"><a href="faqs.php" class="nav__item-link">FAQ</a></li>
                            <!-- /.nav-item -->
                            <li class="nav__item"><a href="privacy.php" class="nav__item-link">Privacy</a></li>
                            <!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item with-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Check Status</a>
                        <ul class="dropdown-menu">
                            <?php if ( @$_SESSION['user_id'] ) { ?>
                                <li class="nav__item"><a href="profile.php" class="nav__item-link">Access Profile</a>
                            <?php } else { ?>
                            <li class="nav__item"><a href="login.php" class="nav__item-link">Access Profile</a></li>
                            <?php } ?>
                            <!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item with-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Register</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item"><a href="user-register.php" class="nav__item-link">Participate Now</a></li>
                            <!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item with-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Program</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item"><a href="info.php" class="nav__item-link">Information</a></li>
                            <!-- /.nav-item -->
                            <li class="nav__item"><a href="terms.php" class="nav__item-link">Terms & Conditions</a></li>
                            <!-- /.nav-item -->
                            <li class="nav__item"><a href="alumni.php" class="nav__item-link">Alumni</a></li>
                            <!-- /.nav-item -->
                        </ul><!-- /.dropdown-menu -->
                    </li><!-- /.nav-item -->
                    <li class="nav__item with-dropdown">
                        <a href="" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Contact</a>
                        <ul class="dropdown-menu">
                            <li class="nav__item"><a href="contact.php" class="nav__item-link">Your Enquiry</a></li>
                        </ul>
                    </li><!-- /.nav-item -->

                    <?php if ( @$_SESSION['user_id'] ) { ?>
                        <li class="nav__item">
                            <a href="logout.php"  class="nav__item-link">Logout</a>
                        </li>
                    <?php } ?>

                </ul><!-- /.dropdown-menu -->
                </li><!-- /.nav-item -->
            </div>
        </div><!--  /.container  -->
    </nav>
    <!-- /.nav-item -->
</header><!-- /.Header6 -->
<!-- ENDS HEADER -->


<?php if ( @$show_slider == true ){ ?>

    <!-- Slider -->
    <!-- ============================
       Slider
   ============================== -->
    <section id="slider6" class="slider slider-6">
        <div class="carousel owl-carousel carousel-arrows carousel-dots" data-slide="1" data-slide-md="1" data-slide-sm="1"
             data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="600"
             data-transition="fade" data-animate-out="fadeOut" data-animate-in="fadeIn">
            <div class="slide-item align-v bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/1.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">MEET...<br> New Friends!</h2>
                                <a href="user-register.php" class="btn btn__white btn__hover2">Get Started</a>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/2.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">ACHIEVE... <br> New Goals!</h2>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/3.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">TRAVEL...<br> And Gain Work Experience!</h2>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/4.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">WORK... <br> And EARN!</h2>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/5.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">EXPLORE... <br> Opportunities For The Future!</h2>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/6.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">NETWORK...<br> With Other International Students!</h2>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/7.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">EXPERIENCE...<br> The World Beyond The Classroom!</h2>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
            <div class="slide-item align-v-h bg-overlay bg-overlay-2">
                <div class="bg-img"><img src="assets/images/slider/8.jpg" alt="slide img"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="slide__content">
                                <span class="slide__subtitle">Summer Work USA</span>
                                <h2 class="slide__title">DEVELOP... <br> Your Global Capacity!</h2>
                                <a href="contact.php" class="btn btn__white btn__hover2">Contact Us</a>
                            </div><!-- /.slide-content -->
                        </div><!-- /.col-lg-9 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.slide-item -->
        </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ENDS Slider -->

<?php } else{
    $bg_image = '5.jpg';
    if(isset($page_titles_image)){
        $bg_image = $page_titles_image;
    }
    ?>

    <section id="page-title" class="page-title page-title-layout16 bg-overlay bg-overlay-2 text-center" style="background-image: url(&quot;assets/images/page-titles/<?php echo $bg_image; ?>&quot); background-size: cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="pagetitle__heading"><?php echo @$page_title; ?></h1>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
<?php } ?>
<!-- MAIN -->


<script type="text/javascript">
    $(".sf-menu").ready(function () {

        var curLink = $('.sf-menu li a[href*="<?php echo substr( $_SERVER["SCRIPT_NAME"], strrpos( $_SERVER["SCRIPT_NAME"], "/" ) + 1 )?>"]');
        $(curLink).parent().addClass("current-menu-item");
    });
</script>



<div id="main">
    <!-- wrapper-main -->
    <div class="wrapper">

        <!-- headline -->
        <div class="clear"></div>
        <br/>