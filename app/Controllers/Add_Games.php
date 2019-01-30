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
use SimpleXMLElement;

//include("Controllers\GiantBomb.php");
include 'GiantBomb/GiantBomb.php';

class Add_Games extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

    }

    Public function GetGame()
    {
        $gb_obj = new GiantBomb('373edce87cc80b108708c315f5276c11f6828686');
        $giantbomb = array("name",
            "id",
            "image",
            "site_detail_url",
            "description"
        );

        View::render('welcome/search_Game');
        if (isset($_GET["GameName"])) {
            $gameName = $_GET['GameName'];

            //  $gameSearch=;
            //   try {
            $xml = $gb_obj->search($gameName, $giantbomb, 10, 1);
            //  $xmlObject=new SimpleXMLElement($xml);
            //    print_r($xml);
            $data['xml'] = $xml;

            View::render('welcome/add_Game', $data);
        }
        //field list for the game info


        // echo($xml)
        // } catch (Exception $e) {
        //     echo 'Caught exception: ',  $e->getMessage(), "\n";
        //  }
        // print_r($xml);
        // $resultsOBject=simplexml_load_string($xml);
        // print_r($xml);


    }

    public function addGame()
    {
        $gb_obj = new GiantBomb('373edce87cc80b108708c315f5276c11f6828686');

        $gameFieldList = array("name",
            "id",
            "name",
            "platforms"
        , "genres",
            "original_release_date",
            "image",
            "videos",
            "description"

        );
        $gameID = $_GET["gameID"];
        $gameObject = $gb_obj->game($gameID, $gameFieldList);

        //        print_r($gameObject);
        $url = $gameObject->results->children()->image->super_url;
        $name = $gameObject->results->children()->name;


        $id = $gameObject->results->children()->id;

        $release_Date = $gameObject->results->children()->original_release_date;


        $platform = array();
        foreach ($gameObject->results->children()->platforms as $item) {
            $platform[] = $item->platform->name;


        }

        $genre = array();
        foreach ($gameObject->results->children()->genres as $item) {
            $genre[] = $item->genre->name;


        }


        $genreID = '1';
        $description = $gameObject->results->children()->description;


        $data = array(

            'tltle' => $name,
            'description' => $description,
            'genre_id' => $genreID,
            'ImageUrl' => $url


        );
        $GameModel = new \Models\Game_Model();
        $contentid = $GameModel->saveContent($data,$name);
        //new game model
        $postdata = array(
            'content_Id' => $contentid,
            'publisher' => $name,
            'release_Date' => $release_Date,
            'platformId' => $genreID
        );


        //  $GameModel->getGames();


        try {
            $GameModel->saveGame($postdata,$contentid);
        } catch (\Exception $e) {
            var_dump($e->getMessage());

        }


        $data["contentid"] = $contentid;
        $data["description"] = $description;
        $data["url"] = $url;
        $data["name"] = $name;
        $data["releaseDate"] = $release_Date;
        $data["platform"] = $platform;
        $data["genres"] = $genre;
        View::render("Body/writeGameReview", $data);


    }





    // $giantBombApi->search('call of duty',10,2);
    //echo("This Is a is Where I'll Add The Games");
    public function searchgame($gameName)
    {


        $gb_obj = new GiantBomb('373edce87cc80b108708c315f5276c11f6828686');
        $giantbomb = array("name",
            "id",
            "image",
            "site_detail_url",
            "description"
        );
        //  $gameSearch=;
        //   try {
        $xml = $gb_obj->search($gameName, $giantbomb, 10, 1);
        //  $xmlObject=new SimpleXMLElement($xml);
        //    print_r($xml);
        return $xml;


    }


    public function displayAllBooksView()
    {

        View::render("Body\AllBooksView");


    }


    public function saveGameReview()
    {
        $editorData = $_POST['editor3'];

        $dataArray = array(
            'title' => $_POST['gameReviewTitle'],
            'post' => $editorData,
            'Time' => date('Y-m-d G:i:s'),
            'content_Id' => $_POST["contentid"],
            'id' => $_SESSION['id'],
            'preview' => $_POST['preview']

        );


        $reviewdata = array('content_Id' => $_POST["contentid"],
            'id' => $_SESSION['id'],
            'value' => $_POST['rateyoid']);

        $postModel = new \Models\Post_Model();
        $postModel->saveReview($dataArray, $reviewdata);
    }


    public function addGameManualy()
    {


        if (!file_exists('app/templates/default/image/GameCovers')) {
            mkdir('app/templates/default/image/GameCovers', 0777, true);
        }


        if ($_FILES['photo']['name']) {
            $valid_file = true;
            //if no errors...

            $imageURl='http://rate.imagehut.co.za'.Url::templatePath().'image/GameCovers/'.$_FILES['photo']['name'].'';
            $config['upload_path'] = 'app/templates/default/image/GameCovers/';
            $config['allowed_types'] = '*';

            $upload = new \Helpers\Upload($config);
            if ($upload->do_upload('photo')) {


                $imageOBject = ($upload->data());


            } else {
                print_r($upload->error_msg);
            }


        }


        $data = array(

            'tltle' => $_POST['GameTitleManual'],
            'description' => $_POST['summary'],
            'genre_id' => "1",
            'ImageUrl' => $imageURl


        );
        $GameModel = new \Models\Game_Model();
        $contentid = $GameModel->saveContent($data,$_POST['GameTitleManual']);
        //new game model


        $postdata = array(
            'content_Id' => $contentid,
            'publisher' => $_POST['GameTitleManual'],
            'release_Date' => $_POST['gameReleaseDate'],
            'platformId' => $_POST['group1']
        );


        //  $GameModel->getGames();


        try {
            $GameModel->saveGame($postdata,$contentid);
        } catch (\Exception $e) {
            var_dump($e->getMessage());

        }
        $platformnum = $_POST['group1'];
        if ($platformnum == 1) {
            $platformText = "playstation";
        } elseif ($platformnum == 1) {
            $platformText = "Xbox";


        } elseif ($platformnum == 1) {
            $platformText = "PC";


        } else {
            $platformText = "mobile";
        }


        $data["contentid"] = $contentid;
        $data["description"] = $_POST['summary'];
        $data["url"] = $imageURl;
        $data["name"] = $_POST['GameTitleManual'];
        $data["releaseDate"] = $_POST['gameReleaseDate'];
        $data["platform"] = $platformText;

        //View::render("Body/writeGameReview", $data);
        $data["redirectURL"]="#";

        $data["tag"]="done";
        $data["message"] =' Game Saved ';
        View::render("Body/ConfrimationMessage",$data);

    }








    //print_r ( $Arr );
        // $name= array();
        //foreach($Arr as $var)
      //  {
        //   $name=$var['id'];            
        //}
         //echo($gameNames);
        // print_r($name);


     
       //foreach($results as $game)
       // {
           // echo($game);
           // echo('</br>');
            
        //}
        //$game_Model= new \Models\AddGame();
        //$game_Model->test();

}