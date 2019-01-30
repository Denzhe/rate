<?php

namespace Models;

/**
 * Description of Math_Model
 *
 * @author Denzhe Sadiki
 */
use Core\Model;
use Core\View;


class User extends Model
{


    function __construct()
    {
        parent::__construct();


    }

    private function get_user_hash($username)
    {


        return $this->db->select("SELECT * FROM user WHERE username = :username", array(':username' => $username));

    }



   public function getAll_users()
    {


        return $this->db->select("SELECT `id`,`bio`,`coverURL`,`imageURL`,`Location`,`Suname`,`FirstName`,`points` FROM `user`");

    }
    public function get_users3()
    {


        return $this->db->select("SELECT `id`,`bio`,`coverURL`,`imageURL`,`Location`,`Suname`,`FirstName`,`points` FROM `user`  LIMIT 0 , 3");

    }
    private function get_Email($email)
    {


        return $this->db->select("SELECT * FROM user WHERE emaail = :username", array(':username' => $email));

    }

    private function get_activation($active)
    {


        return $this->db->select("SELECT * FROM user WHERE active = :username", array(':username' => $active));

    }

    public function getAdmins()
    {

        return $this->db->select("SELECT * FROM admin ");


    }
    public function activateAccount($activation, $username)
    {

        
        
        // $data["tag"] = "ACTIVATION SUCCESSFULL";
         // $data["message"] = 'Hey   your acount has now been activated ';
        //  View::render("Body/ConfrimationMessage", $data);

        $row = $this->get_user_hash($username);


        $active = $row[0]->active;


       if ($activation == $active) {

           $this->makeUserActive($row[0]->id);
           $postdata = array(
               'active' => "null",

           );

           $where = array('username' => $username);

           $this->db->update('user',$postdata, $where);



       } else {

            $data["tag"] = "Link Expired";
           $data["message"] = 'Hey  ' . $row[0]->username . '  your acount is already activated ';
           View::render("Body/ConfrimationMessage", $data);
       }

    }

    public function login($username, $password)
    {

        $row2= $this-> getAdmins();
        $row = $this->get_user_hash($username);

        $hash = $row[0]->password;


        if (crypt($password, $hash) == $hash) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row[0]->username;
            $_SESSION['id'] = $row[0]->id;
            $_SESSION['coverURL'] = $row[0]->coverURL;
            $_SESSION['imageUrl'] = $row[0]->imageURL;
            $_SESSION['surname'] = $row[0]->Surname;
            $_SESSION['points'] = $row[0]->points;
            $_SESSION['bio'] = $row[0]->bio;
            $_SESSION['FirstName'] = $row[0]->FirstName;
            $_SESSION['email'] = $row[0]->email;


            foreach ($row2 as  $item ){

                if($row2->id== $_SESSION['id']){
                $_SESSION['admin']=1;

                }else{

                    $_SESSION['admin']=0;

                }

            }


            $followmodl =new Follow_Model();
            $_SESSION['followingCount']=$followmodl->getFollowingCount();
            $_SESSION['followersCount']=$followmodl->getFollowersCount();
            return true;


        }
    }


    public function logout()
    {
        session_destroy();
        $data["tag"]="log out successfull";
        $data["message"] ="your've been successfully logged out";
        View::render("Body/ConfrimationMessage",$data);

    }
    
    
    public function makeAdmin($id)
    {
        if (isset($_POST["makeUserAdmin"])) {
        $text="site adminstrator";
        $postdata = array(


            'Position' => $text,
            'id'=> $id
        );
        $this->db->insert('admin',$postdata);
        $data["tag"]="success";
        $data["message"] ="user is now an admin";
        View::render("Body/ConfrimationMessage",$data);}
        
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            return true;
        }
    }


    public function saveUserSettings($data, $where)
    {
        $this->db->update('user', $data, $where);
        $data["tag"]="Done";
        $data["message"] ="Your settings have been  successfully saved";
         View::render("Body/ConfrimationMessage",$data);

    }


    public function getuserDetailsByID($id)
    {


        return $this->db->select("SELECT `id`,`bio`,`email`,`coverURL`,`imageURL`,`Location`,`Suname`,`FirstName`,`points` FROM user WHERE id = :username", array(':username' => $id));

    }


    public function getAllTwitterUserDetails($twitterID)
    {

        return $this->db->select("SELECT * FROM user WHERE twitterID = :username", array(':username' => $twitterID));

    }

    public function getAllFacebookUserDetails($FacebookID)
    {

        return $this->db->select("SELECT * FROM user WHERE facebookID = :username", array(':username' =>$FacebookID));

    }

    public function savenewpassword($password, $active)
    {

        $hashedpassword = $this->better_crypt(trim($$password), 7);
        $postdata = array(


            'password' => $hashedpassword,

        );


        $where = array('active' => $active);
        $this->db->update('user', $postdata, $where);

        $data["tag"]="Reset Successfull";
        $data["message"] ='Hey  your password has now been reset ';
        View::render("Body/ConfrimationMessage",$data);

    }


    public function better_crypt($input, $rounds)
    {

        $salt = "";
        $salt_chars = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++) {
            $salt .= $salt_chars[array_rand($salt_chars)];
        }
        return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
    }

    public function SendRequestEmailresetPassword($email)
    {


        $row = $this-> get_Email($email);


        $active = $row[0]->resetToken;




        $mail = new \Helpers\PhpMailer\Mail();
        $mail->setFrom("ratethat@imagehut.co.za");
        $mail->addAddress($email);
        $mail->subject('Important Email');
        $mail->body('<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Actionable emails e.g. reset password</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 18px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}
</style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
							<meta itemprop="name" content="Confirm Email" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" /><table width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										Hey Thank you for singning up to RateThat!
									</td>
								</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
											Please Click Below to Reset password
											if you did not request this , simply ignore and nothing will happen
									</td>
								</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										<a href="http://rate.imagehut.co.za/?resetLink=' .$active. '" class="btn-primary" itemprop="url" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Confirm email address</a>
									</td>
								</tr><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
										&mdash; RateThat
									</td>
								</tr></table></td>
					</tr></table><div class="footer" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">

						</tr></table></div></div>
		</td>
		<td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
	</tr></table></body>
</html>
');
        $mail->send();


    }

    public function ResetPassword()
    {

        View::render("Body/retrivePassword");

    }

    public function EmailUser($email,$subject,$content){

        $mail = new \Helpers\PhpMailer\Mail();
        $mail->setFrom("ratethat@imagehut.co.za");
        $mail->addAddress($email);
        $mail->subject($subject);
        $mail->body('<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Actionable emails e.g. reset password</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 20px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 18px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}
</style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
							<meta itemprop="name" content="email" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" /><table width="100%" cellpadding="0" cellspacing="0" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
									
					<div> '.$content.'</div>
		</td>
		<td style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
	</tr></table></body>
</html>
');
        $mail->send();
        $data["tag"]="done";
        $data["message"] ="Email sent";
        View::render("Body/ConfrimationMessage",$data);


    }



    public function makeUserActive($id){

        $postdata = array(
            'activated' =>1


        );
        $where = array('id' => $id);
        $this->db->update('user', $postdata, $where);
        $data["tag"]="done";
        $data["message"] ="user is now active";
        View::render("Body/ConfrimationMessage",$data);



    }
    public function makeUserUnActive($id){

        $postdata = array(
            'activated' =>0


        );
        $where = array('id' => $id);
        $this->db->update('user', $postdata, $where);
        $data["tag"]="done";
        $data["message"] ="Acount  is now Deactivated";
        View::render("Body/ConfrimationMessage",$data);



    }

}


?>
