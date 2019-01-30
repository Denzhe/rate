<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/22/2016
 * Time: 11:10 PM
 */

namespace Models;
use Core\Model;


include('../Controllers/user.php');
class userRegistration extends Model
{


    public function validate()
    {

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error[] = 'Please enter a valid email address';
            return $error;
        } else {
            $query='SELECT email FROM user WHERE email ='.$_POST['email'];
            $stmt = $this->db->select($query);
            $stmt->execute(array(':email' => $_POST['email']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($row['email'])){
                $error[] = 'Email provided is already in use.';
                return $error;
            }

        }

    }

    

}