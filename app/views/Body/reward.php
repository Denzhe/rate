<?php

$data["rewards"];
use Helpers\Url;

//print_r($data["rewards"]);

?>
<div class="card medium community  " style="top: -14px;">

    <span class="communityHeader2">Rewards</span>
</div>


<div class="rewardsDisplayContainer">
    <table>
    <?php
    $count=1;

    foreach ($data["rewards"] as $item   )
    {

            echo(' <tr>');

        echo('<td>');
        echo('
        
                <div class="demo-card-square mdl-card mdl-shadow--2dp" style="background: url(http://rate.imagehut.co.za' . Url::templatePath() . 'image/RewardCovers/'.$item->imageURl.' );">
                <div class="mdl-card__title mdl-card--expand">
                 <h2 class="mdl-card__title-text">'.$item->Title.'</h2>
                 </div>
                 <div class="mdl-card__supporting-text">
                 
                </div>
              
</div>
        
        
        
        
        ');
        echo('</td>
            <td>
               <div class="demo-card-square mdl-card mdl-shadow--2dp" >
                <div class="mdl-card__title mdl-card--expand">
                 <h2 class="mdl-card__title-text">'.$item->Title.'</h2>
                 </div>
                 <div class="mdl-card__supporting-text">
                      <table>
                    <tr>
                    <td>
                 <div> Descrition:'.$item->description.'</div> 
                    </td>
                     </tr>
                     <tr>
                     <td>
                 <div> worth:  '.$item->worth.'  points</div>  
                      </td>
                      </tr>
                      <tr>
                     <td>
                 <div>  Availabile:  '.$item->qauntity.' </div>  
                     </td>
                     </tr>
                     </table>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                 <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Redeem Reward
    </a>
  </div>
</div>
            
            
</td>');



            echo('</tr>');




    }

    ?>

        </table>

</div>


