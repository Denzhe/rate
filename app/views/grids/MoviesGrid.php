<?php

$gamesObject=$data['games'];
echo('
<div id="MovieGrid">
  <h1>RateThat! Movies</h1>
  <h2>list of Movies </h2>
  
  <button class =" addmanualMovieButton waves-effect waves-light btn-large red">Add movie </button>
  <div class="addmanuallyOverlay"	>   <div class="addMovieDisplay">	<div class="preview">



		<div class="card medium  previewCard"   style="    width: 350PX;
    height: 560px;
    position: absolute;
    top: 56px;
    left: 25px;
    overflow: scroll;
    overflow-y: scroll;
    overflow-x: hidden;">

			<!-- Card Content -->



			<form method="post" action="#"  enctype="multipart/form-data" >



				<div class="mdl-card__title">
					<h2 class="mdl-card__title-text ">Add a Movie</h2>
				</div>
				<div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

					<p>Name of movie</p>

					<input type="text" name="movieName" required>

				</div>



				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>Studio</p>

					<input type="text" name="studio">

				</div>



				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>Duration (min)</p>

					<input name="duration"  type="range" max="500" min="1" required>

				</div>



				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>Director</p>

					<input type="text" name="director">

				</div>



				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>Release date</p>

					<input type="date" name="movieReleaseDateManual" required>

				</div>



				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>Producers</p>

					<input type="text" name="producers">

				</div>



				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>IMDb</p>

					<input type="text" name="imdb" >

				</div>

				<div class="card-content" style="margin-left: 2px;padding-top: 3px;">

					<p>summary</p>

					<input type="text" name="summary"  length="500"  required>

				</div>

				<div class="card-content "  >

					<p>Upload movie poster image</p>

					<input type="file" name="photo" size="25"  required />

				</div>



				<div  class="enterMovieBtn"   style="margin-top: 19%;margin-left: 13%;">

					<button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >

						<i class="material-icons left">send</i>Add</button>



					<button   type="button" class="waves-effect waves-light btn-large   red showAddMovie addmanualMovieButton" name="cancel" style="margin-left: 17%;">

						<i class="material-icons left">cancel</i>Cancel</button>

				</div>

			</form>

		</div>

	</div> </div>
</div>
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add \'data-title\' to each \'td\' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Release Date</th>
           <th>Running Time</th>
          <th>Producers</th>
           <th>IMDB</th>
        <th>flagged</th>
          <th>Edit </th>
          <th>Delete</th>
        </tr>
      </thead><tbody>');

foreach ($gamesObject as $item ){
    echo(' <tr>
          <form method="post" action="#">
          <td data-title="ID">'.$item->content_Id.'</td>
          <input type="hidden" name="EditMovieID" value="'.$item->	content_Id.'">
          <td data-title="Name">'.$item->title.'</td>
          <input type="hidden" name="title" value="'.$item->title.'">
          
           <td data-title="Release Date">'.$item->release_date.'  </td>
           <input type="hidden" name="Release_Date" value="'.$item->release_date.' ">
          <td data-title="Running Time">'.$item->running_Time.'  </td>
          <input type="hidden" name="Running_Time" value="'.$item->running_Time.'">
          <td data-title="Producers">'.$item->producers.'  </td>
          <input type="hidden" name="Producers" value="'.$item->producers.'">
           <td data-title="IMDB">'.$item->IMDB.'  </td>
          <input type="hidden" name="IMDB" value="'.$item->IMDB.'">');
                 if($item->Flagged==1) {
        echo('       <td data-title = "flagged" > Flagged  <td >');
}else{

               echo('       <td data-title = "flagged" > Not Flagged  <td >');

           }
echo('
           <td data-title="Edit"  > <button  type="submt" class="waves-effect red btn-small "  style="color:White;"> edit</button>  </td>
           </form>
            <form method="post" action="#">
            <input type="hidden" name="DeleteMovieID" value="'.$item->	content_Id.'">
            <td data-title="Delete" >  <button  type="submt" cclass="waves-effect red btn-small "  style="color:White;"> Delete</button> </td>
           </form>
        
        </tr>'); }

echo('     </tbody>
    </table>
  </div>
  
  
</div>');

?>

