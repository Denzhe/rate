<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;


use Core\Controller;

use Core\View;
/**
 * Description of DisplayAllReviews
 *
 * @author Denzhe Sadiki
 */

use Models\DisplayMoviesReviews;


class DisplayAllReviews extends Controller {
    
    public function index(){
        
        
     
        
        
        
        
    }
    //put your code here
    
    
   
     public function displayallreviews()
     {

         
             $allreviews = new DisplayMoviesReviews();
             $data["reviewsObject"] = $allreviews;
             $data["reviews"] = $allreviews->displayAllReviews();
             $data["RatingModels"] = new \Models\rating();

             View::render("Body/AllReviews", $data);
         
         
     }
     
     
     public function displayGameReviews(){
        $allreviews = new DisplayMoviesReviews();
         $data["reviewsObject"]=$allreviews;
         $data["reviews"] = $allreviews->displayGameReviews();
         $data["RatingModels"]=new \Models\rating();
         View::render("Body/AllReviews_1",$data);
         if ($_GET["gamesNav"]==4) {

             $gameModel=new \Models\Game_Model();
             $data["GameModels"]=new \Models\Game_Model();
             $data["Games"] =$gameModel->getContentGames();
             View::render("content/Games",$data);



         }
         
         
         
     }

     
  
     }
