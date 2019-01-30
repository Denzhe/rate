<?php
/**
 * Sample layout.
 */
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;


//check if user is logged in or not then offer t


$checklogin=$data['CheckLogin'];



//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html>
<head>

    <!-- Site meta -->
    <meta charset="utf-8">

    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>


    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Template Information-->
    <meta name="lp-template-id" content="0222" />
    <meta name="lp-template-syntax-version" content="3.0" />
    <meta name="lp-template-version" content="1.19" />
    <meta name="lp-template-version-release-notes" content="Updated popup copy" />
    <meta name="lp-template-mobile-responsive" content="true" />
    <!-- Template Colors-->
    <meta name="lp-customizable-font" content="'Montserrat'; Titles Font" />
    <meta name="lp-customizable-font" content="'Open Sans'; Content Font" />
    <meta name="lp-customizable-color" content="#fffefe; Header Background" />
    <meta name="lp-customizable-color" content="#1a7abc; Banner Background" />
    <meta name="lp-customizable-color" content="#FFFFFE; Banner Title" />
    <meta name="lp-customizable-color" content="#feffff; Banner Text" />
    <meta name="lp-customizable-color" content="#fffeff; Button Text" />
    <meta name="lp-customizable-color" content="#A65600; Button Text Shadow" />
    <meta name="lp-customizable-color" content="#faab1f; Button Background" />
    <meta name="lp-customizable-color" content="#e59520; Button Shadow" />
    <meta name="lp-customizable-color" content="#ffcc01; Button Hover Background" />
    <meta name="lp-customizable-color" content="#faab1f; Button Hover Shadow" />
    <meta name="lp-customizable-color" content="#8CC1E7; Privacy Text" />
    <meta name="lp-customizable-color" content="#eff0f1; Benefits Background" />
    <meta name="lp-customizable-color" content="#1A78BC; Benefits Title" />
    <meta name="lp-customizable-color" content="#464646; Benefits Text" />
    <meta name="lp-customizable-color" content="#FEFFFE; Content Background" />
    <meta name="lp-customizable-color" content="#1A77BC; Content Title" />
    <meta name="lp-customizable-color" content="#333333; Content Text" />
    <meta name="lp-customizable-color" content="#1A7AC0; Content Text Bold" />
    <meta name="lp-customizable-color" content="#1978ba; Content Numbers Circle" />
    <meta name="lp-customizable-color" content="#fbf6f6; Content Numbers Text" />
    <meta name="lp-customizable-color" content="#23b777; Content Right Title" />
    <meta name="lp-customizable-color" content="#464647; Content Right Text" />
    <meta name="lp-customizable-color" content="#FAAB20; Content Right Bold" />
    <meta name="lp-customizable-color" content="#EFF1F1; Call to Action Background" />
    <meta name="lp-customizable-color" content="#1978b9; Call to Action Title" />
    <meta name="lp-customizable-color" content="#484747; Call to Action Text" />
    <meta name="lp-customizable-color" content="#1d7bbc; Call to Action Text Bold" />
    <meta name="lp-customizable-color" content="#1b7bbd; Bottom Background" />
    <meta name="lp-customizable-color" content="#0e588a; Footer Background" />
    <meta name="lp-customizable-color" content="#1e90de; Footer Text" />
    <meta name="lp-customizable-color" content="#1879bc; Footer Text Divider" />
    <meta name="lp-customizable-color" content="#1b8edc; Footer Copyright Text" />
















    <?php
    //hook for plugging in meta tags
    $hooks->run('meta');
    ?>
    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

    <!-- CSS -->
    <?php
    // Assets::css([
    // '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
    // Url::templatePath().'css/style.css',
    //  ]);/
    echo('  <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.10.3/css/bootstrap-tour-standalone.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.10.3/js/bootstrap-tour-standalone.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/screenfull.js/3.0.0/screenfull.js"></script>
 <link href=\'https://fonts.googleapis.com/css?family=Lato\' rel=\'stylesheet\' type=\'text/css\'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider-dots.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css">

 <script src="//cdn.ckeditor.com/4.5.9/full-all/ckeditor.js"></script>

 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.js"></script>
 <script type="text/javascript" src="minified/jquery.sceditor.bbcode.min.js"></script>
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
             <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!--  Scripts-->







   ');


    //hook for plugging in css
    // $hooks->run('css');
    ?>
    <?php

    echo(  '<script src='.Url::templatePath().'js/html5shiv.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/modernizer.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/functions.js'.'></script>');

    echo(  '<script src='.Url::templatePath().'js/jquery.highcharttable-min.js'.'></script>');

    echo(  '<script src='.Url::templatePath().'js/product-tour.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/simplePlayer.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/unslider.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/materialize.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/init.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/jquery.als-1.7.min.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/loadingoverlay.min.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/ratethat.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/d3.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/getmdl-select.min.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/material.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/nv.d3.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/widgets/employer-form/employer-form.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/widgets/line-chart/line-chart-nvd3.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/widgets/pie-chart/pie-chart-nvd3.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/widgets/table/table.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/widgets/todo/todo.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/readapi_automator.js'.'></script>');
    Assets::css([
        Url::templatePath().'css/product-tour.css',
        Url::templatePath().'css/materialize.css',
        Url::templatePath().'css/materialize.min.css',
        Url::templatePath().'css/style.css',

    ]);

    //hook for plugging in css
    $hooks->run('css');
    ?>

    <meta name="lp-popup-form-css" content="
    background-color: #ffffff;
    border-color: #ffffff;
    border-width: 1pt;
    border-style: solid;
    " />
    <meta name="lp-popup-form-title-css" content="
        font-family: &amp;quot;Lucida Grande&amp;quot;, &amp;quot;Lucida Sans Unicode&amp;quot;, sans-serif;
        font-size: 18pt;
        letter-spacing: 0em;
    " />
    <meta name="lp-popup-form-title-html" content="
        &amp;lt;div style=&amp;quot;text-align: center&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;Opt-In To
            Get This Entire Course FREE Plus A Special
            Worksheet To &amp;lt;em&amp;gt;Help You Assess The Strengths
            And Weaknesses&amp;lt;/em&amp;gt; Of Your Current Webinar
            Approach&amp;lt;/strong&amp;gt;
        &amp;lt;/div&amp;gt;
    " />
    <meta name="lp-popup-form-submit-css" content="
        background-color: #faab1f;
        border-color: #e59520;
        border-width: 1pt;
        border-style: solid;
        font-family: &amp;quot;Lucida Grande&amp;quot;, &amp;quot;Lucida Sans Unicode&amp;quot;, sans-serif;
        font-size: 22pt;
        letter-spacing: 0em;
    " />
    <meta name="lp-popup-form-submit-html" content="
        &amp;lt;div style=&amp;quot;text-align: center&amp;quot;&amp;gt;Free Instant Access
            &amp;nbsp;&amp;nbsp; &amp;raquo;&amp;lt;/div&amp;gt;
    " />
    <meta name="lp-popup-form-privacy-css" content="
        font-family: &amp;quot;Lucida Grande&amp;quot;, &amp;quot;Lucida Sans Unicode&amp;quot;, sans-serif;
        font-size: 12pt;
        letter-spacing: 0em;
    " />
    <meta name="lp-popup-form-privacy-html" content="
        &amp;lt;div style=&amp;quot;text-align: center&amp;quot;&amp;gt;
            &amp;lt;strong&amp;gt;Privacy Policy:&amp;lt;/strong&amp;gt; We hate SPAM
            and promise to keep your email address safe.
        &amp;lt;/div&amp;gt;
    " />


</head>

<div class="card large coverOverlay"  style="
    position: fixed;
    top: 0%;
    left: 0%;
    height: 164em;
    width: 100%;
    z-index: 99999999999;
    display: block;
">

    <img src="<?php echo(Url::templatePath()); ?>image/loader.gif"  style="position: absolute;top: 3%;left: 21%;">



</div>


</div>






<div class="everything" style="display: none;">
    <nav class="white" role="navigation">


        <a id="logo-container" href="http://rate.imagehut.co.za/" class="brand-logo left "> RateThat !<div class="logoImage"> </div></a>

        <?php


        if(!isset($_GET["admin"])) {
            echo('
        <ul  class="right hide-on-med-and-down"  style=" margin-top: 2%;">

       <!--         <li><a href="http://rate.imagehut.co.za/?ReviewsNav=1#">Reviews</a></li>-->
                <li><a href="http://rate.imagehut.co.za/?booksNav=1#">Books</a></li>
                <li><a href="http://rate.imagehut.co.za/?gamesNav=1#">Games</a></li>
                <li><a href="http://rate.imagehut.co.za/?MoviesNav=1#">Movies</a></li>

          ');
            if(isset($_SESSION['id'])){  echo('

                <li><a href="http://rate.imagehut.co.za/?profile=1#">Profile</a></li>'); }



            echo('<ul>');} ?>

    </nav>
    <?php


    if(!isset($_GET["admin"])) {
        echo('

<div class="sw">
    <form>
      <input type="search" name="everythingName" class="search" placeholder="Search RateThat" />
      <button class="go"><span class="entypo-search"></span></button>
      <a href="#"  title="GMRUI"></a>
    </form>
</div>



<br>


   ');} ?>

    <!--<div class="fixed-action-btn horizontal interactiveButton " style="bottom: 45px; right: 62px;">
        <a class="btn-floating btn-large red" style=" right: 62px;">
            <i class="large material-icons">spa</i>
        </a>
        <ul>
            <li><a id="writeReviewButton" class="btn-floating red ">



                    <i class="material-icons">mode_edit</i>




                </a>


            <li><a class="btn-floating yellow darken-1"><i class="material-icons" href="http://rate.imagehut.co.za/?booksNav=1#">book</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">theaters</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">casino</i></a></li>
        </ul>
    </div>-->


    <div class="fixed-action-btn horizontal profilefloat " style="bottom: 45px; right: 24px;">

    </div>


    <!--    <div class="fixed-action-btn horizontal  material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification notificationPosition" id="notification"
             data-badge="23">
            <a class="btn-floating btn-large red notificationIconDisplay" style="  position: absolute;top: -83%;left: -37%;">
                <i class="sideBarToggleButton large material-icons  profileButton">notifications_none</i>
            </a>

        </div>-->

    <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right mdl-shadow--2dp notifications-dropdown"
        for="notification">
        <li class="mdl-list__item">
            You have 23 new notifications!
        </li>
        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                    <span class="mdl-list__item-primary-content">
                        <span class="mdl-list__item-avatar background-color--primary">
                            <i class="material-icons">plus_one</i>
                        </span>
                        <span>You have 3 new orders.</span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <span class="label">just now</span>
                    </span>
        </li>
        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                    <span class="mdl-list__item-primary-content">
                        <span class="mdl-list__item-avatar background-color--secondary">
                            <i class="material-icons">error_outline</i>
                        </span>
                      <span>Database error</span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <span class="label">1 min</span>
                    </span>
        </li>
        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                    <span class="mdl-list__item-primary-content">
                        <span class="mdl-list__item-avatar background-color--primary">
                            <i class="material-icons">new_releases</i>
                        </span>
                      <span>The Death Star is built!</span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <span class="label">2 hours</span>
                    </span>
        </li>
        <li class="mdl-menu__item mdl-list__item list__item--border-top">
                    <span class="mdl-list__item-primary-content">
                        <span class="mdl-list__item-avatar background-color--primary">
                            <i class="material-icons">mail_outline</i>
                        </span>
                      <span>You have 4 new mails.</span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <span class="label">5 days</span>
                    </span>
        </li>
        <li class="mdl-list__item list__item--border-top">
            <button href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ALL NOTIFICATIONS</button>
        </li>
    </ul>











































    <body style="background: rgba(0, 0, 0, 0.07); "  >


    <div class="fixed-action-btn horizontal profilefloat " style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
            <i class="sideBarToggleButton large material-icons  profileButton">more_horiz</i>
        </a>
    </div>




    <form id="write"  action="#" method="get">
        <input type="hidden" name="writing" value="1">

    </form>

    <div class="card small notificationCard closeNotification">

        <img src="<?php echo(''.Url::templatePath().'image/notification.png');?>" style="width:50px;"  >
        <div class="notification  notificationText"></div>
    </div>