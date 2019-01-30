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
<div class="container pics">
    <div class="title reviewHeaderTextAll" style="
    position: relative;
    top: 150px;
    left: 19%;
">
        Recent Reviews
    </div>
</div>




    <?php


    $num = 0;
    $contentName = array();
    $contentImage = array();

    foreach ($posts as $item) {
        $content = $reviews->displayContentDetails($item->content_Id);

        foreach ($content as $contentInfo) {
            // print_r($posts);


            $contentImage[$num] = $contentInfo->ImageUrl;

            $contentName[$num] = $contentInfo->tltle;

        }

        echo('
               
                <form method="get" action="#">
                 
                 
                 <li><b>
                 ' . $contentName[$num] . '
                 ' . $item->Time . '</span>
                 </b>
                 <br>  
                    <p>' . $item->preview . '</p>
                </li>
                  
                    <input type="hidden" name="readReview" value="'. $item->post_id.'">
                    <input type="hidden" name="authorID" value="'. $item->id.'">
                        <a ><button type="submit">Read more... </button></a>
                       
                        </form> ');
        $num +=1;

    }

    ?>