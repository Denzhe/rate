<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Helpers\Url;

$reviews=$data["reviewsObject"];
$posts=$data["reviews"];

    $num = 0;
    $contentName = array();


    foreach ($posts as $item) {
        $content = $reviews->displayContentDetails($item->content_Id);

        foreach ($content as $contentInfo) {

            $contentName[$num] = $contentInfo->tltle;

        }


echo('

    <form method="get" action="#">
     
    ' . $contentName[$num] . '
         ' . $item->Time . '
            
            <p>' . $item->preview . '</p>
   
      
        <input type="hidden" name="readReview" value="'. $item->post_id.'">
        <input type="hidden" name="authorID" value="'. $item->id.'">
            <a ><button type="submit">Read more... </button></a>
            </form>
         ');
$num +=1;

    }

    ?>
