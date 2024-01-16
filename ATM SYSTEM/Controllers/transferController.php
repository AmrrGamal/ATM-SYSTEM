<?php
require_once '../../Models/transaction.php';
require_once 'DBController.php';
require_once 'transactionController.php';

 
class TransferControllers{

    public function addTransfer($amount,$receiverpin)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $transactionId=new TransactionControllers;
            $result=$transactionId->gettransactionId();
            $transferId=$result[0]["(max(transactionId)+1)"];
            $transferId--;
           // echo $transferId;
           
            $query="insert into transfers values ($transferId,'$amount',$receiverpin)";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }

    }

    public function checkReceiver(Person $person){

        $this->db = new DBController;
            if($this->db->openConnection()){
    
                $query = "select * from users where role='user' and pin=". $person->getPIN();
    
                $result = $this->db->select($query);
    
                if($result === false){
    
                    // echo "Error in query";
                    return false;
    
                }
    
                else{   
                    // result has values
                    if(count($result) == 0){
    
                        
                        $_SESSION["errMsg"] = "You have entered wrong PIN";
                        return false;
                    }
    
                    else{
    
                        
                        $_SESSION["receiverRole"] = $result[0]["role"];
                        $_SESSION["receiverpin"] = $result[0]["pin"];
                        $_SESSION["receiverpassword"] = $result[0]["password"];
                        $_SESSION["receiverSsn"] = $result[0]["ssn"];
                        $_SESSION["receiverName"]=$result[0]["name"];
                        return true;
    
                    }
                }
    
            }
    
            else{
                // echo "Error in Database Connection";
                return false;
            }
        }

        public function updateReceiverBalance(Account $account)
        {
             $this->db=new DBController;
             if($this->db->openConnection())
             {
              
                 $newBalance=$account->getBalance();
                 $query="update currentaccount set balance =$newBalance where pin=". $_SESSION["receiverpin"];
                 return $this->db->update($query);
              
              
             }
             else
             {
                echo "Error in Database Connection";
                return false; 
             }
        }
        
        

        public function getReceiverBalance()
        {
             $this->db=new DBController;
             if($this->db->openConnection())
             {
             
                 $query="select * from currentaccount where pin=". $_SESSION["receiverpin"] ;
                 return $this->db->select($query);
             
             }
             else
             {
                echo "Error in Database Connection";
                return false; 
             }
        }
        
       




}