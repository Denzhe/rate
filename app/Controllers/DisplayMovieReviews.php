<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/24/2016
 * Time: 3:25 AM
 */

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\content;
use Models\DisplayMoviesReviews;


class DisplayMovieReviews extends Controller
{



    Public function index(){

        $reviews = new DisplayMoviesReviews();
        $latestReviews =$reviews->displayAllReviews();
        $moviedeatils=new content();
        //print_r($latestReviews);

        echo('<div class="displayMovieReviesText">Latest Reviews</div>');
        echo("<div class=\"WraperForslider\"> <div class=\"my-slider\"><ul style=\"width: 400%; left: -300%; height: 76%;\">");
        foreach ($latestReviews as $item) {
            $user = $reviews->displayReviewAuthorDetails($item->id);
            $content = $reviews->displayContentDetails($item->content_Id);

            $moviedeatils->displayMovieDetails($item->content_Id);
            foreach ($content as $contentInfo) {
                foreach ($user as $userInfo) {
                    echo(' <li  > <div class="demo-card-square mdl-card mdl-shadow--2dp medium "  style="background: url(' . $contentInfo->ImageUrl . ');  background-repeat: no-repeat;/* background-size: 66%; */background: width;background-size: cover;min-height: 446px;max-height: 446px;" >');
                     echo($contentInfo->title);
                     echo('<div  class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text reviewText">' . $item->title . '</h2>');
                    echo('</div>');


                    echo("</div> <div class='postText'>");


                    echo("</div>")  ;
                    echo(" <div class=\"card-square small mdl-card mdl-shadow--2dp\"  style=\"position: absolute;top: 0%;margin-left: 334PX;/* margin-left: 10%; */min-width: 688px;max-width: 672px;max-height: 428px;min-height: 428px;\" >");
                            
                  echo('<div style="min-height: 309px; width: 486px;">');
                  echo($item->preview);
                     echo("<div>");  

                    echo('<div class="mdl-card__supporting-text">');
                    echo('</br>');
                    echo("by");
                    echo( $userInfo->username );
                    echo( $item->Time );
                    echo('</div>');
                    echo(' <div class="mdl-card__actions mdl-card--border"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect reviewText">Read Review</a></div>');
                    echo('</div> ');

                    echo ("</li>");
                }



            }

        }
        echo("</ul> </div> ");
        echo ("</div>");
    }

}