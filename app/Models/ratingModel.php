<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;



use Core\Controller;
use Core\Model;
use Core\View;

use Models\User;
use Models\userRegistration;

class rating extends Model
{

        

    public function __construct()
    {
        parent::__construct();

    }

    
    public  function returnRating($contentID){
        
      

        
        return  $this->db->select("SELECT AVG(  `value` ) FROM rating  WHERE content_Id= :username", array(':username' => $contentID));
        
        
        
    }
    
    
    
    
    
}