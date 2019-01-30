<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of Math_Model
 *
 * @author Denzhe Sadiki
 */
use Core\Model;

class Movie_Model extends Model  {
    //put your code here


public function getMovies(){
	
	 return $this->db->select('call getAllMovies');
}

public Function saveMovie($Postdata)
{
    
  
 $this->db->insert('movie',$Postdata);
   
  // $this->model->insertContact($postdata); 
       
  // $this->db->select('call storeMovie('.$title .','. $studio.','.$running_Time.','.$director.','.$realease_date.','.$producers.','.$IMDB.')');
   //$this->db-> insert(PREFIX.'contacts', $data);
    
}

}