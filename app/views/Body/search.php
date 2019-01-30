<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/27/2016
 * Time: 9:39 PM
 */

use Helpers\Url;
$xml=$data["gameobject"];

?>



    <div class="card medium community" style="top: -14px;">

    <span class="communityHeader2"> Search </span>


    </div>



<div class="gameSearchwrapper">
	<div class="page-header">
		<h5>Results in games</h5>
	</div>
<form action="#" method="get">

	<div class="als-container" id="searchSlider8">
		<span class="als-next scrolerNextButton" style="position: absolute;   top: 163px;"><a class=" als-next waves-effect waves-light btn-large red " style=""><i class="material-icons right">navigate_next</i></a></span>
		<span class="als-prev" style="position: absolute;top: 163px;left: 212px;"><a class=" als-prev waves-effect waves-light btn-large red "><i class="material-icons right">navigate_before</i></a></span>
		<div class="als-viewport">
			<ul class="als-wrapper">

<?php


foreach ($xml->results->children() as $item) {
	//echo(' <a href=" '. $item-> site_detail_url .'" >  </br>');
//print_r($xml);
$count=$count+1;
	if ($count==10)
	{

		break;
	}
	echo(' <li class="als-item">


 <div class="scroll-content-item ui-widget-header">
<div class="demo-card-wide3 mdl-card mdl-shadow--2dp"  style="    height: 1036px;
    min-height: 1054px;">

  <img src="'.$item->image->super_url .'"  style="min-width: 70%;width: 50%;max-width: 50%;min-height: 30%;max-height: 30%;height: 30%;">
  
  <div class="mdl-card__title">  <h2 class="mdl-card__title-text">'.  $item->name  .'</h2>   </div>
  
    <div class="mdl-card__actions mdl-card--border" style="border-bottom: 1px solid rgba(0,0,0,.1);">
<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="gameID" type="submit" "> Write Review</button>
    
</a>

  </div>
  
  <div class="mdl-card__supporting-text"  style="max-height: 820px;overflow: scroll;    overflow-x: hidden;">
      
               '.$item->description.'
<input type="hidden" name="gameID" value="'.$item->id.'">
  
  </div>

  </div>
 
</li>' );













}
?>
    </ul>
  </div>

</div>
</form>
</div>
<div class="moveEveryThingSearchResults">
<?php


echo("<h5>Results in movies</h5>");
$movie_object=$data['movieObject'];
$tmdb=$data['tmdb'];

echo('<div class="movie">');
echo("<div id=\"searchSlider10\" class=\"als-container\" >
  <span class=\"als-prev\" style=\"position: absolute;top: 181px;left: 79px;\"><a class=\" als-prev waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_before</i></a></span>
  
   <span class=\"als-next scrolerNextButton \" style=\"position: absolute;   top: 163px;\" ><a class=\" als-next waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_next</i></a></span>
  <div class=\"als-viewport\">
    <ul class=\"als-wrapper\">");



foreach($movie_object as $movie){

    $trailerURl=$tmdb->getTrailer($movie->getID());




   // print_r($trailerURl->id);

       // print_r($movie);
        echo(' <li class="als-item">


        <form action="#" method="get">

 <div class="scroll-content-item ui-widget-header">
<div class="card  movieSearchResultsDisplayCard">
<img src="'. $tmdb->getImageURL('w185') . $movie->getPoster() .'"  style="min-width: 70%;width: 50%;max-width: 50%;min-height: 30%;max-height: 30%;height: 30%;">
  
  <div class="mdl-card__title">  <h2 class="mdl-card__title-text">'. $movie->getTitle() .'</h2>   </div>
  
    <div class="mdl-card__actions mdl-card--border" style="border-bottom: 1px solid rgba(0,0,0,.1);">
<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="movieURL" type="submit" value="'.$tmdb->getImageURL('w185') . $movie->getPoster().'"> Write Review</button>
    
</a>

  </div>
  
  <div class="mdl-card__supporting-text" style=";">
      <p> '.$movie->getTagline().'</p>
       <p> '.$movie->getReleaseDate().'</p>
   
                
<input type="hidden" name="movieID" value="'.$movie->getID().'">
 </div>
 </div>
</form>



</li>' );



}



    echo(' 
    </ul>
  </div>
  

 
</div>');
?>
</div>



</div>
<div class="BookSearchResultsEverything">
<?php

$BookObject=$data['bookObject'];



echo('<span class="bookSearchResultsText"><h5>Results in books</h5></span>');
echo("<div id=\"searchSlider11\" class=\"als-container\" >
  <span class=\"als-prev\" style=\"position: absolute;top: 181px;left: 79px;\"><a class=\" als-prev waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_before</i></a></span>
     <span class=\"als-next scrolerNextButton\"  style=\"position: absolute;   top: 163px;\"><a class=\" als-next waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_next</i></a></span>


  <div class=\"als-viewport\">
    <ul class=\"als-wrapper\">");


foreach ($BookObject->data as $item)
{



    echo('   <li class="als-item">


 <div class="scroll-content-item ui-widget-header">
 <div class=" mdl-card mdl-shadow--2dp" style="height: 1036px;min-height: 1055px;">');


    // print_r( $tmdb->getTrailer($item->_data["id"]));
    echo('<img src="http://covers.librarything.com/devkey/1a154ad3bc478f00989d91ca77af194b/medium/isbn/'.$item->isbn13.' " onerror="this.src=http://rate.imagehut.co.za\''. Url::templatePath() .'images/missingImage.png\'"  class="bookDisplayCard">');

    echo('<img src="'.Url::templatePath().'image/missingImage.png" class="brokenImage">');
    echo('<form action="http://rate.imagehut.co.za/?writeBookReview"  method="get">' );
    echo('<input type="hidden" name="isbn" value="'.$item->isbn13.'">');
    echo('<input type="hidden" name="Booktitle" value="'.$item->title.'">');
    echo('<div class="mdl-card__actions mdl-card--border" style="border-bottom: 1px solid rgba(0,0,0,.1);">
                    <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="reviewBook" type="submit" "> Write Review</button></a>
                      <a href="https://www.amazon.com/gp/search/ref=sr_adv_b/?field-isbn='.$item->isbn13.'"> <button  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="gameID" type="submit" ">Find book on AMAZON</button></a>   
                         </div>');
    echo('<input type="hidden" name="Bookinfo" value="'.$item->edition_info.'">');
    echo('<input type="hidden" name="AuthorName" value="'.$item->author_data->name.'">');
    echo('<input type="hidden" name="Url" value="http://covers.openlibrary.org/b/isbn/'.$item->isbn13.'-S.jpg">');
    echo('<img src="http://covers.openlibrary.org/b/isbn/'.$item->isbn13.'-S.jpg"  class="openLibrabryImage bookdisplayimage" >');
    echo("<div class=\"mdl-card__title\">");
    echo($item->title);

    echo($item->edition_info);
    echo($item->author_data->name);
    echo("</div>");

    echo("<div class=\"mdl-card__supporting-text\" style='overflow: scroll;    overflow-x: hidden;height: 537px;'>");
    echo($item->summary);

    echo("</div>");


    echo("</form>");
    echo ("</div> </li>");


}
   echo(' 
    </ul>
  </div>
  

 
</div>');

?>

</div>