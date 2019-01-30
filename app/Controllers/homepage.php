<?php


namespace Controllers;


use Core\Controller;

use Core\View;
/**
 *
 *
 *
 */


class homepage extends Controller
{


    public function index()
    {


        $GameModel = new \Models\Game_Model();
        $data["Games"] = $GameModel->mostPorpuarGames();
        $data["GameModels"] = $GameModel;
        View::render("homePageItems/trendingGames", $data);
        $movieModel = new \Models\Movie_Model();
        $data["Movies"] = $movieModel->getMostPorpularMovies();
        $data["MovieModel"] = $movieModel;
        View::render("homePageItems/trendingMovies", $data);
        $bookModel = new \Models\addBook();
        $data["Books"] =  $bookModel->returnPorpulartBooks();
        $data["BookModel"] =  $bookModel;
        View::render("homePageItems/trendingBooks", $data);
        $user = new \Models\User();
        $follow = $user-> get_users3();
        $data['users'] = $follow;
        $followModel= new \Models\Follow_Model();
        $data["followModel"]=$followModel;
        $data["folowers"]= $followModel->getAllFollowing();
       // View::render("homePageItems/userDisplay", $data);

    }
}





