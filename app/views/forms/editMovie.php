<div class="enterMovieAdminOverlay">
<div class="preview">



    <div class="card medium  previewCard"   style="    width: 325PX;
    width: 325PX;
    height: 500px;
    position: absolute;
    top: 38px;
    left: -57px;
    z-index: 5;
    overflow-y: scroll;">
        <!-- Card Content -->



        <form method="post" action="#"  enctype="multipart/form-data" >


            <input type="hidden" name="EditMovieID" value="<?php echo($_POST['EditMovieID']);?>">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text ">Edit a Movie</h2>
            </div>
            <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                <p>Name of movie</p>

                <input type="text" name="movieNameAdmin" value="<?php echo($_POST['title']); ?>" required>

            </div>







            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>Duration (min)</p>

                <input name="duration"  type="number" max="500" min="1" value="<?php echo($_POST['Running_Time']); ?>" required >

            </div>







            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>Release date</p>

                <input type="date" name="movieReleaseDateEdit" value="<?php echo($_POST['Release_Date']); ?>" required>

            </div>



            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>Producers</p>

                <input type="text" name="producers" value="<?php echo($_POST['Producers']); ?>">

            </div>



            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>IMDb</p>

                <input type="text" name="imdb"  value="<?php echo($_POST['IMDB']); ?>">

            </div>



            <div class="card-content "  >

                <p>Upload movie poster image</p>

                <input type="file" name="photo" size="25"  required />

            </div>



            <div  class="enterMovieBtn"   style="margin-top: 19%;margin-left: 13%;">

                <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" type="submit" >

                    <i class="material-icons left" >send</i>Add</button>



                <button   type="button" class=" waves-effect waves-light btn-large   red showAddMovie  closeManualEntery" name="cancel " style="">

                    <i class="material-icons left">cancel</i>Cancel</button>

            </div>

        </form>

    </div>

</div>


</div>