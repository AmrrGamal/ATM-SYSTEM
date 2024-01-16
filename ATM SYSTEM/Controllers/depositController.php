<?php
require_once '../../Models/deposit.php';
require_once 'DBController.php';
require_once 'transactionController.php';

 
class  DepositControllers{
   
    public function addDeposit($amount)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
          

            $transactionId=new TransactionControllers;
            $result=$transactionId->gettransactionId();
            $depositId=$result[0]["(max(transactionId)+1)"];
            $depositId--;
           
            $query="insert into deposits values ($depositId,'$amount')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }











}