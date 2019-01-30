<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/23/2016
 * Time: 1:04 AM
 */

namespace Models;


use Core\Model;
use Core\View;
class authenticate extends Model
{


    public function authenitcate($username,$password)
    {
        $user = new User();
        if( $user->is_logged_in() ) {

         
             $data["redirectURL"]="?profile=1";
            $data["tag"]="Sign in Successfull";
            $data["message"] ='You are singed  in as ' . $_SESSION['username'] . '';
            View::render("Body/ConfrimationMessage",$data);
        }

        if($user->login($username,$password)){
            $_SESSION['username'] = $username;

            $data["redirectURL"]="?profile=1";
            $data["tag"]="Sign in Successfull";
            $data["message"] =' You have been succefuly signed in ';
            View::render("Body/ConfrimationMessage",$data);
          

        } else {
            echo('<div class="coverConfrimationMessage  loginError" >
            </div>
    <div class="messageDiv">
    <form  method="get" action="">
<div class="card small ">
<div class="title">

    <h4 class="center"   style="background: rgb(0, 0, 0);color: white">
    SIGN IN ERROR
    </h4>
</div>
 <div  class="media">
     <span class="confrimationMessageText center"  >
      Sign in failed: incorrect username or password
</span>

 </div>

    <div class="card-action">

        <button class="waves-effect waves-light red btn closebutton"  style="color: white;">ok</button>

    </div>


</div>
    </form>
</div>');
        }

    }

    public function checklogin()
    {
        $user = new User();
        if( $user->is_logged_in()==1 ){

            $logged=1;

             }else{

            $logged=0;

        }
        return $logged;



    }
}