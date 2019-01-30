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
use Core\Model;

class sidebar extends Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

        $notifications= new \Models\Notifications();
        $user= new \Models\User();
        $_SESSION['notification']=$notifications->getNotificationCounnt($_SESSION['id']);
        $data["userModel"]=$user;
        $data["notifications"]= $notifications;
        View::render('welcome/sidebar',$data);
    }

}