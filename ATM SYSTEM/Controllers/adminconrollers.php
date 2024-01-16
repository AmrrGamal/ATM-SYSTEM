<?php
require_once '../../Models/report.php';
require_once 'DBController.php';

class AdminController {
    public function addReport(Report $report)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $adminId=$report->getAdminId();
            $date=$report->getReportDate();
            $numOfWithdraw=$report->getNumOfWithdraw();
            $numOfWithdraw=$report->getNumOfTransfer();
            $numOfDeposit=$report->getNumOfDeposit();
            $numOfDeposit=$report->getNumOfDeposit();
            $atmName=$report->getAtmName();
           
            $query="insert into reports values ( '',$adminId,'$date',$numOfWithdraw,$numOfWithdraw,$numOfDeposit,'$atmName')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getAllUsers()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from users where role ='user';";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function deleteUser( $userId)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="delete from users where id = $userId";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getAtmData()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from atm ;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function refillBalance(ATM $atm)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $newBalance=$atm->getBalance();   
            $query="update atm set balance =$newBalance ";
            return $this->db->update($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function checkReportExist($date,$adminId)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
              
            $query="select * from reports where reportData ='".$date."' and adminId=".$adminId;
            $result=$this->db->select($query);
            return $result ;
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    
    public function updateATMBalance($newBalance)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
          
             $query="update atm set balance =".$newBalance ;
            return $this->db->update($query);
         
         }
         else
         {
            echo "Error in Database Connection";
            return false;
         }
    }
    
    
}

