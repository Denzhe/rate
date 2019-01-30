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
    class  AddReward extends Model
{


    public function SaveReward($arrayAdd)
    {

        $this->db->insert('reward',$arrayAdd);

    }
        
        
     public function getAllRewards(){

         return $this->db->select("SELECT * FROM reward ");
         
         
     }   
        



}
