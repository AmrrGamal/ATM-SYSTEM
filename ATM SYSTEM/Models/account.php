<?php


class Account{

    private $accountId;
    private $pin;
    private $userSsn;
    private $accountType;
    private $balance;
    
    
    public function getBalance() {
        return $this->balance;
    }

   
    public function setBalance($balance): void {
        $this->balance = $balance;
    }

    public function getAccountId() {
        return $this->accountId;
    }

    public function getPin() {
        return $this->pin;
    }

    public function getUserSsn() {
        return $this->userSsn;
    }

    public function getAccountType() {
        return $this->accountType;
    }

    public function setAccountId($accountId): void {
        $this->accountId = $accountId;
    }

    public function setPin($pin): void {
        $this->pin = $pin;
    }

    public function setUserSsn($userSsn): void {
        $this->userSsn = $userSsn;
    }

    public function setAccountType($accountType): void {
        $this->accountType = $accountType;
    }
    
    



}


?>