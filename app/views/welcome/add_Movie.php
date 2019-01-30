<?php
/**
 * Sample layout.
 */
use Core\Language;

$_SESSION["writing"]==0;
$movie_object=$data['movies'];
$tmdb=$data['tmdb'];



echo('


<div class="card medium communityReview " style="top: -14px;"> 

  <span class="communityHeader2"> Choose movie to review </span>
</div>




<div class="page-header">
		<h3  style="position: absolute;left: 30%; top: 7%;" >.</h3>
	</div>');



echo('<div class="movie">');
echo("<div id=\"search6slider\" class=\"als-container\" >
  <span class=\"als-prev\"><a class=\" als-prev waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_before</i></a></span>
  <div class=\"als-viewport\">
    <ul class=\"als-wrapper\">");



foreach($movie_object as $movie){

    $trailerURl=$tmdb->getTrailer($movie->getID());


        // print_r($trailerURl->id);

        // print_r($movie);
        echo(' <li class="als-item">


        <form action="#" method="get">

 <div class="scroll-content-item ui-widget-header">
<div class="demo-card-wide3 mdl-card mdl-shadow--2dp" style="height: 1036px;min-height: 1055px;">

  <img src="'. $tmdb->getImageURL('w185') . $movie->getPoster() .'"  style="min-width: 70%;width: 50%;max-width: 50%;min-height: 30%;max-height: 30%;height: 30%;">

  <div class="mdl-card__title">  <h2 class="mdl-card__title-text">'. $movie->getTitle() .'</h2>   </div>

    <div class="mdl-card__actions mdl-card--border" style="border-bottom: 1px solid rgba(0,0,0,.1);">
<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="movieURL" type="submit" value="'.$tmdb->getImageURL('w185') . $movie->getPoster().'"> Write Review</button>

</a>

  </div>

  <div class="mdl-card__supporting-text" style="overflow: scroll;height: 537px;">
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
  

  <span class="als-next"><a class=" als-next waves-effect waves-light btn-large red "><i class="material-icons right">navigate_next</i></a></span>
</div>');
