<?php
/**
 * Sample layout.
 */
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;


//check if user is logged in or not then offer t


$checklogin=$data['CheckLogin'];


echo($checklogin);
//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

    <!-- Site meta -->
    <meta charset="utf-8">

    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
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
    echo(' 
 
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/screenfull.js/3.0.0/screenfull.js"></script>
 <link href=\'https://fonts.googleapis.com/css?family=Lato\' rel=\'stylesheet\' type=\'text/css\'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider-dots.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css">

 <script src="//cdn.ckeditor.com/4.5.9/full-all/ckeditor.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
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

    echo(  '<script src='.Url::templatePath().'js/simplePlayer.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/unslider.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/materialize.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/init.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/jquery.als-1.7.min.js'.'></script>');
    echo(  '<script src='.Url::templatePath().'js/loadingoverlay.min.js'.'></script>');

    Assets::css([

        Url::templatePath().'css/materialize.css',
        Url::templatePath().'css/materialize.min.css',
        Url::templatePath().'css/style.css',
    ]);

    //hook for plugging in css
    $hooks->run('css');
    ?>
</head>

<script type="text/javascript">
    $(document).ready(function() {

        $(function() {
            $(document).on('click', 'section', function() {
                $(this).load('/echo/json', function() {
                    $('section').html('Page is loaded, click to start loading again.');
                    loadingScreen(2000);
                });
            });

            function loadingScreen(responseTime) {
                var html = '<div id="load"></div>';
                $('section').append(html);
                setTimeout(function() {
                    $('#load').remove();
                }, responseTime);
            }
        });
        $(document).ready(function() {
            $("#password2").keyup(validate);
        });


        function validate() {
            var password1 = $("#password1").val();
            var password2 = $("#password2").val();



            if(password1 == password2) {
                $("#validate-status").text("password macth");
            }
            else {
                $("#validate-status").text("invalid");
            }

        }


        $(".submitReviewButton").click(function(){
            $("#written").submit();


        });


        $(".closebuttonConfirmation").click(function(){


            $(".messsageboxReview").toggle();
            $(".coverConfrimationMessageReview").toggle();


        });


        $(".termsbutton").click(function () {
            $(".termsandConditions").toggle("slow");
            $(".RegisterOverlay").toggle("slow");
        });
        $(".termsandConditionsButton").click(function () {
            $(".termsandConditions").toggle("slow");
            $(".RegisterOverlay").toggle("slow");
        });


        $(".revocoverPasswordButton").click(function () {
            $(".changePasswordDIV").toggle("slow");

        });



        const target = $('.readingdiv')[0];


        $(".fullscreen").click(function(){
            if (screenfull.enabled) {
                screenfull.request(target);
            }


        });

        $("#setingsButton").click(function(){
            $("#setting").submit();


        });


        $("#writeReviewButton").click(function(){
            $("#write").submit();


        });

        $('.closebutton').click(function() {
            $('.loginError').toggle();
            $('.messageDiv').toggle();

        });


        $(".everything").fadeIn("slow");
        $(".coverOverlay").delay(5000).fadeOut(1000);
        $('#play').click(function() {
            $(this).toggle();
        });
        $('input#input_text, textarea#textarea1').characterCounter();

        $("button").click(function() {
            $('html,body').animate({
                    scrollTop: $(".second").offset().top},
                'slow');
        });

        $(".youtube").each(function() {
            // Based on the YouTube ID, we can easily find the thumbnail image
            $(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');

            // Overlay the Play icon to make it look like a video player
            $(this).append($('<div/>', {'class': 'play'}));

            $(document).delegate('#'+this.id, 'click', function() {
                // Create an iFrame with autoplay set to true
                var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
                if ($(this).data('params')) iframe_url+='&'+$(this).data('params');

                // The height and width of the iFrame should be the same as parent
                var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })

                // Replace the YouTube thumbnail with YouTube HTML5 Player
                $(this).replaceWith(iframe);
            });
        });

        $("#video").simplePlayer({

            autoplay: 1,
            autohide: 1,
            border: 0,
            wmode: 'opaque',
            enablejsapi: 1,
            modestbranding: 1,
            version: 3,
            hl: 'en_US',
            rel: 0,
            showinfo: 0,
            hd: 1,
            iv_load_policy: 3 // add origin

        });


        $(".logindisplay").click(function () {
            $(".login").toggle("slow");
            $(".login").show();
        });



        $(".registerDiplay").click(function () {
            $(".register").toggle("slow");

        });


        $(".sideBarToggleButton").click(function () {
            $(".sidebarPosition").toggle("slow");


        });

        $("#input2").click(function () {



            var text1=document.getElementById("sample5").value;
            var text2=document.getElementById("sample6").value;


            if(text1!=text2)
            {

                $("#PasswordErrorMessage").show();

            }




        });




        // code for the menu slider


        $('.my-slider').unslider({


            arrows: false
        });




        $('.my-slider2').unslider({

            autoplay: true,
            delay:20000,


        });

        $("#rateYo").rateYo({
            starWidth: "100px",
            rating    : 0,
            spacing   : "5px",
            multiColor: {

                "startColor": "#FF0000", //RED
                "endColor"  : "#FF0000"  //GREEN
            }

        });
        $("#rateYo").rateYo()
            .on("rateyo.set", function (e, data) {

                alert("The rating is set to " + data.rating + "!");
                document.getElementById("rateyoid").value=data.rating;
            });



        $("#my-als-list").als();
        $("#demo1").als({
            visible_items: 3,
            scrolling_items: 2,
            orientation: "horizontal",
            circular: "no",
            autoscroll: "no"
        });
        // end of slider coder

        $(".WriteReviewButton").click(function (){

            ShowPlayCards();
            $(".unslider").toggle("slow");

        });
        $(".movieButton").click(function () {
            RemovePlayCards();
            ShowMovieSearch();
            window.alert('this is working');
        });

        $(".bookButton").click(function (){

            RemovePlayCards();
            ShowBookSearch();
        });

        $(".gameButton").click(function (){

            RemovePlayCards();
            ShowGameSearch();
        });

        function RemovePlayCards(){

            $(".displayRewviewHeader").remove();
            //$(".GameCard").hide();
            $(".GameCard").remove();
            //    $(".BookCard").hide();
            $(".BookCard").remove();
            //    $(".movieCard").hide();
            $(".movieCard").remove();


        }

        function ShowPlayCards() {
            $(".GameCard").toggle("slow");
            //    $(".BookCard").hide();
            $(".BookCard").toggle("slow");
            //    $(".movieCard").hide();
            $(".movieCard").toggle("slow");

        }



        function ShowMovieSearch(){


            $(".MovieSearchWrapper").show();
        }

        function ShowGameSearch(){

            $(".GameSearchWrapper").show();
        }

        function ShowBookSearch(){

            $(".BookSearchWrapper").show();

        }

    });




    $(document).ready(function() {
        var overlay = $('.sidebar-overlay');

        $('.sidebar-toggle').on('click', function() {
            var sidebar = $('#sidebar');
            sidebar.toggleClass('open');
            if ((sidebar.hasClass('sidebar-fixed-left') || sidebar.hasClass('sidebar-fixed-right')) && sidebar.hasClass('open')) {
                overlay.addClass('active');
            } else {
                overlay.removeClass('active');
            }
        });

        overlay.on('click', function() {
            $(this).removeClass('active');
            $('#sidebar').removeClass('open');
        });

    });

    // Sidebar constructor
    //
    // -------------------
    $(document).ready(function() {

        var sidebar = $('#sidebar');
        var sidebarHeader = $('#sidebar .sidebar-header');
        var sidebarImg = sidebarHeader.css('background-image');
        var toggleButtons = $('.sidebar-toggle');

        // Hide toggle buttons on default position
        toggleButtons.css('display', 'none');
        $('body').css('display', 'table');


        // Sidebar position
        $('#sidebar-position').change(function() {
            var value = $( this ).val();
            sidebar.removeClass('sidebar-fixed-left sidebar-fixed-right sidebar-stacked').addClass(value).addClass('open');
            if (value == 'sidebar-fixed-left' || value == 'sidebar-fixed-right') {
                $('.sidebar-overlay').addClass('active');
            }
            // Show toggle buttons
            if (value != '') {
                toggleButtons.css('display', 'initial');
                $('body').css('display', 'initial');
            } else {
                // Hide toggle buttons
                toggleButtons.css('display', 'none');
                $('body').css('display', 'table');
            }
        });

        // Sidebar theme
        $('#sidebar-theme').change(function() {
            var value = $( this ).val();
            sidebar.removeClass('sidebar-default sidebar-inverse sidebar-colored sidebar-colored-inverse').addClass(value)
        });

        // Header cover
        $('#sidebar-header').change(function() {
            var value = $(this).val();

            $('.sidebar-header').removeClass('header-cover').addClass(value);

            if (value == 'header-cover') {
                sidebarHeader.css('background-image', sidebarImg)
            } else {
                sidebarHeader.css('background-image', '')
            }
        });
    });



    (function($) {
        var dropdown = $('.dropdown');

        // Add slidedown animation to dropdown
        dropdown.on('show.bs.dropdown', function(e){
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
        });

        // Add slideup animation to dropdown
        dropdown.on('hide.bs.dropdown', function(e){
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
        });
    })(jQuery);



    (function(removeClass) {

        jQuery.fn.removeClass = function( value ) {
            if ( value && typeof value.test === "function" ) {
                for ( var i = 0, l = this.length; i < l; i++ ) {
                    var elem = this[i];
                    if ( elem.nodeType === 1 && elem.className ) {
                        var classNames = elem.className.split( /\s+/ );

                        for ( var n = classNames.length; n--; ) {
                            if ( value.test(classNames[n]) ) {
                                classNames.splice(n, 1);
                            }
                        }
                        elem.className = jQuery.trim( classNames.join(" ") );
                    }
                }
            } else {
                removeClass.call(this, value);
            }
            return this;
        }

    })(jQuery.fn.removeClass);
</script>

<div class="card large coverOverlay"  style="
    position: absolute;

    height: 100%;
    width: 100%;
    z-index: 9999;
">

    <img src="<?php echo(Url::templatePath()); ?>image/loader.gif"  style="position: absolute;top: 3%;left: 21%;">



</div>


</div>
<div class="everything" style="display: none;">
    <nav class="white" role="navigation">


        <a id="logo-container" href="" class="brand-logo left " style="margin-left: 12%;"> RateThat !<div class="logoImage"> </div></a>


        <ul id="nav-mobile" class="right hide-on-med-and-down button-collapse"  style=" margin-top: 2%;">





        </ul>

    </nav>
    <div class="navBarButtonsCusttom profileNavBar"  >
        <form action="#" method="get"  >
            <input type="hidden" name="profile" value="1">
            <button class="  waves-effect waves-light white btn " type="submit" style="color: black;">Profile</button>
        </form>
    </div>
    <div class="navBarButtonsCusttom  booksNavbar"  >
        <form action="#" method="get"  >
            <input type="hidden" name="booksNav" value="1">
            <button class="  waves-effect waves-light white btn " type="submit" style="color: black;">Books</button>
        </form>
    </div>
    <div class="navBarButtonsCusttom  gamesNavBar"  >
        <form action="#" method="get"  >
            <input type="hidden" name="gamesNav" value="1">
            <button class="  waves-effect waves-light white btn " type="submit" style="color: black;">Gams</button>
        </form>
    </div>
    <div class="navBarButtonsCusttom  reviewNavBarText"  >
        <form action="#" method="get"  >
            <input type="hidden" name="ReviewsNav" value="1">
            <button class="  waves-effect waves-light white btn " type="submit" style="color: black;">Reviews</button>
        </form>
    </div>
    <div class="navBarButtonsCusttom moviesNavBar"  >
        <form action="#" method="get"  >
            <input type="hidden" name="MoviesNav" value="1">
            <button class="  waves-effect waves-light white btn " type="submit" style="color: black;">movies</button>
        </form>
    </div>
    <div class="fixed-action-btn horizontal interactiveButton " style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">spa</i>
        </a>
        <ul>
            <li><a id="writeReviewButton" class="btn-floating red ">



                    <i class="material-icons">mode_edit</i>




                </a>


            <li><a class="btn-floating yellow darken-1"><i class="material-icons">book</i></a></li>
            <li><a class="btn-floating green"><i class="material-icons">theaters</i></a></li>
            <li><a class="btn-floating blue"><i class="material-icons">casino</i></a></li>
        </ul>
    </div>
    <?php if($checklogin==1) {echo('
<div class="fixed-action-btn horizontal profilefloat " style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large grey">
        <i class="large material-icons sideBarToggleButton profileButton">person</i>
    </a>
    <ul>
        <li><a class="btn-floating grey ">



                <i class="material-icons grey  prof">person</i>




            </a>



        <li><a class="btn-floating green "><i class="material-icons ">check</i></a></li>
        <li><a class="btn-floating blue"><i class="material-icons">close</i></a></li>
    </ul>
</div>'); } ?>
    <?php if($checklogin==0) echo('
<a class="waves-effect waves-light btn-large red logindisplay"><i class="material-icons right">person</i>signin</a>
<a class="waves-effect waves-light btn-large red registerDiplay"><i class="material-icons right">people</i>Register</a>
');?>
    <body style="background: rgba(0, 0, 0, 0.07); "  >

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">


            </div>
        </div>
        <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
    </div>


    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons"></i></h2>


                        <p class="light"></p>
                    </div>
                </div>




            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light"></h5>
                </div>
            </div>
        </div>
        <div class="parallax"></div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>

                    <p class="left-align light"></p>
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light"></h5>
                </div>
            </div>
        </div>
        <div class="parallax"></div>
    </div>

    <form id="write"  action="#" method="get">
        <input type="hidden" name="writing" value="1">

    </form>