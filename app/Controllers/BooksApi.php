<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/18/2016
 * Time: 7:21 PM
 *
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
use Helpers\Url;



class BooksApi extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    }

    Public function SearchBook()
    {
            View::render('welcome/SearchBook');
            if(isset($_GET["BookName"])) {
                $append = $_GET['BookName'];
                $BookObject = $this->getBook($append);
               
                $data['Books']=$BookObject;

               
     
                View::render('welcome/AddBook',$data);


            }



    }
    public function returnBookObject($append){
        
        
        
        $BookObject = $this->getBook($append);
        return $BookObject;
    }

    private function _call($url){


        

        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $results= curl_exec ($curl);
        curl_close ($curl);

        //xml object from external API

        $jsonObject = simplexml_load_string($results);
        return $jsonObject;
    }


    public function getBook($append) {
        
        $url="http://isbndb.com/api/v2/xml/4CW3S218/books?q=.$append.";
        $jsonbject= $this->_call($url);
        return  $jsonbject;
    }




    public function getDeafualtBookLit() {
        http://isbndb.com/api/v2/json/[your-api-key]/books? q

        $url="http://isbndb.com/api/v2/json/4CW3S218/subjects?q= fantasy";
        $jsonbject= $this->_calljson($url);
        $this->getBookNames($jsonbject);
    }
    private function _calljson($url){




        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $results= curl_exec ($curl);
        curl_close ($curl);

        //xml object from external API

        $jsonObject = json_decode($results,true);
       // print_r($jsonObject);
        return $jsonObject;
    }
    public function getBookNames($jsonOBject)
    {


        
         $data["book1"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book2"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book3"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book4"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book5"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book6"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book7"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book8"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book9"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
         $data["book10"]=$this->getBook($jsonOBject["data"][4]["book_ids"][rand(1,2000 )]);
        //print_r($this->getBook($jsonOBject["data"][1]["book_ids"][0]));
        view::render("Body/latestBooks",$data);
       
       
       



       // print_r($jsonOBject);
    }
    
    public function displayAllBooks()
    {
         $allreviews = new \Models\DisplayMoviesReviews();
         $data["reviewsObject"]=$allreviews;
         $data["reviews"] = $allreviews->displayBookReviews();
         $data["RatingModels"]=new \Models\rating();


        if($_GET["booksNav"]=="3"){
                $bookmodel = new \Models\addBook();

                $data["booksModels"] = new \Models\addBook();
                $data["books"] = $bookmodel->returnContentBooks();
                View::render("content/books", $data);
        }
        View::render("Body/AllBooksView",$data);
        
        
        
        
    }
    
    
    public function addBookToDatabase()
    {
        
           
       
        
    }
    
    public function savebookReview()
    {
        if (!isset($_POST["uploadReadReview"])){
        $bookModel= new \Models\addBook();

                    
            $Postdata = array(
            'tltle'=> $_GET["Booktitle"],
            'description'=>$_GET["Booktitle"],
            'ImageUrl'=>$_GET["Url"]
           


             );

            $contentID= $bookModel->postToContent($Postdata,$_GET["Booktitle"]);
            echo($contentID);
            if (isset($_GET["BookSummary"]) && ($_GET["BookSummary"]!=null))
            {
                $Summary=$_GET["BookSummary"];


            }else{

                $Summary="n/a";

            }

            $PostToBook = array(
                'content_Id'=>$contentID,
                'publisher'=> $_GET["Bookinfo"],
                'IBSN'=>$_GET["isbn"],
                'author'=>
                $_GET["AuthorName"],
                'summary'=> $Summary,
                
       
       
                 ); 
                $bookModel->saveBook($PostToBook,$contentID);
                
                $data['contentID']=$contentID;
                $data['title']= $_GET["Booktitle"];
                 $data['publisher']=$_GET["Bookinfo"];
                  $data["isbn"]=$_GET["isbn"];
                $data["author"]=$_GET["AuthorName"];
               $data['summary']= $Summary;
                View::render("Body/writeBookReview",$data);
                
        }
                      
        if (isset($_POST["uploadReadReview"])){
                      $editorData = $_POST['editor2'];
                       $dataArray = array(
                        'title'=>  "jhgjhgjhgjh",
                        'post'=>$editorData,
                       'Time'=> date('Y-m-d G:i:s'),
                        'content_Id'=>$_POST["theID"],
                        'id'=>$_SESSION['id'],
                        'preview'=>$_POST['preview']

                   );





                   $reviewdata=array(     'content_Id'=>$_POST["theID"],
                    'id'=>$_SESSION['id'],
                     'value'=>$_POST['rateyoid']   );

                   $postModel =new \Models\Post_Model();
                   $postModel->saveReview($dataArray, $reviewdata);




                   
                   
                  }


        // $bookarray =array(     'content_Id'=>$contentID,
            //        'id'=>$_SESSION['id'],
               //      'value'=>$_POST['rateyoid']   );          
       //  $bookModel= new \Models\addBook();
         


         
        // $reviewdata=array(     'content_Id'=>$contentID,
           //         'id'=>$_SESSION['id'],
                //     'value'=>$_POST['rateyoid']   );
//
       //  $postModel =new \Models\Post_Model();
        // $postModel->saveReview($Postdata, $ratingData);
        
    }
            //  echo( $jsonOBject["data"]["book_ids"][0]


    public function addManualBook(){


        $bookModel= new \Models\addBook();






        if (!file_exists('app/templates/default/image/BookCovers')) {
            mkdir('app/templates/default/image/BookCovers', 0777, true);
        }


        if ($_FILES['photo']['name']) {
            $valid_file = true;
            //if no errors...

            $imageURl='http://rate.imagehut.co.za'.Url::templatePath().'image/BookCovers/'.$_FILES['photo']['name'].'';
            $config['upload_path'] = 'app/templates/default/image/BookCovers/';
            $config['allowed_types'] = '*';
            $upload = new \Helpers\Upload($config);
            if ($upload->do_upload('photo')) {


                $imageOBject = ($upload->data());





            } else {
                print_r($upload->error_msg);
            }


        }

        $Postdata = array(
            'tltle'=> $_POST["Booktitle"],
            'description'=>$_POST["Booktitle"],
            'ImageUrl'=>$imageURl



        );

        if (isset($_GET["BookSummary"]) && ($_GET["BookSummary"]!=null))
        {
            $Summary=$_GET["BookSummary"];


        }else{

            $Summary="n/a";

        }
        $contentID= $bookModel->postToContent($Postdata,$_POST["Booktitle"]);

        $PostToBook = array(
            'content_Id'=>$contentID,
            'publisher'=> $_POST["BookPublisher"],
            'IBSN'=>$_POST["isbn"],
            'author'=> $_POST["author"],
            'summary'=> $Summary,
            'publication_Date'=> $_POST["publicationDate"]


        );

        $bookModel->saveBook($PostToBook,$contentID);



        $data['contentID']=$contentID;
        $data['title']= $_POST["Booktitle"];
        $data['publisher']=$_POST["BookPublisher"];
        $data["isbn"]=$_POST["isbn"];
        $data["author"]=$_POST["author"];
        $data['summary']=$_POST["summary"];
       // View::render("Body/writeBookReview",$data);
        $data["tag"]="done";
        $data["redirectURL"]="#";
        $data["message"] =' Book Saved ';
        View::render("Body/ConfrimationMessage",$data);

    }

     

}

