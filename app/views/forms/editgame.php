<div class="enterMovieAdminOverlay">
<div class="preview  " >



    <div class="card large  previewCard  gameAddManualCard" style="height: 456px;position: absolute;top: 46px;left: 1px;width: 324px;overflow-y: scroll;">

        <!-- Card Content -->



        <form method="post" action="#"  enctype="multipart/form-data" >

            <input type="hidden" name="GameIDeditID" value="<?php echo($_POST['GameIDeditID1']); ?>">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text ">edit a Game</h2>
            </div>
            <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                <p>Title</p>

                <input type="text" name="GameTitleManual1" value="<?php echo($_POST['name']); ?>">

            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>
                    <input name="group1" type="radio" id="test1" value="1" />
                    <label for="test1">Playstation</label>
                </p>
                <p>
                    <input name="group1" type="radio" id="test2" value="2" />
                    <label for="test2">Xbox</label>
                </p>
                <p>
                    <input class="with-gap" name="group1" type="radio" id="test3" value="3" />
                    <label for="test3">PC</label>
                </p>
                <p>
                    <input name="group1" type="radio" id="test4" value="4" />
                    <label for="test4">Mobile</label>
                </p>



            </div>
            <div class="card-content">

                <p>Upload game cover image</p>

                <input type="file" name="photo" size="25"  required />
            </div>
            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>Release date</p>

                <input type="date" name="gameReleaseDate1" value="<?php echo($_POST['ReleaseDate']); ?>">

            </div>
           



            <div class="mdl-card__actions mdl-card--border">


                <div  class="enterGameBtn"   style="margin-top: 16%;margin-left: 8%;">

                    <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >

                        <i class="material-icons left">send</i>Add</button>



                    <button   type="button" class="waves-effect waves-light btn-large addmanualGame  red closeManualEntery" name="cancel" style="">

                        <i class="material-icons left">cancel</i>Cancel</button>

                </div>
            </div>
    </div>



    </form>

</div>
    </div>