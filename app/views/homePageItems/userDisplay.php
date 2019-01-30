
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



  

   <div class="userHomeDisplayWrapper">     
 
');

$count=1;
echo('<table>');
echo(' <tr>');

foreach($users as $userINFO) {

    if($userINFO->id!==$_SESSION['id']) {

        echo('<td>');
        echo('
    <form  action="#" method="get">
    
    <div class="card small " style ="    height: 595px;
    width: 298px;" >
    <div class="card-header">
       
    </div>
    
    
    <div class="card-content " style="max-height: 63%;">
        <div class="followingDetials">
        <div id="first-title">
      <h5 id="info-title">Posts</h5>
      <h3>'.$followModel->countPosts($userINFO->id).'</h3>
    
    </div>
    <div id="second-title">
      <h5 id="info-title">Following</h5>
      <h3>
        '.$followModel->getFollowingCountUser($userINFO->id).'
      </h3> 
    </div>
    <div id="third-title">
      <h5 id="info-title">Followers</h5>
      <h3>
      '.$followModel->getFollowersUsercount($userINFO->id).'
      </h3>
      
     
      ' . $userINFO->bio . '
    </div>
    </div>
    
    
    <div id="card ProfileDisplay" >
    <div id="card-headerDisplay" style="background: url(http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userINFO->coverURL . ');     background-size: contain; background-repeat: no-repeat;" >
    <div id="card-header-infoDisplay">
    <h3 id="nameDisplay" style="    position: absolute;
    top: 385px;
    left: 100px;
    color: black;">' . $userINFO->surname . '    ' . $userINFO->FirstName . '</h3>
    <h5 id="a-nameDisplay"></h5>
    <div id=""> <A HREF="http://rate.imagehut.co.za/?publicProfile='.$userINFO->id.'"><img src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userINFO->imageURL . '"  class="circle profileImageHomPage" ></A> </div>
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
    <Button type="submit" class="waves-effect waves-light btn-large red followButton"   value="' . $userINFO->id . '"> unfollow </button>');
        }
        if ($Following == 0) {

            echo('<input type="hidden" name="followeID"  value="' .$userINFO->id. '"> 
    <Button type="submit" class="waves-effect waves-light btn-large red followButton"   value="' . $userINFO->id . '">Follow</button>');


        }


        echo('
    ');



        echo('
  </div>
  
   <div class="card-footer">
        <ul>
            <li>
            
            </li>

        </ul>
    </div>
   </div>

</div>
    
  </div>
 </form>      ');

        echo('</td>');





    }
}






echo('</tr>');
echo('</table>');
echo('</div>');

