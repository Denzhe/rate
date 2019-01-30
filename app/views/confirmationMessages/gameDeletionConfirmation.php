<div class="coverConfrimationMessage" >
</div>

<div class="messageDiv">
    <form  method="post" action="#">
        <div class="card small ">
            <div class="title">
                <input type="hidden" name="ConfirmDeleteButton" value="<?php echo($data["GameIdDeleteID"]); ?>">
                <h4 class="center"   style="background: rgb(0, 0, 0);color: white">
                    Delete ?
                </h4>
            </div>
            <div  class="media">
     <span class="confrimationMessageText center"  >
   Please confirm
</span>

            </div>

            <div class="card-action">

                <button type="submit" class="  waves-effect waves-light red btn "  style="color: white;">ok</button>
                <a class="  waves-effect waves-light red btn  closeMessageBOxButtonDElte"  style="color: white;">cancel</a>
            </div>


        </div>
    </form>
</div>