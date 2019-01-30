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
use Core\View;
use Core\Model;

class Like  extends Controller
{
    //put your code here


    public function index($postID)
    {




    }


    public function likeComment($commentID){

        $like = new  \Models\Like();

        $like->likeComment($commentID);
    }
    public function likePost($postID){
        $like = new  \Models\Like();
       
        $like->likePost($postID);

    }
    public function unlikePost($postID){
        $like = new  \Models\Like();

        $like->unlikePost($postID);

    }


}