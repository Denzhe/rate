<?php




namespace Controllers;

/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 03/7/2016
 * Time: 3:26 AM
 */




use Core\Controller;
use Core\View;
use Core\Model;
use Models\authenticate;
use Core\Router;
use Helpers\AjaxHandler as Ajax;
use Models\User;
use Models\Follow_Model;

include("tmdb-api.php");
//require('Pusher.php');

class welcome extends Controller
{
    private $auth;


    public function __construct()
    {
        parent::__construct();


    }


// index main method
    public function index()
    {


        $options = array(
            'encrypted' => true
        );
        $pusher = new Pusher(
            'ad60cde7811e7edfa8d8',
            '23689ef7bfd318750c98',
            '203169',
            $options
        );


        //  $pusher->trigger('test_channel', 'my_event', $data);
        $data['message'] = 'hello world';

        //  $pusher->trigger('notifications', 'new_notification', $data);



        if (isset($_GET['facebook'])) {
            $login = new Login();
            $facebook_code = $_GET['code'];
            $access_token = $login->getAccessToken($facebook_code);
           // echo($access_token);
            $facebookUser = $login->getUserInfo($access_token);
            $login->saveFacebookUserDetails($facebookUser);

            //print_r($facebookUser);
            //   $_SESSION['username'] = "blak";
         //   $data["tag"] = "Sign in successfull";
         //   $data["message"] = 'you have been successfully logged in ';
        //    View::render("Body/ConfrimationMessage", $data);


        }
        ///  if(SESSION['username']){

        //      $CheackLogin=1;

        //  }

        $authenticate = new authenticate();


        if ($authenticate->checklogin() == 1) {


            $followmodl = new Follow_Model();
            $_SESSION['followingCount'] = $followmodl->getFollowingCount();
            //  print_r($_SESSION['followingCount']);
            // echo();
            $_SESSION['followersCount'] = $followmodl->getFollowersCount();

            $CheackLogin = 1;

            // "User is logged you could load a view here if you want";
        } else {

            //if user is not logged in create regiter and login objects
            $CheackLogin = 0;  // set bool (num) Value to zero for false

            $login = new Login();
            $register = new register();

            if (isset($_GET['testing'])) {
                $login->getURL();


            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['loginPassword'])) {

                    $login->authenticate();

                }

            }


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['confirmPassword2'])) {
                    $register->register();

                }
            }

            //user not authenticated load a login view with a form with login and password inputs
        }


        $data['CheckLogin'] = $CheackLogin;
        View::renderTemplate('header', $data);

        if (isset($_GET[""])) {

        $this->myfunction();

        }
        if (!isset($_GET["admin"])) {

            $sideBar = new sidebar();
            $sideBar->index();

        }
        if ($CheackLogin == 0) {


            $login = new Login();


            if (isset($_GET["RegisterForm"])) {
                $register = new register();
                $register->Index();


            }
            if (isset($_GET["loginForm"])) {

                $login->index();


            }
        }
        $this->selctionviews($CheackLogin);


    }

//(
//$movie_Info['original_title'], $movie_Info['production_companies'], $movie_Info['runtime'];, movie_director, $movie_Info['release_date'], movie_producers, movie_genre_ID, movie_IMDB
//)


    //foreach ($movie_Info as $val) {
    //$movie_Array=$val;
    //echo($movie_Array);
    //   echo($val);
    // echo('</br>');
    // }
    // $arrlength= count($movie_Array);
    // for($x = 0; $x < $arrlength; $x++) {
    //echo $movie_Array[$x][1];
    //echo "<br>";
    // }


//


    public function home()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('header', $data);
        view::render('welcome/login');
        // View::render('welcome/home', $data);
        View::renderTemplate('footer', $data);
    }


    public function selctionviews($CheackLogin)
    {
        $data['CheckLogin'] = $CheackLogin;
        $data['title'] = 'Welcome';


        if (isset($_GET["Moviename"]) || isset($_GET["SelectedCategoryMovie"]) || isset($_GET["SelectedCategoryGame"]) || isset($_GET["SelectedCategoryBook"])   ||isset($_Get["SelectedCategory"])|| isset($_GET["admin"]) || isset($_GET["rewards"]) || isset($_GET["publicProfile"]) || isset($_GET["Discover"]) || isset($_GET["reviewBook"]) || isset($_GET["GameName"]) || isset($_GET["everythingName"]) || isset($_GET["settings"]) || isset($_GET["movieID"]) || isset($_GET["gameID"]) || isset ($_POST['editor1']) || isset($_Post[" writing"]) || isset($_GET["BookName"]) || isset($_POST["profile"]) || isset($_GET["gamesNav"]) || isset($_GET["ReviewsNav"]) || isset($_GET["MoviesNav"]) || isset($_GET["booksNav"]) || isset($_GET["readReview"]) || isset($_GET["profile"]) || isset($_GET["writing"]) || isset($_GET["community"])) {


        } else {

           if(!isset($_GET["loginForm"]))
           {

               $this->homepageDisplay();
           }





        }


        if (isset($_GET["writing"])) {

            if ($CheackLogin == 1) {


                $ch = curl_init();

                // set url
                curl_setopt($ch, CURLOPT_URL, "http://rate.imagehut.co.za/");

                //return the transfer as a string
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                // $output contains the output string
                $output = curl_exec($ch);

                // close curl resource to free up system resources
                curl_close($ch);


                if (!isset($_GET["admin"])) {

                    view::render('welcome/UserSelectionView');
                }
                // create new instance for  'Review a  movie' class


            }

        }


        $add_Movie = new addmovie();

        //call main method inside movie class
        $add_Movie->getMovie();


        $addBooks = new BooksApi();
        $addBooks->SearchBook();
        $add_Game = new Add_Games();


        // create new instance for 'Review a game' class


        $add_Game->GetGame();


        if (isset($_GET["gameID"])) {
            $add_Game->addGame();


        }


        if (isset($_POST["movieReleaseDateManual"])) {
            $add_Movie->addMovieManually();


        }

        if (isset($_GET["publicProfile"])) {

            $profilepage = new publicProfile();

        }

        if (isset($_GET["publicProfile"])) {
            View::TE;
        }
        if (isset($_GET["readReview"])) {

            $readReviewObject = new ReadReview();
            $readReview = $_GET["readReview"];
            $authorID = $_GET["authorID"];
            $ch = curl_init();

            // set url
            curl_setopt($ch, CURLOPT_URL, "http://rate.imagehut.co.za/");

            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // $output contains the output string
            $output = curl_exec($ch);

            // close curl resource to free up system resources
            curl_close($ch);
            $readReviewObject->displayContent($readReview, $authorID);
        }
        if (isset($_GET["ResetEmail"])) {

            $userPasswordResetMoel = new User();
            $userPasswordResetMoel->SendRequestEmailresetPassword(trim($_GET["ResetEmail"]));

        }


        if (isset($_GET["resetLink"])) {

            $userPasswordResetMoel = new User();
            $userPasswordResetMoel->ResetPassword();


        }

        if (isset($_POST["deleteUser"])) {

            $userPasswordResetMoel = new User();
            $userPasswordResetMoel-> makeUserUnActive($_POST["id"]);


        }
        if (isset($_GET["twitterAccess"])||isset($_GET["twitterAccess2"])||isset($_GET["pageTwitterUrl"])) {

            $twitterApi = new twitterApi();
            $twitterApi->index();

        }

        if (isset($_GET["twitterAccess3"])) {

            $twitterApi = new twitterApi();
            $twitterApi->shareOnTwitter();

        }

        if (isset($_GET["postToTwitter"])) {

            $twitterApi = new twitterApi();
            $twitterApi->shareOnTwitter();

        }


        if (isset($_POST["deleteReview"])) {

            $models = new \Models\Post_Model();
            $data = array('post_id' => $_POST["deleteReview"]);
            $models->DeleteReview($data);
        }

        if (isset($_GET["ReviewsNav"])) {

            $newDisplayAllreviews = new DisplayAllReviews();
            $newDisplayAllreviews->displayallreviews();


        }

        if (isset($_GET["community"])) {
            $followPeople = new followPeople();
            $followPeople->displayUsersToFollow();
        }


        if (isset($_GET["comment"])) {

            $comment = new comments();
            $comment->addComments();


        }

        if (isset($_POST["rewardtitle"])) {

            $reward = new addReward();
            $reward ->addRewardManually();


        }
        if (isset($_POST["uploadReadReview"])) {

            $bookapi = new BooksApi();
            $bookapi->savebookReview();


        }

        if (isset($_GET["logout"])) {

            $user = new User();
            $user->logout();


        }

        if (isset($_GET['Like'])) {

            //$movieReviews = new DisplayMovieReviews();
            //$movieReviews->index();
            $like = new Like();

            $like->likePost($_GET["Like"]);


        }
        if (isset($_GET['UnLike'])) {

            //$movieReviews = new DisplayMovieReviews();
            //$movieReviews->index();
            $like = new Like();
            echo("here");
            $like->unlikePost($_GET["UnLike"]);


        }
        if (isset($_GET["followeID"])) {


            $id1 = $_GET['followeID'];

            $postdata = array(
                'id' => $id1,
                'follower_id' => $_SESSION['id'],
            );

            $getFollow = new Follow_Model();
            $insert = $getFollow->followUser($postdata);


        }
        if (isset($_GET["unfollowID"])) {

            $getUmFollow = new Follow_Model();
            $getUmFollow->unfollowUser($_SESSION['id'], $_GET["unfollowID"]);


        }
        if (isset($_POST["BookPublisher"])) {


            $bookapi = new BooksApi();
            $bookapi->addManualBook();


        }
        if (isset($_POST["BookPublisher"])) {


            $bookapi = new BooksApi();
            $bookapi->addManualBook();


        }


        if (isset($_GET["TrailerName"])) {


            $trailers = new trailers();
            $trailers->trailerSearchResults();


        }


        // if (isset($_GET["followeID"])){

        // $followerID= $_GET["followeID"];
        // $useriD = $_SESSION['id'];

        //$getFollow = new Follow_Model();
        //       // $insertFollow = $getFollow->followUser($useriD, $followerID);
        // }

        View::render('Body/body');
        // $profileSettings= new updateUserSettings();
        // $profileSettings->getSettings();

        //only create this objects if the user is logged in


        // //
        // $add_Game->GetGame();


        //load profile page
        if (isset($_POST["profile"]) || isset($_GET["profile"])) {
            $profilepage = new profilePage();


        }


        // load settings page
        if (isset($_GET["settings"])) {

            $upaate = new updateUserSettings();
            $upaate->index();


            $profilepage = new profilePage();


        }


        if (isset($_GET["gamesNav"])) {

            $gameObject = new DisplayAllReviews();
            $gameObject->displayGameReviews();


        }

        if (isset($_GET["booksNav"])) {

            $bookObject = new BooksApi();
            $bookObject->displayAllBooks();


        }
        if (isset($_GET["MoviesNav"])) {


            $movieObject = new addmovie();
            $movieObject->displpayAllmovies();

        }
        if (isset($_GET["reviewBook"])) {


            $bookModel = new BooksApi();
            $bookModel->savebookReview();

        }

        if (isset($_GET["Discover"])) {





            $gameObject = new newGameRealeases();
            $gameObject->getNewGameRealease();

        }

        if (isset($_GET["rewards"])) {

            $reward = new addReward();
            $reward->index();




        }

        if(isset($_GET["BookDiscover"])){

            $BookOBject = new BooksApi();
            $BookOBject->getDeafualtBookLit();

        }


        if (isset($_GET["DicoverMovies"])) {

            //$movieReviews = new DisplayMovieReviews();
            //$movieReviews->index();
            $this->displayUpCommingMovies();


        }


        //activateUsersacounnt
        if (isset($_GET["activation"])) {

            $useracticationModel = new User();
            $useracticationModel->activateAccount(trim($_GET["activation"]), trim($_GET["usernameActivation"]));


        }

        if (isset($_POST["GameTitleManual"])) {

            $gameOBject = new Add_Games();
            $gameOBject->addGameManualy();

        }

        if (isset($_POST["makeUserAdmin"])) {


            $admin = new admin();
            $admin->makeUserAdmin($_POST['id']);

        }
        if (isset($_POST["information"]) || isset($_POST['settingsSave'])) {
            $upaate = new updateUserSettings();
            $upaate->getSettings();

        }
        if (isset($_POST["subject"])) {
           $id= $_POST["id"];

            $user = new User();
            $details=$user-> getuserDetailsByID($id);
            $email="";
          //  print_r($details);
            foreach ($details as $info)
            {
                $email=$info->email;


            }
            $user->EmailUser($email,$_POST["subject"],$_POST["adminBodyEmail"]);

        }

        $gameSearchObject = new Add_Games();

        if (isset($_GET["everythingName"])) {


            $data["gameobject"] = $gameSearchObject->searchgame($_GET["everythingName"]);
            $BookObject = new BooksApi();
            $data["bookObject"] = $BookObject->getBook($_GET["everythingName"]);
            $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
            $tmdb = new TMDB($apikey, 'en', true);
            $add_Movie = new addmovie();
            $data["tmdb"] = $tmdb;
            //call main method inside movie class
            $data["movieObject"] = $add_Movie->searchMovie($_GET["everythingName"]);
            view::render('Body/search', $data);


        }
        if (isset($_POST["writeGameReview"])) {
            $gameOBject = new Add_Games();
            $gameOBject->saveGameReview();
        }

        if (isset($_GET["SelectedCategory"])) {
            $userSelction = new userSelection();
            $userSelction->index();
        }




        if (isset($_GET["admin"])) {


            $admin = new admin();
            $admin->index();


        } else {

            View::renderTemplate('footer', $data);
        }
    }


    public function displayUpCommingMovies()
    {
        $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
        $tmdb = new TMDB($apikey, 'en', true);
        $tmdb->displaylatestMovies();
        $latest = $tmdb->getDiscoverMovie($page = 1);
        // print_r($latest);

        $data['tmdb'] = $tmdb;
        $data['latest'] = $latest;

        View::render('Body/upcommingMovies', $data);
        //  ;


    }
    public function homepageDisplay()
    {

      $homepage = new homepage();
        View::render("Body/homepage");
        $homepage->index();
        
    }

    function myfunction() {


        echo("here");
        $mytest = Ajax::get("mystatus");
        $yourstatus = Ajax::get("yourstatus");
        if ($mytest) {
            Ajax::success("Received");
        } else {
            Ajax::error("Houston we have a problem",200);//400 default parameter
        }

    }
}




?>



  



      