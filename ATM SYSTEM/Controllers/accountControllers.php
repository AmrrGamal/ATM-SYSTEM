<?php
require_once '../../Models/account.php';
require_once 'DBController.php';
session_start();
class  AccountControllers{
protected $db;
public function getAccountInfo()
{
     $this->db=new DBController;
     if($this->db->openConnection())
     {  
        $query="select * from transactions where account='".$_SESSION["accId"]."' ORDER BY transactionId DESC limit 5;";
        return $this->db->select($query);
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }
}


public function selectAllAccounts(){

   $this->db = new DBController;
   if($this->db->openConnection()){

       if(!isset($_SESSION["userpin"])){

           session_start();
       }

       $query = "select * from accounts where userSsn=" . $_SESSION["userSsn"];

       $result = $this->db->select($query);

       if($result === false){
           return false;

       }
       else{

           if(count($result) == 0){
               return false;
           }

           else{

               if(!isset($_SESSION["userpin"])){

                   session_start();
               }

               for($i = 0; $i < count($result) ; $i++){

               $_SESSION["accId" . $i] = $result[$i]["accountId"];
               $_SESSION["accType" . $i] = $result[$i]["accountType"];

               }


               return $result;

           }
       }

       
   }

   else{
       return false;
   }

}



public function getBalance()
{
     $this->db=new DBController;
     if($this->db->openConnection())
     {
      if ($_SESSION["accType"]=="Gold Account") {
           $query="select * from goldaccount where pin=". $_SESSION["userpin"] ;
           return $this->db->select($query);
        }
      if ($_SESSION["accType"]=="Current Account") {
         $query="select * from currentaccount where pin=". $_SESSION["userpin"] ;
         return $this->db->select($query);
      }
      if ($_SESSION["accType"]=="Saving Account") {
         $query="select * from savingaccount where pin=". $_SESSION["userpin"] ;
         return $this->db->select($query);
      }
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }
}

public function updateBalance(Account $account)
{
     $this->db=new DBController;
     if($this->db->openConnection())
     {
      
      $newBalance=$account->getBalance();
      if ($_SESSION["accType"]=="Gold Account") {
         $query="update goldaccount set balance =$newBalance where pin=". $_SESSION["userpin"];
         return $this->db->update($query);
        }
      if ($_SESSION["accType"]=="Current Account") {
         $query="update currentaccount set balance =$newBalance where pin=". $_SESSION["userpin"];
        return $this->db->update($query);
      }
      if ($_SESSION["accType"]=="Saving Account") {
         $query="update savingaccount set balance =$newBalance where pin=". $_SESSION["userpin"];
        return $this->db->update($query);
      }
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }
}


public function getAmountOfTransaction($transactionId,$transactionType)
{
     $this->db=new DBController;
     if($this->db->openConnection())
     {
      
      
      if ($transactionType=="Deposit") {
         $query="select amount from deposits where id =".$transactionId;
         return $this->db->select($query);
        }
      if ($transactionType=="Withdraw") {
         $query="select amount from withdraws where id =".$transactionId;
        return $this->db->select($query);
      }
      if ($transactionType=="Transfer") {
         $query="select amount from transfers where id =".$transactionId;
        return $this->db->select($query);
      }
     }
     else
     {
        echo "Error in Database Connection";
        return false; 
     }
}




   

}







?>