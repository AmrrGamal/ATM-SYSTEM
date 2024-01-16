<?php
require_once '../../Models/person.php';
require_once '../../Models/admin.php';
require_once 'DBController.php';
class BankClerkController {



    public function addAdmin(Admin $admin)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $pass=$admin->getPassword();
            $pin=$admin->getPIN();
            $name=$admin->getName();
            $ssn=$admin->getSsn();
            $address=$admin->getAddress();
            $role=$admin->getRole();
            $phone=$admin->getPhone();
         
            $query="insert into users values ('','$name','$phone','$ssn','$address','$role','$pass',$pin,'valid')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }


    public function getAllReports()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from reports ;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getReportsData($reportid)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from reports where id =$reportid ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function checkAdminExist($pin,$ssn)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
              
            $query="select * from users where pin ='".$pin."' or ssn=".$ssn;
            $result=$this->db->select($query);
            return $result ;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }


}



?>