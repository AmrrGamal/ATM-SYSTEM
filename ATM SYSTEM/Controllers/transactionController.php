<?php
require_once '../../Models/transaction.php';
require_once 'DBController.php';
 
class TransactionControllers{
  
    
    public function addTransaction($accountId,$transactionType)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $transactionId=new TransactionControllers;
            $result=$transactionId->gettransactionId();
            $transferId=$result[0]["(max(transactionId)+1)"];
         
           // echo $transferId;
            $date = date('y-m-d');
            $query="insert into transactions values ($transferId,$accountId,'$transactionType','$date')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function gettransactionId(){

      $this->db=new DBController;
      if($this->db->openConnection())
      {
      
          $query="select (max(transactionId)+1) from transactions;" ;
          return $this->db->select($query);
      
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
    }

    public function numberOfEachTransaction($transactionType){

      $this->db=new DBController;
      if($this->db->openConnection())
      {
          $date = date('y-m-d');
          $query="select count(transactions.transactiontType) from transactions where transactions.transactiontType='".$transactionType."' and transactions.transactionData='".$date."'" ;
          return $this->db->select($query);
      
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
    }





   
    

    
 







}