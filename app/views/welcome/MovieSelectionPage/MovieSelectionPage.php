<?php
/**
 * Sample layout.
 */
use Core\Language;


$title = $data['title'];

$tmdb=$data['tmdb'] ;
$movie_object=$data['latest'] ;


?>

<?php

echo('
    <div class="card  communityReview " style="width: width: 100%;    opacity: 0.7;"> 

  <span class="communityHeader2"> Which movie would you like to review? </span>
  <form method="get" action="/search" id="search" class="searchBarPositionForWritingReviews">
  <input name="BookName" type="text" size="40" placeholder="Search...">
</form>
</div>
    <div  class="otherwrapper contentSearchform">
    <div class="card medium movieBackgroundImg">
    <div class="page-header">

        <h1 class="searchTextStyle"></h1>
    </div>

   



    





 


</div> 


</div>



');
echo("");
echo('<div class="card suggestionsScrollBar"><span class="suggestionsSpan">suggestions</span> <table>');




$count=1;

foreach($movie_object as $movie){
    if ($count % 2 == 0) {
        echo(' <tr>');
    }
    $trailerURl=$tmdb->getTrailer($movie->getID());


    // print_r($trailerURl->id);

    // print_r($movie);
    echo(' 
 

 <td class="">


        <form action="#" method="get">
 <div class="tile job-bucket">
    <div class="front"   >
      <div class="contents"
 <div class="scroll-content-item ui-widget-header">


  <img src="'. $tmdb->getImageURL('w185') . $movie->getPoster() .'"  style="min-width: 70%;width: 50%;max-width: 50%;min-height: 30%;max-height: 30%;height: 30%;">

  <div class="mdl-card__title">  <h2 class="mdl-card__title-text">'. $movie->getTitle() .'</h2>   </div>

    <div class="mdl-card__actions mdl-card--border" style="border-bottom: 1px solid rgba(0,0,0,.1);">


</a>

  </div>
  </div>
    </div>
      <div class="back ">
  <div class="mdl-card__supporting-text colorTextForsuggestions" >
      <p> '.$movie->getTagline().'</p>
       <p> '.$movie->getReleaseDate().'</p>

    <button class="mdl-button mdl-button mdl-js-button mdl-js-ripple-effect suggerstionOutlineButton"  name="movieURL" type="submit" value="'.$tmdb->getImageURL('w185') . $movie->getPoster().'"> Write Review</button>
<input type="hidden" name="movieID" value="'.$movie->getID().'">

  </div>

  </div>

</form>
 </div>
  </div>


</td>' );

    if ($count % 3 == 0) {
        echo('</tr>');
        $count = 1;
    }

    $count = $count + 1;



}



echo(' 
  
  </div>
  

 

</table>');
?>



<p><?php //echo $data['welcome_message'] ;




    ?></p>

