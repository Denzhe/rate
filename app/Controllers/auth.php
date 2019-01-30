<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;
use \core\view, \helpers\session, \helpers\password, \helpers\url;

class Auth extends \Core\Controller{
    
    private $_model;
    
    

    public function login(){
        
        $data['title'] = "Login";
        
        \Core\View::renderTemplate('header', $data);
        \Core\View::render('Auth/login', $data, $error);
        \Core\View::renderTemplate('footer', $data);
        
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            //validation
            if(Password::verify($password, $this->_model->getHash($username))== FALSE){
                $error[] = 'Wrong username or password';
            }
            
            if(!$error){
                \Helpers\Session::set('loggedin', true);
                \Helpers\Session::set('memberID', $this->_model->getID($username));
                
                $data = array('lastLogin' => date('Y-m-d G:i:s'));
                $where = array('memberID' => $this->_model->getID($username));
                $this->_model->update($date, $where);
                
                \Helpers\Url::redirect();
            }
        }
        
    }
    
    public function logout(){
        session::destroy;
        \Helpers\Url::redirect();
    }
}