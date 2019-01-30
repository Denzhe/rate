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
//echo('<img src="'.Url::templatePath().'BooksBanner.jpg" style="position: absolute;
//top: 67px;
//width: 100%;
//height: 547px;
//z-index: -5;
//opacity: 0.5;
//">');
// echo('<img src="'.Url::templatePath().'BooksIcon.jpg" class="circle" style="position: absolute;top: 7%;left: 42%;max-width: 15%;min-height: 7%;opacity: 0.8;">');
echo('
<div class="card medium community"   style="top: -15px;"> 

  <span class="communityHeader2"> Books </span>
  <div class="navMini">
<div class="ulMIni ">
<li class="limini"><a href="#">Reviews</a></li>
<li class="active limini"><a href="http://rate.imagehut.co.za/?booksNav=3">Recently Added</a></li>
<!--<li class="active limini"><a href="#">Search</a></li>-->
<li class="active limini"><a href="http://rate.imagehut.co.za/?booksNav=1&BookDiscover=1">Discover</a></li>
</ul>
</div>


  </div>
</div>');





$count=0;

if (!isset($_GET["BookDiscover"])) {
  if($_GET["booksNav"]==1)
  {
  echo('<div class="bookwrapperDivReview2 ">');



  foreach ($posts as $item) {
    $content = $reviews->displayContentDetails($item->content_Id);


    $ratingNumber = $ratingModel->returnRating($item->content_Id);
    foreach ($content as $contentInfo) {


      echo('<table> <tr>');
      echo('  <td>
                   
            <div class="card small reviewCadView "    style="width: 443px;margin-top: 150px;    " >
              <div class="profileReviewDetails profilePageContentText" >
              <span > ' . $contentInfo->tltle . ' </span>  
              </br>
              <span style="color: cornflowerblue; font-size: medium;"> ' . $contentInfo->description . ' </span>  
              </div>
            <div class="col m6 s12">
                
                <div class="card  reviewViewCard "    style="background: url(' . $contentInfo->ImageUrl . ') center center;     width: 650px;">
                <img src="http://covers.librarything.com/devkey/1a154ad3bc478f00989d91ca77af194b/medium/isbn/'.$item->isbn13.' " onerror="this.src=http://rate.imagehut.co.za\''. Url::templatePath() .'image/missingImage.png\'"  class="bookDisplayCard">
                
                    <div class="card-image" id="first-img">
                       
                    </div>
                </div>
                
      </td>

              
              
            ');

      // print_r($posts);


    }


      echo(' 
 <tr> <td> 
        <div class=""> ');
      echo('<table class="bookStarTable   starTablePostionReview"  > <tr>');
      for ($x = 1; $x <= $ratingNumber[$count]->value; $x++) {

        echo('<td><img src="' . Url::templatePath() . 'image/starRatings/full star1.png" style="width: 50px;"/></td>');
      }
      if (strpos($starNumber, '.')) {
        echo('<td><img src="' . Url::templatePath() . 'image/starRatings/halfStar.svg.png" style="position: absolute;top: 0;width: 15;width: 50px;margin-left: 81px;"/> </td>');
        $x++;
      }
      while ($x <= 5) {
        echo('<td><img src="' . Url::templatePath() . 'image/starRatings/blankstar.png" style="width: 50px;" /></td>');
        $x++;

      }

      echo(' </tr> </table>');




    echo(' </tr>  </td>');

    echo(' <tr> <td>

         
          <div class="card blue-grey  reviewCardPosition  booksGreyCard"  >
          
          <form method="get" action="#">
           <div class="card-content white-text">
                  <span class="card-title">' . $item->Time . '</span>
                  <p>' . $item->preview . '</p>
              </div>
              <div class="card-action">
              <input type="hidden" name="readReview" value="' . $item->post_id . '">
              <input type="hidden" name="authorID" value="' . $item->id . '">
                  <a ><button type="submit">Read more... </button></a>
                 
                   
                  </div>
                 
                  </form>
              </div> </td></tr>  </table>  ');
    $count =$count +1;
  }



  echo('</div>

  <div>');






  }

}












?>









