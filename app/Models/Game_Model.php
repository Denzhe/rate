<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 4/29/2016
 * Time: 7:56 PM
 */

namespace Models;
use Helpers\Url;
use Core\Model;
use Core\View;
class Game_Model extends Model
{
    function __construct(){
        parent::__construct();
    }

    //put your code here

    public function getGames()
    {

        return $this->db->select('SELECT * FROM game');
    }

    
    public function getContentInformation($id){

        return $this->db->select("SELECT * FROM `content` WHERE `content_Id`  = :id", array(':id' => $id));
    }

    public Function saveGame($data,$title)
    {


     //  $this->db->insert('content',$data);
        $row =$this->db->select("SELECT * FROM game WHERE `content_Id` = :username", array(':username' =>$title));
        if($row== null){
        // $this->model->insertContact($postdata);
        $this->db->insert('game',$data);  }
        // $this->db->select('call storeMovie('.$title .','. $studio.','.$running_Time.','.$director.','.$realease_date.','.$producers.','.$IMDB.')');
    //    $this->db-> insert(PREFIX.'contacts', $data);

    }
    public function saveContent($data,$title)
    {

        $row =$this->db->select("SELECT * FROM content WHERE tltle = :username", array(':username' =>$title));
        if($row== null){

        $this->db->insert('content',$data);
        return $this->db->lastInsertId('content_Id');


         }else{
            $content=1;
            foreach ($row as $item){
              return  $content= $item->content_Id;}
        }

      //  foreach ($row as $item){
//
      //  return   $content= $item->content_Id;
    //     }


             //                            }
             //           }
    }


    
    
     public function displayGameReviews ()
     {
        
         return $this->db->select("SELECT p.post , p.post_id , p.title , p.id , p.preview , p.Time , p.content_Id FROM  post p, game g WHERE g.content_Id = p.content_Id; ");
      
     }
    
    public function editGames(){

        $PostdataToMovie = array(

            'publisher'=> $_POST["GameTitleManual"],
            'release_date'=>$_POST["gameReleaseDate1"],
            'platformId'=> $_POST["group1"],

        );

        
        $where = array('content_Id' => $_POST["GameIDeditID"]);
        $this->db->update('game', $PostdataToMovie, $where);

        $data["tag"] = "done";
        $data["message"] = 'changes saved ';
        View::render("Body/ConfrimationMessage", $data);
        
    }
    public function deltebook(){

        $NUM=1;
        $PostdataToMovie = array(

            'Flagged'=> $NUM   ,


        );
        $where = array('content_Id' => $_POST["ConfirmDeleteButton"]);
        $this->db->update('game', $PostdataToMovie, $where);
        $data["tag"] = "done";
        $data["message"] = 'game has been flagged for deletion ';
        View::render("Body/ConfrimationMessage", $data);

    }



    public function get2StarRatingCount($contentid)
    {

        return $this->db->select("SELECT COUNT(  `rating_id` ) AS AvgRating FROM  `rating` WHERE  `content_Id` =:contentID AND (`value` BETWEEN 2 AND 2.9)", array(':contentID' => $contentid));



    }


    public function get3StarRatingCount($contentid)
    {

        return $this->db->select("SELECT COUNT(  `rating_id` ) AS AvgRating FROM  `rating` WHERE  `content_Id` =:contentID AND (`value` BETWEEN 3 AND 3.9)", array(':contentID' => $contentid));



    }
    public function get4StarRatingCount($contentid)
    {

        return $this->db->select("SELECT COUNT(  `rating_id` ) AS AvgRating FROM  `rating` WHERE  `content_Id` =:contentID AND (`value` BETWEEN 4 AND 4.9)", array(':contentID' => $contentid));



    }
    public function get5StarRatingCount($contentid)
    {

        return $this->db->select("SELECT COUNT(  `rating_id` ) AS AvgRating FROM  `rating` WHERE  `content_Id` =:contentID AND (`value` BETWEEN 5 AND 5.9)", array(':contentID' => $contentid));



    }
    public function get1StarRatingCount($contentid)
    {

        return $this->db->select("SELECT COUNT(  `rating_id` ) AS AvgRating FROM  `rating` WHERE  `content_Id` =:contentID AND (`value` BETWEEN 0 AND 1.9)", array(':contentID' => $contentid));



    }

    public function getAllStarRatingCount($contentid)
    {

        return $this->db->select("SELECT COUNT(  `rating_id` ) AS totalRating FROM  `rating` WHERE  `content_Id` =:contentID ", array(':contentID' => $contentid));



    }
    public function getContentGames(){


        return $this->db->select("SELECT p.`content_Id` , g.`description` , p.`release_Date` , p.`Flagged` , g.`tltle` , g.`ImageUrl`  FROM game p, content g WHERE p.content_Id = g.content_Id LIMIT 0 , 30");


    }
    
    public function mostPorpuarGames()
    {

        return $this->db->select("SELECT p.`content_Id` , g.`description` , p.`release_Date` , p.`Flagged` , g.`tltle` , g.`ImageUrl`  FROM game p, content g WHERE p.content_Id = g.content_Id LIMIT 0 , 3");


    }
     
    
}

