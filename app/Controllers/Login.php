<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/22/2016
 * Time: 1:14 AM
 */

namespace Controllers;
use Core\Controller;
use Core\View;
use Helpers\Request as Request;
use Models\authenticate;
use Models\User;

define('FACEBOOK_APP_ID', '1033458573391151');
define('FACEBOOK_APP_SECRET', 'aed27a2e7697187926cfad1e1cdae819');
define('HTTP_HOST', 'http://www.mydomain.com');
define('STATE', md5(uniqid(rand(), TRUE)));
define('FACEBOOK_REDIRECT_URI',  'http://rate.imagehut.co.za/?facebook');




class Login extends Controller
{






    private $auth;

    public function __construct()
    {
        parent::__construct();

    }



    public function index(){





		$url=$this->getURL();
        $data["facebooklogin"]=$url;



        view::render('welcome/login',$data);




        
        View::render("Body/retrievePassword");

    }

    public function authenticate() {
        //catch username an password inputs using the Request helper
        $authenticate= new authenticate();


//process login form if submitted
        if(isset($_POST['loginUserName'])){

            $username = trim($_POST['loginUserName']);
            $password =trim($_POST['loginPassword']);







            //If the exception is thrown, this text will not be shown
            $authenticate->authenitcate($username,$password);


//catch exception















        }//end if submit

//define page title

    }

    public function  loginWithFaceBook(){
        $appId = '1033458573391151';
        $appSecret = 'aed27a2e7697187926cfad1e1cdae819';

// get a facebook app instance
        $app =   new FacebookApps($appId, $appSecret);

// we need a user instance
        $user = new FacebookUsers($app, new FacebookPosts(),new FacebookPhotos());

// callback url
        $urlCallback = 'http://rate.imagehut.co.za/?facebook';

// we will fly with the default permissions: public_profile
        $permissions = [];

// now lets build the url
        $user->getUrlAuthentication($urlCallback, $permissions); }


    public function getURL(){

        $loginUrl = "https://www.facebook.com/dialog/oauth?"
            . "client_id=" . FACEBOOK_APP_ID
            . "&redirect_uri=" . FACEBOOK_REDIRECT_URI
            . "&state=" . STATE
            . "&response_type=code"
            . "&scope=user_about_me,email,user_actions.books,publish_pages,user_events,user_friends,user_photos,user_games_activity,user_actions.video";
        
        return $loginUrl;



    }
    function curl($url) {
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
     $data = curl_exec($ch);
     curl_close($ch);
     return $data;
   }
function getAccessToken($facebook_code) {
     $token_url = "https://graph.facebook.com/oauth/access_token?"
          . "client_id=" . FACEBOOK_APP_ID
          . "&redirect_uri=" . urlencode(FACEBOOK_REDIRECT_URI)
          . "&client_secret=" . FACEBOOK_APP_SECRET
          . "&code=" . $facebook_code;
     $response =$this->curl($token_url);
     $params = null;
     parse_str($response, $params);
     if ($params['access_token']) {
          return $params['access_token'];
     }
     return FALSE;
}

function getUserInfo($access_token) {
     $graph_url = "https://graph.facebook.com/me?fields=id,name,email,location,books,games,friends,picture,movies&access_token=". $access_token;
     $user = json_decode($this->curl($graph_url));
     if($user != null && isset($user->name)) {
          return $user;
     }
     return FALSE;
}

public function saveFacebookUserDetails($user)
{

        $name =$user->name;
        $FacebookID=$user->id;
         $email=$user->email;
         $location= "";
         $bio ="";
         $coverURl="";
        $profileImage =$user->picture->data->url;



         $postdata = array(



             'FirstName'=>$name,
             'coverURL' => $coverURl,
             'imageURL' => $profileImage,
             'Location' => $location,
             'facebookID' => $FacebookID,
             'email' => $email
         );

            $userModel = new \Models\User();
            $facebookUser= $userModel->getAllFacebookUserDetails($FacebookID);


            if( $facebookUser==null)
            {
                $registerModel = new  \Models\Register();
                $registerModel->SignFacebookUser($postdata);
                $facebookUser=$userModel->getAllFacebookUserDetails($FacebookID);
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] =  $facebookUser[0]->username;
                $_SESSION['id'] =  $facebookUser[0]->id;
                $_SESSION['coverURL'] = $coverURl;
                $_SESSION['imageUrl'] = $profileImage;
                $_SESSION['surname'] =  $facebookUser[0]->Surname;
                $_SESSION['points'] = $facebookUser[0]->points;
                $_SESSION['bio'] = $facebookUser[0]->bio;
                $_SESSION['FirstName'] = $facebookUser[0]->FirstName;
                $_SESSION['email'] = $facebookUser[0]->email;
                $data["tag"]="sign in successful";
                $data["message"]="you have been successfuly signed in";
                $data["Title"]="sign in successful";
                view::render('confirmationMessages/confirmationClickOnly',$data);

            }else{
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] =  $facebookUser[0]->username;
                $_SESSION['id'] =  $facebookUser[0]->id;
                $_SESSION['coverURL'] = $facebookUser[0]->coverURL;


                $_SESSION['imageUrl'] =  $facebookUser[0]->imageURL;

                $_SESSION['surname'] = $facebookUser[0]->Surname;
                $_SESSION['points'] = $facebookUser[0]->points;
                $_SESSION['bio'] =  $facebookUser[0]->bio;
                $_SESSION['FirstName'] = $facebookUser[0]->FirstName;
                $_SESSION['email'] =  $facebookUser[0]->email;
                $data["tag"]="sign in successful";
                $data["message"]="you have been successfuly signed in";
                $data["Title"]="sign in successful";
                view::render('confirmationMessages/confirmationClickOnly',$data);

            }
           // print_r($user);

           // echo($user[0]["location"]);

           // print_r($user);
       //     print_r($access_token);

          //  $content = $connection->get("account/verify_credentials");
           // print_r($content);
        }



}