<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/22/2016
 * Time: 3:37 PM
 */
use Helpers\Url;
$BookObject=$data['Books'];
//foreach ($BookObject->data as $item)
//{  
  //  echo('<div class="Bookresults">');
    //echo($item->title);
    //echo( '<img src="http://covers.openlibrary.org/b/isbn/'.$item->isbn13.'-M.jpg" />');

    //echo("</div>");

//}


echo('

<div class="card medium communityReview " style="top: -14px;"> 

  <span class="communityHeader2"> Choose book to review. </span>
</div>


<div class="page-header">
		<h3  style="position: absolute;left: 30%; top: 7%;" ></h3>
	</div>');

echo("<div id=\"search6slider\" class=\"als-container\" >
  <span class=\"als-prev\"><a class=\" als-prev waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_before</i></a></span>
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

            echo("<div class=\"mdl-card__supporting-text\" style='overflow: scroll;height: 537px;'>");
            echo($item->summary);

            echo("</div>");

            
            echo("</form>");
            echo ("</div> </li>");

    
    
    
}
   echo(' 
    </ul>
  </div>
  

  <span class="als-next" ><a class=" als-next waves-effect waves-light btn-large red "><i class="material-icons right">navigate_next</i></a></span>
</div>');
