<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/18/2016
 * Time: 6:18 PM
 */






?>

<div class="loginPageOverlay">
<div class="everything" style="display: none; ">
<div class="register"   style="width: 39%;"  >
  <div  id="newHeader" class="mdl-card  mdl-shadow--2dp  registerShadow">

<form action = "#" method = "POST">


  <legend >  <div class="mdl-card__title">
      <h2 class="mdl-card__title-text registerHeading">Register</h2>
    </div> </legend>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  reigisterTextfield">
    <input class="mdl-textfield__input" name="username" type="text" id="sample1" value="<?php $_POST['username'] ?> " required>
    <label class="mdl-textfield__label" for="sample1">Username</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield   mdl-textfield--floating-label reigisterTextfield" >
    <input class="mdl-textfield__input"  name="fname" type="text" id="sample2"  value="<?php $_POST['fname'] ?>" required>
    <label class="mdl-textfield__label" for="sample2">First Name</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield  mdl-textfield--floating-label reigisterTextfield">
    <input class="mdl-textfield__input" name="Lname" type="text" id="sample1" value="<?php $_POST['Lname'] ?>" required>
    <label class="mdl-textfield__label" for="sample1">Last Name</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label reigisterTextfield">
    <input class="mdl-textfield__input" name="email" type="text" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="sample4" value="<?php $_POST['email'] ?>" required>
    <label class="mdl-textfield__label" for="sample4">Email Address</label>
    <span class="mdl-textfield__error">Email Invalid</span>
  </div>


  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label reigisterTextfield">
    <input id="password1"class="mdl-textfield__input" type="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$" name="password" id="sample5 input1" required>
    <label  class="mdl-textfield__label" for="sample5">Password</label>
    <span class="mdl-textfield__error">Must be Alpha Numeric & at least 4 Characters  </span>
  </div>

  

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label reigisterTextfield">
    <input id="password2" class="mdl-textfield__input" type="password" name="confirmPassword2"  id="sample6">
    <label  class="mdl-textfield__label" for="sample6">Confirm Password</label>
  </div>
  <p class="validate passwordValidatePosition  " id="validate-status"></p>
  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect reigisterTextfield" for="checkbox2" >
    <input type="checkbox" id="checkbox2" class="mdl-checkbox__input" required>

  </label>
  <span class="mdl-checkbox__label "></span>
  <button class="termsandConditionsButton ">
    I accept the terms and conditions
  </button>
  <div class="mdl-card__actions">
      <button  type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect red  registerButton butttonColorMeteria">
        Submit
      </button>
     
      
    </div>
</form>
         
          </div> 
            <a class="closeinterface mdl-button  mdl-button-raised mdl-js-ripple-effect  red closeDivOveerlayButton  butttonColorMeteria" href="http://rate.imagehut.co.za/">  cancel  </a>
  </div>


                                    </div> 


<div class="RegisterOverlay"></div>
  <div class="card medium termsandConditions " style="position: absolute;top: 4%;left: 32%;height: 93%;">
  
    These terms and conditions govern your use of this website; by using this website, you accept these terms and conditions in full.   If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website.


    [This website uses cookies.  By using this website and agreeing to these terms and conditions, you consent to our use of cookies in accordance with the terms of  [privacy policy / cookies policy].]

    License to use website

    Unless otherwise stated, and/or its licensors own the intellectual property rights in the website and material on the website.  Subject to the license below, all these intellectual property rights are reserved.

    You may view, download for caching purposes only, and print pages from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.

    You must not:

    •	republish material from this website (including republication on another website);
    •	sell, rent or sub-license material from the website;
    •	show any material from the website in public;
    •	reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;]
    •	[edit or otherwise modify any material on the website; or]
    •	[redistribute material from this website [except for content specifically and expressly made available for redistribution].]

    [Where content is specifically made available for redistribution, it may only be redistributed [within your organisation].]

    Acceptable use

    You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.

    You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.

    You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without rateTHAT express written consent.

    [You must not use this website to transmit or send unsolicited commercial communications.]

    [You must not use this website for any purposes related to marketing without rateTHAT express written consent.]
    <div class="mdl-card__actions">
      <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  termsbutton">
       ok got it
      </button>


    </div>

    </div>
  

</div>