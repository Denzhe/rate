<?PHP


?>
<div class="enterRewardOverlay" xmlns="http://www.w3.org/1999/html">
<div class="emailUserDiv">
<div class="card">
    <div id="form-main">
        <div id="form-div">
            <form class="form" id="form1" method="post">

           


                <p class="email">
                    <input type="hidden" name="id" value="<?php echo($_GET["user"]) ?>">
                    <input name="subject" type="text" class="" id="email" placeholder="Subject" />
                </p>

                <p class="text">
                    <textarea name="adminBodyEmail" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Body"></textarea>
                </p>
                <p>
                <button type="submit" class="waves-effect red btn-large" >  send</button>
                </p>
                <p>
                    <a class="waves-effect red btn-large emailUserButton" >cancel</a>
                </p>
            </form>
        </div>
        </div>
</div>
    </div>


<div class="deleteUserEmail">

    <div class="messageDiv">
        <form  method="post">
            <div class="card small ">
                <div class="title">
                    <input type="hidden" name="id" value="<?php echo($_GET["user"]) ?>">
                    <input type="hidden" name="deleteUser" value="<?php echo( $varId) ?>">
                    <h4 class="center"   style="background: rgb(0, 0, 0);color: white">
                        confirm delactivation
                    </h4>
                </div>
                <div  class="media">
     <span class="confrimationMessageText center"  >
confirm that you would like to Deactivate user's acount
</span>

                </div>

                <div class="card-action">
                    <button type="submit" class="  waves-effect waves-light red btn "  style="color: white;">confirm</button>
                    <p></p>
                    <a  class=" deleteuserButton waves-effect waves-light red btn"  style="color: white;">cancel</a>
                </div>


            </div>
            </form>
    </div>

</div>


<div class="makeUserAdmin">

    <div class="messageDiv">
        <form  method="post">
            <div class="card small ">
                <div class="title">
                    <input type="hidden" name="id" value="<?php echo($_GET["user"]) ?>">
                    <input type="hidden" name="makeUserAdmin" value="1">
                    <h4 class="center"   style="background: rgb(0, 0, 0);color: white">
                        confirm 
                    </h4>
                </div>
                <div  class="media">
     <span class="confrimationMessageText center"  >
    confirm that you would like to grant user admin privalages
</span>

                </div>

                <div class="card-action">
                    <button type="submit" class="  waves-effect waves-light red btn"  style="color: white;">confirm</button>
                    <a class="  waves-effect waves-light red btn makeAdminButton"  style="color: white;">cancel</a>
                </div>


            </div>
            </form>
    </div>
</div>
</div>