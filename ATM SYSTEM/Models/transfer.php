<?php

class Transfer extends Transaction{


            private $id;
            private $amount;
            private $toAccount;
            public function getId() {
                return $this->id;
            }

            public function getAmount() {
                return $this->amount;
            }

            public function getToAccount() {
                return $this->toAccount;
            }

            public function setId($id): void {
                $this->id = $id;
            }

            public function setAmount($amount): void {
                $this->amount = $amount;
            }

            public function setToAccount($toAccount): void {
                $this->toAccount = $toAccount;
            }
            
}

?>