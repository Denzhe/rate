<?php



namespace Models;

use Core\Model;

class addMovie extends Model {

function __construct() {
parent::__construct();
}

public function Add($var1, $var2) {
return $var1 + $var2;
}



}