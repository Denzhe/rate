<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/23/2016
 * Time: 1:04 AM
 */

namespace Models;


use Core\Model;
use Core\View;
class comments extends Model
{


    public function SaveComment($arrayAdd)
    {

        $this->db->insert('comment',$arrayAdd);

    }




    public function retriveComments($postContent)
    {

        return $this->db->select("SELECT * FROM comment WHERE post_id= :id", array(':id' => $postContent));


    }
}



