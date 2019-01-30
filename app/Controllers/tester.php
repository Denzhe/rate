<?php

/*Author : Denzhelanga Sadiki

 * Date : 2016 March 16
 *
 *
 *
 *
 * */
namespace Controllers;

use Core\Controller;
use Core\View;
use Core\Model;
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;



class tester extends Controller
{

    public function index()
    {
        //when logging in

        view::renderTemplate('header');

        $num = 3;
        echo $num;

            if(isset($_SESSION['id']))
            {
                $num += 1;
            }


        echo "<br>$num";
        //when logging in



    }

}