<div class="enterMovieAdminOverlay">
<div class="preview">



    <div class="card medium  previewCard" style="    width: 429PX;
    height: 500px;
    left: 1px;
    top: 141px;
    overflow-y: scroll;">

        <!-- Card Content -->
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text ">Edit Book</h2>
        </div>


        <form method="post" action="#" enctype="multipart/form-data" >

            <input type="hidden" name="BookEditID1" value="<?php echo($_POST['BookEditID']); ?>">
            <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                <p>Title</p>

                <input type="text" name="Booktitle1" value="<?php echo($_POST['tltle']); ?>"> required>

            </div>








            <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                <p>Publisher of book</p>

                <input type="text" name="BookPublisher1"  value="" >

            </div>



            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>ISBN</p>

                <input type="text" name="isbn"  value="<?php echo($_POST['ISBN']); ?>" required>

            </div>



            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>Author</p>

                <input type="text" name="author"  value="" required>

            </div>



            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>Publication date</p>

                <input type="date" name="publicationDate1"  value="" required>

            </div>



            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                <p>summary</p>

                <input type="text" name="summary1"  length="500"   value="" required>

            </div>



            <div class="card-content">

                <p>Upload book cover image</p>

                <input type="file" name="photo" size="25"  required />

            </div>



            <div  class="enterBookBtn"  style="margin-top: 18%;margin-left: 8%;">

                <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >

                    <i class="material-icons left">send</i>Add</button>



                <button   type="button" class="waves-effect waves-light btn-large   red entermanul closeManualEntery" name="cancel" style="">

                    <i class="material-icons left">cancel</i>Cancel</button>

            </div>

        </form>

    </div>

</div>
    </div>