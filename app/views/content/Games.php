<?php
use Helpers\Url;
$count=1;
$movieModel= $data["GameModels"];
echo('<div class="MovieContetWrapper">
<table>

');
try{
    foreach ( $data["Games"]as $item){


        echo(' <tr>');





        echo('

<td>
<div class="mdl-card mdl-shadow--2dp demo-card-wide ">
    <div class="mdl-card__title" style="background: url('.$item->ImageUrl.');     height: 198px;
    width: 348px;    background-size: contain;">
        <h2 class="mdl-card__title-text">'.$item->tltle.'</h2>
    </div>'.$item->tltle.'
    <div class="mdl-card__supporting-text">
     </br>Title :'.$item->tltle.'.</br>
         </br>Running Time :'.$item->running_Time.'.</br>
             </br>Realese Date :'.$item->release_Date.'.</br>
                
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Reviews
        </a>
    </div>
    <div class="mdl-card__menu">
        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">share</i>
        </button>
    </div>
</div>

</td>



');

        echo( '
<td>
<div class="card small Ratings" style=" 
    height: 500px;
">');

        $rating =$movieModel->get1StarRatingCount($item->content_Id);


        $onestarRating=$rating[0]->AvgRating;



        $rating2=$movieModel->get2StarRatingCount($item->content_Id);
        $twostarRating=$rating2[0]->AvgRating;

        $rating3=$movieModel->get3StarRatingCount($item->content_Id);



        $thretarRating=$rating3[0]->AvgRating;

        $rating4=$movieModel->get4StarRatingCount($item->content_Id);



        $fourstarRating=$rating4[0]->AvgRating;

        $rating5 =$movieModel->get5StarRatingCount($item->content_Id);


        $fivestarRating=$rating5[0]->AvgRating;;



        $rating6=$movieModel->getAllStarRatingCount($item->content_Id);


        $numberOfRatings=$rating6[0]->totalRating;










        if($onestarRating > 0){
            $rating1Percent= $onestarRating/$numberOfRatings;
            $rating1Percent= $rating1Percent*100;
        }else{

            $rating1Percent = 0;
        }




        if($twostarRating > 0){
            $rating2Percent= $twostarRating/$numberOfRatings;
            $rating2Percent= $rating2Percent*100;
        }else{

            $rating2Percent = 0;
        }



        if($thretarRating  > 0){
            $rating3Percent= $thretarRating/$numberOfRatings;
            $rating3Percent= $rating3Percent*100;
        }else{

            $rating3Percent = 0;
        }

        if($fourstarRating  > 0){
            $rating4Percent= $fourstarRating/$numberOfRatings;
            $rating4Percent= $rating4Percent*100;
        }else{

            $rating4Percent = 0;
        }

        if($fourstarRating  > 0){
            $rating4Percent= $fourstarRating/$numberOfRatings;
            $rating4Percent= $rating4Percent*100;
        }else{

            $rating4Percent = 0;
        }



        if($fivestarRating > 0){
            $rating5Percent= $fivestarRating/$numberOfRatings;
            $rating5Percent=$rating5Percent*100;
        }else{

            $rating5Percent = 0;
        }

        $overallTotal =  $onestarRating + $twostarRating+$thretarRating+$fourstarRating +$fivestarRating;
        if($overallTotal > 0) {
            $overallAverage = $overallTotal / $numberOfRatings;
        }else{

            $overallAverage = 0;
        }


        echo ('<div class="containerGraph horizontal rounded">
  <h2>average ratings</h2>
  <div class="progress-bar horizontal">
    <div class="progress-track">
      bad 
      <div class="progress-fill">
        <span>'.round($rating1Percent).'%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar horizontal">
    <div class="progress-track">
     poor
      <div class="progress-fill">
       <span>'.round($rating2Percent).'%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar horizontal">
    <div class="progress-track">
      good
      <div class="progress-fill">
      <span>'.round($rating3Percent).'%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar horizontal">
    <div class="progress-track">
    excellent 
      <div class="progress-fill">
          <span>'.round($rating4Percent).'%</span>
      </div>
    </div>
  </div>

  <div class="progress-bar horizontal">
    <div class="progress-track">
     mind blowing
     
     
      <div class="progress-fill">
       <span>'.round($rating5Percent).'%</span>
      </div>
    </div>
  </div>

 
</div>
overall average Rating   :'.round($overallAverage).'
   Number of Reviews    :'.round($numberOfRatings).'
');

        //   if($overallAverage>0){
        //  foreach ($overallAverage as $value) {

        //     echo(' <div class="starDisplay1"> ');
        //     echo('<table class="starTable starTablePostionReview"  > <tr>');
        //     for($x=1;$x<=$value->value;$x++) {

        //         echo('<td><img src="'.Url::templatePath().'image/starRatings/full star1.png" style="width: 50px;"/></td>');
        //     }
        //     if (strpos($starNumber,'.')) {
        //       echo ('<td><img src="'.Url::templatePath().'image/starRatings/halfStar.svg.png" style="position: absolute;top: 0;width: 15;width: 50px;margin-left: 81px;"/> </td>');
        //        $x++;
        //    }
        //   while ($x<=5) {
        //      echo ('<td><img src="'.Url::templatePath().'image/starRatings/blankstar.png" style="width: 50px;" /></td>');
        //       $x++;

        //    }
        //    echo(' </tr> </table>');
        //   echo(' </div>');
        //}

    }
    echo ('
</td>');





    echo('</tr>');





 }catch(Exception $e) {}
echo(' </table> </div> ');
echo('</div>');?>