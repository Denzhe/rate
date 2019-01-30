<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/1/2016
 * Time: 3:39 PM
 */

namespace Controllers;


use Core\Controller;
use Core\View;
class Register extends Controller
{

    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new \Helpers\Auth\Auth();
    }



    public function directReg(){

        $fname=$_POST['fname'];
        $lname=$_POST['Lname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $verifypassword=$password;

        if($this->auth->directRegister($username, $password, $verifypassword, $email)){
            echo "register ok";
        }else{
            echo "fail";
        }
    }
     public function index()
     {

         view::render('welcome/register');


     } 
}