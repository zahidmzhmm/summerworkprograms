<?php @session_start(); ?>
<!DOCTYPE  html>
<html>
<head>
    <meta charset="utf-8">
    <title>Summer Work Programs</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen"/>
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css"/>
    <![endif]-->
    <!-- ENDS CSS -->

    <!-- GOOGLE FONTS
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
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
    <link rel="stylesheet" href="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <!-- ENDS Fancybox -->

    <link href="js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="js/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>

	<?php if ( @$form_wizard == 1 ): ?>

        <script type="text/javascript" src="js/jquery.smartWizard.js"></script>
            <link href="js/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="css/components.min.css" rel="stylesheet" type="text/css">
        <link href="css/smart_wizard.css" rel="stylesheet" type="text/css">

	<?php else: ?>

    <link href="css/form.css" rel="stylesheet" type="text/css">

	<?php endif; ?>
    <link href="css/common.css" rel="stylesheet" type="text/css">
<style>
    .swal-overlay{
        z-index: 100000;
    }
</style>

</head>

<body class="home">

<!-- HEADER -->
<div id="header">
    <!-- wrapper-header -->
    <div class="wrapper">
        <a href="index.php"><img id="logo" src="img/logo.png" alt="SWT"/></a>

    </div>
    <!-- ENDS search -->
</div>
<!-- ENDS wrapper-header -->
<!-- ENDS HEADER -->


<!-- Menu -->
<div id="menu">


    <!-- ENDS menu-holder -->
    <div id="menu-holder">
        <!-- wrapper-menu -->
        <div class="wrapper">
            <!-- Navigation -->
            <ul id="nav" class="sf-menu">
                <li><a href="index.php">Home<span class="subheader">Welcome</span></a></li>
                <li><?php if ( @$_SESSION['user_id'] ) { ?><a href="profile.php">Profile<span class="subheader">Access your Profile</span></a><?php } else { ?>
                        <a href="login.php">Check Status<span class="subheader">Access your Profile</span></a><?php } ?>
                </li>
				<?php if ( ! @$_SESSION['user_id'] ) { ?>
                    <li><a href="user-register.php">Register<span class="subheader">Participate Now</span></a>
                    </li><?php } ?>
                <li><a href="#">Program<span class="subheader">Important Information</span></a>
                    <ul>
                        <li><a href="info.php"><span>Program Information</span></a></li>
                        <li><a href="terms.php"><span>Terms and Conditions</span></a></li>

                    </ul>
                </li>
                <li><a href="contact.php">Contact<span class="subheader">Got questions?</span></a></li>
				<?php if ( @$_SESSION['user_id'] ) { ?>
                    <li><a href="logout.php">Logout<span class="subheader">Sign Out</span></a></li><?php } ?>
            </ul>
            <!-- Navigation -->
        </div>
        <!-- wrapper-menu -->
    </div>
    <!-- ENDS menu-holder -->
</div>
<!-- ENDS Menu -->

<script type="text/javascript">
    $(".sf-menu").ready(function () {

        var curLink = $('.sf-menu li a[href*="<?php echo substr( $_SERVER["SCRIPT_NAME"], strrpos( $_SERVER["SCRIPT_NAME"], "/" ) + 1 )?>"]');
        $(curLink).parent().addClass("current-menu-item");
    });
</script>
<?php if ( @$show_slider ): ?>

    <!-- Slider -->
    <div id="slider-block">
        <div id="slider-holder">
            <div id="slider">
				<?php if( @$page=="info" ){ ?>
<!--                    <img src="images/021.jpg" title="MEET" alt="" />-->
                    <img src="images/022.jpg" title="TRAVEL" alt="" />
                    <img src="images/023.jpg" title="WORK" alt="" />
                    <img src="images/024.jpg" title="NETWORK" alt="" />
                    <img src="images/025.jpg" title="EXPLORE" alt="" />
                    <img src="images/026.jpg" title="EXPERIENCE" alt="" />
                    <img src="images/027.jpg" title="DEVELOP" alt="" />
                    <img src="images/028.jpg" title="ACQUIRE" alt="" />
                    <img src="images/029.jpg" title="ADVANCE" alt="" />
                    <img src="images/0290.jpg" title="ACHIEVE" alt="" />
                    <img src="images/0291.jpg" title="PROGRESS" alt="" />
				<?php } else if(@$page=="terms") {?>
                    <img src="images/031.jpg" title="MEET" alt="" />
                    <img src="images/032.jpg" title="TRAVEL" alt="" />
                    <img src="images/033.jpg" title="WORK" alt="" />
                    <img src="images/034.jpg" title="NETWORK" alt="" />
                    <img src="images/035.jpg" title="EXPLORE" alt="" />
                    <img src="images/036.jpg" title="EXPERIENCE" alt="" />
                    <img src="images/037.jpg" title="DEVELOP" alt="" />
                    <img src="images/038.jpg" title="ACQUIRE" alt="" />
                    <img src="images/039.jpg" title="ADVANCE" alt="" />
                    <img src="images/0390.jpg" title="ACHIEVE" alt="" />
                    <img src="images/0391.jpg" title="PROGRESS" alt="" />
				<?php } else { ?>
                    <img src="images/01.jpg" title="MEET" alt="" />
                    <img src="images/02.jpg" title="TRAVEL" alt="" />
                    <img src="images/03.jpg" title="WORK" alt="" />
                    <img src="images/04.jpg" title="NETWORK" alt="" />
                    <img src="images/05.jpg" title="EXPLORE" alt="" />
                    <img src="images/06.jpg" title="EXPERIENCE" alt="" />
                    <img src="images/07.jpg" title="DEVELOP" alt="" />
                    <img src="images/08.jpg" title="ACQUIRE" alt="" />
                    <img src="images/09.jpg" title="ADVANCE" alt="" />
                    <img src="images/010.jpg" title="ACHIEVE" alt="" />
				<?php }	?>
            </div>
        </div>
    </div>

    <!-- ENDS Slider -->

<?php endif; ?>

<!-- MAIN -->
<div id="main">
    <!-- wrapper-main -->
    <div class="wrapper">

        <!-- headline -->
        <div class="clear"></div>
        <br/>