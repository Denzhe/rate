<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 7/18/2016
 * Time: 2:51 AM
 */

namespace Controllers;


use Core\View;
use Core\Controller;
use Models\Movie_Model;

class trailers extends Controller
{

    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function trailerSearchResults()
    {
        $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
        $tmdb = new TMDB($apikey, 'en', true);

        $data['tmdb']=$tmdb;

        if(isset( $_GET["TrailerName"] )){


            $movieName=$_GET['TrailerName'];
            $movies = $tmdb->searchMovie($movieName);
            $data['movies'] =$movies;

        }
        View::render("Body/trailerView",$data);
    }

}