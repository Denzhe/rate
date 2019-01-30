<?php 
namespace Controllers;

use Core\View;
use Core\Controller;
use Models\Movie_Model;
use Helpers\Url;
class addmovie extends Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->addMovie= new \Models\Addmovie();
    }

    public function index()
    {   
        $data['title'] = 'Welcome';

        View::renderTemplate('header', $data);
        View::render('welcome/welcome', $data);
        View::renderTemplate('footer', $data);
        
        
     
    }
    public function getMovie()
    {
      
        $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
        $tmdb = new TMDB($apikey, 'en', true);

        $data['tmdb']=$tmdb;
// store tmdb object in data object used to pass information around between the view and the controller

       // $add= new addmovie();	
       


		

        $math = new \Models\Movie_Model();

//instatiate the model for this function




        $results = $math->getMovies();
 //print_r(array_values($results ));


        View::render('welcome/search_movie', $data);
        
 //render the view
        if(isset( $_GET["Moviename"] )){
            $_SESSION["writing"]=1;
                                    
                                    $movieName=$_GET['Moviename'];
                                    $movies = $tmdb->searchMovie($movieName); 
                                    $data['movies'] =$movies;

         View::render('welcome/add_Movie', $data);}
     

//$movieID = array();
// }
//$results =array();

//if( $_GET["name"] ){
//retrive the movie name the user is looking for
//$movies = $tmdb->searchMovie($_GET['name']);

//}


            if(isset($_GET["movieID"]) ){
            $movie_ID=$_GET["movieID"];
                $imageURL=$_GET["movieURL"];
     
            $movie_Info=$tmdb->getMovieInfo($movie_ID);

             $trailers= $tmdb->getTrailer($movie_ID);
                $trailerURl= $trailers["results"][0]["key"];
                

                $descrition=$movie_Info['overview'];
            

                $company=$movie_Info['production_companies'];

//extract movie production company into a List that will later be passd on to the database.
            $production_Company_list = Array();
            foreach ($company  as $var) {
            $production_Company_list[] =$var['name'];
            }


            $genre=$movie_Info['genres'];
            $genre_list = Array();
            
            foreach ($genre as $var) {
            $genre_list [] =$var['name'];

            }


            $producers=implode(', ',$production_Company_list);
            $IMDB=$movie_Info['id'];
            $title=$movie_Info['original_title'];
            $studio="N/A";
            $running_Time=$movie_Info['runtime'];
            $director="N/A";
            $realease_date=$movie_Info['release_date'];



                //LoadObjects into data object so you can pass it on to the Write Review View


                $contentID=$math->saveMovie($title,$studio,$running_Time,$director,$realease_date,$producers,$IMDB,$imageURL);
                $data["genrelist"]=$genre_list;
                $data["producers"]=$producers;
                $data['id']=$IMDB;
                $data['title']=$title;
                $data['runningTime']=$running_Time;
                $data ['realeaseDate']=$realease_date;
                $data['imageUrl']=$_GET["movieURL"];
                $data['description']=$descrition;
                $data['tralierURl']=$trailerURl;
                // Reder view and pass data objects for Viewing
                






                View::render('welcome/WriteReviewPage', $data);

                $editorData = $_POST['editor1'];
                if(isset ($_POST['editor1'])){



                    $dataArray = array(
                        'title'=> $title,
                        'post'=>$editorData,
                        'Time'=> date('Y-m-d G:i:s'),
                        'content_Id'=>$contentID,
                        'id'=>$_SESSION['id'],
                        'preview'=>$_POST['preview']

                );
                    
                $reviewdata=array(     'content_Id'=>$contentID,
                    'id'=>$_SESSION['id'],
                     'value'=>$_POST['rateyoid']   );




                    $reviewModel=new  \Models\Post_Model();
                    $reviewModel->saveReview($dataArray,$reviewdata);
                } }
           // $math->saveMovie($title,$studio,$running_Time,$director,$realease_date,$producers,$IMDB);
        
    }
    
    
    public function saveMovieReview($dataArray,$ratingData){
        
      

        
    }
    
    public function searchMovie($name){
        
        $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
        $tmdb = new TMDB($apikey, 'en', true);

        $data['tmdb']=$tmdb;
         
         $movies = $tmdb->searchMovie($name); 
         return $movies;
    }
    public function getTmdbOBject()
    {
        
        $apikey = "81efd167c9241fc60cb5c75b43e5c7dd";
        $tmdb = new TMDB($apikey, 'en', true);
        
        return $tmdb;
    }
    
    public function displpayAllmovies(){
        
         $allreviews = new \Models\DisplayMoviesReviews ();
         $data["reviewsObject"]=$allreviews;
         $data["reviews"] = $allreviews->displayMovieReviews();
         $data["RatingModels"]=new \Models\rating();


        if ($_GET["MoviesNav"]==4) {

            $movieModel=new \Models\Movie_Model();
                $data["movieModels"]=new \Models\Movie_Model();
            $data["movies"] =$movieModel->getContentMovies();
            View::render("content/movies",$data);
        }


        View::render("Body/AllMoviesView",$data);
        
    }


    public function addMovieManually(){



        $math = new \Models\Movie_Model();

        if (!file_exists('app/templates/default/image/MovieCovers')) {
            mkdir('app/templates/default/image/MovieCovers', 0777, true);
        }


        if ($_FILES['photo']['name']) {
            $valid_file = true;
            //if no errors...

            $imageURl='http://rate.imagehut.co.za'.Url::templatePath().'image/MovieCovers/'.$_FILES['photo']['name'].'';
            $config['upload_path'] = 'app/templates/default/image/MovieCovers/';
            $config['allowed_types'] = '*';
            $upload = new \Helpers\Upload($config);
            if ($upload->do_upload('photo')) {


                $imageOBject = ($upload->data());





            } else {
                print_r($upload->error_msg);
            }


        }
        $IMDB=$_POST['imdb'];
        $title=$_POST['movieName'];
        $studio=$_POST['studio']; 
        $running_Time=$_POST['duration'];
        $director=$_POST['director'];
        $realease_date=$_POST['movieReleaseDateManual'];
        $contentID=$math->saveMovieManualy($title,$studio,$running_Time,$director,$realease_date,$IMDB,$imageURl);
        
        
        $data['id']=$IMDB;
        $data['title']=$title;
        $data['runningTime']=$running_Time;
        $data ['realeaseDate']=$realease_date;
        $data['imageUrl']=$imageURl;
        $data['description']=$_POST['summary'];
     //   View::render('welcome/WriteReviewPage', $data);
        $data["redirectURL"]="#";

        $data["tag"]="done";
        $data["message"] =' Movie Saved ';
        View::render("Body/ConfrimationMessage",$data);



    }
    
}



