<?php

$gamesObject=$data['games'];
echo('
<div id="BookGrid">
  <h1>RateThat! Books</h1>
  <h2>list of all Books </h2>
  <button class ="addmanualBook  waves-effect waves-light btn-large red">Add Book </button>
  <div class="addmanuallyOverlay"	> <div class="enterBook">
    <div class="preview">



        <div class="card medium  previewCard" style="    width: 312PX;
    height: 585px;
    left: 1px;
    position: absolute;
    top: 55px;
    overflow-y: scroll;
    overflow-x: hidden;">

            <!-- Card Content -->
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text ">Add a Book</h2>
            </div>


            <form method="post" action="#" enctype="multipart/form-data" >


                <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                    <p>Title</p>

                    <input type="text" name="Booktitle" required>

                </div>








                <div  class="card-content" style="margin-top: 157px;margin-left: 2px;margin-right: 15px;padding-top: 15px;">

                    <p>Publisher of book</p>

                    <input type="text" name="BookPublisher" required>

                </div>



                <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                    <p>ISBN</p>

                    <input type="text" name="isbn" required>

                </div>



                <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                    <p>Author</p>

                    <input type="text" name="author" required>

                </div>



                <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                    <p>Publication date</p>

                    <input type="date" name="publicationDate"  required>

                </div>



                <div class="card-content" style="margin-left: 2px;padding-top: 3px;">

                    <p>summary</p>

                    <input type="text" name="summary"  length="500"  required>

                </div>



                <div class="card-content">

                    <p>Upload book cover image</p>

                    <input type="file" name="photo" size="25"  required />

                </div>



                <div  class="enterBookBtn"  style="margin-top: 18%;margin-left: 8%;">

                    <button id="show-dialog"  class="waves-effect waves-light btn-large   red " name="add" >

                        <i class="material-icons left">send</i>Add</button>



                    <button   type="button" class="waves-effect waves-light btn-large   red addmanualBook " name="cancel" >

                        <i class="material-icons left">cancel</i>Cancel</button>

                </div>

            </form>

        </div>

    </div>
</div> </div>
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add \'data-title\' to each \'td\' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Details</th>
          <th>ISBN</th>
          <th>flagged</th>
        
          <th>Edit </th>
          <th>Delete</th>
        </tr>
      </thead><tbody>');

foreach ($gamesObject as $item ){
    echo(' <tr>
     <form method="post" action="#">
          <td data-title="ID">'.$item->content_Id.'</td>
          <input type="hidden" name="BookEditID" value="'.$item->content_Id.'">
          <td data-title="Name">'.$item->tltle.'</td>
          <input type="hidden" name="tltle" value="'.$item->tltle.'">
          <td data-title="Details">'.$item->publisher.'  </td>
           <input type="hidden" name="publisher" value="'.$item->publisher.'">
           <td data-title="ISBN">'.$item->IBSN.'  </td>
           ');
           if($item->Flagged==1) {
        echo('       <td data - title = "flagged" > Flagged  </td >');
}else{

               echo('       <td data - title = "flagged" > Not Flagged  </td >');

           }
    echo('
           <input type="hidden" name="ISBN" value="'.$item->IBSN.'">
          </td>
           <td data-title="Edit"  > <button  type="submit" class="waves-effect red btn-small "  style="color:White;"> edit</button>  </td>
      </form>   
       <form method="post" action="#">
      <input type="hidden" name="DeleteBookID" value="'.$item->content_Id.'">
      
          <td data-title="Delete" >  <button  class="waves-effect red btn-small "  style="color:White;"> Delete</button> </td>
       
         </form>  
        </tr>'); }

echo('     </tbody>
    </table>
  </div>
  
  
</div>');

?>

