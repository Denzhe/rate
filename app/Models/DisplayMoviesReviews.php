<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/24/2016
 * Time: 3:27 AM
 */

namespace Models;


use Core\Model;

class DisplayMoviesReviews extends Model
{


    public function displayAllReviews()
    {

        return  $this->db->select("SELECT * FROM `post` ORDER BY `Time` ASC LIMIT 5000");
    }
    
    public function displayReviewAuthorDetails($id)
    {

        return $this->db->select("SELECT * FROM user WHERE id = :id", array(':id' => $id));
    }

    public function displayContentDetails($contenetID)
    {

        return $this->db->select("SELECT * FROM content WHERE content_Id= :id", array(':id' => $contenetID));

    }

    public function displayReviewsByUserID($UserID)
    {

        return $this->db->select("SELECT * FROM post WHERE id= :id", array(':id' => $UserID));

    }


    public function displayReviewsbyPostID($postID)
    {

        return $this->db->select("SELECT * FROM post WHERE post_id= :id", array(':id' => $postID));

    }

    public function displayReviewGamesReviews()
    {

        return $this->db->select("SELECT * FROM user WHERE id = :id", array(':id' => $id));
    }

      public function displayGameReviews ()
     {
        
         return $this->db->select("SELECT p.post , p.post_id , p.title , p.id , p.preview , p.Time , p.content_Id FROM  post p, game g WHERE g.content_Id = p.content_Id; ");
      
     }
   
     
      public function displayBookReviews ()
     {
        
         return $this->db->select("SELECT p.post , p.post_id , p.title , p.id , p.preview , p.Time , p.content_Id FROM  post p, book g WHERE g.content_Id = p.content_Id; ");
      
     }

     
     
     
        public function displayMovieReviews ()
     {
        
         return $this->db->select("SELECT p.post , p.post_id , p.title , p.id , p.preview , p.Time , p.content_Id FROM  post p, movie g WHERE g.content_Id = p.content_Id; ");
      
     }

}