<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;



use Core\Controller;
use Core\Model;
use Core\View;



class Like extends Model
{



    public function __construct()
    {
        parent::__construct();

    }


    public  function likePost($postID){

        //echo($postID);
        $Postdata = array(
            'id'=> $_SESSION['id'],
            'date'=>date("F j, Y, g:i a"),
          'post_id'=>$postID


        );
        $this->db->insert('like_Post',$Postdata);
     //   $this->db->insert('like',$Postdata);

      //  $post= array();
       // $this->db->insert('like',$post);
      $row =  $this->db->select("SELECT * FROM  `post` WHERE `post_id`  = :id", array(':id' => $postID));


       foreach ($row   as $item)
       {

          $userID= $item->id;

      }


    $notificationArray = array(
        'id' => $userID,
         'date' => date("F j, Y, g:i a"),
          'notificationType' =>2,
         'notificationText' => 'Liked your Post'
      );
        $this->db->insert('notifications',$notificationArray);
      $lastNotificationID= $this->db->lastInsertId('notificationID');



      $User_notificationArray = array(
          'id' => $userID,
         'notificationID' =>  $lastNotificationID

        );
       $this->db->insert('user_notification',$User_notificationArray);





    }


    public  function unlikePost($postID){



       $row =  $this->db->select("SELECT * FROM `like_Post` WHERE `id`=:id  AND `post_id`=:post_id ", array(':id' =>$_SESSION['id'] ,
          ':post_id' => $postID
        ));

        foreach ($row   as $item)
      {

        $likeID=$item->like_id;

     }
      // print_r($row);
     $data=array('like_id' => $likeID);
        $this->db->delete('like_Post', $data);








    }
    public function returnNumberOFLikesPerPost($postID){

        $row =$this->db->select("SELECT COUNT(`id`) AS likes FROM  `like_Post` WHERE  `post_id` = :id", array(':id' => $postID));


        foreach ($row   as $item)
        {

            $followerCount= $item->likes;

        }
        return $followerCount;


    }





}