<?php
namespace Controllers;

use Core\Controller;
use Core\View;
use Core\Model;




class addReward extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $rewardModel= new \Models\AddReward ();
        $data["rewards"]=$rewardModel->getAllRewards();
        View::render("Body/reward",$data);
    }


    public function addRewardManually()
    {

        $bookModel= new \Models\AddReward ();






        if (!file_exists('app/templates/default/image/RewardCovers/')) {
            mkdir('app/templates/default/image/RewardCovers/', 0777, true);
        }


        if ($_FILES['photo']['name']) {
            $valid_file = true;
            //if no errors...

            $imageURl=''.$_FILES['photo']['name'].'';
            $config['upload_path'] = 'app/templates/default/image/RewardCovers/';
            $config['allowed_types'] = '*';
            $upload = new \Helpers\Upload($config);
            if ($upload->do_upload('photo')) {


                $imageOBject = ($upload->data());





            } else {
                print_r($upload->error_msg);
            }


        }



        $PostToBook = array(

            'Title'=> $_POST["rewardtitle"],
            'worth'=>$_POST["worth"],
            'qauntity'=> $_POST["Qauntity"],
            'imageURl'=> $imageURl,
            'description'=> $_POST["description"]


        );

        $bookModel->SaveReward($PostToBook);




    }



}