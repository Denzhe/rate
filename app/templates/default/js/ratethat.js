/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $(document).ready(function() {
     //$('img').error(function(){
    //     $(this).attr('src', '../image/missingImage.png');
   //  });

// Or, hide them
     $("img").error(function(){
         $(this).hide();
     });
     $('.horizontal .progress-fill span').each(function(){
         var percent = $(this).html();
         $(this).parent().css('width', percent);
     });


     $('.vertical .progress-fill span').each(function(){
         var percent = $(this).html();
         var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
         $(this).parent().css({
             'height' : percent,
             'top' : pTop
         });
     });

     var pusher = new Pusher('ad60cde7811e7edfa8d8');

     var notificationsChannel = pusher.subscribe('notifications');

     notificationsChannel.bind('new_notification', function(notification){
         var message = notification.message;

         $('div.notification').text(message);
         $('.notificationCard').toggle();
     });


     $(".closeNotification").click(function(){
         $(".notificationCard").toggle("slow");
         $('div.notification').toggle("slow");

     });


     // Initialize collapse button
     $(".button-collapse").sideNav();
     // Initialize collapsible (uncomment the line below if you use the dropdown variation)
     //$('.collapsible').collapsible();
     function googleExpandoToggle() {
         $(this).toggleClass('active');
         $(this).next().toggleClass('active');

         // ARIA
         $expando_card.attr('aria-hidden') === 'true' ? $expando.attr('aria-hidden', 'false') : $expando.attr('aria-hidden', 'true');
     }



     $('.moreInfoButton').click(function () {

         $('.movieDetailsUpdated').toggle("slow");
         $('.writeREviewOverlay').toggle("slow");

     });

     $('.moreTrailerButton').click(function () {
     $('.WritetrailerCard').toggle("slow");
         $('.writeREviewOverlay').toggle("slow");


     });
     $('.postItemInfo').click(function () {


        $('.ratingDivPosition').toggle("slow");
         $('.readMovieDetails2').toggle("slow");
         $('.overlayForReviewText').toggle("fast");



     });
     $('.material-card > .mc-btn-action').click(function () {
         var card = $(this).parent('.material-card');
         var icon = $(this).children('i');
         icon.addClass('fa-spin-fast');

         if (card.hasClass('mc-active')) {
             card.removeClass('mc-active');

             window.setTimeout(function() {
                 icon
                     .removeClass('fa-arrow-left')
                     .removeClass('fa-spin-fast')
                     .addClass('fa-bars');

             }, 800);
         } else {
             card.addClass('mc-active');

             window.setTimeout(function() {
                 icon
                     .removeClass('fa-bars')
                     .removeClass('fa-spin-fast')
                     .addClass('fa-arrow-left');

             }, 800);
         }
     });

// Google Expando Event
// =====================================================

     $('.google-expando__icon').on('click', function() {
         googleExpandoToggle.call(this);
     });




     $('.post-module').hover(function() {
         $(this).find('.description').stop().animate({
             height: "toggle",
             opacity: "toggle"
         }, 300);
     });

     $(".ClickOnceButton").click(function(){

         $(".removeMessage").remove();
         $(".coverConfrimationMessage").remove();
         $(".messageDiv").remove();



     });














     $(document).ready(function() {
         $("table.highchart").highchartTable();
     });

     $(".addmanualGame").click(function(){
         $(".enterGameDiv").toggle();
         $(".addmanuallyOverlay").toggle();

     });



     $(".entermanul").click(function(){
         $(".enterBook").toggle();
         $(".LoginRegisterOverlay1").toggle();

     });



     $(".adminAddButton").click(function(){
         $(".enterReward").toggle();
         $(".enterRewardOverlay").toggle();

     });

     $(".emailUserButton").click(function(){
         $(".emailUserDiv").toggle();
         $(".enterRewardOverlay").toggle();

     });

     $(".deleteuserButton").click(function(){
         $(".deleteUserEmail").toggle();
         $(".enterRewardOverlay").toggle();

     });

     $(".makeAdminButton").click(function(){
         $(".makeUserAdmin").toggle();
         $(".enterRewardOverlay").toggle();

     });
     $(".closeManualEntery").click(function(){
         $(".preview").toggle();
         $(".enterMovieAdminOverlay").toggle();

     });

     $(".addmanualMovieButton").click(function(){
         $(".addmanuallyOverlay").toggle();
         $(".addMovieDisplay").toggle();

     });
     $(".addmanualBook").click(function(){
         $(".addmanuallyOverlay").toggle();
         $(".enterBook").toggle();

     });






     $(".closeMessageBOxButtonDElte").click(function(){
         $(".messageDiv").toggle();
         $(".coverConfrimationMessage").toggle();

     });
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


      $(".showConfirmMessage").click(function(){


         $(".coverConfrimationMessage2").toggle();
         


      });
     
     
     
     
     
          $(".closeinterface").click(function () {
            $(".register").toggle("slow");         
            $(".LoginRegisterOverlay1").toggle(); 
            
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



         target = $('.readingdiv')[0];


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
     $('.play').click(function() {
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


         $(".overlayCancelButton2").click(function () {
            $(".login").toggle("slow");         
            $(".LoginRegisterOverlay1").toggle(); 
            
        });    



        $(".logindisplay").click(function () {
            $(".login").toggle("slow");         
            $(".LoginRegisterOverlay1").toggle(); 
            
        });
           
           
           
           
        
           
           

            $(".overlayCancelButton1").click(function () {
            $(".register").toggle("slow");
          
           
            $(".LoginRegisterOverlay2").toggle();  
        });




        var productTour = new ProductTour({
                nextText: 'Next',
                prevText: 'Previous',
                onFinshFunction: function(){
                    console.log('ok..am done here');
                }
            });

       

         
         
       
           
            
        $(".sideBarToggleButton").click(function () {
            $(".sidebarPosition").toggle();






// end ajax


        });

     $('.followButton').click(function () {


          $followButtonText =  $(this).text();

         if($followButtonText=="unfollow"){

             $user= $(this).data('value');
             $(this).text("follow");

             $followerText= Number($('.followingCount').text())-1;
  
             $('.followingCount').text($followerText)  ;

             $user= $(this).data('value');



             $(this).text("follow");

             $.ajax({
                 type: "GET",
                 url: '/',
                 data: {unfollowID: $user},
                 success: function($user,data){



                 }
             });

         }else{

             $user= $(this).data('value');
             $(this).text("unfollow");

             $.ajax({
                 type: "GET",
                 url: '/',
                 data: {followeID: $user},
                 success: function($user,data){



                 }
             });

             $followerText= Number($('.followingCount').text())+1;
             $('.followingCount').text($followerText)  ;
         }





     });
    //heat

     $('.heatButton').click(function () {
         $post= $(this).data('value');
         $(this).toggleClass('heatButtonClicked');
         $(this).toggleClass('heatButton');
         $liked =  $('.liked').data('value');
         $('.liked').text("you liked this post");
         if ($liked===0){

             $flamesText= Number($('.flames').text()) +1;
             $('.flames').text($flamesText) ;
             $.ajax({
                 type: "GET",
                 url: '/',
                 data: {Like: $post},
                 success: function($user,data){

                     console.log(data);

                 }
             });

             $('.liked').data('value',1);

         }else{
             $('.liked').text("like");
             $('.liked').data('value',0);
             $flamesText= Number($('.flames').text()) -1;
             $('.flames').text($flamesText) ;
             $.ajax({
                 type: "GET",
                 url: '/',
                 data: {UnLike: $post},
                 success: function($user,data){

                     console.log(data);

                 }
             });

         }
     });

     $(".commentButto").click(function(){

           $post= $('.newCommentText').text();
          $post2 =$(this).data('value');
           $.ajax({
             type: "GET",
           url: '/',
             data: {comment: $post,post_id: $post2},
           success: function($user,data){

                console.log(data);

            }
            });

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
        $("#gameslider").als({
            visible_items: 3,
            scrolling_items: 2,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
          $("#demo1").als({
            visible_items: 3,
            scrolling_items: 2,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
         $("#demo1").als({
            visible_items: 3,
            scrolling_items: 2,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
         $("#search6slider").als({
           visible_items: 1,
            scrolling_items: 1,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
        // end of slider coder
         
         $("#searchSlider10").als({
           visible_items: 1,
            scrolling_items: 1,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
     $("#searchSlider11").als({
         visible_items: 1,
         scrolling_items: 1,
         orientation: "horizontal",
         circular: "no",
         autoscroll: ""
     });
     $("#searchSlider2").als({
         visible_items: 1,
         scrolling_items: 1,
         orientation: "horizontal",
         circular: "no",
         autoscroll: ""
     });
        $("#searchSlider3").als({
           visible_items: 1,
            scrolling_items: 1,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
     $("#searchSlider8").als({
         visible_items: 1,
         scrolling_items: 1,
         orientation: "horizontal",
         circular: "no",
         autoscroll: ""
     });
           $("#Slider4").als({
           visible_items: 4,
            scrolling_items: 2,
            orientation: "horizontal",
            circular: "no",
            autoscroll: ""
        });
        $(".WriteReviewButton").click(function (){

            ShowPlayCards();
            $(".unslider").toggle("slow");

        });
        $(".movieButton").click(function () {
            RemovePlayCards();
            ShowMovieSearch();
           
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


            $(".otherwrapper").toggle();
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
