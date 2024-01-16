<?php

class Transaction{

    private $transactionId=30;
    private $account;
    private $transactionType;
    private $transactionDate;
    public function getTransactionId() {
        return $this->transactionId;
    }

    public function getAccount() {
        return $this->account;
    }

    public function getTransactionType() {
        return $this->transactionType;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function setTransactionId($transactionId): void {
        $this->transactionId = $transactionId;
    }

    public function setAccount($account): void {
        $this->account = $account;
    }

    public function setTransactionType($transactionType): void {
        $this->transactionType = $transactionType;
    }

    public function setTransactionDate($transactionDate): void {
        $this->transactionDate = $transactionDate;
    }
    


}
?>