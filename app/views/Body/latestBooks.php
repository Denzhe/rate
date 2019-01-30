<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/29/2016
 * Time: 6:50 PM
 */

use Helpers\Url;

//print_r($book1);



echo('<div class="BookDisplayWrapper"  style="background:URL('.Url::templatePath().'image/book2.jpg);"');

for ($x = 1; $x <= 10; $x++) {
    $varstringName="book".$x;

    echo("</br>");
    foreach ($data[$varstringName]->data as $item)
    {
        //print_r($data[$varstringName]);
        $var=1;
        if($var==1) {
            echo('  <div class=" mdl-card mdl-shadow--2dp 
                    divRowclaass  " >');
            
        
            // print_r( $tmdb->getTrailer($item->_data["id"]));
            echo('<img src="http://covers.librarything.com/devkey/1a154ad3bc478f00989d91ca77af194b
/medium/isbn/'.$item->isbn13.'"  class="bookDisplayCard">');
            

            echo('<img src="http://covers.openlibrary.org/b/isbn/'.$item->isbn13.'-S.jpg"  class="openLibrabryImage">');
            echo("<div class=\"mdl-card__title\">");
            echo($item->title);

            echo($item->edition_info);
            echo($item->author_data->name);
            echo("</div>");

            echo("<div class=\"mdl-card__supporting-text\" style=\"
    font-size: 2rem;
\" >");
            echo($item->summary);

            echo("</div>");
              echo('<div class="mdl-card__actions mdl-card--border">
             <div class="ol_readapi_book" isbn="'.$item->isbn13.'"></div>
            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="gameID" type="submit" "> Write Review</button></a>
              <a href="https://www.amazon.com/gp/search/ref=sr_adv_b/?field-isbn='.$item->isbn13.'"> <button  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="gameID" type="submit" ">Find book on AMAZON</button></a>   
                 </div>');
            

            echo ("</div>");

            break;

        }

    }



}


echo("</div>");