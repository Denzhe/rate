<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/18/2016
 * Time: 8:59 PM
 */

use Helpers\Url;

$users = $data['users'];
$followers =$data["folowers"];
$followModel=$data["followModel"];
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Dashboard Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/lib/getmdl-select.min.css">
    <link rel="stylesheet" href="css/lib/nv.d3.css">
    <link rel="stylesheet" href="css/application.css">
    <!-- endinject -->

</head>
<body>

<div class="card adminBannerTrans ">

    <span class="communityHeader3 "> Admin DashBoard </span>


    <div class="  navMiniadmin" >
        <div class="ulMIni ">
            <li class="limini">
                <a href="http://rate.imagehut.co.za/?admin=1">Users
                </a>
            </li>
       <!--     <li class="active limini">
                <a href="http://rate.imagehut.co.za/?admin=3">Rewards
                </a>


            </li> -->
            <li class="active limini">
                <a href="http://rate.imagehut.co.za/?admin=4&GamesAdmin=1">games
                </a>
            </li>
            <li class="active limini">
                <a href="http://rate.imagehut.co.za/?admin=4&MoviesAdmin=1">movies
                </a>
            </li>
            <li class="active limini">
                <a href="http://rate.imagehut.co.za/?admin=4&BooksAdmin=1">books
                </a>
            </li>
            </ul>
        </div>


        </div>
</div>



    <div class=" dashboardPosition "  >

        <table >

            <tr>
                <td>
            <a  >
                <i class="material-icons" role="presentation"></i>

            </a>
                </td>
            </tr>
            <tr>
                <td>
            <a  href="forms.html">
                <i class="material-icons" role="presentation">home</i>
                back to site
            </a>
                </td>
            </tr>
            <tr>
                <td>
            <a href="forms.html">
                <i class="material-icons" role="presentation">person</i>
                Account
            </a>
                </td>
            </tr>
            <tr>
                <td>
            <a class="mdl-navigation__link" href="https://github.com/CreativeIT/getmdl-dashboard">
                <i class="material-icons" role="presentation">link</i>
                GitHub
            </a>
                </td>
            </tr>
       <!--     <a class="mdl-navigation__link" >
                <i class="material-icons" role="presentation"> Rewards</i>

            </a>-->
        </table>
    </div>
</div>

<?php
        if ($_GET["admin"]==1) {
       echo('

            <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top adminGrid">
                
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone ">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp projects-table">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Surname</th>
                            <th class="mdl-data-table__cell--non-numeric">Username</th>
                            <th class="mdl-data-table__cell--non-numeric">Number of posts</th>
                            <th class="mdl-data-table__cell--non-numeric">Number Following</th>
                            <th class="mdl-data-table__cell--non-numeric">Number  of Follwers</th>
                            
                            <th class="mdl-data-table__cell--non-numeric">Profile Picture</th>
                        </tr>
                        </thead>
                        <tbody>
                        ');



                foreach ($data['users'] as $userINFO){

                echo('  
          
                        <tr>
                       
                            <td class="mdl-data-table__cell--non-numeric" >
                           
                   
                                
                                <span class="label label--mini background-color--mint">' . $userINFO->FirstName. '</span>
                                </td>
                                
                                <td class="mdl-data-table__cell--non-numeric"> <span class="label label--mini background-color--primary">' . $userINFO->surname . '</span>   </td>
                               
                            <td class="mdl-data-table__cell--non-numeric">' . $userINFO->Username . '</td>
                            <td class="mdl-data-table__cell--non-numeric">'.$followModel->countPosts($userINFO->id).'</td>
                            
                            <td class="mdl-data-table__cell--non-numeric">
                                 '.$followModel->getFollowingCountUser($userINFO->id).'
                               
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">
                                '.$followModel->getFollowersUsercount($userINFO->id).'
                               
                            </td>
                          
                            <td class="mdl-data-table__cell--non-numeric"> <A HREF="http://rate.imagehut.co.za/?admin=2&user='.$userINFO->id.'"><img src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userINFO->imageURL . '"  class="circle gridProfilePicture" > </td>
                       
                       
                      
                        </tr>
                        
                         </a>
                   ');}
                echo('        </tbody>
                    </table>
                </div>
           

            ');
       } elseif( $_GET["admin"]==2){
            $followersNumber=0;
            $followers=0;
            $count=0;
            $posts=0;
            $numberofposts=0;
            $numberofpostsUser=0;
foreach ($data['users'] as $userINFO) {

    $count=$count+1;

    $numberofposts=$numberofposts+$followModel->countPosts($userINFO->id);
    $followers =$followers +$followModel->getFollowersUsercount($userINFO->id) ;

    if ($userINFO->id == $_GET["user"]){
        $numberofpostsUser=$followModel->countPosts($userINFO->id);
        $followersNumber=$followModel->getFollowersUsercount($userINFO->id) ;
        echo('<div class="card sideProfileRead2" style="background: url(' . Url::templatePath() . 'image/UserUploads' . $userINFO->coverURL .');
    background-size: cover;">
    <div class="card-header">
        <img src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userINFO->imageURL . '"  class=" profileAdminView2 circle" >
    </div>
    <div class="card-content">
    
    </div>
    <div class="card-footer">
        <ul>
            <li>
          
                  <a class="waves-effect red btn-large  deleteuserButton" >Deactivate user Acount</a> 
            </li>
              <li>
               <a class="waves-effect red btn-large emailUserButton" > Email User</a> 
            </li>
             <li>
               <a class="waves-effect red btn-large   makeAdminButton" > Make Admin</a> 
            </li>
        </ul>
    </div>
</div>');}





}


            if($followers==0){

                $averageNumberOfFollowers=0;

            }else{
                $averageNumberOfFollowers =round($followers/$count);

            }
               


           // if( $numberofpostsUser==0){

             //   $percentageOfNumberofPostsPeruser=0;
         //   }else{
           // $percentageOfNumberofPostsPeruser=($average/$numberofpostsUser)*100;

          //  }
            $chartTotal=$averageNumberOfFollowers+$followersNumber;

            if($chartTotal==0 || $averageNumberOfFollowers==0){


                $averageNumberOfFollowersPercentage=0;
            }else{

                $averageNumberOfFollowersPercentage =  ($averageNumberOfFollowers/$chartTotal)*100;

            }

            if($followersNumber==0)
            {
               $followersPecentage =0;

            }else{

                $followersPecentage= ($followersNumber/$chartTotal)*100;

            }
          //  $avreagePercentage=($average) *10;

           // if($followersNumber==0){
             //   $followersPercentage=0;

        //    }else{
            //$followersPercentage=($followers/ $followersNumber) *100;}
         //   $varId=$_GET["user"];
        //    $avreageTodecimalOFTen=$average*100;

            if( $numberofposts==0){

              $averageNumberoFposts=0;
           }else{

                $averageNumberoFposts=$numberofposts/$count;
           }



          //  $averageNumberofPotssToDecimal=$averageNumberoFposts*100;
           echo(' <div class="userAdminDetails">
            UserID  :'.$userINFO->id.'
            </br>
            First Name :' . $userINFO->FirstName. '
            </br>
            Username   :' . $userINFO->Username . '
            </div>');
echo ('<div class="tableGraphContainer">');
            echo('<table>');
            echo('<tr>');
            echo('<td>');


            echo('<div class="graph_fancy" data-x-label="Number of followers" data-y-label="Percent (%)">

	<span class="bar"></span>

	<span class="bar" style="height: '.$averageNumberOfFollowersPercentage.'%" data-bar-label="Average " data-bar-value="'.round( $averageNumberOfFollowers).'"></span>
	
		<span class="bar"></span>

	<span class="bar" style="height: '.$followersPecentage.'%" data-bar-label="user&#39s followers" data-bar-value="'.$followersNumber.'"></span>
	<!-- more bars here -->
</div>');





/**

            echo('<tr>');
            echo('<td>');
            echo('<div class="graph_fancy" data-x-label="Number of posts" data-y-label="Percent (%)">

	<span class="bar"></span>

	<span class="bar" style="height: '.$averageNumberofPotssToDecimal.'%" data-bar-label="Average " data-bar-value="'.round($averageNumberoFposts).'"></span>
	
		<span class="bar"></span>

	<span class="bar" style="height: '.$percentageOfNumberofPostsPeruser.'%" data-bar-label="user&#39s posts" data-bar-value="'.$numberofpostsUser.'"></span>
	<!-- more bars here -->
</div>');
            echo('</div>');
            echo('</td>');
            echo('</tr>');
 */
    echo('</table>');

            echo('</div>');
            echo ('</div>');
        }




















?>






    </main>

<?php
if ($_GET["admin"]==3) {
echo('





  <a class="waves-effect red btn-large  adminAddButton " >Add Reward</a>
    <div class="enterRewardOverlay"></div>
<div class="enterReward">
    <div class="">



        <div class="card medium  previewCard" style="width: 429PX;height: 1332px; left: 1px;">

            <!-- Card Content -->
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text ">Add a reward</h2>
            </div>


            <form method="post" action="#" enctype="multipart/form-data" >


                <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                    <p>Title</p>

                    <input type="text" name="rewardtitle" required>

                </div>








                <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                    <p>Worth (points)</p>

                    <input name="worth"  type="number" max="1000000" min="1" required>

                </div>




                <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                    <p>qauntity (Avaiable)</p>

                    <input name="Qauntity"  type="number" max="1000000" min="1" required>

                </div>








                <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                    <p>summary</p>

                    <input type="text" name="description"  length="500"  required>

                </div>



                <div class="card-content">

                    <p>Upload reward image</p>

                    <input type="file" name="photo" size="25"  required />

                </div>



                <div  class="enterBookBtn"  style="margin-top: 18%;margin-left: 8%;">

                    <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >

                        <i class="material-icons left">send</i>Add</button>



                    <button   type="button" class="waves-effect waves-light btn-large   red entermanul " name="cancel" style="margin-left: 17%;">

                        <i class="material-icons left">cancel</i>Cancel</button>

                </div>

            </form>

        </div>

    </div>
</div>');


}





?>

<!-- endinject -->

</body>
</html>

