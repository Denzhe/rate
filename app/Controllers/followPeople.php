<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Core\Model;
use Models\User;
use Models\Follow_Model;

class followPeople extends Controller
{

    public function index()
    {


            if(isset(  $_GET['followeID'])){


            $this-> updateFollowTable();
          }
    }




    public function displayUsersToFollow()
    {
        $user = new User();
        $follow = $user-> getAll_users();
        $data['users'] = $follow;
        $followModel= new Follow_Model();
        $data["followModel"]=$followModel;
        $data["folowers"]= $followModel->getAllFollowing();

        View::render('welcome/followPeople', $data);


    }
    
    public function getUserID($userID,$userToBEFollowed)
    
    {
        $followModel= new Models\Follow_Model();
        $followModel->followUser();

        
        
        
    }
    public function updateFollowTable()
    {


        $id1 = $_GET['followeID'];

        $postdata = array(
            'id' => $id1,
            'follower_id'  =>  $_SESSION['id'],
        );

        $getFollow = new Follow_Model();
        $insert = $getFollow->followUser($postdata);

    }

    


}