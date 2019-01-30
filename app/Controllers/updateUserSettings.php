<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 6/30/2016
 * Time: 2:48 AM
 */

namespace Controllers;




use Core\Controller;
use Core\View;
use Models\User;

class updateUserSettings extends Controller
{

    public function __construct() {
        parent::__construct();
    }

    
    public function index()
    {
        View::render("Body/profileSettings");
        
    }

    public function getSettings()
    {


        if (!file_exists('app/templates/default/image/UserUploads/' . $_SESSION['id'] . '')) {
            mkdir('app/templates/default/image/UserUploads/' . $_SESSION['id'] . '', 0777, true);
        }


        if ($_FILES['photo']['name']) {
            $valid_file = true;
            //if no errors...

            $imageURl='/' . $_SESSION['id'] . '/'.$_FILES['photo']['name'];
            $config['upload_path'] = 'app/templates/default/image/UserUploads/' . $_SESSION['id'] . '';
            $config['allowed_types'] = '*';
            $upload = new \Helpers\Upload($config);
            if ($upload->do_upload('photo')) {


                $imageOBject = ($upload->data());





            } else {
                print_r($upload->error_msg);
            }

            $coverURl='/' . $_SESSION['id'] . '/'.$_FILES['cover']['name'];
            $config['upload_path'] = 'app/templates/default/image/UserUploads/' . $_SESSION['id'] . '';
            $config['allowed_types'] = '*';
            $upload2 = new \Helpers\Upload($config);
            if ($upload2->do_upload('cover')) {
                $imageOBject = ($upload2->data());


                

            }
        }

            $hashedpassword = $this->better_crypt(trim($_POST['password']),7);

             $postdata = array(
                 'username' =>trim($_POST['UserName']),
                'coverURL'  => $coverURl,
                'imageURL'     => $imageURl,
                 'Location'     => $_POST['Location'],
                 'FirstName'     =>  $_POST['firstname'],
                'password'     => $hashedpassword,
                 'bio'     => $_POST['Bio'],
                 'email'     => $_POST['Email'],
                 'Suname' => $_POST['surname'],

            );




        $_SESSION['username']=trim($_POST['UserName']);
        $where = array('id' => $_SESSION['id']);



        $userModel =new User();
        $userModel->saveUserSettings($postdata,$where);
        
        $_SESSION['username'] = trim($_POST['UserName']);

        $_SESSION['coverURL']= $coverURl;
        $_SESSION['imageUrl']=$imageURl;
        $_SESSION['surname']=$_POST['firstname'];
        $_SESSION['bio']=$_POST['Bio'];
        $_SESSION['FirstName']=$_POST['firstname'];
        $_SESSION['email']=$_POST['Email'];
//catch exception
         $data["redirectURL"]="?profile=1";
            $data["tag"]="Done";
            $data["message"] ='Your settings have been  successfully saved';
            View::render("Body/ConfrimationMessage",$data);

        }


   public function better_crypt($input,$rounds )
    {

        $salt = "";
        $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
        for($i=0; $i < 22; $i++) {
            $salt .= $salt_chars[array_rand($salt_chars)];
        }
        return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
    }

}