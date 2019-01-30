<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/17/2016
 * Time: 9:39 PM
 */

namespace Controllers;

use Core\Controller;
use Core\View;
use Core\Model;
use Helpers\Url;

class publicProfile extends Controller
{

}
?>

<?php

$bio="";
$imageURL="";
$coverURL="";
$id="";
$bio="";
$FirstName="";
$surname="";

$user = new \Models\User();

$users=$user->getuserDetailsByID($_GET["publicProfile"]);
foreach($users as $userINFO) 
{

    $surname = $userINFO->surname;
   $FirstName =$userINFO->FirstName;
   $bio= $userINFO->bio;
    
   $imageURL= $userINFO->imageURL;
  $coverURL=$userINFO->coverURL;
        $id=$userINFO->id;
}?>
<html>
<main  class="profileMain">
    <div class="jumbo" style="
        width: 100%;
        height: 400px;

        background: url(<?php echo(Url::templatePath().'image/UserUploads'.$coverURL);?> )center center no-repeat;
        background-size: cover;    margin-left: 42px;
        "   >  </div>
    <div class="container icons">
        <div class="big-icon" style="
            background: url(<?php echo(Url::templatePath().'image/UserUploads'.$imageURL);?> )
            ;background-repeat: no-repeat; background-size: cover;margin-left: 45%;                   ">


        </div>

        <div class="add" id="setingsButton">
            <a class="add-btn btn-floating btn-large waves-effect waves-light black"><i class="material-icons">settings</i></a>
        </div>
    </div>
    <div class="details">

        <h3><?php  echo( $FirstName.'  '.$surname);  ?>    </h3>
        
</div>
<div class="container bio">
    <div class="title">
        <h6>Biography</h6>
    </div>
    <div class="content">
        <p><?php    echo($bio);  ?></p>
    </div>
    <hr />
</div>



<div class="container pics">


    <h3><?php echo( $FirstName.'  '.$surname); ?> reviews</h3><br/>


    <?php

    //Start of reviews
    $num = 0;
    $contentName = array();
    $contentImages = array();
    $reviews = new \Models\DisplayMoviesReviews();
    $posts =$reviews->displayReviewsByUserID($id);
    foreach ($posts as $item) {
        $content = $reviews->displayContentDetails($item->content_Id);

        foreach ($content as $contentInfo) {

            $contentName[$num] = $contentInfo->tltle;
            $contentImages[$num] = $contentInfo->ImageUrl;
            $num += 1;



        }

    }






    ?>

    <div class="row">



        <?php
        $ratingModel = new \Models\rating();
        $reviews = new \Models\DisplayMoviesReviews();
        $posts =$reviews->displayReviewsByUserID($id);
        $num = 0;

        foreach ($posts as $item) {
            // print_r($posts);

            echo "<img src='$contentImages[$num]' >";

            $ratingNumber= $ratingModel-> returnRating($item->content_Id);
            echo('
    
    
    <div class="card blue-grey">
    
    <form method="get" action="#">
    <div class="card-content white-text">
    <span class="card-title">'.$contentName[$num]. '<br/></span>
    <span>'.$item->Time . '</span>
    <p><br/>' . $item->preview . '</p>
    </div>
    <div class="card-action">
    <input type="hidden" name="readReview" value="'. $item->post_id.'">
    <input type="hidden" name="authorID" value="'. $item->id.'">
    <a ><button type="submit">Read more... </button></a>
    
    
    
    <i class="material-icons card-love">favorite_border</i>
    </form>
    <form method="post" action="#">
    <input type="hidden" name="deleteReview" value="'. $item->post_id.'">
    <button type="submit">Delete</button>
    </div>
    </div>');
            $num += 1;

        }

        ?>

    </div>

</div>



<div class="fixed-action-btn fab" >
    <a class="btn-floating btn-large red">
        <i class="large material-icons">arrow_drop_up</i>
    </a>
    <ul>
        <li><a class="btn-floating orange"><i class="material-icons">thumb_up</i></a></li>
        <li><a class="btn-floating green"><i class="material-icons">star</i></a></li>
        <li><a class="btn-floating blue"><i class="material-icons">add</i></a></li>
    </ul>
</div>
</main>
<div class="jumbo" style="
    width: 100%;
    height: 431px;
    background: url(<?php echo(Url::templatePath().'image/digitalLeap-banner-development-background.jpg');?> )center center no-repeat;
    margin-left: 1px;
    position: absolute;
    top: 65px;
    z-index: -25;
    ">  </div>
<div class="defaultProfilePicture circle" style="
    background: url(<?php echo(Url::templatePath().'image/defualtProfilePicture.jpg');?> )
    ;background-repeat: no-repeat; background-size: cover;">


</div>


</html>