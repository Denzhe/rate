<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/19/2016
 * Time: 11:25 PM
 * 
 *
 */
use Helpers\Url;


?>
<html>

<!-- Overlay for fixed sidebar -->
<div class="sidebar-overlay " ></div>


<aside id="sidebar" class="sidebar sidebar-default open  sidebarPosition" role="navigation" >
    <!-- Sidebar header -->
    <div class="sidebar-header header-cover"  style="padding-top: 5px;" >
        <!-- Top bar -->
       
        <!-- Sidebar toggle button -->
        <button type="button" class="sidebar-toggle">
            <i class="icon-material-sidebar-arrow"></i>
        </button>

        <!-- Sidebar brand image -->
        <div class="sidebar-image">

            <?php


            echo(' <img src="'.$_SESSION['imageUrl'].'" class="defualtImageOverlay"   >');
            echo(' <img src="'.Url::templatePath().'image/defualtProfilePicture.jpg">');
            echo(' <img src="'.Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl'].'" class="defualtImageOverlay"   >');

            ?>
        </div>
        <!-- Sidebar brand name -->
        <a  class="sidebar-brand" >


        
        </a>

    </div>
  
    <!-- Sidebar navigation -->
    <div class="nav sidebar-nav miniNav " style="padding-top: 0;">
        <div class="sidenavDisplayInformation">
            <a href="#">

            <span class="userInformationSidenavStyling">    <?php  echo($_SESSION['username'])?> </span>
                </br>
                <span class="userInformationSidenavStylingName">    <?php  echo($_SESSION['FirstName'])?> </span>
                </br>
           <span class="userInformationSidenavStyling">  <?php if(!isset($_SESSION['id'])){ echo('GUEST');}?> </span>
                </br>
               <?php if(isset($_SESSION['id'])){   echo('followers:  <span class="followerCount">  '. $_SESSION['followersCount'] .' </span>    following:  <span class="followingCount">  ' .$_SESSION['followingCount'].'</span>'); }?>
            </a>
        </div>

       <?php if(!isset($_SESSION['id'])){ echo('
        <div class="logindisplay sideli">
            <a href="http://rate.imagehut.co.za/?loginForm=1">
              
                Sign in
            </a>
        </div>
        <div class="closeinterface sideli">
            <a href="#"  >
              
                Register
            </a>
       </div>'); } ?>
        <?php if(isset($_SESSION['id'])){  echo('
        <div class="sideli">
            <a href="http://rate.imagehut.co.za/?profile=1">
             
                Profile
            </a>
        </div>
       
        <div class="sideli">
            <a href="http://rate.imagehut.co.za/?settings=1">
              
                Settings
            </a>
        </div>
        
          <div class="sideli">
            <a href="http://rate.imagehut.co.za/?logout=1">
              
                Logout
            </a>
        </div>'); }?>
        <div class="sideli">
            <a href="http://www.manula.com/manuals/tetyanazwelethu/using-ratethat/1/en/topic/registering-and-signing">
             
                Help
            </a>
        </div>
<?php if(isset($_SESSION['id'])){
    echo('
         <div class="sideli">
            <a href="http://rate.imagehut.co.za/?writing=1">
             
                Write Review
            </a>
        </div>');}?>

        <div class="divider sideli"></div>
        <div class=" sideli">
            <a class="ripple-effect dropdown-toggle" href="http://rate.imagehut.co.za/?gamesNav=1" data-toggle="dropdown">
                 Games
               
            </a>

        </div>

        <div class="sideli">
            <a href="http://rate.imagehut.co.za/?MoviesNav=1">
                Movies
             
            </a>
        </div>
         <div class="sideli">
            <a href="http://rate.imagehut.co.za/?booksNav=1">
                Books
              
            </a>
        </div>


<?php if(isset($_SESSION['id'])){
    echo('
          <div class="sideli">
            <a href="http://rate.imagehut.co.za/?community=1">
                Community

            </a>
        </div>');


        echo('
        <div class="sideli">
            <a href="http://rate.imagehut.co.za/?admin=1">
                Admin Panel

            </a>
        </div>');



        
        
        
        
        
        
       }?>
    </div>
    <!-- Sidebar divider -->
    <!-- <div class="sidebar-divider"              <li>
            <a href="http://rate.imagehut.co.za/?rewards=1">
                Rewards

            </a>
        </li>

           <li>
            <a href="http://rate.imagehut.co.za/?ReviewsNav=1">

                Reviews
            </a>
        </li>








        ></div> -->

    <!-- Sidebar text -->
    <!--  <div class="sidebar-text">Text</div> -->
</aside>


       
    </div>
</div>
<div>
<ul id="slide-out" class="side-nav">

    <li><span href="#!"><i class="material-icons">notifications</i> Notifications</span></li>
    <?php  if(!isset($_SESSION['id'])){ echo('

 
    <li><a href="#!">Sign In </a></li>
    <span>or </span>
    <li><a href="#!">register </a></li>'); }else
    {
        $user=$data["userModel"];
        $notifications=$data["notifications"];
        $notificaationIDObject=$notifications->getUserNotifications($_SESSION['id']);

        foreach ($notificaationIDObject as $item){


            $notificationsDetailObject=$notifications->getNotificationDetails($item->notificationID);

            foreach ($notificationsDetailObject as $notification)
            {

                if($notification->notificationType==1){

                    $userinfo=$user->getuserDetailsByID($notification->id);

                    foreach ($userinfo as $userDetails){

                        echo('</br><div class="notificationDiv    "> <a  href="http://rate.imagehut.co.za/?publicProfile='.$userDetails->id.'"> <img class="circle FollowNotificationImage" src="'.$userDetails->imageURL.'"> </a> </span> <span class="notificationText">'.$notification->notificationText.' </span>
                       
                                <span> '.$userDetails->username.' </span>
                             
                                 <span> '.$userDetails->FirstName.' </span> </div>
                    
                    ');


                    }


                }

            }


        }


    }


        ?>
</ul>
</div>
</html>
