<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Helpers\Url;
$reviews     = $data["reviewsObject"];
$posts       = $data["reviews"];
$ratingModel = $data["RatingModels"];


echo ('<div class="card medium community comunityReviews"> 
   
     <span class="communityHeader2"> Games </span>
     <div class="navMini">
   <div class="ulMIni ">
   <li class="limini"><a href="http://rate.imagehut.co.za/?gamesNav=1">Reviews</a></li>
   <li class="active limini"><a href="http://rate.imagehut.co.za/?gamesNav=4">Recently Added</a></li>
   <!--<li class="active limini"><a href="#">Search</a></li>-->
   
   </ul>
   </div>
   
   </div>
   
   </div>');
?>
<?php
if ($_GET["gamesNav"] == 1) {

    foreach ($posts as $item) {
        $content = $reviews->displayContentDetails($item->content_Id);


        $ratingNumber = $ratingModel->returnRating($item->content_Id);
        foreach ($content as $contentInfo) {

            $desc = strip_tags($contentInfo->description);
            echo ("
   
   <h3 style=\"position: relative;top: 92px;left: 302px;\">
   $contentInfo->tltle<br>
   
   </h3>
           
           </br></br>
            
            <ul class=\"photo-grid\">
	            <li style=\"
    width: 20%;
\">
                    <figure>
                        <img src='$contentInfo->ImageUrl'  width='200px' height='200px'>
                        <figcaption><p>$desc</p></figcaption>
                    </figure>
			    </li>
            </ul>
            
            ");

            // print_r($posts);


        }




        echo (' 
    <div class=""> ');
        echo ('<table class=" " style="width: 22%;position: relative;top: -168px;left: 291px;" > <tr>');
        for ($x = 1; $x <= $ratingNumber[0]->value; $x++) {

            echo ('<td><img src="' . Url::templatePath() . 'image/starRatings/full star1.png" style="width: 50px;"/></td>');
        }
        if (strpos($starNumber, '.')) {
            echo ('<td><img src="' . Url::templatePath() . 'image/starRatings/halfStar.svg.png" style="position: absolute;top: 0;width: 15;width: 50px;margin-left: 81px;"/> </td>');
            $x++;
        }
        while ($x <= 5) {
            echo ('<td><img src="' . Url::templatePath() . 'image/starRatings/blankstar.png" style="width: 50px;" /></td>');
            $x++;

        }
        echo (' </tr> </table>');
        echo (' </div>');





        echo (' </td> </tr>');

        $review = $item->preview;

        if(strlen($review)<= 267)
        {
            $review = $review;
        }
        else
        {
            $review = substr($review,0,267) . ' ...';
        }

        echo ('
   
                          <tr> <td> 
                           <div class="card blue-grey reviewCardPosition" style="position: relative;top: -157px;width: 50%;left: 250px;"  >
                           
                           <form method="get" action="#">
                            <div class="card-content white-text">
                                   <p>' . $review . '</p>
                                   <span class="card-title">Posted: ' . $item->Time . '</span>
                               </div>
                               <div class="card-action" style="padding: 5px;">
                               <input type="hidden" name="readReview" value="' . $item->post_id . '">
                               <input type="hidden" name="authorID" value="' . $item->id . '">
                                   <a ><button type="submit">Read more... </button></a>
                                  
                                    
                                   </div>
                                   </form>
                               </div> </td> </tr> </table>  ');

    }







}

?>