<?php 
 
 class ATM {

    private $id;
            private $laction;
            private $balance;
            private $name;
            public function getId() {
                return $this->id;
            }

            public function getLaction() {
                return $this->laction;
            }

            public function getBalance() {
                return $this->balance;
            }

            public function getName() {
                return $this->name;
            }

            public function setId($id): void {
                $this->id = $id;
            }

            public function setLaction($laction): void {
                $this->laction = $laction;
            }

            public function setBalance($balance): void {
                $this->balance = $balance;
            }

            public function setName($name): void {
                $this->name = $name;
            }
            


 }



?>