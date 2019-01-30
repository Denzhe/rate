<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/28/2016
 * Time: 1:54 PM
 */


namespace Models;




use Core\Model;
use Core\View;
class Follow_Model extends Model  {



    public function followUser($array)
    {


        $id1 =  $_GET['followeID'];
        $notificationArray = array(
            'id' => $id1,
            'date' => date("F j, Y, g:i a"),
            'notificationType' =>1,
            'notificationText' => 'you have one new follower'
        );
        $this->db->insert('notifications',$notificationArray);
        $lastNotificationID= $this->db->lastInsertId('notificationID');


        $User_notificationArray = array(
            'id' => $id1,
            'notificationID' =>  $lastNotificationID
            
        );
        $this->db->insert('user_notification',$User_notificationArray);




        $_SESSION['id'];

        $this->db->insert('following',$array);
        $_SESSION['followingCount']=$this->getFollowingCount();
        $_SESSION['followersCount']=$this->getFollowersCount();
        //return $this->db->lastInsertId('id');

        //return $this->db->select("SELECT COUNT(id) FROM following WHERE id=$id");


    }

    public function unfollowUser($id, $followed)
    {

        $postdata = array(
            'follower_id' => $id,
            'id'  => $followed
        );

        $where = array('follower_id' => $id,
            'id' => $followed );


        $this->db->delete('following', $where);



    }

    public function followGenre($genre_id, $id)
    {

        $this->db->insert('genre_Follow',$genre_id, $id);

        return $this->db->select("SELECT COUNT(genre_Id) FROM genre_Follow WHERE genre_Id=$genre_id");

    }


    public function getFollowersCount()
    {


       $row =$this->db->select("SELECT COUNT(`id`) AS followers FROM  `following` WHERE  `id` = :id", array(':id' => $_SESSION['id']));


        foreach ($row   as $item)
        {

            $followerCount= $item->followers;

        }
        return $followerCount;
    }

    public function getFollowingCount()
    {


        $row =  $this->db->select("SELECT COUNT(  `follower_id` ) AS following FROM  `following` WHERE  `follower_id` = :id", array(':id' => $_SESSION['id']));


        foreach ($row   as $item)
        {

            $followerCount= $item->following;

        }
        return $followerCount;
    }



    public function getAllFollowing()
    {

       return $row =  $this->db->select("SELECT  `id`  FROM  `following` WHERE  `follower_id` = :id", array(':id' => $_SESSION['id']));




        

    }


    public function getFollowingCountUser($id)
    {


        $row =  $this->db->select("SELECT COUNT(  `follower_id` ) AS following FROM  `following` WHERE  `follower_id` = :id", array(':id' => $id));


        foreach ($row   as $item)
        {

            $followerCount= $item->following;

        }
        return $followerCount;
    }


    public function getFollowersUsercount($id)
    {


        $row =$this->db->select("SELECT COUNT(`id`) AS followers FROM  `following` WHERE  `id` = :id", array(':id' => $id));


        foreach ($row   as $item)
        {

            $followerCount= $item->followers;

        }
        return $followerCount;
    }


    public function countPosts($id)
    {


        $row =$this->db->select("SELECT COUNT(  `post_id` ) AS postNumber  FROM  `post` WHERE  `id`  = :id", array(':id' => $id));


        foreach ($row   as $item)
        {

            $followerCount= $item->postNumber;

        }
        return $followerCount;

    }







}