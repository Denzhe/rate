<?php
/**
 * Sample layout.
 */
use Core\Language;
use Helpers\Url;

$users = $data['users'];

echo('
<form class="form-wrapper2 cf" action="#" method="get">
<input type="text" name="user" placeholder="Search user"> </input><br/>

<button type="submit" name="submit" value="Search">search</button>
</form>
</div>');
echo("<div>");

echo("<div id=\"followuserSlider\" class=\"als-container\" >
  <span class=\"als-prev\"><a class=\" als-next waves-effect waves-light btn-large red \"><i class=\"material-icons right\">navigate_before</i></a></span>
  <div class=\"als-viewport\">
    <ul class=\"als-wrapper\">");
foreach ($users as $userINFO) {

    echo('<li class="als-item">


        <form action="#" method="get">

 <div class="scroll-content-item ui-widget-header">
');

    echo('
    <div class="card-header">
        <img src="http://rate.imagehut.co.za'.Url::templatePath().'image/UserUploads'.$userINFO->imageURL.'"  style="width: 269px;height: 250px;" >
    </div>
    <div class="card-content">
        <h5>'.$userINFO->surname.'   '. $userINFO->FirstName.' </h5>
        <h6>'.$userINFO->bio.' </h6>
        <p>points: '.$userINFO->points.'</p>
        <p>Location: '.$userINFO->Location.' </p>
    </div>
    <div class="card-footer">
        <ul>
            <li>
                <a href="#"><i class="fa fa-codepen">follow</i></a>
            </li>

        </ul>
    </div>
');

}

echo('</div>');
echo(' 
    </ul>
  </div>
  

  <span class="als-next"><a class=" als-next waves-effect waves-light btn-large red "><i class="material-icons right">navigate_next</i></a></span>
</div>');
?>



