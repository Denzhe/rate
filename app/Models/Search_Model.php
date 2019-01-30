<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/28/2016
 * Time: 1:54 PM
 */


namespace Models;




use Core\Model;
use Core\View;
class Search_Model extends Model  {


//get books
    public function getMovie_title($title)
    {

        return $this->db->select("SELECT * FROM movie, content WHERE movie.title LIKE '%$title%' 
                          AND content.content_Id = movie.content_Id GROUP BY movie.title ORDER BY movie.title");

    }


    public function getMovie_studio($studio)
    {

        return $this->db->select("SELECT * FROM movie, content WHERE movie.studio LIKE '%$studio%' 
                                  AND content.content_Id = movie.content_Id GROUP BY movie.title ORDER BY movie.studio");

    }

    public function getMovie_director($director)
    {

        return $this->db->select("SELECT * FROM movie, content WHERE movie.director LIKE '%$director%' 
                                  AND content.content_Id = movie.content_Id GROUP BY movie.title ORDER BY movie.director");

    }

    public function getMovie_release_date($release_date)
    {

        return $this->db->select("SELECT * FROM movie, content WHERE movie.release_date LIKE '%$release_date%' 
                                  AND content.content_Id = movie.content_Id GROUP BY movie.title ORDER BY movie.release_date");

    }

    public function getMovie_producer($producers)
    {

        return $this->db->select("SELECT * FROM movie, content WHERE movie.producers LIKE '%$producers%' 
                                  AND content.content_Id = movie.content_Id GROUP BY movie.title ORDER BY movie.producers");

    }

//get books

    public function getBook_publisher($publisher)
    {

        return $this->db->select("SELECT * FROM book, content WHERE book.publisher LIKE '%$publisher%' 
                                  AND content.content_Id = book.content_Id GROUP BY content.tltle ORDER BY book.publisher");

    }

    public function getBook_IBSN($ibsn)
    {

        return $this->db->select("SELECT * FROM book, content WHERE book.ibsn LIKE '%$ibsn%' 
                                  AND content.content_Id = book.content_Id GROUP BY content.tltle ORDER BY book.ibsn");

    }

    public function getBook_author($author)
    {

        return $this->db->select("SELECT * FROM book, content WHERE book.author LIKE '%$author%'
                                  AND content.content_Id = book.content_Id GROUP BY content.tltle ORDER BY book.author");

    }

    public function getBook_publication_Date($publication_Date)
    {

        return $this->db->select("SELECT * FROM book, content WHERE book.publication_Date LIKE '%$publication_Date%'
                                  AND content.content_Id = book.content_Id GROUP BY content.tltle ORDER BY book.publication_Date");

    }

//get games

    public function getGame_publisher($publisher)
    {

        return $this->db->select("SELECT * FROM game, content WHERE game.publisher LIKE '%$publisher%'
                                  AND content.content_Id = game.content_Id GROUP BY game.publisher ORDER BY game.publisher");

    }

    public function getGame_release_Date($release_Date)
    {

        return $this->db->select("SELECT * FROM game, content WHERE game.release_Date LIKE '%$release_Date%'
                                  AND content.content_Id = game.content_Id GROUP BY game.publisher ORDER BY game.release_Date");

    }

    //get genre

    public function getGenre_name($name)
    {

        return $this->db->select("SELECT * FROM genre, content WHERE genre.name LIKE '%$name%' GROUP BY genre.name ORDER BY genre.name");

    }

    public function getGenre_desciption($desciption)
    {

        return $this->db->select("SELECT * FROM genre, content WHERE genre.desciption LIKE '%$desciption%' GROUP BY genre.desciption ORDER BY genre.name");

    }

    public function getPost_title($title)
    {

        return $this->db->select("SELECT * FROM post WHERE title LIKE '%$title%'");

    }

    public function getPost_post($post)
    {

        return $this->db->select("SELECT * FROM post WHERE post LIKE '%$post%'");

    }

    public function getPost_Time($time)
    {

        return $this->db->select("SELECT * FROM post WHERE Time LIKE '%$time%' ORDER BY Time");

    }

        public function getPost_preview($preview)
    {

        return $this->db->select("SELECT * FROM post WHERE preview LIKE '%$preview%'");

    }







}