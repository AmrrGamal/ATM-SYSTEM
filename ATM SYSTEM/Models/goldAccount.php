<?php

class GoldAccount extends Account{

    
    private $dailyIntrest;
    
    public function getBalance() {
        return $this->balance;
    }


    public function setBalance($balance): void {
        $this->balance = $balance;
    }

   



}

?>