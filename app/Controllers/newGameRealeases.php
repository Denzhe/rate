<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/29/2016
 * Time: 10:09 PM
 */

namespace Controllers;
use Core\View;
use Core\Model;
use Core\Controller;
use Models\Game_Model;
use Helpers\Url;
class newGameRealeases extends Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function getNewGameRealease()
    {


        $gameModel= new Game_Model();


           $gameObject=$gameModel->getGames();
           
          echo('<div class="gameHeader">  Recently added Games </div>');
          echo('<div >    <img src="'.Url::templatePath().'image/gamesCover.jpg" class="gamePicture"> </div>');
        echo(" <div class=\"als-container\" id=\"gameslider\"  style=\"position: absolute;top:267%;left: -3%;\">
		<span class=\"als-next\"><a class=\" als-next waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_next</i></a></span>
		<span class=\"als-prev\"><a class=\" als-prev waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_before</i></a></span>
		<div class=\"als-viewport\" style=\"width: 1017px;height: 542px;\"  >
			<ul class=\"als-wrapper\">");
        foreach($gameObject as $item){




            $contentObject=$gameModel->getContentInformation($item->content_Id);
            foreach ($contentObject as $content)
            {


                echo(' <li class="als-item">


 <div class="scroll-content-item ui-widget-header">
<div class="demo-card-wide3 mdl-card mdl-shadow--2dp"  style="height: 600px;min-height: 600px;">

  <img src="'.$content->ImageUrl .'"  style="min-width: 80%;width: 80%;max-width: 80%;min-height: 80%;max-height: 80%;height: 80%;">
  
  <div class="mdl-card__title">  '.  $content->title .' <p>'.$item->release_Date.'</p>  </div>
  
  <div class="mdl-card__supporting-text">
      
               '.$content->description.'
<input type="hidden" name="gameID" value="'.$item->id.'">
  
  </div>
  <div class="mdl-card__actions mdl-card--border">
<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"  name="gameID" type="submit" "> Write Review</button>
    
</a>

  </div>
  </div>
 
</li>' );


            }
            
            
            

        }

    }
    
    
    public function printOutnewGames()
    {
        
        
           $gameModel= new Game_Model();
            $data["gameModel"]=$gameModel;
            
           $gameObject=$gameModel->getGames();
        // print_r($gameObject);
           $gameReviews=$gameModel->displayGameReviews();
          // print_r($gameReviews);
           $data["RatingModels"]= new \Models\rating();
           $data["reviewsObject"]=$gameReviews;  
           $data["gameobject"]=$gameObject;
           View::render("Body/allGamesView",$data);
           
    }
}


