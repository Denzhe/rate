<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/1/2016
 * Time: 3:25 AM
 */

namespace Controllers;
use Core\Controller;
use Core\View;
use Models;
use Helpers\Url;


class profilePage extends  Controller
{
    public function index()
    {

    }
}



?>

<html>
<main  class="profileMain">
    <div class="jumbo TwitterProfileCover" style="


        background: url(<?php echo(Url::templatePath().'image/UserUploads'.$_SESSION['coverURL']);?> )center center no-repeat;

        "   >  </div>
    <div class="jumbo" style="
        width: 100%;
        height: 400px;

        background: url(<?php echo($_SESSION['coverURL']);?> )center center no-repeat;
        background-size: cover;    margin-left: 42px;
        "   >  </div>
    <div class="container icons">
        <div class="big-icon" style="
            background: url(<?php echo(Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl']);?> )
            ;background-repeat: no-repeat; background-size: cover;                   ">


        </div>
        <div class="big-icon" style="
            background: url(<?php echo($_SESSION['imageUrl']);?> )
            ;background-repeat: no-repeat; background-size: cover;                   ">


        </div>
        <div class="add" id="setingsButton">
            <a class="add-btn btn-floating btn-large waves-effect waves-light black"><i class="material-icons">settings</i></a>
        </div>
    </div>
    <div class="details">

        <h3><?php  echo($_SESSION['FirstName']);  ?></h3>

    </div>
    <div class="container bio">
        <div class="title">
            <h6>Biography</h6>
        </div>
        <div class="content">
            <p><?php    echo($_SESSION['bio']);  ?></p>
        </div>
        <hr />
    </div>



 <?php


 $reviews = new Models\DisplayMoviesReviews();
 $posts =$reviews->displayReviewsByUserID($_SESSION["id"]);

 $ratingModel=new \Models\rating();

 echo('<div class="movieScrollWrapper">');
 $COUNT=0;
 foreach ($posts as $item) {

     $content = $reviews->displayContentDetails($item->content_Id);


     $ratingNumber= $ratingModel-> returnRating($item->content_Id);
     foreach ($content as $contentInfo) {



         echo(" <div>") ;
         echo('<table> <tr>');
         echo('  
                   
            <div class="card small"  style="margin-top: 31%;    margin-left:4px;max-width: 703px;" >
              <div class="profileReviewDetails profilePageContentText" >
              <span > '.$contentInfo->tltle.' </span>  
              <span style="color: cornflowerblue; font-size: medium;"> '.$contentInfo->description.' </span>  
              </div>
            <div class="col m6 s12">
                
                <div class="card  reviewViewCard "    style="background: url('.$contentInfo->ImageUrl.') center center; ">
                    <div class="card-image" id="first-img">
                       
                    </div>
                </div>
                


              
              
            ');

         // print_r($posts);


     }



     echo('<table class="starTable"  style="max-width: 860px;min-width: 860px;min-height: 110px;max-height: 365px;margin-left: 0px;"> <tr>');
     for($x=1;$x<=$ratingNumber[0]->value;$x++) {

         echo('<td><img src="'.Url::templatePath().'image/starRatings/full star1.png" style="width: 50px;"/></td>');
     }
     if (strpos($starNumber,'.')) {
         echo ('<td><img src="'.Url::templatePath().'image/starRatings/halfStar.svg.png" style="position: absolute;top: 0;width: 15;width: 50px;margin-left: 81px;"/> </td>');
         $x++;
     }
     while ($x<=5) {
         echo ('<td><img src="'.Url::templatePath().'image/starRatings/blankstar.png" style="width: 50px;" /></td>');
         $x++;

     }






     echo(' </tr></td> </table> ');

     echo('

                       <td>
                        <div class="card blue-grey"  style="max-width: 860px;min-width: 860px;min-height: 365px;max-height: 365px;margin-left: 0px;">
                        
                        <form method="get" action="#">
                         <div class="card-content white-text">
                                <span class="card-title">' . $item->Time . '</span>
                                <p>' . $item->preview . '</p>
                            </div>
                            <div class="card-action">
                            <input type="hidden" name="readReview" value="'. $item->post_id.'">
                            <input type="hidden" name="authorID" value="'. $item->id.'">
                                <a ><button type="submit">Read more... </button></a>
                               
                                 
                                </div>
                                <i class="material-icons card-love">favorite_border</i>
                                </form>
                            </div> </td> ');
     $COUNT=$COUNT+1;
 }










 ?>



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
    height: 402px;
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

<<script>

    productTour.addNewTourSteps([{element: '#setingsButton',
        title: 'Tip',

        content: "you can change your profile picture by clicking settings icon........",
        class: 'right'},

        {element:'#steptwo',
            title: 'click flower icon to proceed to write review section',
            content: "click pen icon to write review"}]);

    productTour.startTour();
</script>
</html>