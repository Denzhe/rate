<?
use Helpers\Url;
$count=1;
$movieModel= $data["BookModel"];
echo('<div class="BookHomepageWrapper">
    
     <span>Trending Books</span>
    <table>
 <tr>
        ');
try{
    foreach ( $data["Books"] as $item){

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






        echo('

            <td class="cardRelativeposition">
                  <div class="google-expando--wrap">
         <div class="google-expando">

            <div class="google-expando__icon">
      <svg xmlns="//www.w3.org/2000/svg" viewBox="0 0 48 48">
        <path d="M38 26H26v12h-4V26H10v-4h12V10h4v12h12v4z"></path>
      </svg>
      <span class="visuallyhidden" aria-hidden="true">Expand Card</span>
             </div>

             <div class="google-expando__card" aria-hidden="true">
      
                                        <div class="card small Ratings" style=" 
    height: 500px;
">

                   


                <div class="containerGraph horizontal rounded">
                        <h2>average ratings</h2>
                       
                            
                               <div class="rating">
                               <div class="divStar1"> <span class="starDivSize"    >★</span> <span class="starDivHeight" >☆</span><span  class="starDivHeight">☆</span><span  class="starDivHeight" >☆</span><span class="starDivHeight" >☆</span></div>
                                    
                                     
                                <div class="divStar1">       <span class="starDivSize"   >★</span><span  class="starDivSize"    >★</span><span class="starDivHeight"  >☆</span><span  class="starDivHeight" >☆</span><span  class="starDivHeight"   >☆</span>    </div> 
                                <div class="divStar1">        <span  class="starDivSize"  >★</span><span class="starDivSize"  >★</span><span  class="starDivSize"  >★</span><span class="starDivHeight"  >☆</span><span class="starDivHeight"  >☆</span>  </div>
                                <div class="divStar1">        <span class="starDivSize"   >★</span><span  class="starDivSize"   >★</span><span  class="starDivSize"    >★</span><span  class="starDivSize"   >★</span><span class="starDivHeight"  >☆</span> </div>
                                <div class="divStar1">   <span class="starDivSize">★</span><span  class="starDivSize" > ★</span><span class="starDivSize" >★</span><span  class="starDivSize" >★</span><span  class="starDivSize"  >★</span>  </div>  
                             
                                </div>
                                 

                        
                            
                                 
                             
                           

                        
                             
                                       <div  class="barPositions">
                                       
                                       
                                       
                                       
                             <div class="progress-bar horizontal">
                            <div class="progress-track">
                            
                                <div class="progress-fill">
                                    <span>'.round($rating1Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                                
                                <div class="progress-fill">
                                    <span>'.round($rating2Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                              
                                <div class="progress-fill">
                                    <span>'.round($rating3Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                                
                                <div class="progress-fill">
                                    <span>'.round($rating4Percent).'%</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-bar horizontal">
                            <div class="progress-track">
                           


                                <div class="progress-fill">
                                    <span>'.round($rating5Percent).'%</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    </div>
         </div>

            </div>
            </div>
             
               
               
               
             
               
               <div class="tile job-bucket">
    <div class="front"   style="
    background: url('.$item->ImageUrl.');
    background-size: cover;
">
      <div class="contents">
        
       
        <h3></h3>
       
        
      
      
      
      
      
      
      
      
      
      
      ');



        echo(' 
 
       <!--  Content Rating-->
        <div class="starDisplay2"> ');
        echo('<table class="starTable"> <tr>');
        for($x=1;$x<=round($numberOfRatings);$x++) {

            echo('<td><img src="'.Url::templatePath().'image/starRatings/full star1.png" style="width: 50px;"/></td>');
        }
        if (strpos($starNumber,'.')) {
            echo ('<td><img src="'.Url::templatePath().'image/starRatings/halfStar.svg.png" style="position: absolute;top: 0;width: 15;width: 50px;margin-left: 81px;"/> </td>');
            $x++;
        }
        while ($x<=5) {
            echo ('<td><img src="'.Url::templatePath().'image/starRatings/blankstar.png" style="width: 50px;" /></td>');
            $x++;

        }
        echo(' </tr> </table>');
        echo(' </div>');
















        echo ('
      </div>
    </div>
    <div class="back">
      <h2 class="mdl-card__title-text">'.$item->tltle.'</h2>
      <h3>
                       </br>Realese Date :'.$item->release_Date.'</br>
                     average Rating   :'.round($overallAverage).'
                    Number of Reviews    :'.round($numberOfRatings).'</h3>
     
                 
                        
                    <div class="mdl-card__supporting-text">
                       
    </div>
  </div>
               
               
               
               
           

            </td>



            ');}











}catch(Exception $e) {}
echo('</tr> </table> </div> ');
echo('</div>');?>