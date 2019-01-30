<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/25/2016
 * Time: 1:43 AM
 */

namespace Models;


use Core\Model;

class Notifications extends Model
{

    public function index(){


    }


    public function getUserNotifications($userID)
    {

        return  $this->db->select(' SELECT `notificationID` FROM `user_notification` WHERE `id`='.$userID.'');
    }

    public function getNotificationDetails($notificationID){


        return  $this->db->select(' SELECT * FROM `notifications` WHERE `notificationID`='.$notificationID.'');




    }
    public function  getNotificationCounnt($userID){


            $row=  $this->db->select("SELECT COUNT(  `id` ) AS notification FROM  `notifications` WHERE  `id` = :id", array(':id' => $_SESSION['id']));

        foreach ($row   as $item)
        {

            $NotificationCount= $item->notification;

        }
        return $NotificationCount;
    }


}