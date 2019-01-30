<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/2/2016
 * Time: 7:07 AM
 */

namespace Controllers;


use Core\Controller;
use Models\content;
use Models\DisplayMoviesReviews;
use Helpers\Url;
use Core\View ;
use Models\comments;

class ReadReview extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }


    public function displayContent($reviewID, $userID)
    {
        $comments = new comments();
        $data["reviewID"]=$reviewID;
        $commentsObject=  $comments->retriveComments($reviewID);
        $pageTwitterURL='http://rate.imagehut.co.za/?readReview='.$reviewID.'&authorID='.$userID.'';

        $reviews = new DisplayMoviesReviews();
        $singleReview = $reviews->displayReviewsbyPostID($reviewID);
        $userDetails = $reviews->displayReviewAuthorDetails($userID)    ;
        $contentDetails = new content();
        $movieModel =  new \Models\Movie_Model();
        $like =  new \Models\Like();
        foreach ($singleReview as $item) {

            $movieDetails=$contentDetails->displayMovieDetails($item->content_Id);
            $gameDetails = $contentDetails->displayGameDetails($item->content_Id);
            $BookDetails =$contentDetails-> displayBookDetails($item->content_Id);
           // print_r($movieDetails);
        }



        $rating =$movieModel->get1StarRatingCount($item->content_Id);


        $onestarRating=$rating[0]->AvgRating;



        $rating2=$movieModel->get2StarRatingCount($item->content_Id);
        $twostarRating=$rating2[0]->AvgRating;

        $rating3=$movieModel->get3StarRatingCount($item->content_Id);



        $thretarRating=$rating3[0]->AvgRating;

        $rating4=$movieModel->get4StarRatingCount($item->content_Id);



        $fourstarRating=$rating4[0]->AvgRating;

        $rating5 =$movieModel->get5StarRatingCount($item->content_Id);


        $fivestarRating=$rating5[0]->AvgRating;;



        $rating6=$movieModel->getAllStarRatingCount($item->content_Id);


        $numberOfRatings=$rating6[0]->totalRating;










        if($onestarRating > 0){
            $rating1Percent= $onestarRating/$numberOfRatings;
            $rating1Percent= $rating1Percent*100;
        }else{

            $rating1Percent = 0;
        }




        if($twostarRating > 0){
            $rating2Percent= $twostarRating/$numberOfRatings;
            $rating2Percent= $rating2Percent*100;
        }else{

            $rating2Percent = 0;
        }



        if($thretarRating  > 0){
            $rating3Percent= $thretarRating/$numberOfRatings;
            $rating3Percent= $rating3Percent*100;
        }else{

            $rating3Percent = 0;
        }

        if($fourstarRating  > 0){
            $rating4Percent= $fourstarRating/$numberOfRatings;
            $rating4Percent= $rating4Percent*100;
        }else{

            $rating4Percent = 0;
        }

        if($fourstarRating  > 0){
            $rating4Percent= $fourstarRating/$numberOfRatings;
            $rating4Percent= $rating4Percent*100;
        }else{

            $rating4Percent = 0;
        }



        if($fivestarRating > 0){
            $rating5Percent= $fivestarRating/$numberOfRatings;
            $rating5Percent=$rating5Percent*100;
        }else{

            $rating5Percent = 0;
        }

        $overallTotal =  $onestarRating + $twostarRating+$thretarRating+$fourstarRating +$fivestarRating;
        if($overallTotal > 0) {
            $overallAverage = $overallTotal / $numberOfRatings;
        }else{

            $overallAverage = 0;
        }















































        foreach ($singleReview as $item) {


                $content = $reviews->displayContentDetails($item->content_Id);
                foreach ($content as $contentInfo) {
                    foreach ($gameDetails as $gameInfo){
                        echo('<main class="mdl-layout__content  readReviewPlayCardNew">
                <div class=" mdl-grid portfolio-max-width ">

            <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp readingdiv">
            <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">        </h2>
            </div>
          
            <div class="mdl-card__media"    style="background: URL(' . $contentInfo->ImageUrl . ');background-repeat: no-repeat;background-size: cover;opacity: 0.5;">
           
                <img class="article-image" src="' . $contentInfo->ImageUrl . '" border="0" alt="">
                  
            </div>
      <div class="readMovieDetails2">
    
             </br>
             </br>
             Realease Date'.$gameInfo->release_date.'
             </br> 
           
            <div class="mdl-grid portfolio-copy">
                        ' . $item->post . '
                </div>
            </div>
            </div>
              
            <a class="waves-effect red btn-large fullscreen" >Fullscreen ReadMode</a>
              <a class="waves-effect red btn-large circle "> + </a >
          
                          <div>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          ');

                        foreach ($commentsObject as $object) {
                            $userDetais= $reviews->displayReviewAuthorDetails($object->id);

                            foreach ( $userDetais as $userDeetailInfo) {
                                echo('  
                
            <img  src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userDeetailInfo->imageURL . '" class="circle imagereviewPosition">
          <div class="dialogbox">
    <div class="body">
      <span class="tip tip-right"></span>
      <div class="message">
      
      
      
      
       <form method="post" action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                
               <div  class="input-field col s12 commentTextField ">
                '.$object->Text.'
             
                <span>'.$object->Time.' </span>
            </div>
            </div>
             <input type="hidden" name="post_id" value="'. $item->post_id .'">
            
          </form>
      
     
    </div>
      </div>
    </div>');

                            }   }


                        echo('                <div class="dialogbox">
    <div class="body">
    
            <img  src="'.Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl'].'" class="circle imagereviewPosition">
       
      <span class="tip tip-right"></span>
      <div class="message">
      
      
      
      
       <form method="post" action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                 
               <div  class="input-field col s12 commentTextField ">
                 <textarea  id="textarea1"  name="comment" class="materialize-textarea " length="300"  required   placeholder="comment"></textarea>
    
            </div>
            </div>
             <input type="hidden" name="post_id" value="'.$item->post_id.'">
            <button class="mdl-button mdl-button--raised mdl-button red commentButton"> comment </button>
          </form>
      
     
    </div>
      </div>
    </div>
  </div>
  
            
            
                       </div>
                        </div> 
              </div>
            

             </main>
     
   
                                
                       

"');

                    }






                    foreach ($BookDetails as $bookDetail){
                        echo('<main class="mdl-layout__content  readReviewPlayCardNew">
                <div class="mdl-grid portfolio-max-width">

            <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp readingdiv">
            <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">        </h2>
            </div>
          
            <div class="mdl-card__media"    style="background: URL(' . $contentInfo->ImageUrl . ');background-repeat: no-repeat;background-size: cover;opacity: 0.5;">
           
                <img class="article-image" src="' . $contentInfo->ImageUrl . '" border="0" alt="">
                  
            </div>
      <div class="">
    
             </br>
             </br>
             Realease Date'.$gameInfo->release_date.'
             </br> 
           
            <div class="mdl-grid portfolio-copy">
                        ' . $item->post . '
                </div>
            </div>
            </div>

            <a class="waves-effect red btn-large fullscreen" >Fullscreen ReadMode</a>
               
                          <div>');

                        foreach ($commentsObject as $object) {
                            $userDetais= $reviews->displayReviewAuthorDetails($object->id);

                            foreach ( $userDetais as $userDeetailInfo) {
                                echo(' <div class="dialogbox">
    <div class="body">
      <span class="tip tip-right"></span>
      <div class="message">
      
      
      
      
       <form method="post" action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                 <div class="sidebar-image  ">
                
            <img  src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userDeetailInfo->imageURL . '" class="circle imagereviewPosition">
             </div>
               <div  class="input-field col s12 commentTextField ">
                '.$object->Text.'
             
                <span>'.$object->Time.' </span>
            </div>
            </div>
             <input type="hidden" name="post_id" value="'. $item->post_id .'">
            
          </form>
      
     
    </div>
      </div>
    </div>');

                            }   }


                        echo('                <div class="dialogbox">
    <div class="body">
      <span class="tip tip-right"></span>
      <div class="message">
      
      
      
      
       <form method="post" action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                 <div class="sidebar-image  ">
            <img  src="'.Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl'].'" class="circle imagereviewPosition">
             </div>
               <div  class="input-field col s12 commentTextField ">
                 <textarea  id="textarea1"  name="comment" class="materialize-textarea " length="300"  required   placeholder="comment"></textarea>
    
            </div>
            </div>
             <input type="hidden" name="post_id" value="'.$item->post_id.'">
           <button class="mdl-button mdl-button--raised mdl-button red commentButton" style="
    color: white;
"> comment </button>
          </form>
      
     
    </div>
      </div>
    </div>
  </div>
  
            
            
                       </div>
                        </div> 
              </div>
            

             </main>
     
   
                                
                       

"');

                    }







                    foreach ($movieDetails as $movieINFO){
                    echo('


<main class="mdl-layout__content  readReviewPlayCard">');

                        echo('

<div class="containerGraph horizontal rounded ratingDivPosition">
                        <h2>average ratings</h2>
                       
                            
                               <div class="rating">
                               <div class="divStar1"> <span class="starDivSize"    >★</span> <span class="starDivHeight" >☆</span><span  class="starDivHeight">☆</span><span  class="starDivHeight" >☆</span><span class="starDivHeight" >☆</span></div>
                                    
                                     
                                <div class="divStar1">       <span class="starDivSize"   >★</span><span  class="starDivSize"    >★</span><span class="starDivHeight"  >☆</span><span  class="starDivHeight" >☆</span><span  class="starDivHeight"   >☆</span>    </div> 
                                <div class="divStar1">        <span  class="starDivSize"  >★</span><span class="starDivSize"  >★</span><span  class="starDivSize"  >★</span><span class="starDivHeight"  >☆</span><span class="starDivHeight"  >☆</span>  </div>
                                <div class="divStar1">        <span class="starDivSize"   >★</span><span  class="starDivSize"   >★</span><span  class="starDivSize"    >★</span><span  class="starDivSize"   >★</span><span class="starDivHeight"  >☆</span> </div>
                                <div class="divStar1">   <span class="starDivSize">★</span><span  class="starDivSize" > ★</span><span class="starDivSize" >★</span><span  class="starDivSize" >★</span><span  class="starDivSize"  >★</span>  </div>  
                             
                                </div>
                                 

                        
                            
                                 
                             
                           

                        
                             
                                       <div  class="barPositions readReviewBarPositions">
                                       
                                       
                                       
                                       
                             <div class="progress-bar horizontal">
                            <div class="progress-track">
                            
                                <div class="progress-fill">
                                    <span>'.round($rating1Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                                
                                <div class="progress-fill">
                                    <span>'.round($rating2Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                              
                                <div class="progress-fill">
                                    <span>'.round($rating3Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                                
                                <div class="progress-fill">
                                    <span>'.round($rating4Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                           


                                <div class="progress-fill">
                                    <span>'.round($rating5Percent).'%</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    </div>

<div class=" card  readMovieDetails2" style="position: absolute;height: 21em;">
             Running Time :'.$movieINFO->running_Time.' 
             </br>
             </br>
             Realease Date'.$movieINFO->release_date.'
             </br> 
             </br>
            Producers: '.$movieINFO->producers.'
             </br> 
             </br>
               IMDB: '.$movieINFO->IMDB.'  
               </div>

            ');

                        foreach ($userDetails as $userINFO) {



                            echo('<div class="card profileSideNav">
    <div class="card-header">
                <img src="http://rate.imagehut.co.za'.Url::templatePath().'image/UserUploads'.$userINFO->imageURL.'"  class="sideProfileRead " >
    </div>
    <div class="card-content">
                       <h5>'.$userINFO->surname.'   '. $userINFO->FirstName.' </h5>
                       <h6>'.$userINFO->bio.' </h6>
                       <p>points: '.$userINFO->points.'</p>
                       <p>Location: '.$userINFO->Location.' </p>
    </div>
    <div class="card-footer">
        <ul>
            <li>
                <a href="#"><i class="fa fa-codepen">follow</i></a>
            </li>

        </ul>
    </div>
</div>');

                        }




              echo('  <div class="mdl-grid portfolio-max-width">

            <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp readingdiv">
            <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">        </h2>
            </div>
          
            <div class="mdl-card__media"    style="background: URL(' . $contentInfo->ImageUrl . ');background-repeat: no-repeat;background-size: cover;opacity: 0.5;">
           
                <img class="article-image" src="' . $contentInfo->ImageUrl . '" border="0" alt="">
                  
            </div>
      
            <div class="mdl-grid portfolio-copy">
                        ' . $item->post . '
                        <div class ="card overlayForReviewText"></div>
                </div>
            </div>
            </div>

            <a class="waves-effect red btn-large fullscreen" >Fullscreen ReadMode</a>
                   <a class="waves-effect red btn-large circle postItemInfo "> + </a >
              
               <div class="card sharpostBanner">  
              
              
             <div id="fb-root"></div>
             <meta property="og:url"           content="'.$pageTwitterURL.'" />
	        <meta property="og:type"          content="website" />
	        <meta property="og:title"         content="Rate That" />
	        <meta property="og:description"   content="movie review" />
	        <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
	         <table class="socialPlugin">
               
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, \'script\', \'facebook-jssdk\'));</script>
	
	
		    <td>
	<div id="fb-root socialTd"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, \'script\', \'facebook-jssdk\'));</script>

	<!-- Your share button code -->
	<div class="fb-share-button " 
		data-href="'.$pageTwitterURL.'" 
		data-layout="button_count">
	</div>
	</td>
		<td class="socialTd">
	<a href="http://rate.imagehut.co.za/?pageTwitterUrl='.$pageTwitterURL.'&twitterAccess3=1" class="twitter-share-button " data-show-count="True">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
       </td>
        <td class="socialTd">
	<!-- Your like button code -->
	<div class="fb-like" 
		data-href="'.$pageTwitterURL.'" 
		data-layout="standard" 
		data-action="like" 
		data-show-faces="true">
		
		
	
	</div>
	    </td>

	

    </table>
                        <span class="flames"> '.$like->returnNumberOFLikesPerPost($data["reviewID"]).' </span>
                        <span class="liked" data-value="0"> Like </span>
                      <a class="btn-floating btn-large white heatButton heatbuttonChange"  data-value='.$data["reviewID"].'>
            <i class="large material-icons  "></i>
            
        </a>
        
        
                      </div>
                <div class="stCommentContainer">
                       <div class="dialogbox">
                    
    <div class="body">
      <span class="tip tip-right"></span>
      <div class="message">




       
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
               
               <div  class="input-field col s12 commentTextField ">
                 <textarea  id="textarea1"  name="comment" class="materialize-textarea " length="300 newCommentText"  required   placeholder="comment"></textarea>

            </div>
            </div>
             <input type="hidden" class="" name="post_id"  class="postValue" data-value="'.$item->post_id.'">
           <a class="mdl-button mdl-button--raised mdl-button red commentButton commentButto" style="color: white;"> comment </a>
        


    </div>
      </div>
    </div>
  </div>

                
                
                      </div>
                          <div class="commentContainer">');

                          foreach ($commentsObject as $object) {
                             $userDetais= $reviews->displayReviewAuthorDetails($object->id);

                              foreach ( $userDetais as $userDeetailInfo) {

                                  echo(' <div class="dialogbox">
    <div class="body">
      <span class="tip tip-right"></span>
      <div class="message">
      
      
      
      
       <form method="post" action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                 <div class="sidebar-image  ">
                
            <img  src="http://rate.imagehut.co.za' . Url::templatePath() . 'image/UserUploads' . $userDeetailInfo->imageURL . '" class="circle imagereviewPosition">
           <span class="userName"> '.$userDeetailInfo->username.' </span>
             </div>
               <div  class="input-field col s12 commentTextField ">
                '.$object->Text.'

                <span>'.$object->Time.' </span>
            </div>
            </div>
             <input type="hidden" name="post_id" value="'. $item->post_id .'">

          </form>


    </div>
      </div>
    </div>');

                              }   }


          echo('              
                <div class="sidebar-image  ">
            <img  src="'.Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl'].'" class="circle imagereviewPosition">
             </div>
                <div class="dialogbox">
                    
    <div class="body">
      <span class="tip tip-right"></span>
      <div class="message">




       <form method="post" action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
               
               <div  class="input-field col s12 commentTextField ">
                 <textarea  id="textarea1"  name="comment" class="materialize-textarea " length="300"  required   placeholder="comment"></textarea>

            </div>
            </div>
             <input type="hidden" name="post_id" value="'.$item->post_id.'">
           <button class="mdl-button mdl-button--raised mdl-button red commentButton" style="
    color: white;
"> comment </button>
          </form>


    </div>
      </div>
    </div>
  </div>



                       </div>
                        </div>
              </div>

             </main>





"');}
                }


        }
                foreach ($content as $contentInfo) {
                        //print_r($content);
                    echo(' <li  > <div class="demo-card-square mdl-card mdl-shadow--2dp medium ReadMovieCardPlayCard"  style="background: url(' . $contentInfo->ImageUrl . '); background-repeat: no-repeat; background-size: cover;" >');
                    echo($contentInfo->title);
                    echo('<div  class="mdl-card__title mdl-card--expand">');



                    echo('<h2 class="mdl-card__title-text reviewText">' . $item->title . '</h2>');
                    echo('</div>');

                        echo("</div> <div class='postText'>");


                        echo("</div>")  ;


                        echo('<div class="mdl-card__supporting-text">');
                        echo('</br>   ');




                        echo ("</li>");
                    }





    }
     public function comments(){


          $comments = new \Controllers\comments();
          $comments->index();




     }

    //CODE FOR COMMENTS
    //



           // $gamedetails = $contentDetails->displayGameDetails($item->content_Id);
          //  print_r($gamedetails);
           // echo ("</br>");
         //   echo ("</br>");
         //   echo ("</br>");

         //   print_r($moviedetails);
         //   echo ("</br>");
          //  echo ("</br>");
          //  echo ("</br>");
          //  $bookdetails = $contentDetails->displayBookDetails($item->content_Id);
          //  print_r($bookdetails);}


//
//

        }








?>

