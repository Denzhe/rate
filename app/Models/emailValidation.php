<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/22/2016
 * Time: 11:10 PM
 */

namespace Models;
use Core\Model;

class emailValidation extends Model
{


    public function validateEmail()
    {

            $stmt = $this->db->prepare('SELECT email FROM user WHERE email = :email');
            $stmt->execute(array(':email' => $_POST['email']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($row['email'])){

                return false;
            }

    }

    public function validateBook()
    {

        $stmt = $this->db->prepare('SELECT email FROM user WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['email'])){

            return false;
        }

    }
    public function validateContent($content)
    {




        $row = $this->db->select("SELECT * FROM content WHERE title = :id", array(':id' => $content));

        if(empty($row)){

            return true;
        }

    }

    public function validateMovie()
    {

        $stmt = $this->db->prepare('SELECT email FROM user WHERE email = :email');
        $stmt->execute(array(':email' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['email'])){

            return false;
        }

    }

}