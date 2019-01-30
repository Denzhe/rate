
<div class="preview">

    <div class="card medium  previewCard"   style="    width: 325PX;
    height: 500px;
    position: absolute;
    top: 233px;
    left: -57px;
    z-index: 5;
    overflow-y: scroll;">
        <!-- Card Content -->

        <form method="get" action="#">
            <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">
                <p>Name of movie</p>
                <input type="text" name="movieName">
            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>Studio</p>
                <input type="text" name="studio">
            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>Duration (min)</p>
                <input type="range" max="300" min="1">
            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>Director</p>
                <input type="text" name="director">
            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>Release date</p>
                <input type="date" name="movieReleaseDate">
            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>Producers</p>
                <input type="text" name="producers">
            </div>

            <div class="card-content" style="margin-left: 2px;padding-top: 3px;">
                <p>IMDb</p>
                <input type="text" name="imdb">
            </div>

            <div class="card-content">
                <p>Upload movie cover image</p>
                <input type="file" >
            </div>

            <div  class="enterMovieBtn"   style="margin-top: 2%;margin-left: 35%;">
                    <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >
                        <i class="material-icons left">send</i>Add</button>

                    <button   type="button" class="waves-effect waves-light btn-large   red" name="cancel" style="margin-left: 17%;">
                        <i class="material-icons left">cancel</i>Cancel</button>
            </div>
        </form>
    </div>
</div>
