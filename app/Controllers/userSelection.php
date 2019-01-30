<?php namespace Controllers;


use Core\Controller;

use Core\View;
/**
*
*
*
*/


class userSelection extends Controller
{


        public function index()
        {
            if (isset($_GET["SelectedCategoryGame"])) {
                $this->gameSelection();

            }elseif (isset($_GET["SelectedCategoryMovie"])){

                $this->movieSelection();


            }elseif (isset($_GET["SelectedCategoryBook"])){

                $this->BookSelection();

            }
        }
        public function gameSelection(){


            View::render('welcome/gameSelectionPage/GameSelcetionPage');

        }
       public function movieSelection(){
           $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
           $tmdb = new TMDB($apikey, 'en', true);
           $tmdb->displaylatestMovies();
           $latest = $tmdb->getDiscoverMovie($page = 1);
           // print_r($latest);

           $data['tmdb'] = $tmdb;
           $data['latest'] = $latest;
           View::render('welcome/MovieSelectionPage/MovieSelectionPage',$data);
       }
      public function BookSelection(){

          View::render('welcome/bookselectionPage/booksSelectionpage');
      }




}