<?php

namespace models;

class Auth extends \Core\Model{
    
    public function getHash($username, $password){
        $data = $this->smvc_->select("INSERT INTO imagecjd_ink.".PREFIX."reader(id, username, password) VALUES(9, ".$username.", ".$password.")");
    }
}

?>