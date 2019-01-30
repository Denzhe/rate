<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/18/2016
 * Time: 6:54 PM
 */

namespace Controllers;

use Core\View;
use Core\Controller;

class GoogleController extends Controller
{

    public function __construct() {
        parent::__construct();
    }



    public function index()
    {

    }
    Public function GetBook()
    {
        return "this is a test";
    }

}