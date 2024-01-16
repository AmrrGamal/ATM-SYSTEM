<?php
require_once '../../Models/report.php';
require_once 'DBController.php';
class UserController {

public function updateUser (){


    $this->db=new DBController;
    if($this->db->openConnection())

    { 
        
       $status="invalid";
       $query="update users set userStatus ='$status' where pin =".$_SESSION['userpin'];
       return $this->db->update($query);
    }
    else
    {
       echo "Error in Database Connection";
       return false; 
    }



}










}
