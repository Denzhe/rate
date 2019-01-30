<?php


namespace Controllers;

use Core\Controller;
use Core\View;
use Core\Model;
use Facebook\Facebook;


include('../../../Vendor/Facebook/autoload.php');
include("../../../Vendor/Facebook/Facebook.php") ;
include ('../../../Vendor/Facebook/Exceptions/FacebookResponseException.php');



use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class loginCallback extends Controller
{
// Pass session data over.


// Include the required dependencies.

public function callbackMethod()
{
    
    session_start();
    $fb = new   Facebook(['app_id' => '1639213839735169',
        'app_secret' => '5f105973b3b45896e0dc1d5fa112cfa4',
        'default_graph_version' => 'v2.6']);
//same
    
        $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email', 'user_likes']; // optional
    $loginUrl = $helper->getLoginUrl('http://rate.imagehut.co.za/login-callback.php', $permissions);


    try {
            $accessToken = $helper->getAccessToken();
      } catch
    (FacebookResponseException $e) {
        // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
    } catch (FacebookSDKException $e) {
        // When validation fails or other local issues
           echo 'Facebook SDK returned an error: ' . $e->getMessage();
           exit;
    }

    if (isset($accessToken)) {
        $fb->setDefaultAccessToken($accessToken);

        try {

            $requestProfile = $fb->get("/me?fields=name,email");
            $profile = $requestProfile->getGraphNode()->asArray();
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
        }

        $_SESSION['name'] = $profile['name'];
        header('location: ../');
        exit;
              } else {
        echo "Unauthorized access!!!";
        exit;
                 }
        }



}