<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/25/2016
 * Time: 1:43 AM
 */

namespace Models;


use Core\Model;

class content extends Model
{

    public function displayAllContent()
    {

        return  $this->db->select("SELECT * FROM content LIMIT ");
    }

    public function displayContentWhereGenreID($id)
    {

        return $this->db->select("SELECT * FROM content WHERE genre_id = :id", array(':id' => $id));
    }

    public function displayMovieDetails($contenetID)
    {

        return $this->db->select("SELECT * FROM movie WHERE content_Id= :id", array(':id' => $contenetID));

    }
    public function displayGameDetails($contenetID)
    {

        return $this->db->select("SELECT * FROM game WHERE content_Id= :id", array(':id' => $contenetID));

    }
    public function displayBookDetails($contenetID)
    {

        return $this->db->select("SELECT * FROM book WHERE content_Id= :id", array(':id' => $contenetID));

    }

    public function searchForContent($contenetID)
    {

        return $this->db->select("SELECT * FROM book WHERE content_Id= :id", array(':id' => $contenetID));


    }

    public function saveMovie($arrayAdd)
    {
        return $this->db->insert('following',$arrayAdd);
    }

}