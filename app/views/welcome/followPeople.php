
<?php
/**
 * Sample layout.
 */
use Core\Language;
use Helpers\Url;

$users = $data['users'];
$followers =$data["folowers"];
$followModel=$data["followModel"];
//<p>points: '.$userINFO->points.'</p>
        //<p>Location: '.$userINFO->Location.' </p>

echo('

<div class="card communityReview "> 

  <span class="communityHeader2"> Community </span>
</div>

  

   <div class="followerDisplay22 miniNav">
 
');

$count=1;
echo('<table>');


foreach($users as $userINFO) {

if($userINFO->id!==$_SESSION['id']) {

        echo(' <tr>');

    echo('<td>');
    echo('
    <div class="card  profileCardFollowPage">
    <form  action="#" method="get">
    <div class="card-header">
       
    </div>
    
    
    <div class="card-content">
        
        <h5>    </h5>
        <h6> </h6>
       
     
    
    <div id="card ProfileDisplay" >
    <div id="card-headerDisplay"  >
    <div class="card headerBackgroundCommunity" style="background: url(http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userINFO->coverURL . ');    background-size: cover;">
    </div>
    <div id="card-header-infoDisplay">
    <h3 id="nameDisplay">' . $userINFO->surname . '    ' . $userINFO->FirstName . '</h3>
    <h5 id="a-nameDisplay"></h5>
    <div id=""> <A HREF="http://rate.imagehut.co.za/?publicProfile='.$userINFO->id.'"><img src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userINFO->imageURL . '"  class="circle CommmunityProfilePic" ></A> </div>
    </div>
    </div>
    <div id="card-info">
    
    ');
    $Following = 0;

    foreach ($followers as $follower) {

        if ($follower->id == $userINFO->id) {

            $Following = 1;
            break;
        }

    }

    if ($Following == 1) {

        echo('<input type="hidden" name="unfollowID"  value="' .$userINFO->id. '"> 
    <a  class="waves-effect waves-light btn-large red followButton"   data-value="' .$userINFO->id. '">unfollow</a>');
    }
    if ($Following == 0) {

        echo('<input type="hidden" name="followeID"  value="' .$userINFO->id. '"> 
    <a  class="waves-effect waves-light btn-large red followButton"   data-value="' . $userINFO->id . '">Follow</a>');


    }


    echo('
    <div id="first-title">
      <h5 id="info-title">Posts</h5>
      <h2>'.$followModel->countPosts($userINFO->id).'</h2>
    </div>
    <div id="second-title">
      <h5 id="info-title">Following</h5>
      <h2> ');
    echo($followModel->getFollowingCountUser($userINFO->id));
    echo('</h2>
    </div>
    <div id="third-title">
      <h5 id="info-title">Followers</h5>
      <h2 class="followersNumber">');
    echo($followModel->getFollowersUsercount($userINFO->id));
    echo('</h2>
    </div>

  
   <div class="card-footer">
        <ul>
            <li>
            
            </li>

        </ul>
    </div>
   

</div>
    
  </div>
 </form>      ');

    echo(' </div> </td>');


        echo('</tr>');
        $count = 1;


    $count = $count + 1;
}
}







echo('</table>');
echo('</div>');

