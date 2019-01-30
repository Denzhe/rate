<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/26/2016
 * Time: 10:15 PM
 * 
 */
use Helpers\Url;
$tmdb=$data['tmdb'];
$latest=$data['latest'];



echo("<h1 class=\"display-1\" style=\"text-align: center; \">New Realeses and Upcoming Movies</h1>");
echo(" <div class=\"sliderWraper\">
<div class=\"my-slider2  \"><ul>");
foreach ($latest as $item)
{



    $poster=$tmdb->getImageURL('w185') .$item->_data["poster_path"];


    echo(' <li> 
<table>
  <tr>
  <td>
 
 
 <div class=" mdl-card mdl-shadow--2dp newMovieCard"  style="background: url('.$tmdb->getImageURL('w185') .$item->_data["poster_path"].');  background-repeat: no-repeat;background-size: cover; */" >');
    // print_r( $tmdb->getTrailer($item->_data["id"]));

    echo("<div class=\"mdl-card__supporting-text\">");

    echo("</div>");
    echo(' <div class="mdl-card__actions mdl-card--border"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect reviewText">Follow Movie</a></div>');
    echo ("</div>");
    echo('</td>');
    echo('</tr>');
    echo('<tr>');
    echo('<td>');
    echo("<div class=\" mdl-card mdl-shadow--2dp  newmovietextcard newMovieCard\">
    <div class=\"mdl-card__title\">");


    //  echo($item->title);



    echo($item->_data["overview"]);


    echo ("</div>");
    echo("<div class=\"mdl-card__supporting-text\">");
    echo("<p>");
    echo($item->_data["original_title"]);
    echo("</p>");
    echo("<p>");
    echo($item->_data["release_date"]);
    echo("</p>");
    echo("</div>");
    echo("</div>");
    echo('</td>');
    echo('</tr>');
    echo('</table>');
    echo("<div class=\" mdl-card mdl-shadow--2dp NewTrailerCard \">
  <div class=\"mdl-card__title\">");
    $trailers=$tmdb->getTrailer($item->_data["id"]);
    $num=0;




        $num = 1;
        //print_r($trailer);

       // foreach ($trailer as $url)
      //  {"
           // print_r($trailers);
          // $trailerUrl= $url["key"];

      //  print_r($trailers);
        echo('<div class="youtube" id="'.$trailers["results"][0]["key"].'" data-params="modestbranding=1&showinfo=0&controls=1&vq=hd720&fs=1" style="width: 857px; height: 1027px;    background-size: cover; ">  <div id="play"></div></div>');

//echo('<div data-video="'.$trailers["results"][0]["key"].'" id="video">
  //<img src="'.$tmdb->getImageURL('w185') .$item->_data["poster_path"].'" alt="Use your own screenshot.">
//</div>');



    echo ("</div></div>");
    echo("</li>");
}
echo("</ul> </div> ");
echo("</div>");
echo("</div>");
