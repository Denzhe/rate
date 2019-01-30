<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/30/2016
 * Time: 2:25 AM
 */

use Helpers\Url;
?>
<form action="#" method="post"  enctype="multipart/form-data"  >
    <div id="settings " class="card  settingsDisplay">

        <!-- Material sidebar -->
        <aside class=" sidebar-default open settingsPage " role="navigation"  >
            <!-- Sidebar header -->

            <!-- Top bar -->

            <!-- Sidebar toggle button -->
            <button type="button" class="sidebar-toggle" value="Change picture">
                <i class="icon-material-sidebar-arrow"></i>
            </button>

            <div class="settingsAvatar circle">
                <div class="circle settingsAvatar
                background: url(<?php echo(Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl']);?> )  background-size: cover;
                background-repeat: no-repeat;"">


                <img src="<?php  echo(''.Url::templatePath().'image/UserUploads'.$_SESSION['imageUrl'].'');?>" class="settingsImageoverlay circle">
                <input type="file" name="photo" size="25" class="profileImageUploadBtn"  />

                <div class="settingsBanner" style=" background: url(<?php echo(Url::templatePath().'image/UserUploads'.$_SESSION['coverURL']);?> ) ; background-size: cover;
                background-repeat: no-repeat;">

                </div>
            </div>



    </div>


    <span style="position: relative;top: -279px;left: -119px;">Change profile picture</span>





    </aside>

    <div class="card-content settingsPageContent moveCardContents1" >

        <div>
            <span style="position: relative;top: -252px;left: -11px;">Change banner picture</span>

            <input type="file" name="cover" size="25" class="bannerImageUploadBtn" />

        </div>




        <br/><br/>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label profileSettingsPosition">
            <input class="mdl-textfield__input" name="UserName" type="text"  id="sample4 input1"  value="<?php echo($_SESSION['username'])?>" >
            <label class="mdl-textfield__label" for="sample5">Username</label>

        </div>


        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label profileSettingsPosition">
            <input class="mdl-textfield__input" type="text" name="surname"  id="sample5 input1"  value="<?php echo($_SESSION['surname'])?>">
            <label class="mdl-textfield__label" for="sample5">Surname</label>

        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label profileSettingsPosition"  >
            <input class="mdl-textfield__input" type="text" name="firstname"  id="sample5 input1"  value="<?php echo($_SESSION['FirstName'])?>" >
            <label class="mdl-textfield__label" for="sample5">First name</label>

        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label profileSettingsPosition">
            <input class="mdl-textfield__input" type="text" name="Email"  id="sample5 input1"  value="<?php echo($_SESSION['email'])?>" >
            <label class="mdl-textfield__label" for="sample5">Email</label>

        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label profileSettingsPosition">
            <input id="password1"class="mdl-textfield__input" type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$" name="password" id="sample5 input1"  required>
            <label  class="mdl-textfield__label" for="sample5">Password</label>
            <span class="mdl-textfield__error">Must be Alpha Numeric & at least 4 Characters  </span>
        </div>
        <br/><br/>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label profileSettingsPosition">
            <input id="password2" class="mdl-textfield__input" type="password" name="confirmPassword"  id="sample5 input1" required >
            <label class="mdl-textfield__label" for="sample5">Confirm password</label>
            <p class="validate" id="validate-status"></p>
        </div>

        <div  class="input-field col s12" style="margin-top: 34px;margin-left: 15px;margin-right: 15px;padding-top: 62px;">
            <textarea  id="textarea1"  name="Bio" class="materialize-textarea" length="300"  value="<?php echo($_SESSION['bio'])?>"></textarea>
            <label for="mdl-textfield__label" style="font-size: larger;">Bio</label>
        </div>
        <input type="hidden" name="information" value="1">
    </div>
    <div class="mdl-card__actions"  style="margin-left: 9%;"  >
        <button type="submit" name="settingsSave" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect    profileButton invalidPassword "
                style="position: relative;top: 302px;">
            Save
        </button>


    </div>

</form>

<a href="http://rate.imagehut.co.za/?profile=1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  registerButton2 profileButton "
        style="position: relative;top: 257px;left: 70px;">
    cancel
</a>


</div>
<div class="SettingsOverlay"></div>
