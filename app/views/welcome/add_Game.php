<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 Description of Addgame
 *
 * @author Denzhe Sadiki
 */

use Core\Language;


$xml = $data['xml'];




?>
<div class="card medium communityReview " style="top: -14px;">

<span class="communityHeader2"> Choose game to review</span>
</div>


	<div class="als-container" id="search6slider">
		<span class="als-next"><a class=" als-next waves-effect waves-light btn-large red "><i class="material-icons right">navigate_next</i></a></span>
		<span class="als-prev"><a class=" als-prev waves-effect waves-light btn-large red "><i class="material-icons right">navigate_before</i></a></span>
		<div class="als-viewport" style="width: 676px;height: 805px;"   >
			<ul class="als-wrapper">
				<form action="#" method="get">

<?php


foreach ($xml->results->children() as $item) {
	//echo(' <a href=" '. $item-> site_detail_url .'" >  </br>');
//print_r($xml);
$count=$count+1;
	if ($count==5)
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
  
  <div class="mdl-card__supporting-text"  style="max-height: 820px;overflow: scroll;">
      
               '.$item->description.'
<input type="hidden" name="gameID" value="'.$item->id.'">
  
  </div>

  </div>
 
</li>' );













}
?>
    </ul>
  </div>


		</form>
</div>
