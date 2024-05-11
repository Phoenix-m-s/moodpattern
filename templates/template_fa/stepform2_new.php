<?php
global $company_info;
?>

<!DOCTYPE html>
<html lang="fa-IR">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <meta name="description" content="Your Mood Pattern, تحلیل آنچه که می‌خواهیم و نمی‌توانیم">


    <meta name="author" content="Ansonika">
    <title>گراف حسی</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/icon.png" >

    <!-- GOOGLE WEB FONT -->
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/farsi-font.css" rel="stylesheet">



    <!-- BASE CSS -->
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/bootstrap-slider.min.css">
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets//css/responsive.css" rel="stylesheet">
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/menu.css" rel="stylesheet">
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/animate.min.css" rel="stylesheet">
    <!--<link href="<?php /*echo RELA_DIR . 'templates/' . CURRENT_SKIN; */?>/assets/css/jquery.rangerover.min.css" rel="stylesheet">-->
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/skins/square/grey.css" rel="stylesheet">
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/font-awesome.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="<?php /*echo RELA_DIR . 'templates/' . CURRENT_SKIN; */?>/assets/css/jquery.steps.css">-->



    <!-- Optional SmartWizard theme -->
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/smart_wizard_theme_circles.min.css" rel="stylesheet" type="text/css" />



    <script src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/js/jquery-3.2.1.min.js"></script>
 


   <!-- <script src="<?php /*echo RELA_DIR . 'templates/' . CURRENT_SKIN; */?>/assets/js/jquery.steps.js"></script>-->
<!--    <script src="<?php /*echo RELA_DIR . 'templates/' . CURRENT_SKIN; */?>/assets/js/jquery.rangerover.min.js"></script>
-->    <!-- Jquery-->
    <script src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/js/modernizr.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfRc_QUAAAAACOYARYJV5IMe-e70WwKVOO7-5iL"></script>


    <!--js step form-->

    <script src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/js/jquery.smartWizard.min.js"></script>



</head>
<div></div>
<!-- <div class="overWhite"> -->
<body dir="rtl">
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfRc_QUAAAAACOYARYJV5IMe-e70WwKVOO7-5iL', {action: 'homepage'}).then(function(token) {
            ...
        });
    });
</script>    
<div id="preloader">
    <div data-loader="circle-side"></div>
</div><!-- /Preload -->

<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div><!-- /loader_form -->

<!-- header that contains logo and socials icon and navigation menus -->
<body dir="rtl">
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div id="logo_home">
                    <h1><a href="#"></a></h1>
                </div>
            </div>
            <div class="col-9">
                <div id="social"><!--
                    <ul>
                        <li><a href="#0"><i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-google"></i></a></li>
                        <li><a href="#0"><i class="icon-linkedin"></i></a></li>
                    </ul>-->
                </div>
                <!-- /social -->
                <nav >
                    <ul class="cd-primary-nav">
                        <ul class="cd-primary-nav">
                            <li><img src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/logo.png" alt=""></li>
                            <li><a href="<?php echo RELA_DIR . 'topic/?action=add' ?>" class="animated_link"> <i class="fa fa-save"></i> فرم ثبت موضوع </a></li>
                            <li><a href="<?php echo RELA_DIR . 'topic/' ?>" class="animated_link"> <i class="fa fa-list"></i>  لیست گراف‌های حسی </a></li>
                            <?php if($_SESSION['user_privileges']==1) { ?>
                                <li><a href="<?php echo RELA_DIR . 'rapidQuestion/' ?>" class="animated_link"> <i class="fa fa-list"></i> گراف حسی به روش سریع </a></li>
                            <?php } ?>
                            <?php if($_SESSION['user_privileges']==1) { ?>
                                <li><a href="<?php echo RELA_DIR . 'topicRepAdmin/' ?>" class="animated_link"> <i class="fa fa-list"></i> گزارش زمان ثبت موضوعات </a></li>
                            <?php } ?>
                            <?php if($_SESSION['user_privileges']==1 || $_SESSION['user_privileges']==3) { ?>
                                <li><a href="<?php echo RELA_DIR . 'motivation/' ?>" class="animated_link"> <i class="fa fa-list"></i>عبارات انگیزشی</a></li>
                            <?php } ?>                            
                            <li><a href="<?php echo RELA_DIR . 'topic/?action=help' ?>" class="animated_link"> <i class="fa fa-info-circle"></i> فلسفه گراف </a></li>
                            <li><a href="<?php echo RELA_DIR . 'index/logout' ?>" class="animated_link"><i class="fa fa-sign-out"></i>خروج</a></li>
                        </ul>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- container -->
</header>
<!-- /end of header -->
<section class="mainContainer">
