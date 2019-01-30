<?php

namespace Controllers;

use Core\Controller;
use Models\Game_Model;
use Models\addBook;
use Core\View;
use Controllers\Welcome;


class enterContent extends Controller
{

    public function enterGame()
    {
        if(isset($_GET['add']))
        {

            $gameModel = new Game_Model();

            $postdata = array(
                'publisher' => $_GET['publisher'],
                'release_Date' => $_GET['gameReleaseDate'],
            );

            $gameMethod = $gameModel->saveGame($postdata);

        }
        
    }

    public function enterBook()
    {

        if(isset($_GET['add']))
        {

            $bookModel = new addBook();

            $postdata = array(
                'publisher' => $_GET['publisher'],
                'IBSN' => $_GET['isbn'],
                'author' => $_GET['author'],
                'publication_Date' => $_GET['publicationDate'],
            );

            $bookMethod = $bookModel->saveBook($postdata);

        }

    }

    public function enterMovie()
    {

        if(isset($_GET['add']))
        {

            $movieModel = new addBook();

            $postdata = array(
                'title' => $_GET['movieName'],
                'studio' => $_GET['studio'],
                'running_Time' => $_GET['duration'],
                'director' => $_GET['director'],
                'release_date' => $_GET['movieReleaseDate'],
                'producers' => $_GET['producers'],
                'IMDB' => $_GET['imdb'],
            );

            $movieMethod = $movieModel->saveBook($postdata);

        }

    }

}