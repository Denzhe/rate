<?php

$gamesObject=$data['games'];
echo('
<div id="GameGrid">
  <h1>RateThat! Games</h1>
  <h2>list of games </h2>
  <button class ="addmanualGame waves-effect waves-light btn-large red">Add Game </button>
  <div class="addmanuallyOverlay"	>  <div class="enterGameDiv">
    <div class="preview  " >



        <div class="card large  previewCard  gameAddManualCard"   style="     position: absolute;
    top: 89px;
    left: 1px;
    width: 312px;
    overflow-y: scroll;
    height: 490px;
    overflow-x: scroll;">

            <!-- Card Content -->



            <form method="post" action="#"  enctype="multipart/form-data" >


                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text ">Add a Game</h2>
                </div>
                <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                    <p>Title</p>

                    <input type="text" name="GameTitleManual">

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

                    <input type="date" name="gameReleaseDate">

                </div>
                <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                    <p>Game overview (storyline)</p>

                    <input type="text" name="summary"  length="500"  required>

                </div>



                <div class="mdl-card__actions mdl-card--border">


                    <div  class="enterGameBtn"   style="margin-top: 16%;margin-left: 8%;">

                        <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >

                            <i class="material-icons left">send</i>Add</button>



                        <button   type="button" class="waves-effect waves-light btn-large addmanualGame  red" name="cancel" >

                            <i class="material-icons left addmanualGame">cancel</i>Cancel</button>

                    </div>
                </div>
        </div>



            </form>

        </div>

    </div>  </div>
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add \'data-title\' to each \'td\' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>ReleaseDate</th>
      
              <th>flagged</th>
          <th>Edit </th>
          <th>Delete</th>
        </tr>
      </thead><tbody>');

      foreach ($gamesObject as $item ){
       echo(' <tr>
 <form method="POST" action="#">
            <td data-title="ID">'.$item->content_Id.'</td>
           <input type="hidden" name="GameIDeditID1" value="'.$item->content_Id.'">
          <td data-title="Name">'.$item->publisher.'</td>
           <input type="hidden" name="name" value="'.$item->publisher.'">
          <td data-title="ReleaseDate">'.$item->release_Date.'  </td>
           <input type="hidden" name="ReleaseDate" value="'.$item->release_Date.'">');
          if($item->flagged==1) {
              echo('       <td data-title = "flagged" > Flagged  <td >');
          }else{

              echo('       <td data-title = "flagged" > Not Flagged  <td >');

          }

          
      echo('     <td data-title="Edit"  > <button  type="submit" class="waves-effect red btn-small "  style="color:White;"> edit</a>  </td>
          </form>
           <form method="POST" action="#">
           <input type="hidden" name="GameIdDeleteID" value="'.$item->content_Id.'">
       <td data-title="Delete" >  <button type="submit" class="waves-effect red btn-small "  style="color:White;"> Delete</button> </td>
       
            </form>
        </tr>'); }

 echo('     </tbody>
    </table>
  </div>
  
  
</div>');

 ?>

