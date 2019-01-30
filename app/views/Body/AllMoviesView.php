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

//echo('
//<img src="'.Url::templatePath().'moviesBanner.jpg" style="position: absolute;
 //                                                         top: 67px;
 //                                                         width: 100%;
 //                                                         height: 547px;
 //                                                         z-index: -5;
 //                                                         opacity: 0.5;
 //
//


//                                                         ">');

echo('
<div class="card medium communitySpecs" style="top: -14px;position: fixed"> 

  
  
  <div class="navMini">
  <div class="ulMIni ">
    <li class="limini">
      <a href="#">Reviews
      </a>
    </li>
    <li class="active limini">
      <a href="http://rate.imagehut.co.za/?MoviesNav=4">Recently Added
      </a>
    </li>
    <li class="active limini">
     <!-- <a href="#">Search-->
      </a>
    </li>
    <li class="active limini"><a href="http://rate.imagehut.co.za/?MoviesNav=2">Trailers</a></li>
    </ul>
     </li>
    <li class="active limini"><a href="http://rate.imagehut.co.za/?MoviesNav=3&DicoverMovies=1">Discover</a></li>
    </ul>
</div>
</div>');
//echo('
//<img src="'.Url::templatePath().'movieIcon.jpg" class="circle" style="position: absolute;top: 12%;left: 42%;max-width: 15%;min-height: 7%;opacity: 0.8;">');
echo('
');?>


    </div>

<?php

if(($_GET["MoviesNav"]==1)){

echo('<div class="movieScrollWrapper22">
<span class="communityHeader2"> Movies </span>');

$COUNT=0;
foreach ($posts as $item) {

    $content = $reviews->displayContentDetails($item->content_Id);


    $ratingNumber= $ratingModel-> returnRating($item->content_Id);
    foreach ($content as $contentInfo) {







       echo('<div class="postContainer">
  <div class="info">
    <h1>Recent Reviews</h1>
  </div>
  <!-- Normal Demo-->
  <div class="column">
    <div class="demo-title">'.$contentInfo->tltle.'</div>
    <!-- Post-->
    <div class="post-module">
      <!-- Thumbnail-->
      <div class="thumbnail">
        <div class="date">
          ' . $item->Time . '
        </div><img src="'.$contentInfo->ImageUrl.'"/>
      </div>');






        echo(' 
 
       <!--  Content Rating-->
 <div class="starDisplay1"> ');
        echo('<table class="starTable"> <tr>');
        for($x=1;$x<=$ratingNumber[$COUNT]->value;$x++) {

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




        echo(' </tr></td> </table> 
    <!-- end of Content Rating-->
    ');



        echo('
      <!-- Post Content-->
      <div class="post-content">
        
        
        


      



       

        <h1 class="title">'.$contentInfo->tltle.'k</h1>
       
        <p class="description">>' . $item->preview . '</p>
        <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> ' . $item->Time . '</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 39 comments</a></span></div>
      
      
       <form method="get" action="#">
                            <input type="hidden" name="readReview" value="'. $item->post_id.'">
                            <input type="hidden" name="authorID" value="'. $item->id.'">
                                <a ><button type="submit">Read more... </button></a>


                               
                                </form>
      </div>
    </div>
  </div>
  <!-- Hover Demo-->
 ') ;









        // print_r($posts);


    }





$COUNT=$COUNT+1;
}













?>


    <div class="title">
        <h6>Posts</h6>
    </div>
    <div class="row">



    </div>

    </div>


</div>
</div>

<?php  } ?>




<?php
//code for trailers

if(($_GET["MoviesNav"]==2)){


    echo('
    
   
    <div class="card medium trailerSearchWrapper "   style="height: 77px;">
    <div class="page-header">

    </div>

   



    
<form action="#" method="get" class="form-wrapper5 cf">
<input type="text" name="TrailerName" placeholder="Search Movie"> <br/>
<input type="hidden" name="MoviesNav" value="2"> <br/>
<button type="submit" name="submit" value="Search"  style="/* position: absolute; */margin-top: 0px;margin-left: -22px;" > search</button>
</form> 




 


</div> 

</div>



');


}







?>




