<?php

/*

 */

namespace Models;

/**
 * Description of Math_Model
 *
 * @author Denzhe Sadiki
 */
use Core\Model;
use Core\View;

class Movie_Model extends Model  {
    //put your code here

public function getMovies(){
	
	 return $this->db->select('call getAllMovies');
}
//saveMovie($title,$studio,$running_Time,$director,$realease_date,$producers,$IMDB)
public Function saveMovie($title,$studio,$running_Time,$director,$realease_date,$producers,$IMDB,$imageURL)
{



    $row =$this->db->select("SELECT * FROM movie WHERE title = :username", array(':username' =>$title));
    if($row=== null){
   $descripttion='movie';
   $genreID='1';

    
   $Postdata = array(
       'tltle'=> $title,
       'description'=>$descripttion,
       'ImageUrl'=>$imageURL,
        'genre_id'=> $genreID
      

     );

   // print_r($Postdata);
    $this->db->insert('content',$Postdata);
    $lastInsertID=$this->db->lastInsertId('content_Id');

     $PostdataToMovie = array(
         'content_Id'=>$lastInsertID,
        'title'=> $title,
        'studio'=>$studio,
        'running_Time'=> $running_Time,
        'director'=> $director, 'release_date'=> $realease_date ,
       'producers'=> $producers,
       'IMDB'=> $IMDB
    );
   $this->db->insert('movie',$PostdataToMovie);
  // $this->model->insertContact($postdata); 
       return  $lastInsertID;}
    $content=1;
    foreach ($row as $item){

        $content= $item->content_Id;
    }

    return $content;
  // $this->db->select('call storeMovie('.$title .','. $studio.','.$running_Time.','.$director.','.$realease_date.','.$producers.','.$IMDB.')');
   //$this->db-> insert(PREFIX.'contacts', $data);
    
}
    public Function saveMovieManualy($title,$studio,$running_Time,$director,$realease_date,$IMDB,$imageURL)
    {
        $row =$this->db->select("SELECT * FROM movie WHERE title = :username", array(':username' =>$title));
        if($row=== null) {
            $descripttion = 'movie';
            $genreID = '1';


            $Postdata = array(
                'tltle' => $title,
                'description' => $descripttion,
                'ImageUrl' => $imageURL,
                'genre_id' => $genreID


            );


            $this->db->insert('content', $Postdata);
            $lastInsertID = $this->db->lastInsertId('content_Id');

            $PostdataToMovie = array(
                'content_Id' => $lastInsertID,
                'title' => $title,
                'studio' => $studio,
                'running_Time' => $running_Time,
                'director' => $director, 'release_date' => $realease_date,
                'producers' => "N/A",
                'IMDB' => $IMDB
            );
            $this->db->insert('movie', $PostdataToMovie);
            // $this->model->insertContact($postdata);
            return $lastInsertID;
        }
        $content=1;
        foreach ($row as $item){

         $content= $item->content_Id;
        }

        return $content;
        // $this->db->select('call storeMovie('.$title .','. $studio.','.$running_Time.','.$director.','.$realease_date.','.$producers.','.$IMDB.')');
        //$this->db-> insert(PREFIX.'contacts', $data);

    }

    public function getAllMovies()
    {
        return $this->db->select("SELECT * FROM `movie`");



    }
    
    public function getContentMovies(){


        return $this->db->select("SELECT  p.`content_Id`, p.`title` , p.`running_Time` , p.`release_date` , p.`producers` , p.`IMDB` , p.`Flagged` , g.`ImageUrl` FROM movie p, content g WHERE p.content_Id = g.content_Id LIMIT 0 , 30");
        
        
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





    public function EditMovies()
    {
            $PostdataToMovie = array(

            'title'=> $_POST["movieNameAdmin"],
            'release_date'=>$_POST["movieReleaseDateEdit"],
            'running_Time'=>$_POST["duration"],

            'producers'=> $_POST["producers"],
            'IMDB'=>  $_POST["imdb"]
        );
        $where = array('content_Id' => $_POST["EditMovieID"]);
        $this->db->update('movie', $PostdataToMovie, $where);

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
        $this->db->update('movie', $PostdataToMovie, $where);
        $data["tag"] = "done";
        $data["message"] = 'Movie has been flagged for deletion ';
        View::render("Body/ConfrimationMessage", $data);

    }

    public function getMostPorpularMovies(){


        return $this->db->select("SELECT  p.`content_Id`, p.`title` , p.`running_Time` , p.`release_date` , p.`producers` , p.`IMDB` , p.`Flagged` , g.`ImageUrl` FROM movie p, content g WHERE p.content_Id = g.content_Id LIMIT 0 , 3");

    }

}