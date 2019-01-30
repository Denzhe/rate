<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

use Core\Model;
use Core\View;
class addBook extends Model  {





public Function saveBook($Postdata,$contentID)
{
    
  
 $descripttion='movie';
   $genreID='1';


    $row =$this->db->select("SELECT * FROM book WHERE content_Id = :username", array(':username' =>$contentID));

    if($row== null) {

        $this->db->insert('book', $Postdata);
    }


  // $this->model->insertContact($postdata); 
       
  // $this->model->insertContact($postdata); 
       
  // $this->db->select('call storeMovie('.$title .','. $studio.','.$running_Time.','.$director.','.$realease_date.','.$producers.','.$IMDB.')');
   //$this->db-> insert(PREFIX.'contacts', $data);
    
}

public  function postToContent($PostToContentArray,$title)
{

   // $row =$this->db->select("SELECT * FROM content WHERE tltle = :username", array(':username' =>$title));
    $row =$this->db->select("SELECT * FROM content WHERE tltle = :username", array(':username' =>$title));
    if($row== null){
    $this->db->insert('content',$PostToContentArray);
     return $lastInsertID=$this->db->lastInsertId('content_Id');
       }else{
      $content=1;

        foreach ($row as $item){

      return   $content= $item->content_Id;
                       //     }


        }
       }
    }

    public  function returnBooks()
    {


        return $this->db->select('SELECT p.`tltle` , p.content_Id, g.`IBSN` , g.`publisher` FROM content p, book g WHERE g.content_Id = p.content_Id');
    }


    public  function returnContentBooks()
    {


        return $this->db->select('SELECT p.`tltle` , p.content_Id, g.`IBSN` , g.`author` , g.`Flagged` ,p.`ImageUrl`, g.`publisher` FROM content p, book g WHERE g.content_Id = p.content_Id LIMIT 0 , 30');
    }
    public  function returnPorpulartBooks()
    {


        return $this->db->select('SELECT p.`tltle` , p.content_Id, g.`IBSN` , g.`author` , g.`Flagged` ,p.`ImageUrl`, g.`publisher` FROM content p, book g WHERE g.content_Id = p.content_Id LIMIT 0 , 3');
    }
    public function editBook()
    {

        $PostdataToMovie = array(

            'publisher'=> $_POST["BookPublisher1"],
            'publication_Date'=>$_POST["publicationDate1"],
            'IBSN'=>$_POST["isbn1"],
            'author'=>$_POST["author1"],

            'summary'=>  $_POST["summary"],
            'publication_Date'=> $_POST["publicaticonDate1"],
            
        );
        $where = array('content_Id' => $_POST["BookEditID1"]);
        $this->db->update('book', $PostdataToMovie, $where);

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
        $this->db->update('book', $PostdataToMovie, $where);
        $data["tag"] = "done";
        $data["message"] = 'book has been flagged for deletion ';
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


}