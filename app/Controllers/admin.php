<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/18/2016
 * Time: 7:21 PM
 *
/*Author : Denzhelanga Sadiki

 * Date : 2016 March 16
 *
 *
 *
 *
 * */

namespace Controllers;

use Core\Controller;
use Core\View;
use Core\Model;




class admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $user = new \Models\User();
        $follow = $user-> getAll_users();
        $data['users'] = $follow;
        $followModel= new \Models\Follow_Model();
        $data["followModel"]=$followModel;
        View::render("Body/adminEmails",$user);
        View::renderTemplate('admin',$data);



        if (isset($_GET["GamesAdmin"])) {

            $this->gamesGridView();
            if (isset($_POST["GameIDeditID1"])) {

                View::render("forms/editgame");
            }elseif (isset($_POST["GameIdDeleteID"]))
            {
                $data["GameIdDeleteID"]=$_POST["GameIdDeleteID"];
                View::render("confirmationMessages/gameDeletionConfirmation",$data);

            }elseif (isset($_POST["ConfirmDeleteButton"])){

                $this->Deltegame();


            }

        }elseif (isset($_GET["BooksAdmin"])){


            $this->BooksGridView();
            if (isset($_POST["BookEditID"])) {

                View::render("forms/editBook");
            }elseif (isset($_POST["DeleteBookID"]))
            {
                $data["deletebookID"]=$_POST["DeleteBookID"];
                View::render("confirmationMessages/deleteConfirmation",$data);

            }elseif (isset($_POST["ConfirmDeleteButton"])){

                $this->DelteBook();


            }


        }elseif(isset($_GET["MoviesAdmin"])){

            if (isset($_POST["EditMovieID"])) {

                View::render("forms/editMovie");
            }elseif (isset($_POST["DeleteMovieID"]))
            {
                $data["DeleteMovieID"]=$_POST["DeleteMovieID"];
                View::render("confirmationMessages/movieDeletionConfirmation",$data);


            }elseif (isset($_POST["ConfirmDeleteButton"])){

                $this->Deltemovie();

            }
            $this->moviesGridView();


        }
        if (isset($_POST["movieNameAdmin"])){



            $this->EditMovie();

        }elseif (isset($_POST["GameTitleManual1"]))
        {

            $games =  new \Models\Game_Model();
            $games->editGames();




        }elseif (isset($_POST["BookEditID1"]))
        {

            $games =  new \Models\addBook();
            $games->editBook();




        }




    }

    public function makeUserAdmin($id){


        $user = new \Models\User();
        $user-> makeAdmin($id);
    }

    public function gamesGridView(){


        $gameObjectModel=  new \Models\Game_Model();
        $data['games']= $gameObjectModel->getGames();

        View::render("grids/gameGrid",$data);

    }


    public function moviesGridView(){

        $gameObjectModel=  new \Models\Movie_Model();
        $data['games']= $gameObjectModel->getAllMovies();

        View::render("grids/MoviesGrid",$data);




    }

    public function BooksGridView(){

        $gameObjectModel=  new \Models\addBook();
        $data['games']= $gameObjectModel->returnBooks();

        View::render("grids/BookGrid",$data);




    }
    
    public function EditMovie()
    {
        $gameObjectModel=  new \Models\Movie_Model();
        $gameObjectModel-> EditMovies();
    }
    
    
    public function DelteBook()
    {

        $gameObjectModel=  new \Models\addBook();
        $gameObjectModel-> deltebook();
        
    }
    public function Deltegame()
    {

        $gameObjectModel=  new \Models\Game_Model();
        $gameObjectModel-> deltebook();

    }
    public function Deltemovie()
    {

        $gameObjectModel=  new \Models\Movie_Model();
        $gameObjectModel-> deltebook();

    }
   

    
}

?>