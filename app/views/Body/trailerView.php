<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/18/2016
 * Time: 2:54 AM
 */


$trailer =$data['movies'];

$tmdb=$data['tmdb'];



echo('<div class="trailerwrapper">');
echo ('<table>');
foreach ($trailer as $item)
{


    echo('<tr>');
    echo('<td>');
    $poster=$tmdb->getImageURL('w185') .$item->_data["poster_path"];
    echo('  <div class=" mdl-card mdl-shadow--2dp newMovieCard"  style="background: url('.$tmdb->getImageURL('w185') .$item->_data["poster_path"].');  background-repeat: no-repeat;background-size: cover; */" >');
    // print_r( $tmdb->getTrailer($item->_data["id"]));

    echo("<div class=\"mdl-card__supporting-text\">");

    echo("</div>");
    echo(' <div class="mdl-card__actions mdl-card--border"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect reviewText"></a></div>');
    echo ("</div>");
    echo('</td>');
    echo('<td>');
    echo("<div class=\" mdl-card mdl-shadow--2dp TrailerDisplayCard \">
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



    echo('<div class="play"></div>');

    echo('
    
    
    <iframe width="560" height="349" src="https://www.youtube.com/embed/'.$trailers["results"][0]["key"].'?modestbranding=1" frameborder="0" allowfullscreen></iframe>
    
   
 
 
      ');

    //<img src="'.$tmdb->getImageURL('w185') .$item->_data["poster_path"].'" alt="Use your own screenshot.">
//</div>');



    echo ("</div></div>");
    echo('</td>');
    echo('</tr>');
}
echo("</ul> </div> ");
echo("</div>");
echo("</div>");
echo ('</table>');
echo("</div>");