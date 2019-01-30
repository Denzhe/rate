<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Helpers\Url;

$reviews=$data["reviewsObject"];
$posts=$data["reviews"];
$ratingModel= $data["RatingModels"];

 //echo('<img src="'.Url::templatePath().'gamesbanner2.jpg" style="position: absolute;
  //  top: 67px;
  //  width: 100%;
  //  height: 547px;
  //  z-index: -5;
  //  opacity: 0.5;
//">');

echo('
<div class="card medium community"> 

  <span class="communityHeader2"> Games </span>
  <div class="navMini">
  <div class="ulMIni ">
    <li class="limini"><a href="#">Reviews</a></li>
    <li class="active limini"><a href="#">Recently Added</a></li>
 <!--    <li class="active limini"><a href="#">Search</a></li>-->
    
  </ul>
</div>
</div>');
 
//  echo('<img src="'.Url::templatePath().'video games.png" class="circle" style="position: absolute;top: 12%;left: 42%;max-width: 15%;min-height: 7%;opacity: 0.8;">');
//echo('');

?>




 <div class="container pics">
 <div class="title reviewHeaderTextAll">
  Recent Reviews
 </div>
 </div>
<?php





foreach ($posts as $item) {
 $content = $reviews->displayContentDetails($item->content_Id);


 $ratingNumber= $ratingModel-> returnRating($item->content_Id);
 foreach ($content as $contentInfo) {



  echo(" <div>") ;
  echo('<table> <tr>');
  echo('  
                   
            <div class="card small"  style="margin-top: 31%;    margin-left:414px;max-width: 863px;" >
              <div class="profileReviewDetails profilePageContentText" >
              <span > '.$contentInfo->tltle.' </span>  
              </br>
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
 foreach ($ratingNumber as $value) {

  echo(' <div class="starDisplay1"> ');
  echo('<table class="starTable"  style="max-width: 860px;min-width: 860px;min-height: 110px;max-height: 365px;margin-left: 414px;"> <tr>');
  for($x=1;$x<=$value->value;$x++) {

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
  echo(' </tr> </table>');
  echo(' </div>');
 }


 echo('</div>');

 echo(' </tr> </table> </td>');

 echo('
         <td>
          <div class="card blue-grey"  style="max-width: 860px; min-width: 860px; min-height: 365px; max-height: 365px; margin-left: 414px; position: relative;">
          
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
                  </form>
              </div>  ');

}













?>


 <div class="title">
  <h6>Posts</h6>
 </div>
 <div class="row">



 </div>

 </div>



<?php


echo(" <div>") ;


?>