<html>

<div class="loginPageOverlay">
    <div class="everything" >
        <div class="login">
            <div class="facebooksingin ">

                <div></div>
                    <div class="mdl-card  mdl-shadow--2dp  registerShadow"  style="height: 366px;width: 55%;">       
                        <form action = "#" method = "POST" class="logMoveForm">
                            <legend>  <div class="mdl-card__title">          
                                    <h2 class="mdl-card__title-text registerHeading">Login</h2>    
                                </div> </legend>     
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label reigisterTextfield">            
                                <input class="mdl-textfield__input" name="loginUserName" type="text"  id="sample4"  required>     
                                <label class="mdl-textfield__label" for="sample4">UserName</label>            </div>         
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label reigisterTextfield">       
                                    <input class="mdl-textfield__input" type="password" name="loginPassword"  id="sample5 input1" required>      
                                    <label class="mdl-textfield__label" for="sample5">Password</label>            </div>      
                                    <div class="mdl-card__actions   ">           
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect   registerButton">                    Submit                </button>       
                                         </div>
                    </form>
                    </div>
                </>
                <div class="logMoveCancel">
                      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect overlayCancelButton2 ">                    cancel                </button>
                </div>
            <a href="<?php echo($data["facebooklogin"]); ?>" class="btn-floating facebookLoginIcon" style="transform: scaleY(1) scaleX(1) translateY(0px) translateX(0px); opacity: 1;"><i class="material-icons"></i></a>

        </div>
            <script>
            
             $(".overlayCancelButton2").click(function () {
            $(".login").toggle("slow");         
            $(".LoginRegisterOverlay1").toggle(); });
            </script>
        </div></div>
  <!--  <button class="revocoverPasswordButton">        Forgot Password?    </button> -->