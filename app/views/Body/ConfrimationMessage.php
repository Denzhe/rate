<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/3/2016
 * Time: 5:06 PM
 */

$data["message"];
$data["Title"];


?>
<div class="coverConfrimationMessage" >
</div>
<div class="messageDiv">
    <?php echo('<form  method="get" action="http://rate.imagehut.co.za/?'.$data["redirectURL"].'">'); ?>
<div class="card small ">
<div class="title">

    <h4 class="center"   style="background: rgb(0, 0, 0);color: white">
    <?php echo($data["tag"]) ?>
    </h4>
</div>
 <div  class="media">
     <span class="confrimationMessageText center"  >
    <?php echo($data["message"]) ?>
</span>

 </div>

    <div class="card-action">

        <button type="submit" class="  waves-effect waves-light red btn okbutton"  style="color: white;">ok</button>

    </div>


</div>
    </form>
</div>
