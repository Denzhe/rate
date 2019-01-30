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


?>




<div class="card medium community comunityReviews">

    <span class="communityHeader2"> REVIEWS </span>
    <div class="navMini">
        <div class="ulMIni ">
            <li class="limini"><a href="#">Reviews</a></li>
            <li class="active limini"><a href="#">Recently Added</a></li>
            <li class="active limini"><a href="#">Search</a></li>

            </ul>
        </div>

    </div>










<div class="reviewContainerReviewPage ">
    <div class="title reviewHeaderTextAll" style="
    position: relative;
    top: 150px;
    left: 19%;
">

    </div>

    <?php

    $num = 0;
    $contentName = array();
    $contentImage = array();

    foreach ($posts as $item) {
        $content = $reviews->displayContentDetails($item->content_Id);


        $ratingNumber= $ratingModel-> returnRating($item->content_Id);

        foreach ($content as $contentInfo) {
            // print_r($posts);


            $contentImage[$num] = $contentInfo->ImageUrl;

            $contentName[$num] = $contentInfo->tltle;

        }

        //Stars .........................................................................................
        foreach ($ratingNumber as $value) {

            $starNumber = $value->value;
            echo(' <div class="starShift"> ');
            echo(' <table><tr> ');
            for($x=1; $x<=$value->value; $x++) {

                echo('<td><img src="'.Url::templatePath().'image/starRatings/full star1.png" style="width: 50px;"/></td>');
            }
            if (strpos($starNumber,'.')) {
                echo ('<td><img src="'.Url::templatePath().'image/starRatings/halfStar2.jpg" style="width: 50px;"/> </td>');
                $x++;
            }
            while ($x<=5) {
                echo ('<td><img src="'.Url::templatePath().'image/starRatings/blankstar2.jpg" style="width: 50px;" /></td>');
                $x++;

            }
            echo(' </tr></table></div>');
        }

        //End of stars...................................................................................................................

        $size = getimagesize($contentImage[$num]);
        if($size[0] == 1 && $size[1] == 1 )
        {

            $contentImage[$num] = '/app/templates/default/image/acehprov.jpg';

        }

        echo('
                <span class="contentReviewImage2"><img src='. $contentImage[$num] .'></span>

                <div class="card blue-grey"  style="max-width: 757px;min-width: 757px;min-height: 365px;
                max-height: 365px;margin-left: 86px;">
                
                <form method="get" action="#">
                 <div class="card-content white-text">
                 <span class="card-title" >' . $contentName[$num] . '</span>
                        <span>' . $item->Time . '</span>
                        
                        <p>' . $item->preview . '</p>
                    </div>
                    <div class="card-action">
                    <input type="hidden" name="readReview" value="'. $item->post_id.'">
                    <input type="hidden" name="authorID" value="'. $item->id.'">
                        <div><a ><button type="submit">Read more... </button></a></div>
                       
                         
                        </div>
                        </form>
                    </div>  ');
        $num +=1;

    }

    ?>

</div>

    <div class="row">



        <?php


        ?>

    </div>
















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

</div>