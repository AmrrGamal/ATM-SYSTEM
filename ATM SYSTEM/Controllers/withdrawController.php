<?php
require_once '../../Models/withdraw.php';
require_once 'DBController.php';
require_once 'transactionController.php';
require_once '../../Models/transaction.php';


 
class  WithdrawControllers{
   
    public function addWithdraw($amount)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
          

            $transactionId=new TransactionControllers;
            $result=$transactionId->gettransactionId();
            $withdrawId=$result[0]["(max(transactionId)+1)"];
            $withdrawId--;
            
            $query="insert into withdraws values ($withdrawId,'$amount')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getMaxWithdrawAmount(){
   
      $this->db=new DBController;
      if($this->db->openConnection())
      {
          
          $query="select (max(amount)) from withdraws join transactions on withdraws.id =transactions.transactionId where account =".$_SESSION["accId"];
          return $this->db->select($query);
      
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }




    }











}