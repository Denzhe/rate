<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/28/2016
 * Time: 1:54 PM
 */


namespace Models;




use Core\Model;
use Core\View;
class Post_Model extends Model  {

    

public function saveReview($dataArray,$ratingData)
{

   // print_r($dataArray);
    
  //  print_r($ratingData);
    
    
    $this->db->insert('post',$dataArray);
    $this->db->insert('rating',$ratingData);
    $totalPoints= $_SESSION['points'] + 10;
    $_SESSION['points']=$totalPoints;
    $where = array('id' => $_SESSION['id']);
    $postdata = array(
        'points' =>$totalPoints,


    );

    $this->db->update('user', $postdata, $where);
    
    
  // $this->db->insert('rating',$ratingData);
   $data["redirectURL"]="?profile=1";
   $data["tag"]="Submision  Successfull";
   $data["message"] =' Your Review has been Published ';
   View::render("Body/ConfrimationMessage",$data);
   // print_r($ratingData);
    
    
    
}
public function DeleteReview($data)
{
    
    $this->db->delete('post', $data);
    
    
}
    








}