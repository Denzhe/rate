<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/23/2016
 * Time: 11:07 AM
 */

//\\$IMDB=$data['id'];
$title=$data['title'];
$genre_list=$data["genrelist"];
$producers=$data["producers"];
$running_Time=$data['runningTime'];
$realease_date=$data ['realeaseDate'];
$imageURL=$data['imageUrl'];
$description=$data['description'];
$trailerURl=$data['tralierURl'];

echo('<div class="moveReviewInfo">
   </div>
   
   
   <div class=\'ratingDivUpdated\'>
    <div id="rateYo" class="starRatingMove"></div>

</div>
   
   
   ');


echo('
   <div class="moveheaderBackgroundUpdated"   style="background-image: URL( '.$imageURL.');   ">  </div> 
   <div class="movieHeaderUpdated" style="background-image: URL( '.$imageURL.') ;">
    <button class="mdl-button mdl-button mdl-js-button mdl-js-ripple-effect suggerstionOutlineButton moreInfoButton2 moreTrailerButton " name="movieURL"  value="http://image.tmdb.org/t/p/w185/lFSSLTlFozwpaGlO31OoUeirBgQ.jpg" data-upgraded=",MaterialButton,MaterialRipple"> Trailer<span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 289.172px; height: 289.172px; transform: translate(-50%, -50%) translate(79px, 16px);"> Trailer</span></span></button>
   <button class="mdl-button mdl-button mdl-js-button mdl-js-ripple-effect suggerstionOutlineButton moreInfoButton" name="movieURL"  value="http://image.tmdb.org/t/p/w185/lFSSLTlFozwpaGlO31OoUeirBgQ.jpg" data-upgraded=",MaterialButton,MaterialRipple"> More info<span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 289.172px; height: 289.172px; transform: translate(-50%, -50%) translate(79px, 16px);"> more info</span></span></button>
   
  
 
   
   </div>

<div class="writeREviewOverlay"></div>

    ');


?>

<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<p>Rate <?php $title ?></p>



<div class="WrittenContainer">

<?php
echo('
   <div class="movieDetailsUpdated" style="width: 632px;" >
     <h2 class="headline5">     Title: ' .$title.' </h2>
     <h3 class="headline5"> RunningTime: '.$running_Time.' Minutes</h3>
     <h3 class="headline5">Release Date: '.$realease_date.' </h3>

     <span class="tagline" ><h3 class="headline5">Story Line: '.$description.'</h3></span>

   </div>
 
 
 <div class="card medium WritetrailerCard" style="position: absolute;top: 4%;width: 706px;height: 519px;left: 4%;" ');

echo(' <div class="trailer" >
                    <div class="youtube" id="'.$trailerURl.'" data-params="modestbranding=1&amp;showinfo=0&amp;
                    controls=1&amp;vq=hd720" style="width: 661px;height: 514px;
                    margin-left: 43px;background-image: url(&quot;http://i.ytimg.com/vi/r4f7R0VLonk/sddefault.jpg&quot;);"> 
                    </div> 
      ');
echo('  <div class="card-content" style="position: absolute;top: -5%;">
                       <p>Double click to watch trailer</p>
                   </div>
               </div>');
?>
<form id="written" action="#" method="post" >
    <div class='textEditor'>
         <textarea name="editor1" id="editor1" rows="10" cols="80">
              <h1 style=\"text-align: center;\"><strong>MOVIE REVIEW TEMPLATE</strong></h1>
             <h1 style=\"text-align: center;\">&nbsp;</h1>
             <p>Note: &nbsp;DON&rsquo;T FORGET that movie titles are written within &ldquo;quotation marks!&rdquo;</p>
<p><br /><br /></p>
<p><strong>HEADLINE: </strong>&nbsp;Include the title of the movie (try to use a pun!)</p>
<p>&nbsp;</p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PARAGRAPH #1:</strong> &nbsp;</p>
<p>Introduce the movie by stating that you&rsquo;ve just seen this movie and would like to give an opinion about it. &nbsp;Mention a couple of details that might help the reader understand what type of movie you are talking about. &nbsp;Give credit to the company that published it.</p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PARAGRAPH #3</strong>:</p>
<p>&nbsp;Summarize the plot (story). &nbsp;Where and when did it take place? &nbsp;Who are the main characters? &nbsp;What is the story about? &nbsp;Remember, do NOT include spoilers and do not tell how the story ends! &nbsp;&nbsp; Talk about the actors/actresses and discuss who did a good job and who didn&rsquo;t. &nbsp;(In &ldquo;A Christmas Carol&rdquo; it would be voice overs and cartooning.</p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PARAGRAPH #4</strong>&nbsp;</p>
<p>Talk about what you liked about the movie and what you didn&rsquo;t like. &nbsp;Be sure to include specific details and scenes.</p>
<p><br /><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PARAGRAPH #5</strong>:</p>
<p>&nbsp;What group of people would like this movie? &nbsp;Who would you recommend it to? &nbsp;Who would you not recommend it to? &nbsp;What&rsquo;s the MPAA rating of the movie (G, PG, PG-13, R, etc&hellip;)? &nbsp;What is your final word on the film: &nbsp;Is it good or bad?</p>
            </textarea>
        <script>
            // Replace the <textarea id=\"editor1\"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );

        </script>
        <div class="previewUpdated">
            <div class="card medium  previewCard"   style="width: 545PX;height: 260px;">
                <!-- Card Content -->
                <div  class="input-field col s12" style="margin-top: 34px;margin-left: 15px;margin-right: 15px;padding-top: 62px;">
                    <textarea  id="textarea1"  name="preview" class="materialize-textarea" maxlength="500" required ></textarea>
                    <label for="textarea1">summary</label>
                </div>
                <div class="card-content" style="position: relative;top: -14px;left: -3px;">
                    <p>please provide a brief summary of your review</p>
                </div>
            </div>
        </div>
        <input type="hidden" value="1" name="rateyoid" id="rateyoid">
        <div class="reviewSubmisionbuttons3" >
            <button id="show-dialog"  class="waves-effect waves-light btn-large   red closebuttonConfirmation" ><i class="material-icons left">send</i>publish</button>

        </div>
    </div>
</form>
</div>
</div>
</div>