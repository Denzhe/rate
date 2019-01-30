<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 8/7/2016
 * Time: 12:11 AM
 */

namespace Controllers;



use Core\Controller;
use Controllers\Token;
use Core\Model;
use Core\View;

//use twitterOuth\TwitterOAuth;
require 'vendor/Twitter/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;


include ('twitterApi/AuthTwitter.php');
include ('Abraham/Token.php');
include('twitterOuath/TwitterOAuth.php');

include ('Twittering/src/Twittering.php');

//('CONSUMER_KEY', getenv('Z64NZO0fiamMZ4ONHEKXSuEVs'));
//('CONSUMER_SECRET', getenv('AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi'));
//define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));

foreach (glob("twitterOuath/*.php") as $filename)
{
    include $filename;
}




class twitterApi extends Controller
{

    var $key = 'Z64NZO0fiamMZ4ONHEKXSuEVs';
    var $secret = 'kJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi';

    var $request_token = "https://twitter.com/oauth/request_token";
    public function index(){



        $twitterApp = new  AuthTwitter();
        $barrierTokken=$twitterApp->ReuturnbarearTokken();
        //echo($barrierTokken);



        $consumerKey = 'Z64NZO0fiamMZ4ONHEKXSuEVs';
        $consumerSecret = 'kJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi';
        $accessToken = '306875739-UkD6FGzIR20n9povsPYjAi7ASItM1j1MgFhmsirf';
        $accessTokenSecret = 'q9bYqln74NHnJQHV3qnHqzLYQib0nI4yvOHmHi0PlUjQ2';

        $twitter = new RestApi($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

        $twitter->connectAsUser();
//        $connectionUser = $twitter->connectAsUser();


//        $connectionUser->post('statuses/update',array('status' => 'Hello World!'));

        if (isset($_GET["twitterAccess"])&&!isset($_GET["postToTwitter"])) {
            $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi');
            $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => 'http://rate.imagehut.co.za/?twitterAccess2=1'));
            //print);

            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $ouathToken=  $_SESSION['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            //$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);


            header('Location:'.$url.'');
        }




        if (isset($_GET["twitterAccess2"])&&!isset($_GET["postToTwitter"])) {

          //  echo($_SESSION['oauth_token_secret']);
          //  echo($_SESSION['oauth_token_secret']);
            $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi',$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
            $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_GET["oauth_verifier"]]);
           // $user = $connection->get("account/verify_credentials");
            $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi', $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $user = $connection->get("account/verify_credentials");

            $name =$user->name;
            $twitterID=$user->id;
            $location= $user->location;
            $bio =$user->description;
            $coverURl=$user->profile_background_image_url_https;
            $profileImage =$user->profile_image_url;

            $postdata = array(


                'bio' => $bio,
                'FirstName'=>$name,
                'coverURL' => $coverURl,
                'imageURL' => $profileImage,
                'Location' => $location,
                'twitterID' => $twitterID

            );

            $userModel = new \Models\User();
            $twitterUser= $userModel->getAllTwitterUserDetails($twitterID);


            if($twitterUser==null)
            {
                $registerModel = new  \Models\Register();
                $registerModel->SignTwitterUser($postdata);
                $twitterUser=$userModel->getAllTwitterUserDetails($twitterID);
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $twitterUser[0]->username;
                $_SESSION['id'] = $twitterUser[0]->id;
                $_SESSION['coverURL'] = $coverURl;
                $_SESSION['imageUrl'] = $profileImage;
                $_SESSION['surname'] = $twitterUser[0]->Surname;
                $_SESSION['points'] =$twitterUser[0]->points;
                $_SESSION['bio'] = $twitterUser[0]->bio;
                $_SESSION['FirstName'] = $twitterUser[0]->FirstName;
                $_SESSION['email'] = $twitterUser[0]->email;
                $data["tag"]="sign in successful";
                $data["message"]="you have been successfuly signed in";
                $data["Title"]="sign in successful";
                 view::render('confirmationMessages/confirmationClickOnly',$data);

            }else{
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $twitterUser[0]->username;
                $_SESSION['id'] = $twitterUser[0]->id;
                $_SESSION['coverURL'] = $twitterUser[0]->coverURL;
             

                $_SESSION['imageUrl'] = $twitterUser[0]->imageURL;

                $_SESSION['surname'] = $twitterUser[0]->Surname;
                $_SESSION['points'] =$twitterUser[0]->points;
                $_SESSION['bio'] = $twitterUser[0]->bio;
                $_SESSION['FirstName'] = $twitterUser[0]->FirstName;
                $_SESSION['email'] = $twitterUser[0]->email;
                $data["tag"]="sign in successful";
                $data["message"]="you have been successfuly signed in";
                $data["Title"]="sign in successful";
                view::render('confirmationMessages/confirmationClickOnly',$data);

            }
           // print_r($user);

      //      $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' =>$_GET["pageTwitterUrl"].'&postToTwitter=1'.'&pageTwitterUrl="'.$_GET["pageTwitterUrl"].'""'));

            if (isset($_GET["twitterAccess3"])&&!isset($_GET["postToTwitter"])) {

                echo("here");
                $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi');
                //$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => 'http://rate.imagehut.co.za/?twitterAccess2=1&pageTwitterUrl='.$_GET["postToTwitter"].''));
                //print);
                $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => 'http://rate.imagehut.co.za/?twitterAccess2=1'));

                $_SESSION['oauth_token'] = $request_token['oauth_token'];
                $ouathToken=  $_SESSION['oauth_token'];
                $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
                $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
                //$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);


                header('Location:'.$url.'');







        }

            if(isset($_GET["postToTwitter"])){

                $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi',$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
                $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_GET["oauth_verifier"]]);
                // $user = $connection->get("account/verify_credentials");
                $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi', $access_token['oauth_token'], $access_token['oauth_token_secret']);
                $user = $connection->get("account/verify_credentials");
            //$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);

            $statues = $connection->post("statuses/update", ["status" => "hello world"]);
            header('Location:'.$url.'');


        }
           // echo($user[0]["location"]);

           // print_r($user);
       //     print_r($access_token);
            $_SESSION['access_token'] = $access_token;
          //  $content = $connection->get("account/verify_credentials");
           // print_r($content);
        }

            //echo($url);
        // $connection =  new twitterOuath\TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs',  'kJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi', '	306875739-UkD6FGzIR20n9povsPYjAi7ASItM1j1MgFhmsirf', 'q9bYqln74NHnJQHV3qnHqzLYQib0nI4yvOHmHi0PlUjQ2');
       // $content = $connection->get("account/verify_credentials");
       // $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => "nMznkpFRTMCuNMsmALzel9FgPlmWQDWg"]);
      //  $twittering = new Twittering(array(
      //      "api_key" => "Z64NZO0fiamMZ4ONHEKXSuEVs",
      //     "api_secret" => "kJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi",
       // ));
        
        

       // $tokens = $twittering->requestTokens();

// Now that you have the tokens, you can save them to a database for future use.

// To make API requests, call the authenticate() method.
   //     $apiConnection = $twittering->authenticate( $tokens );

    }


    public function shareOnTwitter(){

        echo("here");
        $twitterApp = new  AuthTwitter();
        $barrierTokken=$twitterApp->ReuturnbarearTokken();
        //echo($barrierTokken);



        $consumerKey = 'Z64NZO0fiamMZ4ONHEKXSuEVs';
        $consumerSecret = 'kJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi';
        $accessToken = '306875739-UkD6FGzIR20n9povsPYjAi7ASItM1j1MgFhmsirf';
        $accessTokenSecret = 'q9bYqln74NHnJQHV3qnHqzLYQib0nI4yvOHmHi0PlUjQ2';

        $twitter = new RestApi($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);

        $twitter->connectAsUser();
        if (isset($_GET["twitterAccess3"] )) {

            echo("here");
            $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi');
            //print);
            $request_token = $connection->oauth('oauth/request_token',  array('oauth_callback' =>$_GET["pageTwitterUrl"].'&postToTwitter=1'.'&pageTwitterUrl="'.$_GET["pageTwitterUrl"].'""'));
            //print);

            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $ouathToken=  $_SESSION['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            //$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);


            header('Location:'.$url.'');







        }

        if(isset($_GET["postToTwitter"])){

            $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi',$_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
            $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_GET["oauth_verifier"]]);
            // $user = $connection->get("account/verify_credentials");
            $connection = new TwitterOAuth('Z64NZO0fiamMZ4ONHEKXSuEVs', 'AkJ8VRw8OSSqEkEkJtcTGajOrqkbynEFwlzzy8GDWh25KOVhoi', $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $user = $connection->get("account/verify_credentials");
            //$access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);

            $statues = $connection->post("statuses/update", ["status" => $_GET["pageTwitterUrl"]]);
           // header('Location:'.$url.'');
//

    }


    }
    public function GetbaearTokken(){

           new Token("306875739-UkD6FGzIR20n9povsPYjAi7ASItM1j1MgFhmsirf","q9bYqln74NHnJQHV3qnHqzLYQib0nI4yvOHmHi0PlUjQ2");

    }


   // public function saveUserDetails(){

    //    $_SESSION['access_token'] = $_GET["oauth_token"];

      //  $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);



  //  }









}