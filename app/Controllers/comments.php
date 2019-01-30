<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of comments
 *
 * @author Denzhe Sadiki
 */
use Core\Controller;
use Helpers\AjaxHandler as Ajax;
use Core\View;


class comments  extends Controller{
    //put your code here
    
    
    public function index(){
        
        
         View::render("Body/comments");
        
    }
    
    function myfunction() {
        $mytest = Ajax::get("mystatus");
        $yourstatus = Ajax::get("yourstatus");
        if ($mytest) {
            Ajax::success("Received");
        } else {
            Ajax::error("Houston we have a problem",200);//400 default parameter
        }

    }

    function addComments()
    {
        $text=$_GET["comment"];
        
        $postdata = array(
            
            'post_id'=> $_GET["post_id"]  ,
            'Text' => $text  ,
            'Time' => date('Y-m-d G:i:s'),
            'id'=> $_SESSION['id']
        );

        $comments=new \Models\comments();
        $comments->SaveComment($postdata);
        $reviews = new \Controllers\DisplayMoviesReviews();
       
        $commentsObject=  $comments->retriveComments($_GET["post_id"]);
        $postid=$_GET["post_id"];
        foreach ($commentsObject as $object) {
            $userDetais = $reviews->displayReviewAuthorDetails($object->id);

            foreach ($userDetais as $userDeetailInfo) {
                $postdata =  array(

                    'username'=>  $userDeetailInfo->username  ,
                    'Text' => $object->Text ,
                    'Time'=>$object->Time,
                    'post_id' =>  $postid,
                    'imageURL'=> $userDeetailInfo->imageURL
                );






            }
        }
       print_r($postdata);
                

    }
}
